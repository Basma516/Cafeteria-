<header>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
            <h1 class="m-0 primary-text">HireX</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ url('/') }}" class="nav-item nav-link active dark-text">Home</a>
                <a href="{{ url('/about') }}" class="nav-item nav-link dark-text">About</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle dark-text" data-bs-toggle="dropdown">Jobs</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="{{ url('/jobs') }}" class="dropdown-item">Job List</a>
                        <a href="{{ url('/job-detail') }}" class="dropdown-item">Job Detail</a>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle dark-text" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="{{ url('/category') }}" class="dropdown-item">Job Category</a>
                        <a href="{{ url('/testimonial') }}" class="dropdown-item">Testimonial</a>
                        <a href="{{ url('/404') }}" class="dropdown-item">404</a>
                    </div>
                </div>
                <a href="{{ url('/contact') }}" class="nav-item nav-link dark-text">Contact</a>
            </div>
            <a href="{{ url('/post-job') }}" class="btn btn-primary primary-bg rounded-0 py-4 px-lg-5 d-none d-lg-block">Post A Job<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->
</header>

<style>
    .primary-bg { background-color: #5289b5; }
    .secondary-bg { background-color: #afd8f2; }
    .light-bg { background-color: #edf2f3; }
    .dark-text { color: #1f3541; }
    .primary-text { color: #5289b5; }
</style>
