<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use App\Models\admin\EmployeePlantilla;
use App\Models\hr\surveyAnswer;
use App\Models\hr\surveyAnswerDetails;
use App\Models\hr\surveyForm;
use App\Models\hr\surveyQuestion;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class surveyAnswerController extends Controller
{
    private $surveyForm;
    private $surveyAnswerDetails;
    private $surveyAnswer;
    private $user;

    public function __construct(surveyForm $surveyForm,User $user,surveyAnswer $surveyAnswer,surveyAnswerDetails $surveyAnswerDetails)
    {
        $this->surveyForm = $surveyForm;
        $this->surveyAnswer = $surveyAnswer;
        $this->surveyAnswerDetails = $surveyAnswerDetails;
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surveyForm = null;
        try{
            $surveyForm = $this->user->findOrFail(Auth::user()->id)->empPlantilla->surveyForm->first();

            // dd($StandardQuestions);

        }
        catch(Exception $e){
            Session::flash('alert', 'danger|Something Went Wrong');
        }
        finally{
            return view('users.surveyAnswer')->with('surveyForm',$surveyForm);
        }

        // $plantilla = $this->employeePlantilla->where('user_id',Auth::user()->id)->first();

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
            'question' => 'required|min:1',
            'answer' => 'required|min:1',
            'surveyForm' => 'required|min:1',
        ]);
        $form = $this->surveyAnswer;
        $form->user_id = Auth::user()->id;
        $form->form_id = $request->surveyForm;
        if ($form->save()) {
            $details = [];
            if ($request->question) {
                for ($i = 0; $i < count($request->question); $i++) {
                    if ($request->question != "" && $request->answer != "") {
                        $details[] = [
                            'answer_id' => $form->id,
                            'question_id' => $request->question[$i],
                            'formDetails_id' => $request->surveyFormDetails[$i],
                            'answer' => $request->answer[$i],
                            'gap' => ($request->standard[$i] - $request->answer[$i]),
                        ];
                    }
                }
                if ($this->surveyAnswerDetails->insert($details)) {
                    $surveyForm = $this->surveyForm->findOrFail($request->surveyForm);
                    $surveyForm->status=2;
                    $surveyForm->save();
                }
            }
        } else {
            Session::flash('alert', 'danger|Record has not been Saved');
            return redirect()->back();
        }
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
        //
    }
}
