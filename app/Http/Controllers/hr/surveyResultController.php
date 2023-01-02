<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use App\Models\hr\surveyAnswer;
use App\Models\hr\surveyForm;
use Illuminate\Http\Request;

class surveyResultController extends Controller
{
    private $surveyAnswer;
    private $surveyForm;

    public function __construct(surveyAnswer $surveyAnswer,surveyForm $surveyForm)
    {
        $this->surveyAnswer = $surveyAnswer;
        $this->surveyForm = $surveyForm;
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
        $surveyForm = $this->surveyForm->findOrFail($id);

        return view('hr.lnd.surveyResultView')->with('surveyForm',$surveyForm);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $surveyAnswer = $this->surveyAnswer->findOrFail($id);

        return view('print.surveyResultPrint')->with('surveyAnswer',$surveyAnswer);
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
