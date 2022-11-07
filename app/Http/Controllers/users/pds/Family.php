<?php

namespace App\Http\Controllers\users\pds;

use App\Http\Controllers\Controller;
use App\Models\pds\family as PdsFamily;
use App\Models\pds\familyC as PdsFamilyC;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Family extends Controller
{
    private $family;
    private $familyC;
    public function __construct(PdsFamily $family, PdsFamilyC $familyC)
    {
        $this->family = $family;
        $this->familyC = $familyC;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $family = $this->family->where('user_id',Auth::user()->id)->first();
        $familyC = $this->familyC->where('user_id',Auth::user()->id)->paginate(10);
        return view('users.pds.family')
        ->with('familyC',$familyC)
        ->with('family',$family);
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
        $this->family->user_id = Auth::user()->id;
        $this->family->Slname = strtoupper($request->Slname);
        $this->family->Sfname = strtoupper($request->Sfname);
        $this->family->Smnane = strtoupper($request->Smnane);
        $this->family->Ssuffix = strtoupper($request->Ssuffix);
        $this->family->Soccupation = strtoupper($request->Soccupation);
        $this->family->SempBus = strtoupper($request->SempBus);
        $this->family->SBusAdd = strtoupper($request->SBusAdd);
        $this->family->STelNo = $request->STelNo;
        $this->family->Flname = strtoupper($request->Flname);
        $this->family->Ffname = strtoupper($request->Ffname);
        $this->family->Fmname = strtoupper($request->Fmname);
        $this->family->Fsuffix = strtoupper($request->Fsuffix);
        $this->family->Mlname = strtoupper($request->Mlname);
        $this->family->Mfname = strtoupper($request->Mfname);
        $this->family->Mmname = strtoupper($request->Mmname);

        if ($this->family->save()) {
            Session::flash('alert', 'success|Record has been Saved');
            return redirect()->route('users.pds.family.index',Auth::user()->id);
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
        //
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
        $family = $this->family->findOrFail($id);
        $family->Slname = strtoupper($request->Slname);
        $family->Sfname = strtoupper($request->Sfname);
        $family->Smnane = strtoupper($request->Smnane);
        $family->Ssuffix = strtoupper($request->Ssuffix);
        $family->Soccupation = strtoupper($request->Soccupation);
        $family->SempBus = strtoupper($request->SempBus);
        $family->SBusAdd = strtoupper($request->SBusAdd);
        $family->STelNo = $request->STelNo;
        $family->Flname = strtoupper($request->Flname);
        $family->Ffname = strtoupper($request->Ffname);
        $family->Fmname = strtoupper($request->Fmname);
        $family->Fsuffix = strtoupper($request->Fsuffix);
        $family->Mlname = strtoupper($request->Mlname);
        $family->Mfname = strtoupper($request->Mfname);
        $family->Mmname = strtoupper($request->Mmname);
        $family->save();

        if ($family->save()) {
            Session::flash('alert', 'success|Record has been Updated');
            return redirect()->route('users.pds.family.index',Auth::user()->id);
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
        //
    }
}
