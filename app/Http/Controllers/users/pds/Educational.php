<?php

namespace App\Http\Controllers\users\pds;

use App\Http\Controllers\Controller;
use App\Models\pds\educational as PdsEducational;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class Educational extends Controller
{
    public const LOCAL_STORAGE_FOLDER = "pdsFiles/";
    public const LOCAL_STORAGE_FOLDER_DELETE = "/public/pdsFiles/";
    private $educational;

    public function __construct(PdsEducational $educational)
    {
        return $this->educational = $educational;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $educational = $this->educational->where('user_id', Auth::user()->id)->paginate(10);
        return view('users.pds.educational')->with('educational', $educational)->with('edit_educ', null);
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
            'EDNameSchool'=>'required|min:1',
            'EDBEDC'=>'required|min:1',
            'EDpoaFROM'=>'required|min:1',
            'EDpoaTO'=>'required|min:1',
            'EDyeargrad'=>'required|min:1',
            'document'=>'max:25000|mimes:pdf',
        ], [
            'EDNameSchool.required' =>'School Name is Empty',
            'EDBEDC.required' =>'Degree is Empty',
            'EDpoaFROM.required' =>'Period from is Empty',
            'EDpoaTO.required' =>'Period to is Empty',
            'EDyeargrad.required' =>'Year graduated is Empty',
            'document.max' =>'File is to big',
            'document.mimes' =>'File is to big',
        ]);
        $this->educational->user_id = Auth::user()->id;
        $this->educational->EDlevel = $request->EDlevel;
        $this->educational->EDNameSchool = strtoupper($request->EDNameSchool);
        $this->educational->EDBEDC = strtoupper($request->EDBEDC);
        $this->educational->EDpoaFROM = strtoupper($request->EDpoaFROM);
        $this->educational->EDpoaTO = strtoupper($request->EDpoaTO);
        $this->educational->EDHLUE = strtoupper($request->EDHLUE);
        $this->educational->EDyeargrad = strtoupper($request->EDyeargrad);
        $this->educational->EDsahr = strtoupper($request->EDsahr);
        if ($request->document) {
            $this->educational->document = $this->saveFile($request->document);
        }

        if ($this->educational->save()) {
            Session::flash('alert', 'success|Record has been Saved');
            return redirect()->back();
        } else {
            Session::flash('alert', 'danger|Record not Saved');
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
        $educational = $this->educational->where('user_id', Auth::user()->id)->paginate(10);
        $edit_educ = $this->educational->findOrFail($id);
        return view('users.pds.educational')->with('educational', $educational)->with('edit_educ', $edit_educ);
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
            'EDNameSchool'=>'required|min:1',
            'EDBEDC'=>'required|min:1',
            'EDpoaFROM'=>'required|min:1',
            'EDpoaTO'=>'required|min:1',
            'EDyeargrad'=>'required|min:1',
            'document'=>'max:25000|mimes:pdf',
        ], [
            'EDNameSchool.required' =>'School Name is Empty',
            'EDBEDC.required' =>'Degree is Empty',
            'EDpoaFROM.required' =>'Period from is Empty',
            'EDpoaTO.required' =>'Period to is Empty',
            'EDyeargrad.required' =>'Year graduated is Empty',
            'document.max' =>'File is to big',
            'document.mimes' =>'File is to big',
        ]);
        $educational = $this->educational->findOrFail($id);

        $educational->EDlevel = $request->EDlevel;
        $educational->EDNameSchool = strtoupper($request->EDNameSchool);
        $educational->EDBEDC = strtoupper($request->EDBEDC);
        $educational->EDpoaFROM = strtoupper($request->EDpoaFROM);
        $educational->EDpoaTO = strtoupper($request->EDpoaTO);
        $educational->EDHLUE = strtoupper($request->EDHLUE);
        $educational->EDyeargrad = strtoupper($request->EDyeargrad);
        $educational->EDsahr = strtoupper($request->EDsahr);

        if ($request->document) {
            $this->deleteFile($educational->document);
            $educational->document = $this->saveFile($request->document);
        }

        if ($educational->save()) {
            Session::flash('alert', 'success|Record has been Updated');
            return redirect()->route('users.pds.educational.index');
        } else {
            Session::flash('alert', 'danger|Record not Updated');
            return redirect()->route('users.pds.educational.index');
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
        $educ = $this->educational->findOrFail($id);
        $this->deleteFile($educ->document);
        if ($this->educational->destroy($id)) {
            Session::flash('alert', 'success|Record has been Deleted');
            return redirect()->route('users.pds.educational.index');
        } else {
            Session::flash('alert', 'danger|Record not Deleted');
            return redirect()->route('users.pds.educational.index');
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
}
