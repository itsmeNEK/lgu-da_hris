<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use App\Models\hr\Publication;
use App\Models\User;
use App\Models\users\application;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;

class ManageApplicantsController extends Controller
{
    private $application;
    private $user;
    private $publication;
    public function __construct(application $application, User $user, Publication $publication)
    {
        $this->application = $application;
        $this->user = $user;
        $this->publication = $publication;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $all_applicants = application::select('applications.id', 'applications.user_id', 'applications.pub_id', 'applications.tor', 'applications.eligibility', 'applications.status', )
        ->leftJoin('users', 'users.id', 'applications.user_id')->Application($request)->paginate(10);

        $publication = $this->publication->where('status', '1')->get();

        // $all_applicants = $this->paginateArray($this->app_ranking_phase1($all_applicants));
        $all_applicants = $this->application->paginate(10);
        return view('hr.applicants')
        ->with('publication', $publication)
        ->with('all_applicants', $all_applicants)
        ;
    }
    public function paginateArray($items, $perPage = 10, $page = null, $options = [])

    {

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);

    }
    private function app_ranking_phase1($applicants)
    {
        // $total_lnd = 0;
        $percent = 0;
        $total_WE = 0;
        $education_college = false;
        $eligibility = false;
        $rank = [];
        $ctr = 0;
        foreach ($applicants as $app) {
            // foreach ($app->user->pdsLearningDevelopment as $lnd) {
            //     $total_lnd += $lnd->LDnumhour;
            // }
            foreach ($app->user->pdsWorkExperience as $WE) {
                $toDate = Carbon::parse($WE->WEidto);
                $fromDate = Carbon::parse($WE->WEidfrom);

                $total_WE +=  $toDate->diffInDays($fromDate);
            }
            foreach ($app->user->pdsEducational as $educ) {
                if ($educ->EDlevel == 'College') {
                    $education_college = true;
                }
            }
            if ($app->eligibility) {
                $eligibility = true;
            }
            if ($education_college == true && $eligibility == true) {
                $percent += 30;
            } elseif ($education_college == true) {
                $percent += 15;
            } elseif ($eligibility == true) {
                $percent += 15;
            }
            $percent += $total_WE;
            $rank[$ctr] =[
                'user' => $app->user,
                'app' => $app,
                'total' => $percent,
            ];
            $ctr++;

            $percent = 0;
            $total_WE = 0;
            $education_college = false;
            $eligibility = false;
        }
        return collect($rank)->sortBy('count')->toArray();
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
        $user = $this->user->findOrFail($id);
        return view('hr.applicantInfo')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        $app = $this->application->findOrFail($id);
        $app->status = 0;

        if ($app->save()) {
            Session::flash('alert', 'success|Applicant has been Accepted');
            return redirect()->route('hr.manage_applicants.index');
        } else {
            Session::flash('alert', 'danger|Applicant has not been Accepted');
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
        $app = $this->application->findOrFail($id);
        $app->status = 2;

        if ($app->save()) {
            Session::flash('alert', 'success|Applicant has been Rejected');
            return redirect()->route('hr.manage_applicants.index');
        } else {
            Session::flash('alert', 'danger|Applicant has not been Rejected');
            return back();
        }
    }
}
