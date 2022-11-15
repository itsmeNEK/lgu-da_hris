<?php

namespace App\Models\users;

use App\Models\hr\Publication;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class application extends Model
{
    use HasFactory,SoftDeletes;

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function publication(){
        return $this->belongsTo(Publication::class,'pub_id');
    }

}
