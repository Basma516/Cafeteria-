<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Category;


use App\Models\Employer;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
{
    $jobs = Job::with('jobType')
    ->withCount('applications')
    ->whereHas('status', function ($query) {
        $query->where('name', 'accepted');
    })
    ->paginate(10);

    $categories = Category::withCount('jobs')->get();
    $locations = Job::select('location')->distinct()->get();

    return view('home', compact('jobs', 'categories', 'locations'));
        

    

    return view('home', compact('jobs', 'categories','locations'));
}
}
