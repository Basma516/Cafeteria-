<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\CommentsController;
use App\Models\User;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ResumeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LinkedInController;
use App\Http\Controllers\Notifi;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\UserProfileController;








use Laravel\Socialite\Facades\Socialite;

use App\Http\Controllers\JobCategoryController;
use App\Models\Candidate;
use App\Models\Resume;

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

// Dashboard Routes Start >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>

// main
Route::get('/dashboard',[AdminController::class, 'index']);
Route::get('/dashboard/employer',[AdminController::class, 'employers'])->name('employer');
Route::get('/dashboard/candidate',[AdminController::class, 'candidates'])->name('candidate');
Route::get('/dashboard/category',[AdminController::class, 'categories'])->name('category');
Route::get('/dashboard/jobs',[AdminController::class, 'jobs'])->name('jobs');

//edit
Route::get('/dashboard/category/edit/{id}', [AdminController::class, 'editCategory'])->name('category.edit');
Route::put('/dashboard/category/update/{id}', [AdminController::class, 'updateCategory'])->name('category.update');

Route::get('/dashboard/jobs/view/{id}', [AdminController::class, 'viewJob'])->name('job.view');

//delete
Route::delete('/dashboard/employer/{id}', [AdminController::class, 'deleteEmployer'])->name('employer.delete');
Route::delete('/dashboard/candidate/{id}', [AdminController::class, 'deleteCandidate'])->name('candidate.delete');
Route::delete('/dashboard/category/{id}', [AdminController::class, 'deleteCategory'])->name('category.delete');
Route::delete('/dashboard/jobs/{job_id}/comments/{id}', [AdminController::class, 'deleteComment'])->name('comment.delete');
Route::delete('/dashboard/jobs/{id}', [AdminController::class, 'deleteJob'])->name('jobs.delete'); //When Admin Rejects the post

// Post Acceptence
Route::post('/dashboard/jobs/{id}/accept', [AdminController::class, 'acceptJob'])->name('jobs.accept');

// Store Category
Route::get('/dashboard/category/add', [AdminController::class, 'categoryCreate'])->name('categories.create');
Route::post('/dashboard/category/store', [AdminController::class, 'storeCategory'])->name('categories.store');






// End >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>



//  Route::get('/', function () {
//     return view('home');
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

// HEAD
// Define a new route for the home page
//Route::get('/home', [HomeController::class, 'index'])->name('home');


//Route::get('/home', [HomeController::class, 'index'])->name('home');
// d06ca9799142ef88e37eea3ee34312b22a76a57e

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
Route::resource('resumes', ResumeController::class);
Route::get('/category', [JobCategoryController::class, 'index'])->name('category.index');

// web.php
 Route::get('jobs/category/{categoryId}', [JobController::class, 'showByCategory'])->name('jobs.jobbycategory');




// Route::get('/category', [JobCategoryController::class, 'index'])->middleware('auth')->name('category.index');


// Applications Routes
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
// Route::get('/jobs/{id}', [JobController::class, 'show'])->name('jobs.show');


// // Route to show job details with comments
// Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');

// Route to store a comment
Route::post('/jobs/{job}/comments', [CommentsController::class, 'store'])->name('comments.store');
//Route::get('/employer/myjobs/{id}', [EmployerController::class, 'myJobs'])->name('jobs.myjobs');

 Route::get('/myjobs', [JobController::class, 'showEmployerJobs'])->name('jobs.empjobs');

Route::get('/employer/job/{id}/analytics', [JobController::class, 'showAnalytics'])->name('job.analytics');

Route::patch('/applications/{application}', [ApplicationController::class, 'update'])->name('applications.update');
Route::get('/applications/{id}/resume', [ApplicationController::class, 'viewResume'])->name('applications.resume');






///////linkedin connect


// Route::get('auth/linkedin', function () {
//     // return "redirect";
//     return Socialite::driver('linkedin')
//     ->setScopes(['r_liteprofile', 'r_emailaddress'])
//     ->redirect();
// })->name('auth.linkedin');

