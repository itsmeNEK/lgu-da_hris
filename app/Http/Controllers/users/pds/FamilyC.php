<?php

namespace App\Http\Controllers\users\pds;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pds\familyC as PdsFamilyC;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FamilyC extends Controller
{
    private $familyC;

    public function __construct(PdsFamilyC $familyC)
    {
        return $this->familyC = $familyC;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'Cfullname'=>'required|min:1',
            'Cbirthday'=>'required|min:1',
        ],[
            'Cfullname.required' =>'Full Name is Empty',
            'Cbirthday.required' =>'Birthday is Empty',
        ]);
        $this->familyC->user_id = Auth::user()->id;
        $this->familyC->Cfullname = strtoupper($request->Cfullname);
        $this->familyC->Cbirthday = $request->Cbirthday;

        if ($this->familyC->save()) {
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->familyC->destroy($id)) {
            Session::flash('alert', 'success|Record has been Deleted');
            return redirect()->back();
        } else {
            Session::flash('alert', 'danger|Record not Deleted');
            return redirect()->back();
        }
    }
}
