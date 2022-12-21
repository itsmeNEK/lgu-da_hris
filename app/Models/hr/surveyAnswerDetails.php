<?php

namespace App\Models\hr;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surveyAnswerDetails extends Model
{
    use HasFactory;

    public function surveyAnswer(){
        return $this->belongsTo(surveyAnswer::class,'answer_id');
    }
}
