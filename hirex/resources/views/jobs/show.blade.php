@extends('layouts.app')

@section('content')
<div class="unit-5 overlay" style="background-image: url('{{ asset('external/images/hero_2.jpg') }}');">
  <div class="container text-center">
    <h1 class="mb-0 text-white" style="font-size: 1.5rem;">Vel quo asperiores quisquam.</h1>
    <p class="mb-0 unit-6 text-white"><a href="/" class="text-white">Home</a> <span class="sep"> > <a href="#" class="text-white">Jobs</a> </span> <span><span class="sep m-0"> ></span> Job details</span></p>
  </div>
</div>

<div class="site-section bg-light">
  <div class="container">
    <div class="row">

      <div class="col-md-12 col-lg-8 mb-5">
        <div class="job-details">
          <h2 class="text-black h4">Continuous Mining Machine Operator</h2>
          <div class="d-flex align-items-center mb-4">
            <a href="#" class="badge-fulltime">Fulltime</a>
            <a href="#" class="ml-3"><i class="fas fa-envelope fa-icon"></i></a>
          </div>
          <p><strong>Office address:</strong> 4423 Macejkovic Wells Apt. 777 North Euna, OH 72668</p>
          <div class="mb-4">
            <h3 class="h5 text-black mb-3"><i class="fas fa-book fa-icon"></i>Description</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eget suscipit erat, nec pellentesque elit.</p>
          </div>
          <div class="mb-4">
            <h3 class="h5 text-black mb-3"><i class="fas fa-user fa-icon"></i>Roles and Responsibilities</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eget suscipit erat, nec pellentesque elit.</p>
          </div>
          <div class="mb-4">
            <h3 class="h5 text-black mb-3"><i class="fas fa-users fa-icon"></i>Number of Vacancy</h3>
            <p>3</p>
          </div>
          <div class="mb-4">
            <h3 class="h5 text-black mb-3"><i class="fas fa-clock fa-icon"></i>Experience</h3>
            <p>3 years</p>
          </div>
          <div class="mb-4">
            <h3 class="h5 text-black mb-3"><i class="fas fa-venus-mars fa-icon"></i>Gender</h3>
            <p>Female</p>
          </div>
          <div class="mb-4">
            <h3 class="h5 text-black mb-3"><i class="fas fa-dollar-sign fa-icon"></i>Salary</h3>
            <p>$17,678</p>
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="short-job-info">
          <h3 class="h5 text-black mb-3">Short Job Info</h3>
          <p><strong>Company name:</strong> Block, Schneider and Crona</p>
          <p><strong>Address:</strong> 4423 Macejkovic Wells Apt. 777 North Euna, OH 72668</p>
          <p><strong>Employment Type:</strong> Fulltime</p>
          <p><strong>Position:</strong> Continuous Mining Machine Operator</p>
          <p><strong>Posted:</strong> 1 hour ago</p>
          <p><strong>Last date to apply:</strong> June 02, 2016</p>
          <a href="#" class="btn btn-visit">Visit Company Page</a>
          <button class="btn btn-dark mt-3 w-100">For apply need to Register/Login.</button>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection