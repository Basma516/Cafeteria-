@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container-fluid p-0">
    <div class="position-relative" style="height: 530px;">
        <img class="img-fluid" src="{{ asset('images/phomef.jpg') }}" style="width: 100%; height: 550px;"
            alt="Job Search Image">
        <div class="position-absolute top-0 start-0 w-100 d-flex align-items-center"
            style="background: rgba(43, 57, 64, .5); height: 550px;">
            <div class="container">
                <div class="row justify-content-start">
                    <div class="col-10 col-lg-8   mb-4">
                        <h1 class="display-3 text-white mb-4">Find The Perfect Job That You Deserve</h1>
                        <p class="fs-5 fw-medium text-white mb-4 pb-2">Endless Possibilities, One Career</p>

                        @auth
                        @php
                        $user = auth()->user();
                        $isEmployer = $user->role == 2;
                        $isCandidate = $user->role == 3 && $user->candidate()->exists();
                        @endphp

                        @if($isEmployer)
                        <a href="{{ route('jobs.create') }}" class="btn  py-md-3 px-md-5" style="background: #1f3541">Create a Job</a>
                        @elseif($isCandidate)
                        <a href="{{ route('jobs.index') }}" class="btn  py-md-3 px-md-5 me-3" style="background: #1f3541">View Available
                            Jobs</a>
                        @else
                        <a href="{{ route('candidates.create') }}" class="btn  py-md-3 px-md-5 me-3" style="background: #1f3541">Find a
                            Job</a>
                        <a href="{{ route('employers.create') }}" class="btn  py-md-3 px-md-5" style="background: #1f3541">Post a
                            Job</a>
                        @endif

                        @else
                        <a href="{{ route('login') }}" class="btn  py-md-3 px-md-5 me-3" style="background: #1f3541">Find a Job</a>
                        <a href="{{ route('login') }}" class="btn  py-md-3 px-md-5" style="background: #1f3541">Post a Job</a>
                        @endauth

                    </div>
                    
                        <div class="container " style=" margin-top:120px;width:70%">
                            <form action="{{ route('jobs.search') }}" method="GET">
                                <div class="row g-2">
                                    <div class="col-md-10">
                                        <div class="row g-2">
                                            <div class="col-md-4">
                                                <input type="text" name="keyword" class="form-control border-0" placeholder="Keyword" />
                                            </div>
                                            <div class="col-md-4">
                                                <select name="category" class="form-select border-0">
                                                    <option value="">Category</option>
                                                    @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <select name="location" class="form-select border-0">
                                                    <option value="">Location</option>
                                                    @foreach($locations as $location)
                                                    <option value="{{ $location->location }}">{{ $location->location }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-dark border-0 w-100">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    
                
                </div>
            </div>
        </div>
    </div>
    <!-- Search Start -->
   
</div>
<!-- Static Image Section End -->



<div class="container-xxl py-5">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp">Explore By Category</h1>
        <div class="row g-4">
            @foreach($categories as $index => $category)
            <div class="col-lg-3 col-sm-6 wow fadeInUp">
                <a class="cat-item rounded p-4"
                    href="{{ route('jobs.jobbycategory', ['categoryId' => $category->id]) }}">
                    <i class="fa fa-3x fa-mail-bulk text-primary mb-4{{ $category->icon_class }}  "></i>
                    <h6 class="mb-3">{{ $category->name }}</h6>
                    <p class="mb-0">{{ $category->jobs_count }} Categories</p>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Category End -->

<!-- About Start -->
<div class="container-xxl py-5" id="about">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="row g-0 about-bg rounded overflow-hidden">
                    <div class=" text-start">
                        <img class="img-fluid w-100" src="{{asset('images/board.jpg')}}">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="mb-4">We Help To Get The Best Job And Find A Talent</h1>
                <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet
                    diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna
                    dolore erat amet</p>
                <p><i class="fa fa-check text-primary me-3"></i>Tempor erat elitr rebum at clita</p>
                <p><i class="fa fa-check text-primary me-3"></i>Aliqu diam amet diam et eos</p>
                <p><i class="fa fa-check text-primary me-3"></i>Clita duo justo magna dolore erat amet</p>
                <a class="btn btn-primary py-3 px-5 mt-3" href="">Read More</a>
            </div>
        </div>
    </div>
</div>

<!-- Jobs Start -->
<div class="container-xxl py-5">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>
        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    @foreach ($jobs as $job)
                    <div class="job-item p-4 mb-4">
                        <div class="row g-4">
                            <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                <img class="flex-shrink-0 img-fluid border rounded"
                                    src="{{ asset('images/' . $job->logo) }}" alt="" style="width: 80px; height: 80px;">
                                <div class="text-start ps-4">
                                    <h5 class="mb-3">{{ $job->title }}</h5>
                                    <span class="text-truncate me-3">
                                        <i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $job->location }}
                                    </span>
                                    <span class="text-truncate me-3">
                                        <i class="far fa-clock text-primary me-2"></i>{{ $job->job_type }}
                                    </span>
                                    <span class="text-truncate me-0">
                                        <i class="far fa-money-bill-alt text-primary me-2"></i>{{ $job->salary }}
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 d-flex align-items-center justify-content-end">
                                @auth
                                    @if(auth()->user()->role == 3)
                                        <a href="{{ route('jobs.show', $job->id) }}" class="btn btn-outline-primary">View Details</a>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <a href="{{ route('jobs.index') }}" class="btn btn-primary py-md-3 px-md-5">View More</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Jobs End -->





