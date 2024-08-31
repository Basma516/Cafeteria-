<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobController;

use App\Http\Controllers\AdminController;
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

Route::get('/dashboard', function () {
    return view('dashboard.index');
});
Route::get('/dashboard/candidate', function () {
    return view('dashboard.candidate');
})->name('candidate');
Route::get('/dashboard/employer', function () {
    return view('dashboard.employer');
})->name('employer');
Route::get('/dashboard/jobs', function () {
    return view('dashboard.jobs');
})->name('jobs');
Route::get('/dashboard/category', function () {
    return view('dashboard.category');
})->name('category');
Route::get('/dashboard/candidate/edit', function () {
    return view('dashboard.candidate.edit');
})->name('updateCandidate');

Route::get('/dashboard/employer/edit', function () {
    return view('dashboard.employer.edit');
})->name('updateEmployer');

Route::get('/dashboard/category/add', function () {
    return view('dashboard.category.add');
})->name('addCategory');

Route::get('/dashboard/category/edit', function () {
    return view('dashboard.category.edit');
})->name('editCategory');

Route::get('/dashboard/job/view', function () {
    return view('dashboard.jobs.view');
})->name('jobView');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('/profile', 'users.edit_profile')->name('profile');


// Dashboard routes for different user types
Route::get('/employer/dashboard', [EmployerController::class, 'dashboard'])->name('employer.dashboard');
Route::get('/candidate/dashboard', [CandidateController::class, 'dashboard'])->name('candidate.dashboard');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);

 Route::get('/job', function () {
     return view('jobs.show');
 });

 Route::get('/category', function () {
     return view('jobs.jobbycategory'); 
 });



 Route::get('/all-jobs', function () {
    return view('jobs.alljobs'); 
 })->name('alljobs');


// routes/web.php

Route::view('/create-job', 'jobs.createjob');


Route::resource('employers', EmployerController::class);

Route::resource('users', UserController::class);

Route::resource('jobs', JobController::class);

