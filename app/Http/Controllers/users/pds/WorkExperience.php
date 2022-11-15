<?php

namespace App\Http\Controllers\users\pds;

use App\Http\Controllers\Controller;
use App\Models\pds\workexperience as PdsWorkexperience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class WorkExperience extends Controller
{
    public const LOCAL_STORAGE_FOLDER = "pdsFiles/";
    public const LOCAL_STORAGE_FOLDER_DELETE = "/public/pdsFiles/";
    private $workexperience;

    public function __construct(PdsWorkexperience $workexperience)
    {
        $this->workexperience = $workexperience;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workexperience = $this->workexperience->where('user_id', Auth::user()->id)->paginate(10);
        return view('users.pds.workexperience')->with('workexperience', $workexperience)->with('edit_work', null);
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
            'WEidfrom'=>'required|min:1',
            'WEidto'=>'required|min:1',
            'WEpostit'=>'required|min:1',
            'WEdepagen'=>'required|min:1',
            'WEmonthsal'=>'required|min:1',
            'WEsalaryjob'=>'required|min:1',
            'WEstatus'=>'required|min:1',
            'WEgovser'=>'required|min:1',
            'document'=>'max:25000|mimes:pdf',
        ], [
            'WEidfrom.required' =>'From is Empty',
            'WEidto.required' =>'To is Empty',
            'WEpostit.required' =>'Position title of Exam is Empty',
            'WEdepagen.required' =>'Department / Agency is Empty',
            'WEmonthsal.required' =>'Monthly Salary is Empty',
            'WEsalaryjob.required' =>'Salary Grade is Empty',
            'WEstatus.required' =>'Status is Empty',
            'WEgovser.required' =>'Govser is Empty',
            'document.max' =>'File is to big',
            'document.mimes' =>'Invalid File type',
        ]);
        $this->workexperience->user_id = Auth::user()->id;
        $this->workexperience->WEidfrom = $request->WEidfrom;
        $this->workexperience->WEidto = $request->WEidto;
        $this->workexperience->WEpostit = strtoupper($request->WEpostit);
        $this->workexperience->WEdepagen = strtoupper($request->WEdepagen);
        $this->workexperience->WEmonthsal = $request->WEmonthsal;
        $this->workexperience->WEsalaryjob = $request->WEsalaryjob;
        $this->workexperience->WEstatus = strtoupper($request->WEstatus);
        $this->workexperience->WEgovser = strtoupper($request->WEgovser);
        if ($request->document) {
            $this->workexperience->document = $this->saveFile($request->document);
        }
        if ($this->workexperience->save()) {
            Session::flash('alert', 'success|Record has been Save');
            return redirect()->route('users.pds.workexperience.index');
        } else {
            Session::flash('alert', 'danger|Record not Updated');
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
        $workexperience = $this->workexperience->where('user_id', Auth::user()->id)->paginate(10);
        $edit_work = $this->workexperience->findOrFail($id);
        return view('users.pds.workexperience')->with('workexperience', $workexperience)->with('edit_work', $edit_work);
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
            'WEidfrom'=>'required|min:1',
            'WEidto'=>'required|min:1',
            'WEpostit'=>'required|min:1',
            'WEdepagen'=>'required|min:1',
            'WEmonthsal'=>'required|min:1',
            'WEsalaryjob'=>'required|min:1',
            'WEstatus'=>'required|min:1',
            'WEgovser'=>'required|min:1',
            'document'=>'max:25000|mimes:pdf',
        ], [
            'WEidfrom.required' =>'From is Empty',
            'WEidto.required' =>'To is Empty',
            'WEpostit.required' =>'Position title of Exam is Empty',
            'WEdepagen.required' =>'Department / Agency is Empty',
            'WEmonthsal.required' =>'Monthly Salary is Empty',
            'WEsalaryjob.required' =>'Salary Grade is Empty',
            'WEstatus.required' =>'Status is Empty',
            'WEgovser.required' =>'Govser is Empty',
            'document.max' =>'File is to big',
            'document.mimes' =>'Invalid File type',
        ]);
        $workexperience = $this->workexperience->findOrFail($id);
        $workexperience->WEidfrom = $request->WEidfrom;
        $workexperience->WEidto = $request->WEidto;
        $workexperience->WEpostit = strtoupper($request->WEpostit);
        $workexperience->WEdepagen = strtoupper($request->WEdepagen);
        $workexperience->WEmonthsal = $request->WEmonthsal;
        $workexperience->WEsalaryjob = strtoupper($request->WEsalaryjob);
        $workexperience->WEstatus = strtoupper($request->WEstatus);
        $workexperience->WEgovser = strtoupper($request->WEgovser);
        if ($request->document) {
            $workexperience->document = $this->saveFile($request->document);
        }
        if ($workexperience->save()) {
            Session::flash('alert', 'success|Record has been Save');
            return redirect()->route('users.pds.workexperience.index');
        } else {
            Session::flash('alert', 'danger|Record not Updated');
            return back();
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
        if ($this->workexperience->destroy($id)) {
            Session::flash('alert', 'success|Record has been Save');
            return redirect()->back();
        } else {
            Session::flash('alert', 'danger|Record not Updated');
            return back();
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