<!-- Testimonial Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <h1 class="text-center mb-5">Our Clients Say!!!</h1>
        <div class="owl-carousel testimonial-carousel">
            <div class="testimonial-item bg-light rounded p-4">
                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore
                    diam</p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-1.jpg"
                        style="width: 50px; height: 50px;">
                    <div class="ps-3">
                        <h5 class="mb-1">Client Name</h5>
                        <small>Profession</small>
                    </div>
                </div>
            </div>
            <div class="testimonial-item bg-light rounded p-4">
                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore
                    diam</p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-2.jpg"
                        style="width: 50px; height: 50px;">
                    <div class="ps-3">
                        <h5 class="mb-1">Client Name</h5>
                        <small>Profession</small>
                    </div>
                </div>
            </div>
            <div class="testimonial-item bg-light rounded p-4">
                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore
                    diam</p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-3.jpg"
                        style="width: 50px; height: 50px;">
                    <div class="ps-3">
                        <h5 class="mb-1">Client Name</h5>
                        <small>Profession</small>
                    </div>
                </div>
            </div>
            <div class="testimonial-item bg-light rounded p-4">
                <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore
                    diam</p>
                <div class="d-flex align-items-center">
                    <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-4.jpg"
                        style="width: 50px; height: 50px;">
                    <div class="ps-3">
                        <h5 class="mb-1">Client Name</h5>
                        <small>Profession</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->


<!-- Footer Start -->
<div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-4">Company</h5>
                <a class="btn btn-link text-white-50" href="">About Us</a>
                <a class="btn btn-link text-white-50" href="">Contact Us</a>
                <a class="btn btn-link text-white-50" href="">Our Services</a>
                <a class="btn btn-link text-white-50" href="">Privacy Policy</a>
                <a class="btn btn-link text-white-50" href="">Terms & Condition</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-4">Quick Links</h5>
                <a class="btn btn-link text-white-50" href="">About Us</a>
                <a class="btn btn-link text-white-50" href="">Contact Us</a>
                <a class="btn btn-link text-white-50" href="">Our Services</a>
                <a class="btn btn-link text-white-50" href="">Privacy Policy</a>
                <a class="btn btn-link text-white-50" href="">Terms & Condition</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-4">Contact</h5>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-4">Newsletter</h5>
                <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">

                <div class="col-md-6 text-center text-md-end">
                    <div class="footer-menu">
                        <a href="">Home</a>
                        <a href="">Cookies</a>
                        <a href="">Help</a>
                        <a href="">FQAs</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

@endsection