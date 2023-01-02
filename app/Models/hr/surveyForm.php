<?php

namespace App\Models\hr;

use App\Models\admin\EmployeePlantilla;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surveyForm extends Model
{
    use HasFactory;

    //  scope
    public function scopeformFilter($query,$request)
    {
        if($request->plantilla)
        {
            return $query
            ->join('employee_plantillas', 'employee_plantillas.id', '=', 'survey_forms.plantilla_id')
            ->join('users', 'users.id', '=', 'employee_plantillas.user_id')
            ->join('personals', 'personals.user_id', '=', 'users.id')
            ->where('employee_plantillas.id',$request->plantilla)
            ->where('survey_forms.year','like','%'.$request->year.'%');
        }elseif($request->department){
            return $query
            ->join('employee_plantillas', 'employee_plantillas.id', '=', 'survey_forms.plantilla_id')
            ->join('users', 'users.id', '=', 'employee_plantillas.user_id')
            ->join('personals', 'personals.user_id', '=', 'users.id')
            ->where('employee_plantillas.dep_id',$request->department)
            ->where('survey_forms.year','like','%'.$request->year.'%');
        }elseif($request->sex){
            return $query
            ->join('employee_plantillas', 'employee_plantillas.id', '=', 'survey_forms.plantilla_id')
            ->join('users', 'users.id', '=', 'employee_plantillas.user_id')
            ->join('personals', 'personals.user_id', '=', 'users.id')
            ->where('personals.sex',$request->sex)
            ->where('survey_forms.year','like','%'.$request->year.'%');
        }elseif($request->status){
            return $query
            ->join('employee_plantillas', 'employee_plantillas.id', '=', 'survey_forms.plantilla_id')
            ->join('users', 'users.id', '=', 'employee_plantillas.user_id')
            ->join('personals', 'personals.user_id', '=', 'users.id')
            ->where('survey_forms.status',$request->status);
        }
    }
    public function scopeformTraningFilter($query,$request)
    {
        if($request->plantilla)
        {
            return $query
            ->join('employee_plantillas', 'employee_plantillas.id', '=', 'survey_forms.plantilla_id')
            ->join('users', 'users.id', '=', 'employee_plantillas.user_id')
            ->join('personals', 'personals.user_id', '=', 'users.id')
            ->where('employee_plantillas.id',$request->plantilla)
            ->where('survey_forms.year','like','%'.$request->year.'%');
        }elseif($request->department){
            return $query
            ->join('employee_plantillas', 'employee_plantillas.id', '=', 'survey_forms.plantilla_id')
            ->join('users', 'users.id', '=', 'employee_plantillas.user_id')
            ->join('personals', 'personals.user_id', '=', 'users.id')
            ->where('employee_plantillas.dep_id',$request->department)
            ->where('survey_forms.year','like','%'.$request->year.'%');
        }elseif($request->sex){
            return $query
            ->join('employee_plantillas', 'employee_plantillas.id', '=', 'survey_forms.plantilla_id')
            ->join('users', 'users.id', '=', 'employee_plantillas.user_id')
            ->join('personals', 'personals.user_id', '=', 'users.id')
            ->where('personals.sex',$request->sex)
            ->where('survey_forms.year','like','%'.$request->year.'%');
        }elseif($request->status){
            return $query
            ->join('employee_plantillas', 'employee_plantillas.id', '=', 'survey_forms.plantilla_id')
            ->join('users', 'users.id', '=', 'employee_plantillas.user_id')
            ->join('personals', 'personals.user_id', '=', 'users.id')
            ->where('survey_forms.status',$request->status);
        }
    }


    // relation
    public function surveyFormDetails(){
        return $this->hasMany(surveyFormDetails::class,'form_id');
    }

    public function EmployeePlantilla(){
        return $this->belongsTo(EmployeePlantilla::class,'plantilla_id');
    }

    public function surveyAnswer(){
        return $this->hasOne(surveyAnswer::class,'form_id');
    }

}
