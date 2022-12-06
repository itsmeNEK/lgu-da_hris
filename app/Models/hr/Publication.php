<?php

namespace App\Models\hr;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;


    public function interviewExamPublication()
    {
        return $this->hasMany(InterviewExam::class, 'pub_id');
    }
}
