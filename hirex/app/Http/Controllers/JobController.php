<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::all();
        return view('jobs.alljobs', compact('jobs'));
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(StoreJobRequest $request)
    {
        Job::create($request->validated());
        return redirect()->route('jobs.index')->with('success', 'Job created successfully.');
    }

    public function show(Job $job)
    {
        return view('jobs.show', compact('job'));
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
}
