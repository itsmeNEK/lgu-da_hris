<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class dashboard extends Controller
{
    private $users;
    public function __construct(User $users)
    {
        $this->users = $users;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->search) {
            $users = $this->users
            ->where('first_name','like','%'.$request->search.'%')
            ->orwhere('last_name','like','%'.$request->search.'%')
            ->EMP()
            ->latest()
            ->paginate(20);
        } else {
            $users = $this->users
            ->EMP()
            ->latest()
            ->paginate(20);
        }
        $all_users = $this->users
        ->EMP()
        ->get();
        $total_online_emp = 0;
        foreach ($all_users as $user) {
            if (Cache::has('user-is-online-' . $user->id)) {
                $total_online_emp++;
            }
        }

        $user_count = [
            'total_user'=> count($all_users),
            'total_online_emp'=> $total_online_emp,
        ];

        return view('hr.dashboard')
        ->with('user_count', $user_count)
        ->with('users', $users)
        ->with('all_users', $all_users)
        ;
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
