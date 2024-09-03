<header>
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
            <h1 class="m-0 text-primary">HireX</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{ url('/') }}" class="nav-item nav-link active">Home</a>
                <a href="{{ url('/') }}#about" class="nav-item nav-link">About</a>
                <a href="{{ url('/myjobs') }}" class="nav-item nav-link">myjobs</a>
                <a href="{{ url('/jobs') }}" class="nav-item nav-link">All Jobs</a>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="{{ url('/category') }}" class="dropdown-item">Job Category</a>
                        <a href="{{ url('/testimonial') }}" class="dropdown-item">Testimonial</a>
                        <a href="{{ url('/404') }}" class="dropdown-item">404</a>
                    </div>
                </div>
                <a href="{{ url('/contact') }}" class="nav-item nav-link">Contact</a>
            </div>

            @auth
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="{{ route('home') }}" class="nav-item nav-link">My Account</a>
                   
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">
                            Logout<i class="fa fa-sign-out-alt ms-3"></i>
                        </button>
                    </form>
                </div>
            @else
                @if(Request::is('login'))
                    <a href="{{ url('/') }}" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Post a Job<i class="fa fa-arrow-right ms-3"></i></a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Login<i class="fa fa-arrow-right ms-3"></i></a>
                @endif
            @endauth
        </div>
    </nav>
</header>
