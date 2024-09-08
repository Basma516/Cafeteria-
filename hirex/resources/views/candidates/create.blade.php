@extends('layouts.app')
@section('title', 'Create Candidate Profile')
@section('content')
<div class="container">
    <h1>Create Candidate Profile</h1>
    <form action="{{ route('candidates.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        
        <div class="mb-3">
            <label class="form-label">Skills</label>
            @php
             
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

        <div class="form-group">
            <label for="edu"> Education</label>
            <input class="form-control" type="text" name="education" id="edu">
        </div>

        <div class="form-group">
            <label for="exp"> Experience</label>
            <input class="form-control" type="text" name="experience" id="exp">
        </div>

            <div class="form-group">
                <label for="resume">Upload Resume</label>
                <input type="file" name="resume" id="resume" class="form-control">
                @error('resume')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>


</div>
@endsection