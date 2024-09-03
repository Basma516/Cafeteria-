@extends('layouts.app')

@section('content')
<div class="site-section py-5">
    <div class="container">
        <div class="row mb-4">
            <div class="col-lg-12">
                <h2 class="mb-5 h3 text-primary">{{ $job->title }}</h2>
                <a href="{{ route('job.analytics', $job->id) }}" class="btn btn-primary">View Analytics</a>

                <div class="job-details">
                    <div class="d-block d-md-flex align-items-center mb-4">
                        <div class="company-logo text-center text-md-left pl-3">
                            <img src="{{ $job->company_logo ? asset('storage/' . $job->company_logo) : 'https://via.placeholder.com/100' }}"
                                alt="Company Logo" class="img-fluid rounded-circle"
                                style="width: 100px; height: 100px; object-fit: cover;">
                        </div>
                        <div class="p-4">
                            <!-- Employer Information -->
                            <h3 class="text-dark">{{ $job->employer->company_name }}</h3>
                            <p>{{ $job->employer->company_description }}</p>
                            <p><span class="fas fa-phone mr-1"></span> {{ $job->employer->phone }}</p>
                            <div class="d-block d-lg-flex">
                                <div class="mr-3"><span class="fas fa-briefcase mr-1"></span> {{ $job->jobType->name }}</div>
                                <div class="mr-3"><span class="fas fa-map-marker-alt mr-1"></span> {{ $job->location }}</div>
                                <div><span class="fas fa-dollar-sign mr-1"></span> ${{ $job->salary }}</div>
                            </div>
                        </div>
                    </div>
                    <h4>Description:</h4>
                    <p>{{ $job->description }}</p>
                    <h4>Requirements:</h4>
                    <ul>
                        @foreach(explode("\n", $job->requirements) as $requirement)
                            <li>{{ $requirement }}</li>
                        @endforeach
                    </ul>
                    <h4>Responsibilities:</h4>
                    <ul>
                        @foreach(explode("\n", $job->responsibilities) as $responsibility)
                            <li>{{ $responsibility }}</li>
                        @endforeach
                    </ul>
                    <h4>Benefits:</h4>
                    <p>{{ $job->benefits }}</p>
                    <h4>Application Deadline:</h4>
                    <p>{{ $job->deadline }}</p>

                    @auth
                    @if(auth()->user()->role == 3)
                    <div class="job-apply p-3">
                        <a href="{{ route('applications.create', ['job' => $job->id]) }}" class="btn btn-primary">Apply Now</a>

                    </div>
                    @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
