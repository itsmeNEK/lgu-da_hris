<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use App\Models\hr\loyaltyRecord;
use App\Models\hr\ServiceRecord;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class loyaltyAwardController extends Controller
{
    private $user;
    private $service_record;
    private $loyaltyRecord;

    public function __construct(User $user, ServiceRecord $service_record,loyaltyRecord $loyaltyRecord)
    {
        $this->user = $user;
        $this->service_record = $service_record;
        $this->loyaltyRecord = $loyaltyRecord;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_users = $this->user->EMP()->get();
        $this->storeLoyaltyRecord($all_users);

        $all_users = $this->user->EMP()->paginate(20);
        return view('hr.RandR.loyaltyAward')->with('all_users', $all_users);
    }

    public function storeLoyaltyRecord($all_users)
    {

        foreach ($all_users as $user) {
            $service_record = $this->service_record->where('user_id', $user->id)->first();
            if ($service_record) {
                $from_whole = Carbon::createFromFormat('Y-m-d', $user->serviceRecord->from);
                $now_whole = Carbon::createFromFormat('Y-m-d H:i:s', now());

                $from = $from_whole->year;
                $now = $now_whole->year;

                $difference = $now - $from;

                $difference;
                if($difference >= 10)
                {
                    $times = 1;
                    $new_diff = $difference - 10;
                    while($new_diff >=5){
                        $times +=1;
                        $new_diff -=5;
                    }
                }else{
                    $times = 0;
                }
                if($times>0)
                {
                    $next_time = 10+ (5 *($times));
                }else{
                    $next_time = 10;
                }
                $next_loyalty = $from_whole->addYears($next_time);
                if($user->hasloyaltyRecord()){
                    $LR = $this->loyaltyRecord->where('user_id',$user->id)->first();
                    $LR->from = $user->serviceRecord->from;
                    $LR->year_difference = $difference;
                    $LR->next_loyalty = $next_loyalty;
                    $LR->times = $times;
                    $LR->save();
                }else{
                    $this->loyaltyRecord->user_id = $user->id;
                    $this->loyaltyRecord->from = $user->serviceRecord->from;
                    $this->loyaltyRecord->year_difference = $difference;
                    $this->loyaltyRecord->next_loyalty = $next_loyalty;
                    $this->loyaltyRecord->times = $times;
                    $this->loyaltyRecord->save();
                }
            }
        }
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
