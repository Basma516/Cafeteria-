@extends('layouts.app')

@section('content')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container">
    <h1>Analytics for Job: {{ $job->title }}</h1>
    <p><strong>Total Applications:</strong> {{ $applicationCount }}</p>

    <h3>Applications:</h3>
    <ul>
    @foreach($job->applications as $application)
        <li>
            <strong>Candidate:</strong> {{ $application->candidate->user->name ?? 'Unknown' }} - 
            <strong>Applied On:</strong> {{ $application->created_at->format('d M Y') }}
            
            <!-- Display Resume -->
            <a href="{{ route('applications.resume', $application->id) }}" class="btn btn-info">View Resume</a>

            <!-- Accept Button -->
            <form action="{{ route('applications.update', $application->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('PATCH')
                <input type="hidden" name="status" value="2"> <!-- 2 is the ID for 'accepted' -->
                <button type="submit" class="btn btn-success btn-sm">Accept</button>
            </form>

            <!-- Reject Button (Delete Application) -->
            <form action="{{ route('applications.destroy', $application->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Reject</button>
            </form>

            <!-- Display Current Status -->
            <br><strong>Status:</strong> {{ $application->status == 2 ? 'Accepted' : ($application->status == 3 ? 'Rejected' : 'Pending') }}
        </li>
    @endforeach
    </ul>
</div>
@endsection
