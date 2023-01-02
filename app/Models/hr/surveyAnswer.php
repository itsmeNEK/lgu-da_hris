<?php

namespace App\Models\hr;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surveyAnswer extends Model
{
    use HasFactory;

    public function surveyAnswerDetails(){
        return $this->hasMany(surveyAnswerDetails::class,'answer_id');
    }

    public function surveyQuestion(){
        return $this->belongsTo(surveyQuestion::class,'question_id');
    }
    public function surveyForm(){
        return $this->belongsTo(surveyForm::class,'form_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

}
