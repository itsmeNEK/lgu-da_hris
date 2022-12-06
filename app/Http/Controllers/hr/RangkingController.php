<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\hr\InterviewExam;
use App\Models\hr\Publication;
use App\Models\pds\personal;
use App\Models\User;
use App\Models\users\application;

class RangkingController extends Controller
{
    private $personal;
    private $application;
    private $interviewExam;
    private $user;
    private $publication;

    public function __construct(personal $personal,application $application,InterviewExam $interviewExam,User $user,Publication $publication)
    {
        $this->personal = $personal;
        $this->interviewExam = $interviewExam;
        $this->application = $application;
        $this->user = $user;
        $this->publication = $publication;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ranking = null;
        $publication = $this->publication->where('status', '1')->get();

        return view('hr.applicant.rangking')
        ->with('publication' ,$publication)
        ->with('ranking' ,$ranking);
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
