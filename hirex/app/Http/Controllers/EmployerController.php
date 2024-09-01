<?php

namespace App\Http\Controllers;


use App\Models\Employer;
use App\Models\Application;
use App\Models\Job;
use App\Http\Requests\StoreEmployerRequest;
use App\Http\Requests\UpdateEmployerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployerController extends Controller
{
    public function index()
    {
      
        // $employers = Employer::all();

        // return view('employers.index', compact('employers'));
    }

    /**
     * Show the form for creating a new employer.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('employers.create');
    }

    /**
     * Store a newly created employer in storage.
     *
     * @param  \App\Http\Requests\StoreEmployerRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
  public function store(StoreEmployerRequest $request)
        {
            // Get the currently authenticated user
            $user = Auth::user();
        
            // Set the user's role to 2 (assuming 2 is the role for 'Employer')
            $user->role = 2;
            $user->save();
        
            // Create a new Employer record without using mass assignment
            $employer = new Employer();
            $employer->user_id = $user->id; // Set the user_id to the authenticated user's ID
            $employer->company_name = $request->input('company_name');
            $employer->company_description = $request->input('company_description');
            $employer->company_website = $request->input('company_website');
            $employer->phone = $request->input('phone');
            $employer->save(); // Save the Employer instance to the database
        
            // Redirect to the jobs.alljobs route with a success message
            return redirect()->route('jobs.index')
                ->with('success', 'Employer created and role set successfully.');
        }
    

    /**
     * Display the specified employer.
     *
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\View\View
     */
    public function show(Employer $employer)
    {
        return view('employers.show', compact('employer'));
    }

    /**
     * Show the form for editing the specified employer.
     *
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\View\View
     */
    public function edit(Employer $employer)
    {
        return view('employers.edit', compact('employer'));
    }

    /**
     * Update the specified employer in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployerRequest  $request
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateEmployerRequest $request, Employer $employer)
    {
        $employer->update($request->validated());

        return redirect()->route('employers.index')->with('success', 'Employer updated successfully.');
    }

    /**
     * Remove the specified employer from storage.
     *
     * @param  \App\Models\Employer  $employer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Employer $employer)
    {
        $employer->delete();

        return redirect()->route('employers.index')->with('success', 'Employer deleted successfully.');
    }
}
