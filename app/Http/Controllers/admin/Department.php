<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Department as AdminDepartment;
use App\Models\admin\EmployeePlantilla;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Department extends Controller
{
    private $plantilla;
    private $department;
    private $user;
    public function __construct(EmployeePlantilla $plantilla,AdminDepartment $department, User $user)
    {
        $this->plantilla = $plantilla;
        $this->department = $department;
        $this->user = $user;
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
            'name' => 'required|min:1|unique:departments',
        ]);
        $this->department->name =  strtoupper($request->name);

        if ($this->department->save()) {
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
        $all_plantilla = $this->plantilla->orderBy('EPno','desc')->paginate(10);
        $all_department = $this->department->paginate(10);
        $deparment = $this->department->findOrFail($id);
        $plantilla = $this->plantilla->findOrFail($id);
        $all_user = $this->user
        ->where('role', '!=', '0')
        ->where('role', '!=', '1')
        ->where('role', '!=', '6')->get();
        return view('hr.plantilla')
        ->with('all_plantilla', $all_plantilla)
        ->with('all_department', $all_department)
        ->with('all_user', $all_user)
        ->with('edit_plan', $plantilla)
        ->with('edit_dep', $deparment);
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
            'name' => 'required|min:1|unique:departments,name,'.$id,
        ]);
        $department = $this->department->findOrFail($id);
        $department->name =  strtoupper($request->name);

        if ($department->save()) {
            Session::flash('alert', 'success|Record has been Saved');
            return redirect()->route('hr.plantilla.index');
        } else {
            Session::flash('alert', 'danger|Record not Save');
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

        if ($this->department->destroy($id)) {
            Session::flash('alert', 'success|Record has been Deleted');
            return redirect()->back();
        } else {
            Session::flash('alert', 'danger|Record not Deleted');
            return redirect()->back();
        }
    }
}
