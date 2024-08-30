@extends('layouts.app')

@section('content')
<div class="unit-5 overlay" style="background-image: url('{{ asset('your-image-url-here') }}');">
  <div class="container text-center">
    <h1 class="mb-0 text-white" style="font-size: 2.5rem;">All Jobs</h1>
    <p class="mb-0 unit-6 text-white">
      <a href="/" class="text-white">Home</a> 
      <span class="sep"> > </span> 
      <a href="#" class="text-white">Jobs</a> 
      <span class="sep"> > </span> Jobs
    </p>
  </div>
</div>

<div class="site-section ">
    <div class="container">
        <div class="row mb-3">
            <div class="col-lg-12">
                <form action="{{ route('jobs.index') }}" method="GET">
                    <input type="text" class="form-control" name="search" placeholder="Search for jobs..." value="{{ request()->get('search') }}">
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mb-5">
                <h2 class="mb-5 h3">Recent Jobs</h2>
                <div class="rounded border jobs-wrap">
                    @forelse($jobs as $job)
                        <a href="{{ route('jobs.show', $job) }}" class="job-item d-block d-md-flex align-items-center border-bottom fulltime">
                            <div class="company-logo text-center text-md-left pl-3">
                                @if($job->logo)
                                    <img src="{{ asset('storage/' . $job->logo) }}" alt="Company Logo" class="img-fluid mx-auto">
                                @else
                                    <img src="https://via.placeholder.com/50" alt="Placeholder" class="img-fluid mx-auto">
                                @endif
                            </div>
                            <div class="job-details h-100 p-3">
                                <h3>{{ $job->title }}</h3>
                                <div class="d-block d-lg-flex">
                                    <div class="mr-3"><span class="fas fa-briefcase mr-1"></span> {{ $job->category }}</div>
                                    <div class="mr-3"><span class="fas fa-map-marker-alt mr-1"></span> {{ $job->location }}</div>
                                    <div><span class="fas fa-dollar-sign mr-1"></span> ${{ number_format($job->salary, 2) }}</div>
                                </div>
                            </div>
                            <div class="job-category p-3">
                                <span class="border text-info border-info">{{ ucfirst($job->type) }}</span>
                            </div>
                        </a>
                    @empty
                        <p>No jobs available.</p>
                    @endforelse
                </div>

        
        </div>
    </div>
</div>
@endsection