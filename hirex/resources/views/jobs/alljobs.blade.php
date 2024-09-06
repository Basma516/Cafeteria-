@extends('layouts.app')

@section('content')
<div class="site-section py-5">
    <div class="container">
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <div class="row mb-4">
            <div class="col-lg-12">
                <form action="{{ route('jobs.index') }}" method="GET">
                    <input type="text" name="search" class="form-control" placeholder="Search for jobs..."
                        value="{{ request('search') }}" style="border-radius: 25px; padding: 10px 20px;">
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mb-5">
                <h2 class="mb-5 h3 text-primary">Recent Jobs</h2>
                <div class="rounded border jobs-wrap">
                    @forelse($jobs as $job)
                    @php
                    $isDeadlinePassed = \Carbon\Carbon::now()->gt(\Carbon\Carbon::parse($job->deadline));
                    $applied = false;
                    $application = null;

                    if (auth()->check() && auth()->user()->candidate) {
                    $applied = \App\Models\Application::where('candidate_id', auth()->user()->candidate->id)
                    ->where('job_id', $job->id)
                    ->exists();

                    if ($applied) {
                    $application = \App\Models\Application::where('candidate_id', auth()->user()->candidate->id)
                    ->where('job_id', $job->id)
                    ->first();
                    }
                    }
                    @endphp

                    <div class="job-item d-block d-md-flex align-items-center border-bottom p-3 mb-3"
                        onclick="window.location.href='{{ route('jobs.show', $job->id) }}'" style="cursor: pointer;">
                        <div class="company-logo text-center text-md-left pl-3">
                            <img src="{{ $job->company_logo ? asset('storage/' . $job->company_logo) : 'https://via.placeholder.com/50' }}"
                                alt="Company Logo" class="img-fluid rounded-circle"
                                style="width: 50px; height: 50px; object-fit: cover;">
                        </div>
                        <div class="job-details h-100 p-3 flex-grow-1">
                            <h3 class="text-dark">{{ $job->title }}</h3>
                            <div class="d-block d-lg-flex">
                                <div class="mr-3"><span class="fas fa-briefcase mr-1"></span> {{ $job->jobType->name }}
                                </div>
                                <div class="mr-3" style="display: {{ $job->location ? 'block' : 'none' }};">
                                    <span class="fas fa-map-marker-alt mr-1"></span>
                                    {{ $job->location ?? 'Location not available' }}
                                </div>
                                <div><span class="mr-1"></span> ${{ $job->salary }}</div>
                                <div class="mr-3"> <span class="mr-3"><strong>Total Applications:</strong> {{
                                        $job->applications_count }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="job-category p-3">
                            @auth
                            @if(auth()->user()->role == 2)
                            <span class="badge " style="background-color:#5289b5 ">{{ $job->status->name }}</span>
                            @endif
                            @endauth
                        </div> -->
                        @auth
                        @if(auth()->user()->role == 3)
                        <div class="job-apply p-3">
                            @if($isDeadlinePassed)
                            <button class="btn btn-secondary" disabled>Apply Now</button>
                            @else
                            @if($applied)
                            <form action="{{ route('applications.destroy', $application->id) }}" method="POST"
                                style="display: inline;"
                                onsubmit="return confirm('Are you sure you want to cancel your application?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-secondary">Cancel Application</button>
                            </form>
                            @else
                            <a href="{{ route('applications.create', ['job' => $job->id]) }}"
                                class="btn btn-primary">Apply Now</a>
                            @endif
                            @endif
                        </div>
                        @endif
                        @endauth

                    </div>
                    @empty
                    <p>No jobs found matching your search criteria.</p>
                    @endforelse
                </div>
            </div>
        </div>
        {{-- <div class="col-md-12 text-center mt-5">
            {{ $jobs->links('pagination::bootstrap-5') }}
        </div> --}}
    </div>
</div>
@endsection