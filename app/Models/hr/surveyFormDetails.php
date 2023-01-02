<?php

namespace App\Models\hr;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surveyFormDetails extends Model
{
    use HasFactory;

    public function surveyForm(){
        return $this->belongsTo(surveyForm::class,'form_id');
    }
    public function surveyQuestion(){
        return $this->belongsTo(surveyQuestion::class,'question_id');
    }

    public function surveyAnswerDetails(){
        return $this->hasOne(surveyAnswerDetails::class,'formDetails_id');
    }
}
