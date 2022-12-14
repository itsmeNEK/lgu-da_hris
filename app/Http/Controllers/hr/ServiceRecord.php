<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use App\Models\hr\ServiceRecord as HrServiceRecord;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\admin\Department;
use Illuminate\Support\Facades\Session;

class ServiceRecord extends Controller
{
    private $users;
    private $service;
    private $department;

    public function __construct(User $users,HrServiceRecord $service, Department $department)
    {
        $this->users = $users;
        $this->service = $service;
        $this->department = $department;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->search) {
            $users = $this->users
            ->where('first_name','like','%'.$request->search.'%')
            ->orwhere('last_name','like','%'.$request->search.'%')
            ->EMP()
            ->latest()
            ->paginate(30);
        } else {
            $users = $this->users
            ->EMP()
            ->latest()
            ->paginate(30);
        }

        return view('hr.servicerecord')
        ->with('users', $users);
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
            'from' => 'required|date',
            'to' => 'required|date',
            'department' => 'required',
            'status' => 'required',
            'station' => 'required',
            'salary' => 'required',
        ]);
        $this->service->user_id = $request->user_id;
        $this->service->dep_id = $request->department;
        $this->service->from = $request->from;
        $this->service->to = $request->to;
        $this->service->status = $request->status;
        $this->service->salary = $request->salary;
        $this->service->station = $request->station;
        $this->service->date = $request->date;
        $this->service->wo_pay = $request->wo_pay;
        $this->service->cause = $request->cause;


        if ($this->service->save()) {
            Session::flash('alert', 'success|Service Record has been Saved!');
        } else {
            Session::flash('alert', 'danger|Service Record has not Saved!');
        }
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
        $user = $this->users->findOrFail($id);
        $service = $this->service->where('user_id',$id)->paginate(20);
        $all_department = $this->department->get();
        return view('hr.showservice')
        ->with('service',$service)
        ->with('all_department',$all_department)
        ->with('user',$user);
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
