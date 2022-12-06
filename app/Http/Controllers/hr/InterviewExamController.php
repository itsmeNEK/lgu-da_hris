<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use App\Models\hr\InterviewExam;
use App\Models\hr\Publication;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class InterviewExamController extends Controller
{
    private $interviewExam;
    private $user;
    private $publication;


    public function __construct(InterviewExam $interviewExam,User $user, Publication $publication)
    {
        $this->interviewExam = $interviewExam;
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
        if($request->written_exam_date){
            $request->validate([
                'written_exam_date' => 'required'
            ]);
            $interview = $this->interviewExam->findOrFail($id);
            $interview->written_exam_date = $request->written_exam_date;
            $user = $this->user->findOrFail($interview->app_id);
            $publication = $this->publication->findOrFail($interview->pub_id);
            $date = Carbon::parse($request->written_exam_date)->toDayDateTimeString();
            if ($interview->save()) {

                $details = [
                    'name' => $user->first_name,
                    'innerMessage' => 'Thankyou for your patience. You have been invited to take the written exam in LGU Delfin ALbano Municipal Hall in '.$date .'. Look for the HR Office. Thankyou and Goodluck.',
                ];

                Mail::send('mail.mailling',$details,function($message)use ($user,$publication){
                    $message->from(env('MAIL_FROM_ADDRESS'),config('app.name'))
                    ->to($user->email,$user->first_name)
                    ->subject('Written Exam : '.$publication->title.".");
                });

                Session::flash('alert', 'success|Exam has been Set');
                return redirect()->back();
            } else {
                Session::flash('alert', 'danger|Exam has not been Set');
                return redirect()->back();
            }
        }

        if($request->written_exam){
            $request->validate([
                'written_exam' => 'required'
            ]);
            $interview = $this->interviewExam->findOrFail($id);
            $interview->written_exam = $request->written_exam;

            if ($interview->save()) {
                Session::flash('alert', 'success|Exam has been rated');
                return redirect()->back();
            } else {
                Session::flash('alert', 'danger|Exam has not been rated');
                return redirect()->back();
            }
        }
        if($request->oral_exam_date){
            $request->validate([
                'oral_exam_date' => 'required'
            ]);
            $interview = $this->interviewExam->findOrFail($id);
            $interview->oral_exam_date = $request->oral_exam_date;

            $user = $this->user->findOrFail($interview->app_id);
            $publication = $this->publication->findOrFail($interview->pub_id);
            $date = Carbon::parse($request->oral_exam_date)->toDayDateTimeString();

            if ($interview->save()) {

                $details = [
                    'name' => $user->first_name,
                    'innerMessage' => 'Thankyou for your patience. You have been invited to take the Oral Interview in LGU Delfin ALbano Municipal Hall in '.$date .'. Look for the HR Office. Thankyou and Goodluck.',
                ];

                Mail::send('mail.mailling',$details,function($message)use ($user,$publication){
                    $message->from(env('MAIL_FROM_ADDRESS'),config('app.name'))
                    ->to($user->email,$user->first_name)
                    ->subject('Oral Interview : '.$publication->title.".");
                });

                Session::flash('alert', 'success|Exam has been Set');
                return redirect()->back();
            } else {
                Session::flash('alert', 'danger|Exam has not been Set');
                return redirect()->back();
            }
        }
        if($request->oral_exam){
            $request->validate([
                'oral_exam' => 'required'
            ]);
            $interview = $this->interviewExam->findOrFail($id);
            $interview->oral_exam = $request->oral_exam;

            if ($interview->save()) {

                Session::flash('alert', 'success|Exam has been Rated');
                return redirect()->back();
            } else {
                Session::flash('alert', 'danger|Exam has not been Rated');
                return redirect()->back();
            }
        }
        if($request->background){
            $request->validate([
                'background' => 'required'
            ]);
            $interview = $this->interviewExam->findOrFail($id);
            $interview->background = $request->background;

            if ($interview->save()) {
                Session::flash('alert', 'success|Background has been Rated');
                return redirect()->back();
            } else {
                Session::flash('alert', 'danger|Background has not been Rated');
                return redirect()->back();
            }
        }
        if($request->performance){
            $request->validate([
                'performance' => 'required'
            ]);
            $interview = $this->interviewExam->findOrFail($id);
            $interview->performance = $request->performance;

            if ($interview->save()) {
                Session::flash('alert', 'success|performance has been Rated');
                return redirect()->back();
            } else {
                Session::flash('alert', 'danger|performance has not been Rated');
                return redirect()->back();
            }
        }
        if($request->pspt){
            $request->validate([
                'pspt' => 'required'
            ]);
            $interview = $this->interviewExam->findOrFail($id);
            $interview->pspt = $request->pspt;

            if ($interview->save()) {
                Session::flash('alert', 'success|Psycho-social has been Rated');
                return redirect()->back();
            } else {
                Session::flash('alert', 'danger|Psycho-social has not been Rated');
                return redirect()->back();
            }
        }
        if($request->potential){
            $request->validate([
                'potential' => 'required'
            ]);
            $interview = $this->interviewExam->findOrFail($id);
            $interview->potential = $request->potential;

            if ($interview->save()) {
                Session::flash('alert', 'success|Potential has been Rated');
                return redirect()->back();
            } else {
                Session::flash('alert', 'danger|Potential has not been Rated');
                return redirect()->back();
            }
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
