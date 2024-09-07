<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobCategoryController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\UserProfileController;

Route::get('/', function () {
    return view('home');
});

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Routes for Employers
Route::resource('employers', EmployerController::class);

// Routes for Users
Route::resource('users', UserController::class);

// Routes for Jobs
Route::resource('jobs', JobController::class)->middleware('auth');

// Routes for Candidates
Route::resource('candidates', CandidateController::class);

// Category Routes
Route::get('/category', [JobCategoryController::class, 'index'])->name('category.index');
Route::get('jobs/category/{categoryId}', [JobController::class, 'showByCategory'])->name('jobs.jobbycategory');

// Applications Routes
Route::resource('applications', ApplicationController::class)->only(['create', 'store', 'destroy']);
Route::patch('/applications/{application}', [ApplicationController::class, 'update'])->name('applications.update');
Route::get('/applications/{id}/resume', [ApplicationController::class, 'viewResume'])->name('applications.resume');

// Comments Routes
Route::post('/jobs/{job}/comments', [CommentsController::class, 'store'])->name('comments.store');
Route::get('/jobs/{id}/comments', [CommentsController::class, 'show'])->name('comments.show');

// Additional Routes
Route::get('/employer/myjobs/{id}', [EmployerController::class, 'myJobs'])->name('jobs.myjobs')->middleware('auth');
Route::get('/myjobs', [JobController::class, 'showEmployerJobs'])->name('jobs.empjobs');
Route::get('/employer/job/{id}/analytics', [JobController::class, 'showAnalytics'])->name('job.analytics');
Route::get('/jobs/search', [JobController::class, 'search'])->name('jobs.search');

// Packages Page
Route::view('/packages/user', 'packages.UserPackages');
Route::view('/packages/Employer', 'packages.EmployerPackages');
// User Profile Route
Route::get('/candidate-profile/{userId}', [UserProfileController::class, 'showCandidateProfile'])->name('profile.candidate');

// Route for uploading resume
Route::post('/candidate-profile/{userId}/resume', [UserProfileController::class, 'uploadResume'])->name('profile.uploadResume');
Route::get('/candidate/{id}', [UserProfileController::class, 'showCandidateProfile'])->name('candidate.profile');

