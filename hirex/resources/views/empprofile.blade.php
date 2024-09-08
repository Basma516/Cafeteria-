@extends('layouts.app')

@section('content')
<style>
  
    .profile-card {
        background-color: #ffffff;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.1);
        text-align: center;
        margin-top: 30px;
        max-width: 350px;
        margin-left: auto;
        margin-right: auto;
    }

    
    .profile-card img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 20px;
        border: 3px solid #007bff;
    }

   
    .profile-card h3 {
        font-size: 1.6rem;
        font-weight: 700;
        color: #333;
        margin: 10px 0;
    }

   
    .profile-card p {
        color: #555;
        font-size: 1.1rem;
        margin-bottom: 20px;
    }

    
    .profile-card .btn {
        background-color: #007bff;
        color: white;
        padding: 12px 25px;
        border-radius: 25px;
        text-transform: uppercase;
        font-weight: 700;
        letter-spacing: 1px;
        margin-top: 15px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .profile-card .btn:hover {
        background-color: #0056b3;
        color: white;
    }

  
    .profile-details-card {
        background-color: #f9f9f9;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.1);
    }

    .profile-details-card h3 {
        font-size: 1.8rem;
        font-weight: 700;
        color: #333;
        margin-bottom: 15px;
    }

    .profile-details-card p {
        color: #666;
        font-size: 1rem;
        line-height: 1.6;
    }
</style>

<div class="container mt-2">
    <div class="row">
      
        <div class="col-md-4">
            <div class="profile-card text-center">
                <img src="{{ $user->image ? asset('storage/' . $user->image) : 'https://via.placeholder.com/120' }}"
                     alt="{{ $user->name }}">
                <h3>{{ $user->name }}</h3>
                <p>{{ $user->job_title ?? 'Job Title Not Provided' }}</p>
                <a href="{{ url('/myjobs') }}" class="btn btn-primary">My Jobs</a>
            </div>
        </div>

  
        <div class="col-md-8">
            <div class="profile-details-card p-4">
                <h3>Employer Profile</h3>
                <p>{{ $employer->description ?? 'No description provided' }}</p>

               
                <div class="mb-4">
                    <h5>Skills</h5>
                    <p>{{ $employer->skills ?? 'No skills provided' }}</p>
                </div>

               
                <div class="mb-4">
                    <h5>Experience</h5>
                    <p>{{ $employer->experience ?? 'No experience provided' }}</p>
                </div>

                
                <div class="mb-4">
                    <h5>Contact Info</h5>
                    <p>{{ $user->email }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
