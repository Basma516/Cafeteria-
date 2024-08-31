@extends('layouts.app')

@section('content')
<div class="py-4"></div>

<div class="site-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Form action points to 'jobs.store' route -->
                <form action="{{ route('jobs.store') }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header text-white" style="background-color: #5289b5;">
                            <h3>Create a New Job</h3>
                        </div>

                        <div class="card-body">
                            <!-- Display validation errors if any -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Job Title -->
                            <div class="form-group">
                                <label for="title" class="text-primary">Title:</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
                            </div>

                            <!-- Job Description -->
                            <div class="form-group mt-3">
                                <label for="description" class="text-primary">Description:</label>
                                <textarea name="description" id="description" class="form-control" style="height: 120px">{{ old('description') }}</textarea>
                            </div>

                            <!-- Job Requirements -->
                            <div class="form-group mt-3">
                                <label for="requirements" class="text-primary">Requirements:</label>
                                <textarea name="requirements" id="requirements" class="form-control" style="height: 120px">{{ old('requirements') }}</textarea>
                            </div>

                            <!-- Job Location -->
                            <div class="form-group mt-3">
                                <label for="location" class="text-primary">Location:</label>
                                <input type="text" name="location" id="location" class="form-control" value="{{ old('location') }}">
                            </div>

                            <!-- Dynamic Job Category Dropdown -->
                            <div class="form-group mt-3">
                                <label for="category_id" class="text-primary">Category:</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category_id'))
                                    <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                @endif
                            </div>

                            <!-- Job Status -->
                            <div class="form-group mt-3">
                                <label for="job_status" class="text-primary">Job Status:</label>
                                <select name="job_status" id="job_status" class="form-control">
                                    @foreach($statuses as $status)
                                        <option value="{{ $status->id }}" {{ old('job_status') == $status->id ? 'selected' : '' }}>
                                            {{ $status->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('job_status'))
                                    <span class="text-danger">{{ $errors->first('job_status') }}</span>
                                @endif
                            </div>

                            <!-- Job Type -->
                            <div class="form-group mt-3">
                                <label for="job_type" class="text-primary">Job Type:</label>
                                <select name="job_type" id="job_type" class="form-control">
                                    @foreach($types as $type)
                                        <option value="{{ $type->id }}" {{ old('job_type') == $type->id ? 'selected' : '' }}>
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('job_type'))
                                    <span class="text-danger">{{ $errors->first('job_type') }}</span>
                                @endif
                            </div>

                            <!-- Job Responsibilities -->
                            <div class="form-group mt-3">
                                <label for="responsibilities" class="text-primary">Responsibilities:</label>
                                <textarea name="responsibilities" id="responsibilities" class="form-control" style="height: 120px">{{ old('responsibilities') }}</textarea>
                            </div>

                            <!-- Salary -->
                            <div class="form-group mt-3">
                                <label for="salary" class="text-primary">Salary:</label>
                                <input type="number" name="salary" id="salary" class="form-control" value="{{ old('salary') }}" step="0.01">
                                @if ($errors->has('salary'))
                                    <span class="text-danger">{{ $errors->first('salary') }}</span>
                                @endif
                            </div>

                            <!-- Job Benefits -->
                            <div class="form-group mt-3">
                                <label for="benefits" class="text-primary">Benefits:</label>
                                <textarea name="benefits" id="benefits" class="form-control" style="height: 120px">{{ old('benefits') }}</textarea>
                                @if ($errors->has('benefits'))
                                    <span class="text-danger">{{ $errors->first('benefits') }}</span>
                                @endif
                            </div>

                            <!-- Application Deadline -->
                            <div class="form-group mt-3">
                                <label for="deadline" class="text-primary">Application Deadline:</label>
                                <input type="date" name="deadline" id="deadline" class="form-control" value="{{ old('deadline') }}">
                                @if ($errors->has('deadline'))
                                    <span class="text-danger">{{ $errors->first('deadline') }}</span>
                                @endif
                            </div>

                            <!-- Post Job Button -->
                            <div class="form-group mt-3">
                                <button class="btn btn-dark" type="submit" style="background-color: #5289b5; border-color: #5289b5;">Post Job</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
