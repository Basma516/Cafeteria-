@extends('layouts.app')

@section('title', 'Create Candidate Profile')

@section('content')
<div class="container">
    <h1>Create Candidate Profile</h1>
    <form action="{{ route('candidates.store') }}" method="POST">
        @csrf
        
        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Skills Checkboxes -->
        <div class="mb-3">
            <label class="form-label">Skills</label>
            @php
                // Example skills array; replace with your actual skills
                $availableSkills = ['PHP', 'JavaScript', 'HTML', 'CSS', 'Laravel', 'Angular'];
            @endphp
            @foreach ($availableSkills as $skill)
                <div class="form-check">
                    <input type="checkbox" class="form-check-input @error('skills.*') is-invalid @enderror" id="skill_{{ $skill }}" name="skills[]" value="{{ $skill }}">
                    <label class="form-check-label" for="skill_{{ $skill }}">{{ $skill }}</label>
                    @error('skills.*')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            @endforeach
        </div>

        <!-- Resume Textarea -->
        <div class="mb-3">
            <label for="resume" class="form-label">Resume</label>
            <textarea id="resume" name="resume" class="form-control @error('resume') is-invalid @enderror" rows="3" required>{{ old('resume') }}</textarea>
            @error('resume')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection