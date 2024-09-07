<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Resume::query();

        // Join with the candidates table
        $query->join('candidates', 'resumes.candidate_id', '=', 'candidates.id');
    
        // Search logic
        if ($request->filled('skills')) {
            $query->where('candidates.skills', 'LIKE', '%' . $request->skills . '%');
        }
    
        if ($request->filled('experience')) {
            $query->where('resumes.experience', 'LIKE', '%' . $request->experience . '%');
        }
    
        if ($request->filled('education')) {
            $query->where('resumes.education', 'LIKE', '%' . $request->education . '%');
        }
    
      
        $resumes = $query->get(['resumes.*', 'candidates.skills']);
    
        return view('resumes.index', compact('resumes'));
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
        $request->validate([
            'skills' => 'required|string',
            'experience' => 'required|string',
            'education' => 'required|string',
        ]);

        Resume::create([
            'candidate_id' => Auth::id(),
            'skills' => $request->skills,
            'experience' => $request->experience,
            'education' => $request->education,
        ]);

        return redirect()->route('home')->with('success', 'Resume submitted successfully.');
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
    public function search(Request $request)
{
    $query = Resume::query();

        if ($request->filled('skills')) {
            $query->where('skills', 'LIKE', '%' . $request->skills . '%');
        }

        if ($request->filled('experience')) {
            $query->where('experience', 'LIKE', '%' . $request->experience . '%');
        }

        if ($request->filled('education')) {
            $query->where('education', 'LIKE', '%' . $request->education . '%');
        }

        $resumes = $query->get();

        if ($resumes->isEmpty()) {
            return redirect()->route('resumes.index')->with('error', 'No resumes found matching your criteria.');
        }

        return view('resumes.index', compact('resumes'));
    }
}


