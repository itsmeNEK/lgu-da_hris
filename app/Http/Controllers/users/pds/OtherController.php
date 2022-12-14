<?php

namespace App\Http\Controllers\users\pds;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\users\others;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class OtherController extends Controller
{
    public const LOCAL_STORAGE_FOLDER = "pdsFiles/";
    public const LOCAL_STORAGE_FOLDER_DELETE = "/public/pdsFiles/";
    private $other;
    private $user;

    public function __construct(others $other, User $user)
    {
        $this->other = $other;
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $other = $this->other->where('user_id', Auth::user()->id)->first();
        return view('users.pds.other')->with('edit_other', $other);
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
        $this->other->user_id = Auth::user()->id;
        $this->other->Q34a = $request->Q34a;
        $this->other->Q34b = $request->Q34b;
        $this->other->Q34b1 = $request->Q34b1;
        $this->other->Q35a = $request->Q35a;
        $this->other->Q35a1 = $request->Q35a1;
        $this->other->Q35b = $request->Q35b;
        $this->other->Q35b1 = $request->Q35b1;
        $this->other->Q35b2 = $request->Q35b2;
        $this->other->Q36a = $request->Q36a;
        $this->other->Q36a1 = $request->Q36a1;
        $this->other->Q37a = $request->Q37a;
        $this->other->Q37a1 = $request->Q37a1;
        $this->other->Q38a = $request->Q38a;
        $this->other->Q38a1 = $request->Q38a1;
        $this->other->Q39a = $request->Q39a;
        $this->other->Q39a1 = $request->Q39a1;
        $this->other->Q40a = $request->Q40a;
        $this->other->Q40a1 = $request->Q40a1;
        $this->other->Q40b = $request->Q40b;
        $this->other->Q40b1 = $request->Q40b1;
        $this->other->Q40c = $request->Q40c;
        $this->other->Q40c1 = $request->Q40c1;
        $this->other->Rname1 = $request->Rname1;
        $this->other->Rname2 = $request->Rname2;
        $this->other->Rname3 = $request->Rname3;
        $this->other->Radd1 = $request->Radd1;
        $this->other->Radd2 = $request->Radd2;
        $this->other->Radd3 = $request->Radd3;
        $this->other->Rtel1 = $request->Rtel1;
        $this->other->Rtel2 = $request->Rtel2;
        $this->other->Rtel3 = $request->Rtel3;
        $this->other->IDa1 = $request->IDa1;
        $this->other->IDa2 = $request->IDa2;
        $this->other->IDb1 = $request->IDb1;
        $this->other->IDb2 = $request->IDb2;
        $this->other->IDc1 = $request->IDc1;
        $this->other->IDc2 = $request->IDc2;

        if ($this->other->save()) {
            Session::flash('alert', 'success|Record has been Saved');
            return redirect()->route('users.pds.other.index');
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
        $other = $this->other->findOrFail($id);
        $other->Q34a = $request->Q34a;
        $other->Q34b = $request->Q34b;
        $other->Q34b1 = $request->Q34b1;
        $other->Q35a = $request->Q35a;
        $other->Q35a1 = $request->Q35a1;
        $other->Q35b = $request->Q35b;
        $other->Q35b1 = $request->Q35b1;
        $other->Q35b2 = $request->Q35b2;
        $other->Q36a = $request->Q36a;
        $other->Q36a1 = $request->Q36a1;
        $other->Q37a = $request->Q37a;
        $other->Q37a1 = $request->Q37a1;
        $other->Q38a = $request->Q38a;
        $other->Q38a1 = $request->Q38a1;
        $other->Q38b = $request->Q38b;
        $other->Q38b1 = $request->Q38b1;
        $other->Q39a = $request->Q39a;
        $other->Q39a1 = $request->Q39a1;
        $other->Q40a = $request->Q40a;
        $other->Q40a1 = $request->Q40a1;
        $other->Q40b = $request->Q40b;
        $other->Q40b1 = $request->Q40b1;
        $other->Q40c = $request->Q40c;
        $other->Q40c1 = $request->Q40c1;
        $other->Rname1 = $request->Rname1;
        $other->Rname2 = $request->Rname2;
        $other->Rname3 = $request->Rname3;
        $other->Radd1 = $request->Radd1;
        $other->Radd2 = $request->Radd2;
        $other->Radd3 = $request->Radd3;
        $other->Rtel1 = $request->Rtel1;
        $other->Rtel2 = $request->Rtel2;
        $other->Rtel3 = $request->Rtel3;
        $other->IDa1 = Crypt::encrypt($request->IDa1);
        $other->IDa2 = $request->IDa2;
        $other->IDb1 = Crypt::encrypt($request->IDb1);
        $other->IDb2 = $request->IDb2;
        $other->IDc1 = Crypt::encrypt($request->IDc1);
        $other->IDc2 = $request->IDc2;
        if ($other->save()) {
            Session::flash('alert', 'success|Record has been Saved');
            return redirect()->route('users.pds.other.index');
        } else {
            Session::flash('alert', 'danger|Record not Saved');
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
