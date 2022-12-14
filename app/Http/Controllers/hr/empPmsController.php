<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use App\Models\admin\Department;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\users\Ipcr;

class empPmsController extends Controller
{
    private $ipcr;

    public function __construct(Ipcr $ipcr)
    {
        $this->ipcr = $ipcr;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $all_ipcr = $this->ipcr->Semester($request)->paginate(20);
        return view('hr.pms.empPMS')
        ->with('all_ipcr',$all_ipcr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $all_ipcr = Ipcr::with('User')
        ->whereHas('User', function($query){
            $query->DepartmentHead();
      })->Semester($request)->orderByDesc('rating')->paginate(20);
        return view('hr.pms.depheadPMS')
        ->with('all_ipcr',$all_ipcr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
