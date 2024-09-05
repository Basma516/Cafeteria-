<?php
namespace App\Http\Controllers;
use App\Models\Job;
use App\Models\Application;
use App\Models\Candidate;
use App\Models\Notifications;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Notifications\jobApp;



class ApplicationController extends Controller
{
    public function viewResume($id)
    {
        $application = Application::findOrFail($id);
        $resumePath = $application->resume; // This should be the stored path (e.g., resumes/Zj8f6IxEUSg0xNDg5ri5FiMUPKy8JsXtDzXTNJlR.pdf)
    
        // Check if the file exists in the public storage
        if (!Storage::disk('public')->exists($resumePath)) {
            return redirect()->back()->with('error', 'Resume file not found.');
        }
    
        return view('applications.view_resume', ['resumePath' => $resumePath]);
    }

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
    
     
        $user = Auth::user();
        
        $candidate = Candidate::firstWhere('user_id', $user->id);
       

    
        if (!$candidate) {
           
            return redirect()->back()->with('error', 'Candidate not found.');
        }
    
       
        $resumePath = $request->file('resume')->store('resumes', 'public');
    
        
        $application = new Application();
        $application->candidate_id = $candidate->id; 
        $application->job_id = $request->job_id;
        $application->status = 1;  
        $application->resume = $resumePath;
        $application->save();
    
     
        return redirect()->route('jobs.index')->with('success', 'Application submitted successfully.');
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
public function update(Request $request, $id)
{
    $application = Application::findOrFail($id);
    
    $application->status = $request->input('status');
    
    $application->save();
    $notification = Notifications::create ([
        "user_id" => $application->candidate_id,
        "job_id"=> $application->job_id,
        "status" => $request->input("status"),       
    ]);

    return redirect()->back()->with('success', 'Application status updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    
        $application = Application::findOrFail($id);
    
        if (Auth::id() !== $application->job->employer->user_id) {
            return redirect()->route('jobs.index')->with('error', 'You are not authorized to reject this application.');
        }
    
        // Delete the application
        $application->delete();
    
        // Redirect back to the job analytics page with a success message
        return redirect()->back()->with('success', 'Application rejected and deleted successfully.');
    }
    
}
