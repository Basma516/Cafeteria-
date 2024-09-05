<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Candidate;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Employer;
use App\Models\Job;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        // Example to get count grouped by date for employers, candidates, and jobs
        $dates = Employer::selectRaw('DATE(created_at) as date')->distinct()->pluck('date')->toArray();
    
        $employersData = Employer::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->pluck('count', 'date')->toArray();
    
        $candidatesData = Candidate::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->pluck('count', 'date')->toArray();
    
        $jobsData = Job::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->pluck('count', 'date')->toArray();
    
        // Fill missing dates with 0
        foreach ($dates as $date) {
            $employersData[$date] = $employersData[$date] ?? 0;
            $candidatesData[$date] = $candidatesData[$date] ?? 0;
            $jobsData[$date] = $jobsData[$date] ?? 0;
        }
    
        return view('dashboard.index', [
            'employersCount' => Employer::count(),
            'candidatesCount' => Candidate::count(),
            'categoriesCount' => Category::count(),
            'jobsCount' => Job::count(),
            'dates' => $dates,
            'employersData' => $employersData,
            'candidatesData' => $candidatesData,
            'jobsData' => $jobsData,
        ]);
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
        $comments = Comment::where('job_id', $id)->get();
        $job = Job::findOrFail($id);
        return view('dashboard.jobs.view', compact('comments', 'job'));
    }


    public function deleteEmployer($id)
    {
        $employer = Employer::findOrFail($id);
        $employer->delete();
        return redirect()->route('employer');
    }

    // Delete Candidate
    public function deleteCandidate($id)
    {
        $candidate = Candidate::findOrFail($id);
        $candidate->delete();
        return redirect()->route('candidate');
    }

    // Delete Category
    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('category');
    }

    // Delete Job
    public function deleteJob($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();
        return redirect()->route('jobs');
    }

    public function deleteComment($job_id, $id)
    {
        $comment = Comment::where('job_id', $job_id)->where('id', $id)->firstOrFail();
        $comment->delete();
        return redirect()->route('jobs.show', $job_id);
    }

    public function acceptJob($id)
    {
        $job = Job::findOrFail($id);
        $job->job_status = 2;
        $job->save();

        return redirect()->route('jobs');
    }

    public function storeCategory(StoreCategoryRequest $request)
    {
        $category = Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('category');
    }

    public function categoryCreate()
    {
        return view('dashboard.category.add');
    }

    public function updateCategory(UpdateCategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->validated());
        return redirect()->route('category');
    }
}
