@extends('layouts.app')

@section('content')

<div class="unit-5 overlay" style="background-image: url('{{ asset('external/images/hero_2.jpg') }}');">
    <div class="container text-center">
        <h1 class="mb-0 text-white" style="font-size: 1.5rem;">Your Job Postings</h1>
        <p class="mb-0 unit-6 text-white">
            <a href="/" class="text-white">Home</a>
            <span class="sep"> > </span>
            My Job Postings
        </p>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            @foreach($jobs as $job)
                <div class="col-md-12 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h2 class="card-title h4">{{ $job->title }}</h2>
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