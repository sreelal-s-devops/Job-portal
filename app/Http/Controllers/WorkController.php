<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $works = Work::when(request('jobname'),function($query){
            $query->where('title','LIKE','%'.request('jobname').'%');
        })->when(request('max'),function($query){
            $query->where('salary','<=',request('max'));
        })->when(request('min'),function($query){
            $query->where('salary','>=',request('min'));
        })->when(request('experience'),function($query){
            $query->where('experience','=',request('experience'));
        })->paginate(5);
        return view('work.all_jobs', compact('works'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $work = Work::find($id);
            return view('work.work_view', compact('work'));
        } catch (\Throwable $th) {
           
        }
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
