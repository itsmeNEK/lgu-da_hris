<?php

namespace App\Models\hr;

use App\Models\admin\EmployeePlantilla;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surveyForm extends Model
{
    use HasFactory;

    public function surveyFormDetails(){
        return $this->hasMany(surveyFormDetails::class,'form_id');
    }

    public function EmployeePlantilla(){
        return $this->belongsTo(EmployeePlantilla::class,'plantilla_id');
    }


}
