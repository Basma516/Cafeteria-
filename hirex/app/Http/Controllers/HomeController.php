<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Employer;
use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
 

    public function index()
{
    $jobs = Job::paginate(10); 
    // Fetch distinct categories and locations from the jobs table
    $categories = Category::select('name')->distinct()->get();
    $locations = Job::select('location')->distinct()->get();

    // Pass the data to the view
    return view('home', compact('jobs','categories', 'locations'));
}

}