// Route::get('auth/linkedin/callback', function () {
//     // dd(request()->all());
//     $linkedinUser = Socialite::driver('linkedin')->user();
//     //  dd( $linkedinUser);
// //     // // Store LinkedIn data in the database
//     $user = User::updateOrCreate(
//         ['linkedin_id' => $linkedinUser->id], // Find the user by LinkedIn ID
//         [
//             'name' => $linkedinUser->name,
//             'email' => $linkedinUser->email,
//             'linkedin_token' => $linkedinUser->token,
//             'avatar' => $linkedinUser->avatar,
//         ]
//     );

//     // Log the user in
//     Auth::login($user);

//     // Redirect to the application success page or the next step
//     return redirect('/application/success');
// });






Route::get('auth/linkedin', [LinkedInController::class, 'redirectToLinkedIn'])->name('auth.linkedin');
Route::get('auth/linkedin/callback', [LinkedInController::class, 'handleLinkedInCallback']);



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
        "role"=>3,
        'github_refresh_token' => $githubUser->refreshToken,
    ]);
    Auth::login($user);

    return redirect('/');

    // $user->token
});




Route::get('/search', [JobController::class, 'search'])->name('jobs.search');


// Route::get('/notifications', [Notifi::class, 'index'])->name('notifications.index');

// Route::get('/applications/{id}/resume', [ApplicationController::class, 'viewResume'])->name('applications.resume');

Route::get('/notifications', [Notifi::class, 'index'])->name('notifications.index');

Route::get('/myprofile', function () {
    return view('candidateapplication');
});

Route::view('/about', 'about');
Route::post('/notifications', [Notifi::class, 'index'])->name('notifications.index');





Route::post('/forgot-password', function (Request $request) {
   $request->validate(['email' => 'required|email']);

   $status = Password::sendResetLink(
       $request->only('email')
   );


   return $status === Password::RESET_LINK_SENT
               ? back()->with(['status' => ($status)])
               : back()->withErrors(['email' => ($status)]);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function (string $token) {
   return view('auth.passwords.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');


Route::post('/reset-password', function (Request $request) {
   $request->validate([
       'token' => 'required',
       'email' => 'required|email',
       'password' => 'required|min:8|confirmed',
   ]);

   $status = Password::reset(
       $request->only('email', 'password', 'password_confirmation', 'token'),
       function (User $user, string $password) {
           $user->forceFill([
               'password' => Hash::make($password)
           ])->setRememberToken(Str::random(60));

           $user->save();

           event(new PasswordReset($user));
       }
   );

   return $status === Password::PASSWORD_RESET
               ? redirect()->route('login')->with('status', ($status))
               : back()->withErrors(['email' => [($status)]]);
})->middleware('guest')->name('password.update');



use App\Http\Controllers\FeedbackController;

// Route::get('/feedback', [FeedbackController::class, 'create'])->name('feedback.create');
// Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
Route::middleware('auth')->group(function () {
    Route::get('/feedback', [FeedbackController::class, 'create'])->name('feedback.create');
    Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
});

// Route::get('/empprofile', [EmployerController::class, 'showProfile'])->name('employer.profile')->middleware('auth');
Route::get('/empprofile', [EmployerController::class, 'showProfile'])->name('empprofile.showProfile')->middleware('auth');
Route::get('/aboutus', [HomeController::class, 'aboutus'])->name('aboutus');
/*
Route::get('/profile', function () {
    return view('CandidateProfile');
});*/


// Route::get('/applications/{id}/resume', [ApplicationController::class, 'viewResume'])->name('applications.viewResume');
//     Route::get('/applications/{applicationId}/resume', [ApplicationController::class, 'showResume'])->name('applications.showResume');

Route::get('/applications/{id}/resume', [ApplicationController::class, 'viewResume'])->name('applications.resume');
Route::get('/applications/{id}/resume/candidate', [CandidateController::class, 'viewResume'])->name('candiadates.viewResume');
Route::patch('/applications/{id}/reject', [ApplicationController::class, 'reject'])->name('applications.reject');
// Packages Page
Route::view('/packages/user', 'packages.UserPackages');
Route::view('/packages/Employer', 'packages.EmployerPackages');
// User Profile Route
Route::get('/candidate-profile/{userId}', [UserProfileController::class, 'showCandidateProfile'])->name('profile.candidate');


