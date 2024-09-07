{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h1>View Resume</h1>
<<<<<<< HEAD
    <iframe src="{{ asset('storage/' . $resumePath) }}" style="width: 100%; height: 800px;" frameborder="0"></iframe>
   </div>
@endsection
=======

    <!-- Search Form -->
    <form method="GET" action="{{ route('applications.viewResume', $application->id) }}">
        <input type="text" name="query" placeholder="Search in resume" value="{{ request('query') }}">
        <button type="submit">Search</button>
    </form>

    <!-- Display PDF in an iframe -->
    <h3>Resume Document</h3>
    <iframe src="{{ $resumePath }}" width="100%" height="600px"></iframe>

    <!-- Display the extracted text (for search) -->
    <h3>Search Results</h3>
    <div class="resume-content" style="white-space: pre-wrap;">
        {!! $resumeText !!}
    </div>
</div>
@endsection --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>View Resume</h1>
    <iframe src="{{ asset('storage/' . $resumePath) }}" style="width: 100%; height: 800px;" frameborder="0"></iframe>
   </div>
@endsection
>>>>>>> origin
