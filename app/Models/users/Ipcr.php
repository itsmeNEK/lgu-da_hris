<?php

namespace App\Models\users;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ipcr extends Model
{
    use HasFactory;


    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function scopeSemester($query, $request)
    {
        if ($request->from && $request->to) {
            return $query
            ->where('from', 'like', '%'.$request->from.'%')
            ->Where('to', 'like', '%'.$request->to.'%');
        } else {
            return $query;
        }
    }
    public function scopeDeptHead($query, $request)
    {
        if ($request->from && $request->to) {
            return $query
            ->where('from', 'like', '%'.$request->from.'%')
            ->Where('to', 'like', '%'.$request->to.'%');
        } else {
            return $query;
        }
    }
}
