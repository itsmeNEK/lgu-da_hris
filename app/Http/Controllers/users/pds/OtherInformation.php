<?php

namespace App\Http\Controllers\users\pds;

use App\Http\Controllers\Controller;
use App\Models\pds\otherinformation as PdsOtherinformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class OtherInformation extends Controller
{
    public const LOCAL_STORAGE_FOLDER = "pdsFiles/";
    public const LOCAL_STORAGE_FOLDER_DELETE = "/public/pdsFiles/";
    private $otherinformation;

    public function __construct(PdsOtherinformation $otherinformation)
    {
        $this->otherinformation = $otherinformation;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $otherinformation = $this->otherinformation->where('user_id', Auth::user()->id)->paginate(10);
        return view('users.pds.otherinformation')->with('otherinformation', $otherinformation)->with('edit_other', null);
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
            'Ospecial'=>'required|min:1',
            'Ononacad'=>'required|min:1',
            'Omemship'=>'required|min:1',
            'document'=>'max:25000|mimes:pdf',
        ], [
            'Ospecial.required' =>'Title is Empty',
            'Ononacad.required' =>'From is Empty',
            'Omemship.required' =>'to is Empty',
            'document.max' =>'File is to big',
            'document.mimes' =>'Invalid File type',
        ]);
        $this->otherinformation->user_id = Auth::user()->id;
        $this->otherinformation->Ospecial = strtoupper($request->Ospecial);
        $this->otherinformation->Ononacad = strtoupper($request->Ononacad);
        $this->otherinformation->Omemship = strtoupper($request->Omemship);
        if ($request->document) {
            $this->otherinformation->document = $this->saveFile($request->document);
        }

        if ($this->otherinformation->save()) {
            Session::flash('alert', 'success|Record has been Saved');
            return redirect()->route('users.pds.otherinformation.index');
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
        $otherinformation = $this->otherinformation->where('user_id', Auth::user()->id)->paginate(10);
        $edit_other = $this->otherinformation->findOrFail($id);
        return view('users.pds.otherinformation')->with('otherinformation', $otherinformation)->with('edit_other', $edit_other);
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
            'Ospecial'=>'required|min:1',
            'Ononacad'=>'required|min:1',
            'Omemship'=>'required|min:1',
            'document'=>'max:25000|mimes:pdf',
        ], [
            'Ospecial.required' =>'Title is Empty',
            'Ononacad.required' =>'From is Empty',
            'Omemship.required' =>'to is Empty',
            'document.max' =>'File is to big',
            'document.mimes' =>'Invalid File type',
        ]);
        $otherinformation = $this->otherinformation->findOrFail($id);
        $otherinformation->Ospecial = strtoupper($request->Ospecial);
        $otherinformation->Ononacad = strtoupper($request->Ononacad);
        $otherinformation->Omemship = strtoupper($request->Omemship);
        if ($request->document) {
            $otherinformation->document = $this->saveFile($request->document);
        }

        if ($otherinformation->save()) {
            Session::flash('alert', 'success|Record has been Updated');
            return redirect()->route('users.pds.otherinformation.index');
        } else {
            Session::flash('alert', 'danger|Record not Updated');
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
        if ($this->otherinformation->destroy($id)) {
            Session::flash('alert', 'success|Record has been Deleted');
            return redirect()->back();
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
