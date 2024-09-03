@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Analytics for Job: {{ $job->title }}</h1>
    <p><strong>Total Applications:</strong> {{ $applicationCount }}</p>

    <h3>Applications:</h3>
    <ul>
    @foreach($job->applications as $application)
        <li>
            <strong>Candidate:</strong> {{ $application->candidate->user->name ?? 'Unknown' }} - 
            <strong>Applied On:</strong> {{ $application->created_at->format('d M Y') }}
        </li>
    @endforeach
</ul>



</div>
@endsection
