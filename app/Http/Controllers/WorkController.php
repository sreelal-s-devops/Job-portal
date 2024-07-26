<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddJobFormRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\JobApplication;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->user_type == 0) {
            $filter = request(['jobname', 'max', 'min', 'experience', 'category']);
            $works = Work::filter($filter)->paginate(5);
            $experiences = Work::$experience;
            $categories = Work::$category;
            return view('work.all_jobs', compact('works', 'categories', 'experiences'));
        } else
            $works = Work::filter(request(['jobname']))->where('user_id', '=', Auth::user()->id)->paginate(5);
        return view('employer.job_list', compact('works'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $category = Work::$category;
            $experiences = Work::$experience;
            return view('employer.create_job', compact('category', 'experiences'));
        } catch (\Throwable $th) {
            return redirect()->route('work.index')->with('error', 'unable to load...Try after sometime!!');
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(AddJobFormRequest $request)
    {
        try {
            $data = $request->validated();
            $data['user_id'] = Auth::user()->id;
            Work::create($data);
            return redirect()->route('work.index')->with('success', "Job Added Successfully...!!!!");
        } catch (\Exception $e) {
            return redirect()->route('work.index')->with('error', "Something went wrong! try after sometime!!");
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $work = Work::with('jobapplication')->find($id);
            $current_user = Auth::id();
            $user_ids = $work->jobapplication()->pluck('user_id');
            $applied = $user_ids->contains($current_user) ? 1 : 0;
            return view('work.work_view', compact('work', 'applied'));
        } catch (\Throwable $th) {
            return redirect()->route('work.index')->with('error', "Oops something went wrong...try after sometime!!");
        }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $work = Work::find($id);
            $categories = Work::$category;
            $experiences = Work::$experience;
            return view('employer.update_job', compact('work', 'categories', 'experiences'));

        } catch (\Throwable $th) {
            return redirect()->route('work.index')->with('error', "Oops Something Went Wrong!!!");
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, string $id)
    {
        try {
            $work = Work::find($id);
            $work->update($request->validated());
            return redirect()->route('work.index')->with('success', "Job updated successfully!!!");
        } catch (\Throwable $th) {
            return redirect()->route('work.index')->with('error', "unable to update!!!");
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Work::destroy($id);
            return redirect()->route('work.index')->with('success', "Job deleted Successfully...!!!!");
        } catch (\Throwable $th) {
            return redirect()->route('work.index')->with('error', "Unable to delete..!!");
        }
    }
    public function manageApplications(string $id)
    {
        try {
            $jobapplications = JobApplication::where('work_id', $id)->with('user')->get();
            return view('application.applicants_details', compact('jobapplications'));
        } catch (\Throwable $th) {
            return redirect()->route('work.index')->with('error', "Oops Something Went Wrong!!!");
        }
    }
    public function downloadCv(string $cvname)
    {
        try {
            $filepath = storage_path('app\public\cv\\' . $cvname);
            if (file_exists($filepath)) {
                return response()->download($filepath);
            }
        } catch (\Throwable $th) {
            return redirect()->route('work.index')->with('error', "Oops Something Went Wrong!!!");
        }
    }
}
