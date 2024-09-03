<?php
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
    
     
        $user = Auth::user();
        
        $candidate = Candidate::firstWhere('user_id', $user->id);
       

    
        if (!$candidate) {
           
            return redirect()->back()->with('error', 'Candidate not found.');
        }
    
       
        $resumePath = $request->file('resume')->store('resumes', 'public');
    
        
        $application = new Application();
        $application->candidate_id = $candidate->id; 
        $application->job_id = $request->job_id;
        $application->status = 2;  
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $application = Application::findOrFail($id);
        if (Auth::id() !== $application->candidate->user_id) {
            return redirect()->route('jobs.index')->with('error', 'You are not authorized to cancel this application.');
        }
    
        $application->delete();
    
        return redirect()->route('jobs.index')->with('success', 'Application canceled successfully.');
    }
}
