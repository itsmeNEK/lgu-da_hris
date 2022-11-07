<?php

namespace App\Http\Controllers\users\pds;

use App\Http\Controllers\Controller;
use App\Models\pds\personal as PdsPersonal;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session as FacadesSession;

class Personal extends Controller
{
    private $personal;
    public function __construct(PdsPersonal $personal)
    {
        $this->personal = $personal;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personal = $this->personal->where('user_id',Auth::user()->id)->first();
        return view('users.PDS.personal')->with('personal',$personal);
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
        $this->personal->user_id = Auth::user()->id;
        $this->personal->first_name = strtoupper($request->first_name);
        $this->personal->last_name = strtoupper($request->last_name);
        $this->personal->middle_name = strtoupper($request->middle_name);
        $this->personal->ext_name = strtoupper($request->ext_name);
        $this->personal->date_birth = $request->date_birth;
        $this->personal->place_birth = strtoupper($request->place_birth);
        $this->personal->sex = $request->sex;
        $this->personal->civil_service = $request->civil_service;
        $this->personal->height = $request->height;
        $this->personal->weight = $request->weight;
        $this->personal->blood_type = strtoupper($request->blood_type);
        $this->personal->gsis_id = Crypt::encrypt($request->gsis_id);
        $this->personal->pag_ibig_id = Crypt::encrypt($request->pag_ibig_id);
        $this->personal->ph_id = Crypt::encrypt($request->ph_id);
        $this->personal->sss_id = Crypt::encrypt($request->sss_id);
        $this->personal->tin_id = Crypt::encrypt($request->tin_id);
        $this->personal->a_e_n = $request->a_e_n;
        $this->personal->citizenship = $request->citizenship;
        $this->personal->country = strtoupper($request->country);
        $this->personal->h_b_l_no = strtoupper($request->h_b_l_no);
        $this->personal->street = strtoupper($request->street);
        $this->personal->village = strtoupper($request->village);
        $this->personal->barangay = strtoupper($request->barangay);
        $this->personal->city = strtoupper($request->city);
        $this->personal->province = strtoupper($request->province);
        $this->personal->zipcode = $request->zipcode;
        $this->personal->h_b_l_no_2 = strtoupper($request->h_b_l_no_2);
        $this->personal->street_2 = strtoupper($request->street_2);
        $this->personal->village_2 = strtoupper($request->village_2);
        $this->personal->barangay_2 = strtoupper($request->barangay_2);
        $this->personal->city_2 = strtoupper($request->city_2);
        $this->personal->province_2 = strtoupper($request->province_2);
        $this->personal->zipcode_2 = strtoupper($request->zipcode_2);
        $this->personal->tel_no = $request->tel_no;
        $this->personal->mobile_no = $request->mobile_no;
        $this->personal->email = $request->email;

        if ($this->personal->save()) {
            FacadesSession::flash('alert', 'success|Record has been Saved');
            return redirect()->route('users.pds.personal.index');
        } else {
            FacadesSession::flash('alert', 'danger|Record not Saved');
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
        $personal = $this->personal->findOrFail($id);
        $personal->first_name = $request->first_name;
        $personal->last_name = $request->last_name;
        $personal->middle_name = $request->middle_name;
        $personal->ext_name = $request->ext_name;
        $personal->date_birth = $request->date_birth;
        $personal->place_birth = $request->place_birth;
        $personal->sex = $request->sex;
        $personal->civil_service = $request->civil_service;
        $personal->height = $request->height;
        $personal->weight = $request->weight;
        $personal->blood_type = $request->blood_type;
        $personal->gsis_id = Crypt::encrypt($request->gsis_id);
        $personal->pag_ibig_id = Crypt::encrypt($request->pag_ibig_id);
        $personal->ph_id = Crypt::encrypt($request->ph_id);
        $personal->sss_id = Crypt::encrypt($request->sss_id);
        $personal->tin_id = Crypt::encrypt($request->tin_id);
        $personal->a_e_n = $request->a_e_n;
        $personal->citizenship = $request->citizenship;
        $personal->country = $request->country;
        $personal->h_b_l_no = $request->h_b_l_no;
        $personal->street = $request->street;
        $personal->village = $request->village;
        $personal->barangay = $request->barangay;
        $personal->city = $request->city;
        $personal->province = $request->province;
        $personal->zipcode = $request->zipcode;
        $personal->h_b_l_no_2 = $request->h_b_l_no_2;
        $personal->street_2 = $request->street_2;
        $personal->village_2 = $request->village_2;
        $personal->barangay_2 = $request->barangay_2;
        $personal->city_2 = $request->city_2;
        $personal->province_2 = $request->province_2;
        $personal->zipcode_2 = $request->zipcode_2;
        $personal->tel_no = $request->tel_no;
        $personal->mobile_no = $request->mobile_no;
        $personal->email = $request->email;
        $personal->save();

        if ($personal->save()) {
            FacadesSession::flash('alert', 'success|Record has been Updated');
            return redirect()->route('users.pds.personal.index');
        } else {
            FacadesSession::flash('alert', 'danger|Record not Updated');
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
