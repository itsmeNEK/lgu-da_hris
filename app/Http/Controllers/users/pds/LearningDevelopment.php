<?php

namespace App\Http\Controllers\users\pds;

use App\Http\Controllers\Controller;
use App\Models\pds\learningdevelopment as PdsLearningdevelopment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class LearningDevelopment extends Controller
{
    public const LOCAL_STORAGE_FOLDER = "pdsFiles/";
    private $learningdevelopment;

    public function __construct(PdsLearningdevelopment $learningdevelopment)
    {
        $this->learningdevelopment = $learningdevelopment;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $learningdevelopment = $this->learningdevelopment->where('user_id', Auth::user()->id)->paginate(10);
        return view('users.pds.learningdevelopment')->with('learningdevelopment', $learningdevelopment)->with('edit_lnd', null);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $learningdevelopment = $this->learningdevelopment->paginate(20);
        return view('hr.lnd')->with('learningdevelopment', $learningdevelopment);
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
            'LDtitle'=>'required|min:1',
            'LDidfrom'=>'required|min:1',
            'LDidto'=>'required|min:1',
            'LDnumhour'=>'required|min:1',
            'LDtype'=>'required|min:1',
            'LDconducted'=>'required|min:1',
            'document'=>'max:25000|mimes:pdf',
        ], [
            'LDtitle.required' =>'Title is Empty',
            'LDidfrom.required' =>'From is Empty',
            'LDidto.required' =>'to is Empty',
            'LDnumhour.required' =>'NUmber of Hour is Empty',
            'LDtype.required' =>'Type is Empty',
            'LDconducted.required' =>'Conducted is Empty',
            'document.max' =>'File is to big',
            'document.mimes' =>'Invalid File type',
        ]);
        $this->learningdevelopment->user_id = Auth::user()->id;
        $this->learningdevelopment->LDtitle = strtoupper($request->LDtitle);
        $this->learningdevelopment->LDidfrom = $request->LDidfrom;
        $this->learningdevelopment->LDidto = $request->LDidto;
        $this->learningdevelopment->LDnumhour = $request->LDnumhour;
        $this->learningdevelopment->LDtype = strtoupper($request->LDtype);
        $this->learningdevelopment->LDconducted = strtoupper($request->LDconducted);
        if ($request->document) {
            $this->learningdevelopment->document = $this->saveFile($request);
        }
        if ($this->learningdevelopment->save()) {
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
        $learningdevelopment = $this->learningdevelopment->where('user_id', Auth::user()->id)->paginate(10);
        $edit_work = $this->learningdevelopment->findOrFail($id);
        return view('users.pds.learningdevelopment')->with('learningdevelopment', $learningdevelopment)->with('edit_vol', $edit_work);
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
            'LDtitle'=>'required|min:1',
            'LDidfrom'=>'required|min:1',
            'LDidto'=>'required|min:1',
            'LDnumhour'=>'required|min:1',
            'LDtype'=>'required|min:1',
            'LDconducted'=>'required|min:1',
            'document'=>'max:25000|mimes:pdf',
        ], [
            'LDtitle.required' =>'Title is Empty',
            'LDidfrom.required' =>'From is Empty',
            'LDidto.required' =>'to is Empty',
            'LDnumhour.required' =>'Number of Hour is Empty',
            'LDtype.required' =>'Type is Empty',
            'LDconducted.required' =>'Conducted is Empty',
            'document.max' =>'File is to big',
            'document.mimes' =>'Invalid File type',
        ]);
        $learningdevelopment = $this->learningdevelopment->findOrFail($id);
        $learningdevelopment->LDtitle = strtoupper($request->LDtitle);
        $learningdevelopment->LDidfrom = $request->LDidfrom;
        $learningdevelopment->LDidto = $request->LDidto;
        $learningdevelopment->LDnumhour = $request->LDnumhour;
        $learningdevelopment->LDtype = strtoupper($request->LDtype);
        $learningdevelopment->LDconducted = strtoupper($request->LDconducted);
        if ($request->document) {
            $learningdevelopment->document = $this->saveFile($request);
        }
        if ($learningdevelopment->save()) {
            Session::flash('alert', 'success|Record has been Updated');
            return redirect()->route('users.pds.learningdevelopment.index');
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
        if ($this->learningdevelopment->destroy($id)) {
            Session::flash('alert', 'success|Record has been Deleted');
            return redirect()->back();
        } else {
            Session::flash('alert', 'danger|Record not Deleted');
            return redirect()->back();
        }
    }

    public function saveFile($request)
    {
        $filename = time().".". $request->document->extension();

        $request->document->storeAs(self::LOCAL_STORAGE_FOLDER, $filename);

        return $filename;
    }

    public function deleteFile($filename)
    {
        $filename_path = self::LOCAL_STORAGE_FOLDER . $filename;

        if (Storage::disk('local')->exists($filename_path)) {
            Storage::disk('local')->delete($filename_path);
        }
    }
}
