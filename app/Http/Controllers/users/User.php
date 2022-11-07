<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\pds\civilservice;
use App\Models\pds\educational;
use App\Models\pds\family;
use App\Models\pds\familyC;
use App\Models\pds\learningdevelopment;
use App\Models\pds\otherinformation;
use App\Models\pds\personal;
use App\Models\pds\voluntarywork;
use App\Models\pds\workexperience;
use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class User extends Controller
{
    private $user;
    public function __construct(ModelsUser $user)
    {
        $this->user = $user;
    }
    public function index()
    {
        $user = $this->user->findOrFail(Auth::user()->id);
        $progress = $this->pdsProgress();
        return view('users.PDS.index')->with('user', $user)->with('progress', $progress);
    }

    public function pdsProgress()
    {
        $progress = 0;
        if (personal::where('user_id', Auth::user()->id)->exists()) {
            $progress += 1;
        }
        if (family::where('user_id', Auth::user()->id)->exists()) {
            $progress += 1;
        }
        if (familyC::where('user_id', Auth::user()->id)->exists()) {
            $progress += 1;
        }
        if (educational::where('user_id', Auth::user()->id)->exists()) {
            $progress += 1;
        }
        if (civilservice::where('user_id', Auth::user()->id)->exists()) {
            $progress += 1;
        }
        if (workexperience::where('user_id', Auth::user()->id)->exists()) {
            $progress += 1;
        }
        if (voluntarywork::where('user_id', Auth::user()->id)->exists()) {
            $progress += 1;
        }
        if (learningdevelopment::where('user_id', Auth::user()->id)->exists()) {
            $progress += 1;
        }
        if (otherinformation::where('user_id', Auth::user()->id)->exists()) {
            $progress += 1;
        }
        $progress = ($progress / 9)*100;
        return round($progress, 2);
    }
    public function reset($id)
    {
        $user = $this->user->findOrFail($id);
        $user->password = Hash::make('lgudelfinalbano');
        if ($user->save()) {
            Session::flash('alert', 'success|User password has been reset!');
        } else {
            Session::flash('alert', 'danger|User password has not reset!');
        }
        return redirect()->back();
    }
    public function activate($id)
    {
        if ($this->user->onlyTrashed()->findOrFail($id)->restore()) {
            Session::flash('alert', 'success|User has been Activated!');
        } else {
            Session::flash('alert', 'danger|User has not Activated!');
        }
        return redirect()->back();
    }
}
