@extends('layouts.app')

@section('content')
<div class="py-4"></div>

<div class="site-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('jobs.store') }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header text-white" style="background-color: #5289b5;">
                            <h3>Create a New Job</h3>
                        </div>
        
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title" class="text-primary">Title:</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
                            </div>

                        
                            <div class="form-group mt-3">
                                <label for="position" class="text-primary">Position:</label>
                                <input type="text" name="position" id="position" class="form-control" value="{{ old('position') }}">
                            </div>

                          
                            <div class="form-group mt-3">
                                <label for="experience" class="text-primary">Years of Experience:</label>
                                <input type="text" name="experience" id="experience" class="form-control" value="{{ old('experience') }}">
                            </div>
        
                           
                            <div class="form-group mt-3">
                                <label for="type" class="text-primary">Job Type:</label>
                                <select name="type" id="type" class="form-control">
                                    <option value="fulltime" {{ old('type') == 'fulltime' ? 'selected' : '' }}>Full-time</option>
                                    <option value="parttime" {{ old('type') == 'parttime' ? 'selected' : '' }}>Part-time</option>
                                    <option value="remote" {{ old('type') == 'remote' ? 'selected' : '' }}>Remote</option>
                                </select>
                            </div>

                          
                            <div class="form-group mt-3">
                                <label for="category" class="text-primary">Category:</label>
                                <select name="category" id="category" class="form-control">
                                    <option value="1" {{ old('category') == '1' ? 'selected' : '' }}>Category 1</option>
                                    <option value="2" {{ old('category') == '2' ? 'selected' : '' }}>Category 2</option>
                                    <option value="3" {{ old('category') == '3' ? 'selected' : '' }}>Category 3</option>
                                </select>
                            </div>

                         
                            <div class="form-group mt-3">
                                <label for="address" class="text-primary">Address:</label>
                                <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}">
                            </div>
        
                      
                            <div class="form-group mt-3">
                                <label for="roles" class="text-primary">Role:</label>
                                <textarea name="roles" id="roles" class="form-control" style="height: 80px">{{ old('roles') }}</textarea>
                            </div>

                           
                            <div class="form-group mt-3">
                                <label for="description" class="text-primary">Description:</label>
                                <textarea name="description" id="description" class="form-control" style="height: 120px">{{ old('description') }}</textarea>
                            </div>

                     
                            <div class="form-group mt-3">
                                <label for="number_of_vacancy" class="text-primary">No. of Vacancies:</label>
                                <input type="text" name="number_of_vacancy" id="number_of_vacancy" class="form-control" value="{{ old('number_of_vacancy') }}">
                            </div>

                         
                            <div class="form-group mt-3">
                                <label for="gender" class="text-primary">Gender:</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="any" {{ old('gender') == 'any' ? 'selected' : '' }}>Any</option>
                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>
                
                            
                            <div class="form-group mt-3">
                                <label for="salary" class="text-primary">Salary/Year:</label>
                                <select name="salary" id="salary" class="form-control">
                                    <option value="negotiable" {{ old('salary') == 'negotiable' ? 'selected' : '' }}>Negotiable</option>
                                    <option value="2000-5000" {{ old('salary') == '2000-5000' ? 'selected' : '' }}>2000-5000</option>
                                    <option value="5000-10000" {{ old('salary') == '5000-10000' ? 'selected' : '' }}>5000-10000</option>
                                    <option value="10000-20000" {{ old('salary') == '10000-20000' ? 'selected' : '' }}>10000-20000</option>
                                    <option value="50000-500000" {{ old('salary') == '50000-500000' ? 'selected' : '' }}>50000-500000</option>
                                    <option value="500000-600000" {{ old('salary') == '500000-600000' ? 'selected' : '' }}>500000-600000</option>
                                    <option value="600000 plus" {{ old('salary') == '600000 plus' ? 'selected' : '' }}>600000 plus</option>
                                </select>
                            </div>
                
                          
                            <div class="form-group mt-3">
                                <label for="status" class="text-primary">Status:</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Live</option>
                                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Draft</option>
                                </select>
                            </div>

                           
                            <div class="form-group mt-3">
                                <label for="last_date" class="text-primary">Job Apply Last Date:</label>
                                <input type="date" name="last_date" id="last_date" class="form-control" value="{{ old('last_date') }}">
                            </div>
                            
                          
                            <div class="form-group mt-3">
        <button class="btn btn-dark" type="submit" style="background-color: #5289b5; border-color: #5289b5;">Post Job</button> </div>

                         
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
