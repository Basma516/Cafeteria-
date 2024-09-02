<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Category;
use App\Models\JobType;
use App\Models\JobStatus;
use App\Models\Employer;
use Illuminate\Http\Request;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use Illuminate\Support\Facades\Auth;


class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('jobType')->paginate(10);
        return view('jobs.alljobs', compact('jobs'));
    }

    public function create()
    {
        $types = JobType::all(); 
        $statuses = JobStatus::all(); 
        $categories = Category::all(); 
        
        return view('jobs.createjob', compact('categories', 'types', 'statuses'));
    }
    
    public function store(StoreJobRequest $request)
    {
        $validatedData = $request->validated();
    
        $emp_id = Employer::where('user_id', Auth::id())->value('id');
    
        $job = new Job();    
        $job->title = $validatedData['title'];
        $job->description = $validatedData['description'];
        $job->requirements = $validatedData['requirements'];
        $job->location = $validatedData['location'];
        $job->category_id = $validatedData['category_id'];
        $job->job_status = $validatedData['job_status'];
        $job->job_type = $validatedData['job_type'];
        $job->responsibilities = $validatedData['responsibilities'];
        $job->salary = $validatedData['salary'];
        $job->benefits = $validatedData['benefits'];
        $job->deadline = $validatedData['deadline'];
        $job->emp_id = $emp_id; 
    
        $job->save();
    
        return redirect()->route('jobs.index')->with('success', 'Job created successfully.');
    }
    
    

    public function show($id)
    {
       
        $job = Job::with('employer', 'jobType', 'status')->findOrFail($id);
    
        return view('jobs.jobdetails', compact('job'));
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', compact('job'));
    }

    public function update(UpdateJobRequest $request, Job $job)
    {
        $job->update($request->validated());
        return redirect()->route('jobs.index')->with('success', 'Job updated successfully.');
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully.');
    }

    // public function analytics()
    // {
    //     // Fetch all jobs with the count of applications
    //     $jobs = Job::withCount('applications')->get();

    //     // Optionally filter jobs with 12 or more applications
    //     // $jobs = Job::withCount('applications')
    //     //     ->having('applications_count', '>=', 12)
    //     //     ->get();

    //     return view('jobs.analytics', compact('jobs'));
    // }
}
