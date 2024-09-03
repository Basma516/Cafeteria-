@extends('layouts.app')

@section('content')

<div class="site-section">
    <div class="container">
        <div class="row">
            @foreach($jobs as $job)
                <div class="col-md-12 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <!-- Make the job title clickable -->
                            <h2 class="card-title h4">
                                <a href="{{ route('jobs.show', $job->id) }}" class="text-dark">{{ $job->title }}</a>
                            </h2>
                            <p class="card-text"><strong>Location:</strong> {{ $job->location }}</p>
                            <p class="card-text"><strong>Posted:</strong> {{ $job->created_at->diffForHumans() }}</p>
                            <p class="card-text"><strong>Last Date to Apply:</strong> {{ $job->deadline }}</p>
                            <p class="card-text"><strong>Status:</strong> {{ $job->status->name }}</p>
                            <p class="card-text"><strong>Employment Type:</strong> {{ $job->jobType->name }}</p>
                            <a href="{{ route('jobs.show', $job->id) }}" class="btn btn-primary">View Job</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
