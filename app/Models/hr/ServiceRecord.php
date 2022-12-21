<?php

namespace App\Models\hr;

use App\Models\admin\Department;
use App\Models\admin\EmployeePlantilla;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRecord extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function empPlantilla(){
        return $this->belongsTo(EmployeePlantilla::class,'plantilla_id');
    }

    public function empFirstAppointment($user_id)
    {
        return $this->where('user_id',$user_id)->first();
    }

}
