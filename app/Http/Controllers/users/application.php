<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\hr\InterviewExam;
use App\Models\hr\Publication;
use App\Models\User;
use App\Models\users\application as UsersApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class application extends Controller
{
    public const LOCAL_STORAGE_FOLDER = "application-files/";
    public const LOCAL_STORAGE_FOLDER_DELETE = "/public/application-files/";
    private $publication;
    private $application;
    private $user;
    private $interviewExam;
    public function __construct(Publication $publication, UsersApplication $application, User $user, InterviewExam $interviewExam)
    {
        $this->publication = $publication;
        $this->application = $application;
        $this->user = $user;
        $this->interviewExam = $interviewExam;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_application = $this->application->where('user_id', Auth::user()->id)->withTrashed()->paginate(5);
        return view('users.application.my-application')->with('all_application', $all_application);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function apply(Request $request, $id)
    {
        $app = $this->application->where('user_id', Auth::user()->id)->first();
        if($app){
            if ($app->pub_id == $id) {
                Session::flash('alert', 'danger|Application has already been Sent');
                return back();
            }
        }
        $request->validate([
            'tor' => 'required|max:25000|mimes:pdf',
        ]);

        $this->application->user_id = Auth::user()->id;
        $this->application->pub_id = $id;
        $this->application->tor = $this->saveFile($request->tor);

        if ($request->eligibility) {
            $request->validate([

                'eligibility' => 'required|max:25000|mimes:pdf',
            ]);

            $this->application->eligibility = $this->saveFile($request->eligibility);
        }
        if ($request->residency) {
            $request->validate([
            'residency' => 'required|max:25000|mimes:pdf',
            ]);
            $this->application->residency = $this->saveFile($request->residency);
        }
        if ($request->rating) {
            $request->validate([
            'rating' => 'required|max:25000|mimes:pdf',
            ]);
            $this->application->rating = $this->saveFile($request->rating);
        }

        if ($this->application->save()) {
            $this->interviewExam->user_id = Auth::user()->id;
            $this->interviewExam->app_id = $this->application->id;
            $this->interviewExam->pub_id = $id;
            $this->interviewExam->save();
            Session::flash('alert', 'success|Application has been Sent');
            return redirect()->route('users.application.index');
        } else {
            Session::flash('alert', 'danger|Application has not been Sent');
            return back();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()->role == '1') {
            $publication = $this->publication->findOrFail($id);
            return view('users.application.application-form')
            ->with('edit_app', null)
            ->with('publication', $publication);
        } else {
            Session::flash('alert', 'danger|Employee Cannot Apply');
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $app_id)
    {
        $publication = $this->publication->findOrFail($id);
        $edit_app = $this->application->findOrFail($app_id);
        return view('users.application.application-form')
        ->with('edit_app', $edit_app)
        ->with('publication', $publication);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->residency) {
        } else {
            return redirect()->route('users.application.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $app = $this->application->findOrFail($id);
        if(Auth::user()->role == 0 || Auth::user()->role == 4){
            $app->status = 2;
            if ($app->save()) {
                Session::flash('alert', 'success|Application has been Rejected');
                return redirect()->route('users.application.index');
            } else {
                Session::flash('alert', 'danger|Application has not been Rejected');
                return back();
            }
        }else{
            if ($app->destroy($id)) {
                Session::flash('alert', 'success|Application has been Deleted');
                return redirect()->route('users.application.index');
            } else {
                Session::flash('alert', 'danger|Application has not been Deleted');
                return back();
            }
        }
    }


    public function delete($id)
    {
        $app = $this->application->onlyTrashed()->findOrFail($id);
        if ($app->residency) {
            $this->deleteFile($app->residency);
        }
        if ($app->rating) {
            $this->deleteFile($app->rating);
        }if ($app->eligibility) {
            $this->deleteFile($app->eligibility);
        }if ($app->tor) {
            $this->deleteFile($app->tor);
        }

        if ($this->application->onlyTrashed()->forceDelete($id)) {
            Session::flash('alert', 'success|Application has been Deleted');
            return redirect()->route('users.application.index');
        } else {
            Session::flash('alert', 'danger|Application has not been Deleted');
            return back();
        }
    }


    public function resubmit($id)
    {
        if ($this->application->onlyTrashed()->findOrFail($id)->restore()) {
            Session::flash('alert', 'success|Application has been Resubmit');
            return redirect()->route('users.application.index');
        } else {
            Session::flash('alert', 'danger|Application has not been Resubmit');
            return back();
        }
    }
    public function saveFile($file)
    {
        // getting original name
        $filenameWithExt = $file->getClientOriginalName();

        //Get just the file name
        $filenameWithoutExy = pathinfo($filenameWithExt, PATHINFO_FILENAME);

        // creating new name
        $filename = $filenameWithoutExy."-".time()."-".Auth::user()->id.".". $file->extension();

        // getting file path
        $filename_path = self::LOCAL_STORAGE_FOLDER_DELETE . $filename;
        while (Storage::disk('local')->exists($filename_path)) {
            // creating new name while exist
            $filename = $filenameWithoutExy."-".time()."-".Auth::user()->id.".". $file->extension();
            $filename_path = self::LOCAL_STORAGE_FOLDER_DELETE . $filename;
        }

        $file->storeAs(self::LOCAL_STORAGE_FOLDER, $filename);

        return $filename;
    }

    public function deleteFile($filename)
    {
        $filename_path = self::LOCAL_STORAGE_FOLDER_DELETE . $filename;

        if (Storage::disk('local')->exists($filename_path)) {
            Storage::disk('local')->delete($filename_path);
        }
    }



    public function print($user_id)
    {
        $user = $this->user->findOrFail($user_id);
        return view('hr.pds.print')->with('user', $user);
    }
}
