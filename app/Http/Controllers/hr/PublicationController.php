<?php

namespace App\Http\Controllers\hr;

use App\Http\Controllers\Controller;
use App\Models\hr\Publication;
use Illuminate\Http\Request;
use App\Models\admin\Department;
use Illuminate\Support\Facades\Session;

class PublicationController extends Controller
{
    private $publication;
    private $department;

    public function __construct(Publication $publication, Department $department)
    {
        $this->publication = $publication;
        $this->department = $department;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_department = $this->department->get();
        $publication = $this->publication->paginate(10);
        return view('hr.publication')
        ->with('all_department', $all_department)
        ->with('publication', $publication)
        ->with('edit_pub', null);
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
            'title' => 'required',
            'itemno' => 'required',
            'salarygrade' => 'required',
            'monthly' => 'required',
            'education' => 'required',
            'trainig' => 'required',
            'experience' => 'required',
            'eligibility' => 'required',
            'competency' => 'required',
            'assignment' => 'required',
        ]);

        $this->publication->title = $request->title;
        $this->publication->itemno = $request->itemno;
        $this->publication->salarygrade = $request->salarygrade;
        $this->publication->monthly = $request->monthly;
        $this->publication->education = $request->education;
        $this->publication->trainig = $request->trainig;
        $this->publication->experience = $request->experience;
        $this->publication->eligibility = $request->eligibility;
        $this->publication->competency = $request->competency;
        $this->publication->assignment = $request->assignment;

        if ($this->publication->save()) {
            Session::flash('alert', 'success|Record has been Saved');
            return redirect()->route('hr.publication.index');
        } else {
            Session::flash('alert', 'danger|Record not Save');
            return redirect()->back();
        }
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
        $publication = $this->publication->paginate(10);
        $edit_pub = $this->publication->findOrFail($id);
        return view('hr.publication')
        ->with('publication', $publication)
        ->with('edit_pub', $edit_pub);
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
            'title' => 'required',
            'itemno' => 'required',
            'salarygrade' => 'required',
            'monthly' => 'required',
            'education' => 'required',
            'trainig' => 'required',
            'experience' => 'required',
            'eligibility' => 'required',
            'competency' => 'required',
            'assignment' => 'required',
        ]);

        $publication = $this->publication->findOrFail($id);

        $publication->title = $request->title;
        $publication->itemno = $request->itemno;
        $publication->salarygrade = $request->salarygrade;
        $publication->monthly = $request->monthly;
        $publication->education = $request->education;
        $publication->trainig = $request->trainig;
        $publication->experience = $request->experience;
        $publication->eligibility = $request->eligibility;
        $publication->competency = $request->competency;
        $publication->assignment = $request->assignment;

        if ($publication->save()) {
            Session::flash('alert', 'success|Record has been Saved');
            return redirect()->route('hr.publication.index');
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
        $pub = $this->publication->findOrFail($id);
        if ($pub->status == 0) {
            $pub->status = 0;
            if ($pub->save()) {
                Session::flash('alert', 'success|Record has been Deleted');
                return redirect()->back();
            } else {
                Session::flash('alert', 'danger|Record not Deleted');
                return redirect()->back();
            }
        } else {
            if ($this->publication->findOrFail($id)) {
                Session::flash('alert', 'success|Record has been Deleted');
                return redirect()->back();
            } else {
                Session::flash('alert', 'danger|Record not Deleted');
                return redirect()->back();
            }
        }
    }
}
