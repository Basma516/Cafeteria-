<!-- resources/views/employers/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: #2B9BFF; color: white;">Find a Talent</div>

                <div class="card-body" style="background-color: #EFFDF5;">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('employers.store') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="company_name">Company Name</label>
                            <input type="text" class="form-control" id="company_name" name="company_name" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="company_description">Company Description</label>
                            <textarea class="form-control" id="company_description" name="company_description"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="company_website">Company Website</label>
                            <input type="url" class="form-control" id="company_website" name="company_website">
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone">Phone</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required>
                        </div>
                        <button type="submit" class="btn" style="background-color: #2B9BFF; color: white;">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection