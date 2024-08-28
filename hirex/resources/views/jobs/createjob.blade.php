@extends('layouts.app')

@section('content')
<div class="py-4"></div>

<div class="site-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form>
                    @csrf
                    <div class="card">
                        <div class="card-header text-white" style="background-color: #5289b5;">
                            <h3>Create a New Job</h3>
                        </div>
        
                        <div class="card-body">
                            <!-- Job Title -->
                            <div class="form-group">
                                <label for="title" class="text-primary">Title:</label>
                                <input type="text" name="title" id="title" class="form-control">
                            </div>

                            <!-- Job Position -->
                            <div class="form-group mt-3">
                                <label for="position" class="text-primary">Position:</label>
                                <input type="text" name="position" id="position" class="form-control">
                            </div>

                            <!-- Years of Experience -->
                            <div class="form-group mt-3">
                                <label for="experience" class="text-primary">Years of Experience:</label>
                                <input type="text" name="experience" id="experience" class="form-control">
                            </div>
        
                            <!-- Job Type -->
                            <div class="form-group mt-3">
                                <label for="type" class="text-primary">Job Type:</label>
                                <select name="type" id="type" class="form-control">
                                    <option value="fulltime">Full-time</option>
                                    <option value="partime">Part-time</option>
                                    <option value="remote">Remote</option>
                                </select>
                            </div>

                            <!-- Job Category -->
                            <div class="form-group mt-3">
                                <label for="category" class="text-primary">Category:</label>
                                <select name="category" id="category" class="form-control">
                                    <option value="1">Category 1</option>
                                    <option value="2">Category 2</option>
                                    <option value="3">Category 3</option>
                                </select>
                            </div>

                            <!-- Address -->
                            <div class="form-group mt-3">
                                <label for="address" class="text-primary">Address:</label>
                                <input type="text" name="address" id="address" class="form-control">
                            </div>
        
                            <!-- Job Role -->
                            <div class="form-group mt-3">
                                <label for="roles" class="text-primary">Role:</label>
                                <textarea name="roles" id="roles" class="form-control" style="height: 80px"></textarea>
                            </div>

                            <!-- Job Description -->
                            <div class="form-group mt-3">
                                <label for="description" class="text-primary">Description:</label>
                                <textarea name="description" id="description" class="form-control" style="height: 120px"></textarea>
                            </div>

                            <!-- Number of Vacancies -->
                            <div class="form-group mt-3">
                                <label for="number_of_vacancy" class="text-primary">No. of Vacancies:</label>
                                <input type="text" name="number_of_vacancy" id="number_of_vacancy" class="form-control">
                            </div>

                            <!-- Gender Preference -->
                            <div class="form-group mt-3">
                                <label for="gender" class="text-primary">Gender:</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="any">Any</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                
                            <!-- Salary Range -->
                            <div class="form-group mt-3">
                                <label for="salary" class="text-primary">Salary/Year:</label>
                                <select name="salary" id="salary" class="form-control">
                                    <option value="negotiable">Negotiable</option>
                                    <option value="2000-5000">2000-5000</option>
                                    <option value="50000-10000">5000-10000</option>
                                    <option value="10000-20000">10000-20000</option>
                                    <option value="30000-500000">50000-500000</option>
                                    <option value="500000-600000">500000-600000</option>
                                    <option value="600000 plus">600000 plus</option>
                                </select>
                            </div>
                
                            <!-- Job Status -->
                            <div class="form-group mt-3">
                                <label for="status" class="text-primary">Status:</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1">Live</option>
                                    <option value="0">Draft</option>
                                </select>
                            </div>

                            <!-- Application Deadline -->
                            <div class="form-group mt-3">
                                <label for="last_date" class="text-primary">Job Apply Last Date:</label>
                                <input type="date" name="last_date" id="last_date" class="form-control">
                            </div>
                            
                            <!-- Submit Button -->
                            <div class="form-group mt-3">
                                <button class="btn btn-dark" type="submit" style="background-color: #5289b5; border-color: #5289b5;">Post Job</button>
                            </div>

                            <!-- Success Message -->
                            @if (Session::has('message'))
                                <div class="alert alert-success mt-3 alert-dismissible fade show" role="alert">
                                    <strong>Success!</strong> {{ Session::get('message') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
