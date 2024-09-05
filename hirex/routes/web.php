<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\CommentsController;
use App\Models\User;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LinkedInController;

use Laravel\Socialite\Facades\Socialite;

use App\Http\Controllers\JobCategoryController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
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
Route::get('/home', [HomeController::class, 'index'])->name('home');

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
Route::resource('/', HomeController::class);


Route::resource('candidates', CandidateController::class);

Route::get('/category', [JobCategoryController::class, 'index'])->name('category.index');
// Route::get('/category', [JobCategoryController::class, 'index'])->middleware('auth')->name('category.index');


Route::resource('applications', ApplicationController::class)->only(['create', 'store', 'destroy']);
//  Route::get('/employer/jobs', [EmployerController::class, 'myJobs'])->name('jobs.show');





// Route::get('/jobs/comments', [JobController::class, 'indexWithComments'])->name('jobs.indexWithComments');

// Route::get('/jobs/{id}/details', [JobController::class, 'showWithComments'])->name('jobs.showWithComments');
// Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');

// Route::post('/jobs/{job}/comments', [JobController::class, 'storeComment'])->name('jobs.storeComment');

// Route::get('/employer/jobs', [EmployerController::class, 'myJobs'])
//      ->name('employer.jobs.index')
//      ;
Route::resource('jobs', JobController::class)->middleware('auth'); // This provides index, show, create, store, etc.

// Additional route for storing comments if needed
Route::post('/jobs/{job}/comments', [JobController::class, 'storeComment'])->name('jobs.storeComment');
Route::get('/jobs/{id}/comments', [CommentsController::class, 'show'])->name('comments.show');
Route::get('/jobs/{id}', [JobController::class, 'show'])->name('jobs.show');


// Route to show job details with comments
Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');

// Route to store a comment
Route::post('/jobs/{job}/comments', [CommentsController::class, 'store'])->name('comments.store');
Route::get('/employer/myjobs/{id}', [EmployerController::class, 'myJobs'])->name('jobs.myjobs')->middleware('auth');

Route::get('/myjobs', [JobController::class, 'showEmployerJobs'])->name('jobs.empjobs');

Route::get('/employer/job/{id}/analytics', [JobController::class, 'showAnalytics'])->name('job.analytics');
// In routes/web.php
Route::patch('/applications/{application}', [ApplicationController::class, 'update'])->name('applications.update');
// In routes/web.php
// routes/web.php
Route::get('/applications/{id}/resume', [ApplicationController::class, 'viewResume'])->name('applications.resume');






///////linkedin connect 


// Route::get('auth/linkedin', function () {
//     // return "redirect";
//     return Socialite::driver('linkedin')->redirect();
// })->name('apply.linkedin');

// Route::get('auth/linkedin/callback', function () {
//     return "iam in callback";
//     $linkedinUser = Socialite::driver('linkedin')->user();

//     // // Store LinkedIn data in the database
//     // $user = User::updateOrCreate(
//     //     ['linkedin_id' => $linkedinUser->id], // Find the user by LinkedIn ID
//     //     [
//     //         'name' => $linkedinUser->name,
//     //         'email' => $linkedinUser->email,
//     //         'linkedin_token' => $linkedinUser->token,
//     //         'avatar' => $linkedinUser->avatar,
//     //     ]
//     // );

//     // // Log the user in
//     // Auth::login($user);

//     // // Redirect to the application success page or the next step
//     // return redirect('/application/success');
// });






// Route::get('auth/linkedin', [LinkedInController::class, 'redirectToLinkedIn'])->name('auth.linkedin');
// Route::get('auth/linkedin/callback', [LinkedInController::class, 'handleLinkedInCallback']);



////////////////github 




 
Route::get('/auth/redirect', function () {
   
    return Socialite::driver('github')->redirect();
})->name('auth.github');
 
Route::get('/auth/callback', function () {
    // return "call back";
    // $user = Socialite::driver('github')->user();
    // dd($user);

    $githubUser = Socialite::driver('github')->user();
 
    $user = User::updateOrCreate([
        'github_id' => $githubUser->id,
    ], [
        'name' => $githubUser->name,
        'email' => $githubUser->email,
        'github_token' => $githubUser->token,
        "password"=>$githubUser->token,
        "role"=>1,
        'github_refresh_token' => $githubUser->refreshToken,
    ]);
    Auth::login($user);
 
    return redirect('/');

    // $user->token
});

Route::get('jobs/search', [JobController::class, 'search'])->name('jobs.search');
