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
        
        $employers = Employer::all();

        return view('employers.index', compact('employers'));
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
        // Validate the request data using StoreEmployerRequest
        $validatedData = $request->validated();

        // Create a new Employer using the validated data
        Employer::create($validatedData);

        // Redirect to the index page with a success message
        return redirect()->route('employers.index')
            ->with('success', 'Employer created successfully.');
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
