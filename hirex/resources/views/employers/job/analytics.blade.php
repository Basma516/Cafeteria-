@extends('layouts.app')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container analytics-container">
    <h1 class="analytics-heading">Analytics for Job: {{ $job->title }}</h1>
    <p class="analytics-application-count"><strong>Total Applications:</strong> {{ $applicationCount }}</p>

    <h3 class="analytics-subheading">Applications:</h3>
    <ul class="analytics-application-list">
    @foreach($job->applications as $application)
        <li class="analytics-application-item">
            <div class="analytics-item-info">
                <strong>Candidate:</strong> {{ $application->candidate->user->name ?? 'Unknown' }} -
                <strong>Applied On:</strong> {{ $application->created_at->format('d M Y') }}
                <br>
                <strong>Status:</strong> {{ $application->status_id == 2 ? 'Pending' : ($application->status_id == 3 ? 'Rejected' : 'Accepted') }}
            </div>
            <div class="analytics-item-buttons">
               
                <a href="{{ route('applications.resume', $application->id) }}" class="btn analytics-btn-resume">View Resume</a>
                @if($application->status_id == 2 )            
                <form action="{{ route('applications.update', $application->id) }}" method="POST" class="analytics-inline-form">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="status" value="4"> 
                    <button type="submit" class="btn analytics-btn-accept">Accept</button>
                </form>
                <!-- Reject Button -->
                <form action="{{ route('applications.reject', $application->id) }}" method="POST" class="analytics-inline-form">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="status" value="4"> 
                    <button type="submit" class="btn analytics-btn-reject">Reject</button>
                </form>
                @endif
            </div>
        </li>
    @endforeach
    </ul>
</div>
@endsection
