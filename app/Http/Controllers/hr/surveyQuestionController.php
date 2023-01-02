<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use App\Models\hr\surveyQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class surveyQuestionController extends Controller
{
    private $question;
    public function __construct(surveyQuestion $surveyQuestion)
    {
        $this->question = $surveyQuestion;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $all_question = $this->question
        ->where('type','like','%'.$request->type.'%')
        ->paginate(20);
        return view('hr.lnd.survey')
        ->with('edit_question', null)
        ->with('all_question', $all_question);
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
            'type' => 'required',
            'question' => 'required',
        ]);

        $this->question->type = $request->type;
        $this->question->question = $request->question;

        if ($this->question->save()) {
            Session::flash('alert', 'success|Question has been Saved');
            return redirect()->route('hr.surveyQuestion.index');
        } else {
            Session::flash('alert', 'danger|Account not Saved');
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
        $all_question = $this->question->all();
        $edit_question = $this->question->findOrFail($id);
        return view('hr.lnd.survey')
        ->with('edit_question', $edit_question)
        ->with('all_question', $all_question);
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
            'type' => 'required',
            'question' => 'required',
        ]);

        $question = $this->question->findOrFail($id);
        $question->type = $request->type;
        $question->question = $request->question;

        if ($question->save()) {
            Session::flash('alert', 'success|Question has been Updated');
            return redirect()->route('hr.surveyQuestion.index');
        } else {
            Session::flash('alert', 'danger|Account not Updated');
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
