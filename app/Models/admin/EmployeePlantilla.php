<?php

namespace App\Models\admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeePlantilla extends Model
{
    use HasFactory;

    public function department(){
        return $this->belongsTo(Department::class,'dep_id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function designation(){
        return $this->belongsTo(Department::class,'EPdesignation');
    }
}
