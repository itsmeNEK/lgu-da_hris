<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;


    public function plantilla()
    {
        return $this->hasMany(EmployeePlantilla::class);
    }
}
