<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobApplicationRequest;
use App\Models\JobApplication;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $id = Auth::user()->id;
            $applications = JobApplication::with('work')->where('user_id', '=', $id)->orderby('created_at', 'desc')->get();
            return view('application.applications_list', compact('applications'));
        } catch (\Throwable $th) {
            return redirect()->route('work.index')->with('error', "Oops Something Went Wrong!!!");
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Work $work)
    {
        try {
            return view('application.apply_form', compact('work'));
        } catch (\Throwable $th) {
            return redirect()->route('work.index')->with('error', "Oops Something Went Wrong!!!");
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(JobApplicationRequest $request)
    {
        try {
            $user_id = Auth::user()->id;
            $work_id = $request->work_id;
            $file = $request->file('cv');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('cv', $filename, 'public');
            JobApplication::create([
                'user_id' => $user_id,
                'work_id' => $work_id,
                'cvname' => $filename,
            ]);
            return redirect()->route('work.index')->with('success', "You Applied, Sucessfully!!!...");
        } catch (\Throwable $th) {
            return redirect()->route('work.index')->with('error', "Oops Something Went Wrong!!!");
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
