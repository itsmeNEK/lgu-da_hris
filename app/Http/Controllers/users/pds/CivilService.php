<?php

namespace App\Http\Controllers\users\pds;

use App\Http\Controllers\Controller;
use App\Models\pds\civilservice as PdsCivilservice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CivilService extends Controller
{
    public const LOCAL_STORAGE_FOLDER = "pdsFiles/";
    public const LOCAL_STORAGE_FOLDER_DELETE = "/public/pdsFiles/";
    private $civilservice;

    public function __construct(PdsCivilservice $civilservice)
    {
        $this->civilservice = $civilservice;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $civilservice = $this->civilservice->where('user_id', Auth::user()->id)->paginate(10);
        return view('users.pds.civilservice')->with('civilservice', $civilservice)->with('edit_civil', null);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'CSCareer'=>'required|min:1',
            'CSRating'=>'required|min:1',
            'CSDate'=>'required|min:1',
            'CSPlaceExam'=>'required|min:1',
            'CSnumber'=>'required|min:1',
            'CSDateValid'=>'required|min:1',
            'document'=>'max:25000|mimes:pdf',
        ], [
            'CSCareer.required' =>'Career is Empty',
            'CSRating.required' =>'Rating is Empty',
            'CSDate.required' =>'Date of Exam is Empty',
            'CSPlaceExam.required' =>'Place of Exam is Empty',
            'CSnumber.required' =>'License Number is Empty',
            'CSDateValid.required' =>'Date Valid is Empty',
            'document.max' =>'File is to big',
            'document.mimes' =>'Invalid File type',
        ]);
        $this->civilservice->user_id = Auth::user()->id;
        $this->civilservice->CSCareer = strtoupper($request->CSCareer);
        $this->civilservice->CSRating = $request->CSRating;
        $this->civilservice->CSDate = $request->CSDate;
        $this->civilservice->CSPlaceExam = strtoupper($request->CSPlaceExam);
        $this->civilservice->CSnumber = $request->CSnumber;
        $this->civilservice->CSDateValid = $request->CSDateValid;
        if ($request->document) {
            $this->civilservice->document = $this->saveFile($request->document);
        }
        if ($this->civilservice->save()) {
            Session::flash('alert', 'success|Record has been Saved');
            return redirect()->back();
        } else {
            Session::flash('alert', 'danger|Record not Save');
            return redirect()->back();
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $civilservice = $this->civilservice->where('user_id', Auth::user()->id)->paginate(10);
        $edit_civil = $this->civilservice->findOrFail($id);
        return view('users.pds.civilservice')->with('civilservice', $civilservice)->with('edit_civil', $edit_civil);
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
        $request->validate([
            'CSCareer'=>'required|min:1',
            'CSRating'=>'required|min:1',
            'CSDate'=>'required|min:1',
            'CSPlaceExam'=>'required|min:1',
            'CSnumber'=>'required|min:1',
            'CSDateValid'=>'required|min:1',
            'document'=>'max:25000|mimes:pdf',
        ], [
            'CSCareer.required' =>'Career is Empty',
            'CSRating.required' =>'Rating is Empty',
            'CSDate.required' =>'Date of Exam is Empty',
            'CSPlaceExam.required' =>'Place of Exam is Empty',
            'CSnumber.required' =>'License Number is Empty',
            'CSDateValid.required' =>'Date Valid is Empty',
            'document.max' =>'File is to big',
            'document.mimes' =>'Invalid File type',
        ]);
        $civilservice = $this->civilservice->findOrFail($id);
        $civilservice->CSCareer = strtoupper($request->CSCareer);
        $civilservice->CSRating = $request->CSRating;
        $civilservice->CSDate = $request->CSDate;
        $civilservice->CSPlaceExam = strtoupper($request->CSPlaceExam);
        $civilservice->CSnumber = $request->CSnumber;
        $civilservice->CSDateValid = $request->CSDateValid;
        if ($request->document) {
            $this->deleteFile($civilservice->document);
            $civilservice->document = $this->saveFile($request->document);
        }

        if ($civilservice->save()) {
            Session::flash('alert', 'success|Record has been Updated');
            return redirect()->route('users.pds.civilservice.index');
        } else {
            Session::flash('alert', 'danger|Record not Save');
            return redirect()->back();
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
        if ($this->civilservice->destroy($id)) {
            Session::flash('alert', 'success|Record has been Deleted');
            return redirect()->route('users.pds.civilservice.index');
        } else {
            Session::flash('alert', 'danger|Record not Deleted');
            return redirect()->back();
        }
    }

    public function saveFile($file)
    {

        // getting original name
        $filenameWithExt = $file->getClientOriginalName();

        //Get just the file name
        $filenameWithoutExy = pathinfo( $filenameWithExt, PATHINFO_FILENAME );

        // creating new name
        $filename = $filenameWithoutExy."-".time()."-".".". $file->extension();

        // getting file path
        $filename_path = self::LOCAL_STORAGE_FOLDER_DELETE . $filename;
        while (Storage::disk('local')->exists($filename_path)) {
            // creating new name while exist
            $filename = $filenameWithoutExy."-".time()."-".".". $file->extension();
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
}
