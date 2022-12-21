<?php

namespace App\Models\admin;

use App\Models\hr\ServiceRecord;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;


    public function plantilla()
    {
        return $this->hasMany(EmployeePlantilla::class,'dep_id');
    }

    public function service()
    {
        return $this->hasMany(ServiceRecord::class,'dep_id');
    }
}
