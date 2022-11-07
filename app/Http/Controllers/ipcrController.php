<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\users\Ipcr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ipcrController extends Controller
{
    private $ipcr;
    private $user;

    public function __construct(Ipcr $ipcr,User $user)
    {
        $this->ipcr = $ipcr;
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $all_user = $this->user
        ->where('role','!=','0')
        ->where('role','!=','1')
        ->where('role','!=','6')
        ->get();

        $all_ipcr = $this->ipcr->latest()->paginate(20);
        return view('hr.pms')
        ->with('all_user',$all_user)
        ->with('all_ipcr',$all_ipcr);
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user' => 'required',
            'from' => 'required',
            'to' => 'required',
            'rating' => 'required',
            'equivalent' => 'required',
        ]);
        $this->ipcr->user_id = $request->user;
        $this->ipcr->from = $request->from;
        $this->ipcr->to = $request->to;
        $this->ipcr->rating = $request->rating;
        $this->ipcr->equivalent = $request->equivalent;
        $this->ipcr->save();


        Session::flash('alert', 'success|Record has been Saved');
        return redirect()->back();
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
        if ($this->ipcr->destroy($id)) {
            Session::flash('alert', 'success|Record has been Deleted');
            return redirect()->back();
        } else {
            Session::flash('alert', 'danger|Record not deleted');
            return redirect()->back();
        }
    }
}
