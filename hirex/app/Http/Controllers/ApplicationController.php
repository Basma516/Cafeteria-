<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Application;
use App\Models\Candidate;
use App\Models\Notifications;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Smalot\PdfParser\Parser;
use PhpOffice\PhpWord\IOFactory;
use App\Notifications\jobApp;



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
        $application->status_id = 2;  
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
    // In ApplicationController.php
    // In ApplicationController.php
  
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

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Application status updated successfully.');

    
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {


        try {

            $application = Application::findOrFail($id);


            if (Auth::id() !== $application->candidate->user_id) {
                return redirect()->route('jobs.index')->with('error', 'You are not authorized to cancel this application.');
            }


            $application->delete();


            return redirect()->route('jobs.index')->with('success', 'Application cancelled successfully.');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'An error occurred while processing your request.');
        }
    }

    public function extractText($resumePath, $fileContent)
    {
        $extension = pathinfo($resumePath, PATHINFO_EXTENSION);

        if ($extension == 'pdf') {
            $parser = new Parser();
            $pdf = $parser->parseContent($fileContent);
            return $pdf->getText();
        
          
        }


        return '';
    }

    public function viewResume(Request $request, $id)
    {
        $application = Application::findOrFail($id);
        $resumePath = $application->resume;
    
        if (!Storage::disk('public')->exists($resumePath)) {
            return redirect()->back()->with('error', 'Resume file not found.');
        }
    
    
        $fileContent = Storage::disk('public')->get($resumePath);
        $textContent = $this->extractText($resumePath, $fileContent);
    
      
        if ($request->has('query')) {
            $query = $request->input('query');
            $highlightedText = str_ireplace($query, "<mark>$query</mark>", $textContent); 
            return view('applications.view_resume', [
                'resumePath' => Storage::url($resumePath),
                'resumeText' => $highlightedText,
                'application' => $application
            ]);
        }
    
        return view('applications.view_resume', [
            'resumePath' => Storage::url($resumePath),
            'resumeText' => $textContent,
            'application' => $application
        ]);

}
    
}
