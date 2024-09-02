@extends('layouts.app')

@section('content')
<div class="site-section py-5">
    <div class="container">
        <div class="row mb-4">
            <div class="col-lg-12">
                <input type="text" class="form-control" placeholder="Search for jobs..."
                    style="border-radius: 25px; padding: 10px 20px;">
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mb-5">
                <h2 class="mb-5 h3 text-primary">Recent Jobs</h2>
                <div class="rounded border jobs-wrap">
                    @foreach($jobs as $job)
                    <div class="job-item d-block d-md-flex align-items-center border-bottom p-3 mb-3" 
                         onclick="window.location.href='{{ route('jobs.show', $job->id) }}'"
                         style="cursor: pointer;">
                        <div class="company-logo text-center text-md-left pl-3">
                            <img src="{{ $job->company_logo ? asset('storage/' . $job->company_logo) : 'https://via.placeholder.com/50' }}"
                                alt="Company Logo" class="img-fluid rounded-circle"
                                style="width: 50px; height: 50px; object-fit: cover;">
                        </div>
                        <div class="job-details h-100 p-3 flex-grow-1">
                            <h3 class="text-dark">{{ $job->title }}</h3>
                            <div class="d-block d-lg-flex">
                                <div class="mr-3"><span class="fas fa-briefcase mr-1"></span> {{ $job->jobType->name }}</div>
                                <div class="mr-3"><span class="fas fa-map-marker-alt mr-1"></span> {{ $job->location }}</div>
                                <div><span class=" mr-1"></span> ${{ $job->salary }}</div>
                            </div>
                        </div>
                        <div class="job-category p-3">
                            @auth
                            @if(auth()->user()->role == 2)
                                <span class="badge badge-info">{{ $job->status->name }}</span>
                            @endif
                            @endauth
                        </div>
                        @auth
                        @if(auth()->user()->role == 3)
                        <div class="job-apply p-3">
                            <a href="{{ route('applications.create', ['job' => $job->id]) }}" class="btn btn-primary">Apply Now</a>
                        </div>
                        @endif
                        @endauth
                        
                    </div>
                    @endforeach
                </div>

                <div class="col-md-12 text-center mt-5">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            {{ $jobs->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
