<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Category;
use App\Models\JobType;
use App\Models\JobStatus;
use App\Models\Employer;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('jobType')
        ->withCount('applications')
        ->whereHas('status', function ($query) {
            $query->where('name', 'accepted');
        })
        ->paginate(10);
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
        $user = Auth::user();
        if ($user->role != 2) {
            return redirect()->route('home')->with('error', 'Access Denied. Only employers can post jobs.');
        }
        $emp_id = Employer::where('user_id', $user->id)->value('id');
    
        if (!$emp_id) {
            return redirect()->route('home')->with('error', 'Employer profile not found. Please complete your employer profile.');
        }
    
        $validatedData = $request->validated();
    
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
    $job = Job::with('employer', 'jobType', 'status', 'comments.user')->findOrFail($id);
  
    return view('jobs.jobdetails', compact('job'));
}

  

public function edit($id)
{
    // Fetch the job to edit
    $job = Job::findOrFail($id);
    
    // Ensure the user is an employer
    if (Auth::user()->role != 2) {
        return redirect()->route('home')->with('error', 'Access Denied. Only employers can edit jobs.');
    }
    $categories = Category::all();
    $statuses = JobStatus::all();
    $jobTypes = JobType::all();

    return view('jobs.edit', compact('job', 'categories', 'statuses', 'jobTypes'));
}
public function update(UpdateJobRequest $request, $id)
{
    $job = Job::findOrFail($id);
    
    $job->update($request->validated());

    return redirect()->route('jobs.myjobs',Auth::id())->with('success', 'Job updated successfully.');
}

public function destroy($id)
{

    $job = Job::findOrFail($id);

    if (Auth::user()->role != 2) {
        return redirect()->route('home')->with('error', 'Access Denied. Only employers can delete jobs.');
    }

    $job->delete();
    return redirect()->route('jobs.index')->with('success', 'Job deleted successfully.');
}
    public function showAnalytics($id)
    {
        $job = Job::with('applications')->findOrFail($id);
        $applicationCount = $job->applications->count();
    
        return view('employers.job.analytics', compact('job', 'applicationCount'));
    }

 

    public function showEmployerJobs()
{
    $user = auth()->user();

     if ($user->role != 2) {
        return redirect()->route('home')->with('error', 'Access Denied. Only employers can view their job postings.');
     }

   
    $employer = Employer::where('user_id', $user->id)->first();

    if (!$employer) {
        return redirect()->route('home')->with('error', 'Employer profile not found. Please complete your employer profile.');
    }

    // Fetch jobs associated with the employer
    $jobs = Job::with('employer', 'jobType', 'status')
                ->where('emp_id', $employer->id)
                ->get();

    return view('jobs.myjobs', compact('jobs'));
              }
         
}
