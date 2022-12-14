<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use App\Models\hr\InterviewExam;
use App\Models\pds\personal;
use App\Models\users\application;
use Illuminate\Http\Request;

class applicantController extends Controller
{
    private $personal;
    private $application;
    private $interviewExam;

    public function __construct(personal $personal,application $application,InterviewExam $interviewExam)
    {
        $this->personal = $personal;
        $this->interviewExam = $interviewExam;
        $this->application = $application;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $app = $this->application->findOrFail($id);
        $interviewExam = $this->interviewExam->where('app_id',$app->id)->first();
        return view('hr.applicant.applicantInfo')
        ->with('interviewExam',$interviewExam)
        ->with('application',$app)
        ;
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
