<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;


use App\Models\Job;
use App\Models\Application;
use App\Models\Candidate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $jobs = Job::findOrFail($request->query('job'));
        return view('applications.apply', compact('jobs'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'resume' => 'required|mimes:pdf,doc,docx|max:2048',
            'job_id' => 'required|exists:jobs,id',
        ]);
        dd($request->all());

        $user = Auth::user();
        
        // Ensure that the candidate exists
        $candidate = Candidate::find($user->id);
        if (!$candidate) {
            return redirect()->back()->with('error', 'You must be a candidate to apply for jobs.');
        }

        // Handle the file upload
        $resumePath = $request->file('resume')->store('resumes', 'public');

        // Save the application with the resume path
        $application = new Application([
            'candidate_id' => $candidate->id,
            'job_id' => $request->job_id,
            'status' => 2,
            'resume' => $resumePath,
        ]);

        $application->save();
       

        return redirect()->route('jobs.alljobs')->with('success', 'Application submitted successfully.');
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
