<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\hr\InterviewExam;
use App\Models\hr\Publication;
use App\Models\pds\personal;
use App\Models\User;
use App\Models\users\application;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class RangkingController extends Controller
{
    private $personal;
    private $application;
    private $interviewExam;
    private $user;
    private $publication;

    public function __construct(personal $personal, application $application, InterviewExam $interviewExam, User $user, Publication $publication)
    {
        $this->personal = $personal;
        $this->interviewExam = $interviewExam;
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
        $all_applicants = $this->application->Application($request)->get();

        $ranking = $this->paginateArray($this->app_ranking_phase1($all_applicants));
        $publication = $this->publication->where('status', '1')->get();

        return view('hr.applicant.rangking')
        ->with('publication', $publication)
        ->with('ranking', $ranking);
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
            if ($app->publication->experience) {
                if (!$app->publication->experience == 0) {
                    $xp = $app->publication->experience * 365;
                    foreach ($app->user->pdsWorkExperience as $WE) {
                        $toDate = Carbon::parse($WE->WEidto);
                        $fromDate = Carbon::parse($WE->WEidfrom);

                        $total_WE +=  $toDate->diffInDays($fromDate);
                    }

                    $total_WE = $total_WE - $xp;
                    if ($total_WE < 0) {
                        $total_WE = 0;
                    }
                }
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
            if ($app->InterviewExam) {
                if ($app->InterviewExam->written_exam) {
                    $percent += 10;
                }
                if ($app->InterviewExam->oral_exam) {
                    $percent += 10;
                }
                if ($app->InterviewExam->background) {
                    $percent += 10;
                }
                if ($app->InterviewExam->performance) {
                    $percent += 10;
                }
                if ($app->InterviewExam->pspt) {
                    $percent += 10;
                }
                if ($app->InterviewExam->potential) {
                    $percent += 10;
                }
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
