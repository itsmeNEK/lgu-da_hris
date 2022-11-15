<?php

namespace App\Models\hr;

use App\Models\admin\Department;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRecord extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function department(){
        return $this->belongsTo(Department::class,'dep_id');
    }

}
