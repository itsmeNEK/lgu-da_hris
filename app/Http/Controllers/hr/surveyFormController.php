<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use App\Models\admin\EmployeePlantilla;
use App\Models\hr\surveyForm;
use App\Models\hr\surveyFormDetails;
use App\Models\hr\surveyQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class surveyFormController extends Controller
{
    private $surveyForm;
    private $employeePlantilla;
    private $surveyQuestion;
    private $surveyFormDetails;

    public function __construct(surveyForm $surveyForm, EmployeePlantilla $employeePlantilla, surveyQuestion $surveyQuestion, surveyFormDetails $surveyFormDetails)
    {
        $this->surveyForm = $surveyForm;
        $this->employeePlantilla = $employeePlantilla;
        $this->surveyQuestion = $surveyQuestion;
        $this->surveyFormDetails = $surveyFormDetails;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $all_surveyForm = $this->surveyForm->paginate(20);

        $all_employeePlantilla = $this->employeePlantilla->all();
        $Leadership_Question = $this->surveyQuestion
        ->where('type', '=', 'Leadership Competencies')
        ->get();
        $Technical_Question = $this->surveyQuestion
        ->where('type', '=', 'Technical Competencies')
               ->get();
        return view('hr.lnd.surveyForm')
        ->with('Technical_Question', $Technical_Question)
        ->with('Leadership_Question', $Leadership_Question)
        ->with('all_employeePlantilla', $all_employeePlantilla)
        ->with('edit_form', null)
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
        $request->validate([
            'plantilla' => 'required|min:1',
            'year' => 'required|min:1',
        ]);
        $form = $this->surveyForm;
        $form->plantilla_id = $request->plantilla;
        $form->year = $request->year;
        if ($form->save()) {
            $details = [];
            if ($request->question) {
                $request->validate([
                    'question' => 'required|min:1'
                    ]);
                for ($i = 0; $i < count($request->question); $i++) {
                    if ($request->question != "") {
                        $details[] = [
                            'form_id' => $form->id,
                            'question_id' => $request->question[$i],
                        ];
                    }
                }
                if ($this->surveyFormDetails->insert($details)) {
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
        $edit_form = $this->surveyForm->findOrFail($id);
        $all_surveyForm = $this->surveyForm->paginate(20);
        $all_employeePlantilla = $this->employeePlantilla->all();
        $Leadership_Question = $this->surveyQuestion
        ->where('type', '=', 'Leadership Competencies')
        ->get();
        $Technical_Question = $this->surveyQuestion
        ->where('type', '=', 'Technical Competencies')
               ->get();
        return view('hr.lnd.surveyForm')
        ->with('Technical_Question', $Technical_Question)
        ->with('Leadership_Question', $Leadership_Question)
        ->with('all_employeePlantilla', $all_employeePlantilla)
        ->with('edit_form', $edit_form)
        ->with('all_surveyForm', $all_surveyForm);
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
            'plantilla' => 'required|min:1',
            'year' => 'required|min:1',
        ]);
        $form = $this->surveyForm->findOrFail($id);
        $form->plantilla_id = $request->plantilla;
        $form->year = $request->year;
        if ($form->save()) {
            $details = [];
            if ($request->question) {
                $request->validate([
                    'question' => 'required|min:1'
                    ]);

                $this->surveyFormDetails->where('form_id', $id)->delete();

                for ($i = 0; $i < count($request->question); $i++) {
                    if ($request->question[$i] != null) {
                        $details[] = [
                            'form_id' => $id,
                            'question_id' => $request->question[$i],
                        ];
                    }
                }
                if ($this->surveyFormDetails->insert($details)) {
                }
            }
        } else {
            Session::flash('alert', 'danger|Record has not been Saved');
            return redirect()->back();
        }
        Session::flash('alert', 'success|Record has been Saved');
        return redirect()->route('hr.surveyForm.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->surveyFormDetails->where('form_id', $id)->delete();
        $this->surveyForm->destroy($id);
    }
}
