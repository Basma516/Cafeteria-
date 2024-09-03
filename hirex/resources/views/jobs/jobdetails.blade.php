@extends('layouts.app')

@section('content')
<div class="site-section py-5">
    <div class="container">
        <!-- Display success and error messages -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

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

                    <!-- Display Comments Section -->
                    <h4>Comments:</h4>
                    @forelse($job->comments as $comment)
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ $comment->user->name }}</h5>
                                <p class="card-text">{{ $comment->comment }}</p>
                                <p class="card-text"><small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small></p>
                            </div>
                        </div>
                    @empty
                        <p>No comments yet. Be the first to comment!</p>
                    @endforelse

                    <!-- Add Comment Form -->
                    @auth
<<<<<<< HEAD
                    @if(auth()->user()->role == 3)
                    <div class="job-apply p-3">
                        <a href="{{ route('applications.create', ['job' => $job->id]) }}" class="btn btn-primary">Apply Now</a>

                    </div>
                    @endif
=======
                    <form action="{{ route('comments.store', $job->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="comment">Add a comment:</label>
                            <textarea class="form-control @error('comment') is-invalid @enderror" id="comment" name="comment" rows="3" required>{{ old('comment') }}</textarea>
                            @error('comment')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    </form>
                    @else
                    <p><a href="{{ route('login') }}">Log in</a> to post a comment.</p>
>>>>>>> 9da4daac33766e4c9150843fd6231f36ba176559
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
