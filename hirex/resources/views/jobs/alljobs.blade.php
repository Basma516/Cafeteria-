@extends('layouts.app')


@section('content')
<div class="unit-5 overlay" style="background-image: url('your-image-url-here');">
  <div class="container text-center">
    <h1 class="mb-0 text-white" style="font-size: 2.5rem;">All Jobs</h1>
    <p class="mb-0 unit-6 text-white">
      <a href="/" class="text-white">Home</a> 
      <span class="sep"> > </span> 
      <a href="#" class="text-white">Jobs</a> 
      <span class="sep"> > </span> Jobs
    </p>
  </div>
</div>

<div class="site-section bg-light">
    <div class="container">
        <div class="row mb-3">
            <div class="col-lg-12">
         
                <input type="text" class="form-control" placeholder="Search for jobs...">
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 mb-5">
                <h2 class="mb-5 h3">Recent Jobs</h2>
                <div class="rounded border jobs-wrap">
                 
                    <a href="#" class="job-item d-block d-md-flex align-items-center border-bottom fulltime">
                        <div class="company-logo text-center text-md-left pl-3">
                            <img src="https://via.placeholder.com/50" alt="Image" class="img-fluid mx-auto">
                        </div>
                        <div class="job-details h-100 p-3">
                            <h3>Job Title Example</h3>
                            <div class="d-block d-lg-flex">
                                <div class="mr-3"><span class="fas fa-briefcase mr-1"></span> Position</div>
                                <div class="mr-3"><span class="fas fa-map-marker-alt mr-1"></span> Address</div>
                                <div><span class="fas fa-dollar-sign mr-1"></span> $Salary</div>
                            </div>
                        </div>
                        <div class="job-category p-3">
                            <span class="border text-info border-info">Fulltime</span>
                        </div>
                    </a>

                </div>

                <div class="col-md-12 text-center mt-5">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection