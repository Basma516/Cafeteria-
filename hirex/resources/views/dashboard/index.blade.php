@extends('dashboard.layouts.app')

@section('content')

<div class="analytics-sparkle-area" style="margin-top: 45px;">
    <div class="container-fluid">
        <div class="row  justify-content-center">

            <a href="{{ route('employer') }}" class="card-link  col-md-6 col-lg-4" style="text-decoration:none;">
                <div class="card text-bg-primary mb-3 mx-3 " style="max-width: 50rem; height:15rem; font-size:large;">
                    <div class="card-header"><i class="fa-solid fa-users"></i></div>
                    <div class="card-body">
                        <h5 class="card-title" style="font-size: 22px;">Employers</h5>
                        <p class="card-text">Total Employers: <b> {{ $employersCount }} </b> </p>
                        <span style="font-size:12px;">Click For More Info</span>
                    </div>
                </div>
            </a>

            <a href="{{ route('candidate') }}" class="card-link  col-md-6 col-lg-4" style="text-decoration:none;">
                <div class="card text-bg-warning mb-3 mx-3" style="max-width: 50rem; height:15rem; font-size:large;">
                    <div class="card-header"><i class="fa-solid fa-user"></i></div>
                    <div class="card-body">
                        <h5 class="card-title" style="font-size: 22px;">Candidates</h5>
                        <p class="card-text">Total Candidates: <b> {{ $candidatesCount }} </b></p>
                        <span style="font-size:12px;">Click For More Info</span>
                    </div>
                </div>
            </a>

            <a href="{{ route('category') }}" class="card-link  col-md-6 col-lg-4" style="text-decoration:none;">
                <div class="card text-bg-success mb-3 mx-3" style="max-width: 50rem; height:15rem; font-size:large;">
                    <div class="card-header"><i class="fa-solid fa-list"></i></div>
                    <div class="card-body">
                        <h5 class="card-title" style="font-size: 22px;">Categories</h5>
                        <p class="card-text">Total Categories: <b> {{ $categoriesCount }} </b></p>
                        <span style="font-size:12px;">Click For More Info</span>
                    </div>
                </div>
            </a>

            <a href="{{ route('jobs') }}" class="card-link  col-md-6 col-lg-4" style="text-decoration:none;">
                <div class="card text-bg-danger mb-3 mx-3" style="max-width: 50rem; height:15rem; font-size:large;">
                    <div class="card-header"><i class="fa-solid fa-briefcase"></i></div>
                    <div class="card-body">
                        <h5 class="card-title" style="font-size: 22px;">Jobs</h5>
                        <p class="card-text">Total Jobs: <b> {{ $jobsCount }} </b></p>
                        <span style="font-size:12px;">Click For More Info</span>
                    </div>
                </div>
            </a>
        </div>
                <!-- Chart Section -->
                <div class="row justify-content-center mt-5 ">
            <div class="col-md-10 bg-dark">
                <canvas id="dataChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>
</div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    var ctx = document.getElementById('dataChart').getContext('2d');
    var dataChart = new Chart(ctx, {
        type: 'line',  // Choose 'line', 'bar', or any chart type
        data: {
            labels: {!! json_encode($dates) !!},  // Dates for the x-axis
            datasets: [
                {
                    label: 'Employers',
                    data: {!! json_encode($employersData) !!},  // Employers data for each date
                    backgroundColor: 'rgba(54, 162, 235, 0.2)', // Light blue
                    borderColor: 'rgba(54, 162, 235, 1)',  // Darker blue
                    borderWidth: 1
                },
                {
                    label: 'Candidates',
                    data: {!! json_encode($candidatesData) !!},  // Candidates data for each date
                    backgroundColor: 'rgba(255, 206, 86, 0.2)', // Light yellow
                    borderColor: 'rgba(255, 206, 86, 1)',  // Darker yellow
                    borderWidth: 1
                },
                {
                    label: 'Jobs',
                    data: {!! json_encode($jobsData) !!},  // Jobs data for each date
                    backgroundColor: 'rgba(255, 99, 132, 0.2)', // Light red
                    borderColor: 'rgba(255, 99, 132, 1)',  // Darker red
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Dates'
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Count'
                    }
                }
            }
        }
    });
</script>
@endsection
