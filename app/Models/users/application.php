<?php

namespace App\Models\users;

use App\Models\hr\Publication;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class application extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function publication()
    {
        return $this->belongsTo(Publication::class, 'pub_id');
    }

    public function scopeApplication($query, $request)
    {
        {
            if ($request->pub_id && $request->search) {
                return $query
                ->where('pub_id', $request->pub_id)
                ->where('first_name', 'like', '%'.$request->search.'%')
                ->orWhere('last_name', 'like', '%'.$request->search.'%');
            } elseif ($request->pub_id) {
                return $query
                ->where('pub_id', $request->pub_id);
            } elseif ($request->search) {
                return $query
                ->where('first_name', 'like', '%'.$request->search.'%')
                ->orWhere('last_name', 'like', '%'.$request->search.'%');
            }else{
                return $query;
            }
        }
    }
}
