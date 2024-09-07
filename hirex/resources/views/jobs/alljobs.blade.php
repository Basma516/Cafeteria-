@extends('dashboard.layouts.app')
@section('content')
<div class="site-section py-5">
<<<<<<< HEAD
    <div class="container">
=======
    <div class="container" style="max-width: 950px; margin: 0 auto;">

        <!-- Display error and success messages -->
>>>>>>> origin
        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <!-- Search Bar -->
        <div class="row mb-4">
            <div class="col-lg-12">
                <form action="{{ route('jobs.index') }}" method="GET" class="search-form">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control search-input"
                            placeholder="Search for jobs..." value="{{ request('search') }}">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body">
            <p class="card-text">{{$job->description}}</p>

        <!-- Recent Jobs -->
        <div class="row">
            <div class="col-md-12 mb-5">
                <h2 class="mb-5 h3 text-primary text-center">Recent Jobs</h2>
                <div class="rounded border jobs-wrap">
                    @forelse($jobs as $job)
                    @php
                    $isDeadlinePassed = \Carbon\Carbon::now()->gt(\Carbon\Carbon::parse($job->deadline));
                    $applied = false;
                    $application = null;

                    if (auth()->check() && auth()->user()->candidate) {
                        $applied = \App\Models\Application::where('candidate_id', auth()->user()->candidate->id)
                        ->where('job_id', $job->id)
                        ->exists();

                        if ($applied) {
                            $application = \App\Models\Application::where('candidate_id', auth()->user()->candidate->id)
                            ->where('job_id', $job->id)
                            ->first();
                        }
                    }
                    @endphp

                    <!-- <div class="job-item d-block d-md-flex align-items-center border-bottom p-4 mb-4"
                        onclick="window.location.href='{{ route('jobs.show', $job->id) }}'"
                        style="cursor: pointer; border-radius: 10px; transition: background-color 0.3s ease;">

                      
                        <div class="company-logo text-center text-md-left pl-3">
                          
                            <img src="{{ $job->logo ? asset('storage/' . $job->logo) : 'https://via.placeholder.com/70' }}"
                                alt="Company Logo" class="img-fluid rounded-circle"
                                style="width: 70px; height: 70px; object-fit: cover; box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);">
                        </div>

                      
                        <div class="job-details h-100 p-3 flex-grow-1">
                            <h3 class="text-dark">{{ $job->title }}</h3>
                            <div class="d-block d-lg-flex mt-2 text-muted">
                                <div class="mr-3"><i class="fas fa-briefcase mr-1"></i> {{ $job->jobType->name }}</div>
                                <div class="mr-3" style="display: {{ $job->location ? 'block' : 'none' }};">
                                    <i class="fas fa-map-marker-alt mr-1"></i> {{ $job->location ?? 'Location not available' }}
                                </div>
                                <div class="mr-3"><i class="fas fa-dollar-sign mr-1"></i> ${{ $job->salary }}</div>
                                <div><strong>Total Applications:</strong> {{ $job->applications_count }}</div>
                            </div>
<<<<<<< HEAD
                        </div>-->
=======
                        </div>
<<<<<<< HEAD
                        <!-- <div class="job-category p-3">
                            @auth
                            @if(auth()->user()->role == 2)
                            <span class="badge " style="background-color:#5289b5 ">{{ $job->status->name }}</span>
                            @endif
                            @endauth
                        </div> -->
                        @auth
                        @if(auth()->user()->role == 3)
=======
>>>>>>> shrouk

                        <!-- Apply Button Section -->
>>>>>>> origin
                        <div class="job-apply p-3">
                            @auth
                            @if(auth()->user()->role == 3)
                            @if($isDeadlinePassed)
                            <button class="btn btn-secondary" disabled>Apply Now</button>
                            @else
                            @if($applied)
                            <form action="{{ route('applications.destroy', $application->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to cancel your application?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Cancel Application</button>
                            </form>
                            @else
                            <a href="{{ route('applications.create', ['job' => $job->id]) }}" class="btn btn-primary">Apply Now</a>
                            @endif
                            @endif
                            @endif
                            @endauth
                        </div>
                    </div> -->
                    @empty
                    <p class="text-center">No jobs found matching your search criteria.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="col-md-12 text-center mt-5 pagination">
            {{ $jobs->links('pagination::bootstrap-5') }}
        </div>
    </div>

    <hr>

    <h3>Applications</h3>
    @if($applications && $applications-> isNotEmpty())
    <div class="card-body mt-3">
        <div class="table-responsive">
            <table id="usersTable" class="table table-striped  table-dark" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>

                        <th>Candidate Name</th>
                        <th>status</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($applications as $app)
                    @php
                    $can = $app->candidate;
                    $candidate = $can->user;
                    $status = $app->status;
                    @endphp
                    <tr>
                        <td>{{$app->id}}</td>
                        <td>{{$candidate->name}}</td>
                        <td>{{$status->name}}</td>

                    </tr>
                    @endforeach
            </table>
        </div>
    </div>
    @else
    <div class="container ">
        <span class="text-danger">* No Applications Found</span>
    </div>

    @endif

    @if($applications && $applications-> isNotEmpty())

    <h3 class="mt-5">Applications Over Time</h3>
    <div class="row justify-content-center mt-4 ">
        <div class="col-md-10 bg-dark">
            <canvas id="applicationsChart" width="400" height="200"></canvas>
        </div>
    </div>
    @endif


</div>
<<<<<<< HEAD
@endsection
=======

<<<<<<< HEAD




@endsection
@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script id="chartData" type="application/json">
    {
        "dates": @json($applicationDates),
        "counts": @json($applicationCounts)
    }
</script>
<script>
    var chartData = JSON.parse(document.getElementById('chartData').textContent);

    var ctx = document.getElementById('applicationsChart').getContext('2d');
    var applicationsChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: chartData.dates,  // Dates for x-axis
            datasets: [{
                label: 'Applications',
                data: chartData.counts,  // Number of applications per date
                backgroundColor: 'rgba(75, 192, 192, 0.2)',  // Chart fill color
                borderColor: 'rgba(75, 192, 192, 1)',  // Chart line color
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    labels: {
                        color: 'white'  // Legend text color
                    }
                },
                tooltip: {
                    callbacks: {
                        title: function(tooltipItems) {
                            return tooltipItems[0].label;
                        },
                        label: function(tooltipItem) {
                            return tooltipItem.dataset.label + ': ' + tooltipItem.formattedValue;
                        }
                    },
                    titleColor: 'white',  // Tooltip title color
                    bodyColor: 'white',   // Tooltip body color
                    footerColor: 'white'  // Tooltip footer color
                }
            },
            scales: {
                x: {
                    ticks: {
                        color: 'white'  // X-axis text color
                    },
                    title: {
                        color: 'white'  // X-axis title color
                    }
                },
                y: {
                    ticks: {
                        color: 'white'  // Y-axis text color
                    },
                    title: {
                        color: 'white'  // Y-axis title color
                    }
                }
            }
        }
    });
</script>
=======
>>>>>>> master
@endsection
>>>>>>> omar
