<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $total_online_alluser = 0;
        $total_users_count = 0;
        $total_emp_count = 0;
        $ol_emp_count = 0;
        $ol_users_count = 0;
        $all_users = $this->user->latest()->get();
        foreach ($all_users as $user) {
            if (Cache::has('user-is-online-' . $user->id)) {
                $total_online_alluser++;
            }
            if ($user->role == 2) {
                $total_emp_count ++;
                if (Cache::has('user-is-online-' . $user->id)) {
                    $ol_emp_count++;
                }
            }
            if ($user->role == 1) {
                $total_users_count ++;
                if (Cache::has('user-is-online-' . $user->id)) {
                    $ol_users_count++;
                }
            }
        }
        if ($total_users_count == 0) {
            $total_users_count = 1;
        } elseif ($total_emp_count == 0) {
            $total_emp_count = 1;
        }
        $total_users = [
            'total_alluser'=> count($all_users),
            'total_ol_alluser'=> $total_online_alluser,
            'total_emp_count'=> $total_emp_count,
            'total_users_count'=> $total_users_count,
            'ol_emp_count'=> $ol_emp_count,
            'ol_users_count'=> $ol_users_count,
        ];
        if ($request->search) {
            $all_users = $this->user
            ->where('first_name', 'like', '%'.$request->search.'%')
            ->orWhere('last_name', 'like', '%'.$request->search.'%')
            ->withTrashed()
            ->paginate(10);
        } else {
            $all_users = $this->user->latest()
            ->withTrashed()->paginate(10);
        }
        return view('admin.dashboard')
        ->with('all_users', $all_users)
        ->with('user_count', $total_users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|min:1|max:50',
            'last_name' => 'required|min:1|max:50',
            'email' => 'required|string|email|unique:users',
        ]);
        $this->user->first_name = $request->first_name;
        $this->user->last_name = $request->last_name;
        $this->user->email = $request->email;
        $this->user->password = Hash::make('lgudelfinalbano');

        if ($this->user->save()) {
            Session::flash('alert', 'success|User password has been Saved!');
        } else {
            Session::flash('alert', 'danger|User password has not Saved!');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request,$id);
        $user = $this->user->findOrFail($id);
        $user->role = $request->user_role;
        if ($user->save()) {
            Session::flash('alert', 'success|User role has been Saved!');
        } else {
            Session::flash('alert', 'danger|User role has not Saved!');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->user->destroy($id)) {
            Session::flash('alert', 'success|User has been Blocked');
        } else {
            Session::flash('alert', 'danger|User not Blocked');
        }
        return redirect()->back();
    }
}
