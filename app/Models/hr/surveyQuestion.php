<?php

namespace App\Models\hr;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surveyQuestion extends Model
{
    use HasFactory;

    public function surverFormDetails()
    {
        return $this->hasMany(surveyFormDetails::class, 'question_id');
    }

    public function surveyAnswerDetails()
    {
        return $this->hasOne(surveyAnswerDetails::class, 'question_id');
    }

}
