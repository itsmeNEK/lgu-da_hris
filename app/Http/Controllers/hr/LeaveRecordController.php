<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use App\Models\hr\LeaveCredit;
use App\Models\reference\earned;
use App\Models\reference\hours;
use App\Models\reference\minutes;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LeaveRecordController extends Controller
{
    private $leavecredit;
    private $users;
    private $minutes;
    private $hours;
    private $earned;

    public function __construct(LeaveCredit $leavecredit, User $users, minutes $minutes, hours $hours, earned $earned)
    {
        $this->leavecredit = $leavecredit;
        $this->users = $users;
        $this->minutes = $minutes;
        $this->hours = $hours;
        $this->earned = $earned;
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
            ->paginate(30);
        } else {
            $users = $this->users
            ->EMP()
            ->latest()
            ->paginate(30);
        }

        return view('hr.leavecredit')
        ->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $user = $this->users->findOrFail($id);
        $minutes = $this->minutes->get();
        $hours = $this->hours->get();
        return view('hr.tardiness')
        ->with('user', $user)
        ->with('minutes', $minutes)
        ->with('hours', $hours);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->users->findOrFail($id);
        $leavecard = $this->leavecredit->where('user_id',$id)->latest()->paginate(20);
        return view('hr.leavecard')
        ->with('user', $user)
        ->with('leavecard', $leavecard);
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
        $request->validate([
            'from' => 'required',
            'to' => 'required',
        ]);
        // total days
        $diff_in_days = Carbon::parse($request->to)->diffInDays(Carbon::parse($request->from)) + 1;

        // getting last inserted record
        $leavecredit = $this->leavecredit->where('user_id', $id)->latest()->first();

        // getting sl vl balance
        if ($leavecredit) {
            $balance_vl = $leavecredit->elc_vl_balance;
            $balance_sl = $leavecredit->elc_sl_balance;
        } else {
            $balance_vl = 0;
            $balance_sl = 0;
        }

        // checking in days is greater than 30
        if ($diff_in_days == 31) {
            $diff_in_days = 30;
        }
        // getting earned credit
        $earned = $this->earned->findOrFail($diff_in_days);
        //  getting total deduction minus earned
        $total_vl_deduction = $request->vl_m + $request->vl_h +$request->vl_d;
        $total_sl_deduction = $request->sl_m + $request->sl_h +$request->sl_d;
        // total earned
        $total_vl_earned = $earned->value - $total_vl_deduction;
        $total_sl_earned = $earned->value - $total_sl_deduction;

        // getting new balance
        $balance_vl += $total_vl_earned;
        $balance_sl += $total_sl_earned;

        $this->leavecredit->user_id = $id;
        $this->leavecredit->elc_period_from = $request->from;
        $this->leavecredit->elc_period_to = $request->to;
        $this->leavecredit->elc_particular = $request->particular;
        $this->leavecredit->elc_vl_earned = $earned->value ;
        $this->leavecredit->elc_vl_balance = $balance_vl;
        $this->leavecredit->elc_sl_earned = $earned->value ;
        $this->leavecredit->elc_sl_balance = $balance_sl;
        $this->leavecredit->elc_remarks = $request->remarks;

        if ($request->with_pay_vl == 0) {
            $this->leavecredit->elc_vl_auw_p = $total_vl_deduction;
        } else {
            $this->leavecredit->elc_vl_auwo_p = $total_vl_deduction;
        }

        if ($request->with_pay_sl == 0) {
            $this->leavecredit->elc_sl_auw_p = $total_sl_deduction;
        } else {
            $this->leavecredit->elc_sl_auwo_p = $total_sl_deduction;
        }

        if ($this->leavecredit->save()) {
            Session::flash('alert', 'success|Record has been Saved');
            return redirect()->route('hr.leave.index');
        } else {
            Session::flash('alert', 'danger|Record not Save');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->leavecredit->destroy($id)) {
            Session::flash('alert', 'success|Record has been Deleted');
            return redirect()->back();
        } else {
            Session::flash('alert', 'danger|Record not deleted');
            return redirect()->back();
        }
    }
}
