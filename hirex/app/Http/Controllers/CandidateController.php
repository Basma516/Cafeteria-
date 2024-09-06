<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCandidateRequest;
use App\Http\Requests\UpdateCandidateRequest;
use App\Models\Candidate;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Smalot\PdfParser\Parser;
use App\Models\Application;



class CandidateController extends Controller
{
    /**
     * Display a listing of candidates.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $candidates = Candidate::all();
        return view('home', compact('candidates'));
    }

    /**
     * Show the form for creating a new candidate profile.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('candidates.create');
    }

    /**
     * Store a newly created candidate in storage.
     *
     * @param  \App\Http\Requests\StoreCandidateRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCandidateRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        $candidate = new Candidate();
       
        $candidate->user_id = Auth::id(); // Assuming the candidate is associated with the logged-in user
        $candidate->skills = implode(', ', $validatedData['skills']); // Convert array to comma-separated string
        $candidate->resume = $validatedData['resume'];

        $candidate->save();
        User::where('id', $candidate->id)->update(['role' => 3]);

        return redirect()->route('jobs.index')
            ->with('success', 'Candidate profile created successfully.');
    }

    /**
     * Display the specified candidate.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\View\View
     */
    public function show(Candidate $candidate): View
    {
        return view('candidates.show', compact('candidate'));
    }






    /**
     * Show the form for editing the specified candidate.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\View\View
     */
    public function edit(Candidate $candidate): View
    {
        return view('candidates.edit', compact('candidate'));
    }

    /**
     * Update the specified candidate in storage.
     *
     * @param  \App\Http\Requests\UpdateCandidateRequest  $request
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCandidateRequest $request, Candidate $candidate): RedirectResponse
    {
        $validatedData = $request->validated();

        $candidate->skills = implode(', ', $validatedData['skills']); // Convert array to comma-separated string
        $candidate->resume = $validatedData['resume'];
        $candidate->save();

        return redirect()->route('candidates.index')
            ->with('success', 'Candidate profile updated successfully.');
    }

    /**
     * Remove the specified candidate from storage.
     *
     * @param  \App\Models\Candidate  $candidate
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Candidate $candidate): RedirectResponse
    {
        $candidate->delete();

        return redirect()->route('candidates.index')
            ->with('success', 'Candidate profile deleted successfully.');
    }





    // public function extractText($resumePath, $fileContent)
    //    {
    //         $extension = pathinfo($resumePath, PATHINFO_EXTENSION);
    
    //         if ($extension == 'pdf') {
    //            // Use smalot/pdfparser to extract text from PDF
    //              $parser = new Parser();
    //              $pdf = $parser->parseContent($fileContent);
    //          return $pdf->getText();
            
              
    //        }
    
    
    //         return '';
    //    }
    
    //     public function viewResume(Request $request, $id)
    //     {
    //         $application = Application::findOrFail($id);
    //         $resumePath = $application->resume;
        
    //         // Check if the file exists
    //         if (!Storage::disk('public')->exists($resumePath)) {
    //             return redirect()->back()->with('error', 'Resume file not found.');
    //         }
        
        
    //         $fileContent = Storage::disk('public')->get($resumePath);
    //         $textContent = $this->extractText($resumePath, $fileContent);
        
          
    //         if ($request->has('query')) {
    //             $query = $request->input('query');
    //             $highlightedText = str_ireplace($query, "<mark>$query</mark>", $textContent); // Highlight the query in the text
    //             return view('applications.view_resume', [
    //                 'resumePath' => Storage::url($resumePath),
    //                 'resumeText' => $highlightedText,
    //                 'application' => $application
    //             ]);
    //         }
        
    //         return view('applications.view_resume', [
    //             'resumePath' => Storage::url($resumePath),
    //             'resumeText' => $textContent,
    //             'application' => $application
    //         ]);
    //     }
    
}