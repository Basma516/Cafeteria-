<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Category;
use App\Models\Employer;
use App\Models\Job;
use Illuminate\Http\Request;
use App\Models\User; 

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('dashboard.index', compact('users')); 
    }

    public function employers()
    {
        $employers = Employer::all();
        return view('dashboard.employer', compact('employers'));    
     }

     public function candidates()
     {
         $candidates = Candidate::all();
         return view('dashboard.candidate', compact('candidates'));    
      }
      public function categories()
      {
          $categories = Category::all();
          return view('dashboard.category', compact('categories'));    
       }
      public function jobs()
      {
          $jobs = Job::all();
          return view('dashboard.jobs', compact('jobs'));    
       }


       public function editEmployer($id)
       {
           $employer = Employer::findOrFail($id);
           return view('dashboard.employer.edit', compact('employer'));
       }
   
       // Edit Candidate
       public function editCandidate($id)
       {
           $candidate = Candidate::findOrFail($id);
           return view('dashboard.candidate.edit', compact('candidate'));
       }
   
       // Edit Category
       public function editCategory($id)
       {
           $category = Category::findOrFail($id);
           return view('dashboard.category.edit', compact('category'));
       }
   
       // Edit Job
       public function viewJob($id)
       {
           $job = Job::findOrFail($id);
           return view('dashboard.jobs.view', compact('job'));
       }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create($validatedData);
        return redirect()->route('admin.index')->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user')); 
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user')); 
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->update($validatedData);
        return redirect()->route('admin.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.index')->with('success', 'User deleted successfully.');
    }
}
