<?php

namespace App\Models\users;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class others extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
}
