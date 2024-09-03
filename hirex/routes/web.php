<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\CommentsController;
use Illuminate\Support\Facades\Auth;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

// Route::get('/dashboard', function () {
//     return view('dashboard.index');
// });
// Route::get('/dashboard/candidate', function () {
//     return view('dashboard.candidate');
// })->name('candidate');
// Route::get('/dashboard/employer', function () {
//     return view('dashboard.employer');
// })->name('employer');
// Route::get('/dashboard/jobs', function () {
//     return view('dashboard.jobs');
// })->name('jobs');
// Route::get('/dashboard/category', function () {
//     return view('dashboard.category');
// })->name('category');
// Route::get('/dashboard/candidate/edit', function () {
//     return view('dashboard.candidate.edit');
// })->name('updateCandidate');

// Route::get('/dashboard/employer/edit', function () {
//     return view('dashboard.employer.edit');
// })->name('updateEmployer');

// Route::get('/dashboard/category/add', function () {
//     return view('dashboard.category.add');
// })->name('addCategory');

// Route::get('/dashboard/category/edit', function () {
//     return view('dashboard.category.edit');
// })->name('editCategory');

// Route::get('/dashboard/job/view', function () {
//     return view('dashboard.jobs.view');
// })->name('jobView');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::view('/profile', 'users.edit_profile')->name('profile');

// // Dashboard routes for different user types
// Route::get('/employer/dashboard', [EmployerController::class, 'dashboard'])->name('employer.dashboard');
// //Route::get('/candidate/dashboard', [CandidateController::class, 'dashboard'])->name('candidate.dashboard');
// Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);

//  Route::get('/job', function () {
//     return view('jobs.show');
//   });

//  Route::get('/category', function () {
//      return view('jobs.jobbycategory'); 
//  });


// Route::view('/job-details', 'jobs.show')->name('job.details');

//  Route::get('/all-jobs', function () {
//     return view('jobs.alljobs'); 
//  })->name('alljobs');


// routes/web.php

//Route::view('/create-job', 'jobs.createjob');

// Routes for Employers
Route::resource('employers', EmployerController::class);

// Routes for Users
Route::resource('users', UserController::class);

// Routes for Jobs
Route::resource('jobs', JobController::class);

Route::resource('candidates', CandidateController::class);

Route::resource('applications', ApplicationController::class)->only(['create', 'store']);

Route::resource('applications', ApplicationController::class)->only(['create', 'store', 'destroy']);
//  Route::get('/employer/jobs', [EmployerController::class, 'myJobs'])->name('jobs.show');





// Route::get('/jobs/comments', [JobController::class, 'indexWithComments'])->name('jobs.indexWithComments');

// Route::get('/jobs/{id}/details', [JobController::class, 'showWithComments'])->name('jobs.showWithComments');
// Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');

// Route::post('/jobs/{job}/comments', [JobController::class, 'storeComment'])->name('jobs.storeComment');

Route::get('/employer/jobs', [EmployerController::class, 'myJobs'])
     ->name('employer.jobs.index')
     ->middleware('auth');

Route::resource('jobs', JobController::class); // This provides index, show, create, store, etc.

// Additional route for storing comments if needed
// Route::post('/jobs/{job}/comments', [JobController::class, 'storeComment'])->name('jobs.storeComment');
// Route::get('/jobs/{id}/comments', [CommentsController::class, 'show'])->name('comments.show');
Route::post('/comments/{job}', [CommentsController::class, 'store'])->name('comments.store');
// Route to show job details with comments
Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');

// Route to store a comment
Route::post('/jobs/{job}/comments', [CommentsController::class, 'store'])->name('comments.store');
// Route::get('/employer/myjobs/{id}', [EmployerController::class, 'myJobs'])->name('jobs.myjobs')->middleware('auth');

Route::get('/myjobs', [JobController::class, 'showEmployerJobs'])->name('jobs.empjobs');

