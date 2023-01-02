<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use App\Models\admin\Department;
use App\Models\admin\EmployeePlantilla;
use App\Models\hr\surveyForm;
use App\Models\User;
use Illuminate\Http\Request;

class TrainingNeedsController extends Controller
{
    private $user;
    private $employeePlantilla;
    private $department;
    private $surveyForm;

    public function __construct(surveyForm $surveyForm, User $user,EmployeePlantilla $employeePlantilla,Department $department)
    {
        $this->user = $user;
        $this->employeePlantilla = $employeePlantilla;
        $this->department = $department;
        $this->surveyForm = $surveyForm;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $all_surveyForm = $this->surveyForm
        ->formTraningFilter($request)
        ->where('status','2')
        ->paginate(20);

        $all_users = $this->user->EMP()->get();
        $all_employeePlantilla = $this->employeePlantilla->all();
        $department = $this->department->all();
        return view('hr.lnd.trainingNeeds')
        ->with('all_employeePlantilla',$all_employeePlantilla)
        ->with('department',$department)
        ->with('all_users',$all_users)
        ->with('all_surveyForm', $all_surveyForm);
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
