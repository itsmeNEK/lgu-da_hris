<?php

namespace App\Models;

use App\Models\admin\EmployeePlantilla;
use App\Models\hr\LeaveCredit;
use App\Models\pds\civilservice;
use App\Models\pds\educational;
use App\Models\pds\family;
use App\Models\pds\familyC;
use App\Models\pds\learningdevelopment;
use App\Models\pds\otherinformation;
use App\Models\pds\personal;
use App\Models\pds\voluntarywork;
use App\Models\pds\workexperience;
use App\Models\users\application;
use App\Models\users\Covid;
use App\Models\users\others;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use SoftDeletes;
    use CanResetPassword;

    public const ADMIN_ROLE_ID = 0;
    public const USER_ROLE_ID = 1;
    public const EMPLOYEE_ROLE_ID = 2;
    public const HR_ROLE_ID = 3;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'last_seen',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeEMP($query)
    {
        return $query->where('role', '2')
        ->orwhere('role', '0')
        ->where('id', '!=', '1')
        ->orwhere('role', '3')
        ->orwhere('role', '4')
        ->orwhere('role', '5');
    }

    public function scopeUser($query)
    {
        return $query->where('role', '1');
    }

    public function scopeRetired($query)
    {
        return $query->where('role', '6');
    }
    public function EducCollege()
    {
        return $this->hasOne(educational::class, 'user_id')->where('EDlevel','College');
    }
    public function EducGraduate()
    {
        return $this->hasOne(educational::class, 'user_id')->where('EDlevel','Graduate Studies');
    }

    public function scopeNotAdmin($query)
    {
        return $query->where('id', '<>', '1');
    }
    public function pdsPersonal()
    {
        return $this->hasOne(personal::class, 'user_id');
    }
    public function pdsFamily()
    {
        return $this->hasOne(family::class, 'user_id');
    }
    public function pdsFamilyC()
    {
        return $this->hasMany(familyC::class, 'user_id');
    }
    public function pdsEducational()
    {
        return $this->hasMany(educational::class, 'user_id');
    }

    public function pdsCivilService()
    {
        return $this->hasMany(civilservice::class, 'user_id');
    }
    public function pdsWorkExperience()
    {
        return $this->hasMany(workexperience::class, 'user_id');
    }
    public function pdsVoluntaryWork()
    {
        return $this->hasMany(voluntarywork::class, 'user_id');
    }
    public function pdsLearningDevelopment()
    {
        return $this->hasMany(learningdevelopment::class, 'user_id');
    }
    public function pdsOtherInformation()
    {
        return $this->hasMany(otherinformation::class, 'user_id');
    }
    public function pdsOther()
    {
        return $this->hasOne(others::class, 'user_id');
    }

    public function isAdmin()
    {
        if ($this->role_id === 0) {
            return true;
        } else {
            return false;
        }
    }

    public function hasRole($role)
    {
        if ($this->where('role', $role)->first()) {
            return true;
        }
        return false;
    }


    public function empPlantilla()
    {
        return $this->hasOne(EmployeePlantilla::class);
    }
    public function userCovid()
    {
        return $this->hasOne(Covid::class,'user_id');
    }

    public function empWithPlantilla($id)
    {
        return $this->empPlantilla()->where('user_id', $id)->exists();
    }

    public function leaveCreditlatest()
    {
        return $this->hasOne(LeaveCredit::class)->latest();
    }
    public function leaveCard()
    {
        return $this->hasMany(LeaveCredit::class, 'user_id');
    }

    public function havePDS()
    {
        return $this->pdsPersonal()->where('user_id', Auth::user()->id)->exists();
    }

    public function application()
    {
        return $this->hasMany(application::class, 'user_id');
    }

    public function app_ranking($id)
    {
        $lnd = learningdevelopment::where('user_id', $id)->count();
        $work = workexperience::where('user_id', $id)->count();
        return $lnd + $work;
    }
}
