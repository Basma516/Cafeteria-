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
<<<<<<< HEAD
        $validatedData = $request->validated();
        $user = Auth::user();
    
        $emp_id = Employer::where('user_id', $user->id)->value('id');

        // Check if employer ID is correctly retrieved
        if (!$emp_id) {
            return redirect()->route('jobs.create')->with('error', 'Employer profile not found. Please complete your employer profile.');
        }
=======
        $user = Auth::user();
        if ($user->role != 2) {
            return redirect()->route('home')->with('error', 'Access Denied. Only employers can post jobs.');
        }
        $emp_id = Employer::where('user_id', $user->id)->value('id');
    
        if (!$emp_id) {
            return redirect()->route('home')->with('error', 'Employer profile not found. Please complete your employer profile.');
        }
    
        $validatedData = $request->validated();
>>>>>>> 9c742c0f89114cfb931ac1af5d1deaeae70be94d
    
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
        return view('jobs.myjobs', compact('job'));
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
    public function showEmployerJobs()
{
    $user = Auth::user();
    if ($user->role != 2) {
        return redirect()->route('home')->with('error', 'Access Denied. Only employers can view their job postings.');
    }
    $employer = Employer::where('user_id', $user->id)->first();  
    if (!$employer) {
        return redirect()->route('home')->with('error', 'Employer profile not found. Please complete your employer profile.');
    }
    $jobs = Job::with('jobType', 'status')
                ->where('emp_id', $employer->id)
                ->paginate(10); 
    return view('jobs.empjobs', compact('jobs'));
}


<<<<<<< HEAD
    //     return view('jobs.analytics', compact('jobs'));
    // }
    public function showEmployerJobs()
{
    // Get the logged-in user
    $user = Auth::user();

    // Ensure the user is an employer
    if ($user->role != 2) {
        return redirect()->route('home')->with('error', 'Access Denied. Only employers can view their job postings.');
    }

    // Find the employer associated with the logged-in user
    $employer = Employer::where('user_id', $user->id)->first();

    // Check if the employer profile exists
    if (!$employer) {
        return redirect()->route('home')->with('error', 'Employer profile not found. Please complete your employer profile.');
    }

    // Fetch jobs associated with the employer
    $jobs = Job::with('jobType', 'status')
                ->where('emp_id', $employer->id)
                ->paginate(10); // Use pagination if needed

    return view('jobs.myjobs', compact('jobs'));
}

    
}
=======
}
>>>>>>> 9c742c0f89114cfb931ac1af5d1deaeae70be94d
