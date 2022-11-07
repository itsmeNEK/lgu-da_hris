<?php

namespace App\Models\pds;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class otherinformation extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
