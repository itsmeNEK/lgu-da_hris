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

        $ranking = $this->app_ranking($all_applicants);
        // with paginate
        // $ranking = $this->paginateArray($this->app_ranking($all_applicants));
        $publication = $this->publication->where('status', '1')->get();
        // dd($ranking);
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
    private function app_ranking($applicants)
    {
        // $total_lnd = 0;
        $percent = 0;
        $total_WE = 0;
        $total_educ = 0;
        $eligibility = false;
        $rank = [];
        $ctr = 0;
        foreach ($applicants as $app) {
            if ($app->publication->status == 1) {
                // foreach ($app->user->pdsLearningDevelopment as $lnd) {
            //     $total_lnd += $lnd->LDnumhour;
                // }

                // work experience
                if ($app->publication->experience) {
                    $experience = preg_replace('/[^0-9]/', '', $app->publication->experience);
                    if (!$experience == 0) {
                        $xp = $experience * 365;
                        foreach ($app->user->pdsWorkExperience as $WE) {
                            $toDate = Carbon::parse($WE->WEidto);
                            $fromDate = Carbon::parse($WE->WEidfrom);

                            $total_WE +=  $toDate->diffInDays($fromDate);
                        }

                        $total_WE = round((($total_WE/$xp)*10), 2);

                        if ($total_WE > 0 && $total_WE <=10) {
                            $total_WE = $total_WE;
                        } elseif ($total_WE > 10) {
                            $total_WE = 10;
                        } elseif ($total_WE <0) {
                            $total_WE = 0;
                        }
                    }
                }
                //  education
                if ($app->publication->education) {
                    $education = preg_replace('/[^0-9]/', '', $app->publication->education);
                    if (!$education == null) {
                        $educ_xp = $education * 365;
                        foreach ($app->user->pdsEducational as $educ) {
                            if ($educ->EDlevel == 'College') {
                                $toDate = Carbon::parse($educ->EDpoaFROM);
                                $fromDate = Carbon::parse($educ->EDpoaTO);

                                $total_educ +=  $toDate->diffInDays($fromDate);

                                $total_educ = round((($total_educ/$educ_xp)*10), 2);
                            }
                        }
                        if ($total_educ <= 10 && $total_educ > 0) {
                            $percent +=$total_educ;
                        }
                    } else {
                        $percent += 15;
                    }
                }
                // eligibility
                if (!$app->eligibility) {
                    $percent += 15;
                } else {
                    if ($app->user->pdsCivilService) {
                        $percent += 15;
                    }
                }
                // training

                // if ($app->publication->trainig) {
                //     $trainig = preg_replace('/[^0-9]/', '', $app->publication->trainig);
                //     if (!$trainig == 0) {
                //         foreach ($app->user->pdsLearningDevelopment as $lnd) {
                //             $total_trainig =  $lnd->LDnumhour;
                //             $total_trainig = round((($total_trainig/$trainig)*10), 2);

                //             if ($total_trainig > 0 && $total_trainig <= 10) {
                //                 $percent +=$total_trainig;
                //             }
                //         }
                //     } else {
                //         $percent += 10;
                //     }
                // }

                if ($app->InterviewExam) {
                    if ($app->InterviewExam->written_exam) {
                        $percent += $app->InterviewExam->written_exam;
                    }
                    if ($app->InterviewExam->oral_exam) {
                        $percent += $app->InterviewExam->oral_exam;
                    }
                    if ($app->InterviewExam->background) {
                        $percent += $app->InterviewExam->background;
                    }
                    if ($app->InterviewExam->performance) {
                        $percent += $app->InterviewExam->performance;
                    }
                    if ($app->InterviewExam->pspt) {
                        $percent += $app->InterviewExam->pspt;
                    }
                    if ($app->InterviewExam->potential) {
                        $percent += $app->InterviewExam->potential;
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
        }
        return collect($rank)->sortByDesc('total')->toArray();
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
        dd($id);
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
