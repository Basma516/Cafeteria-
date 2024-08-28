<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Companies</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Light background color */
        }
        .company-card {
            border: 1px solid #ddd; /* Light gray border */
            border-radius: 8px; /* Rounded corners */
            padding: 16px; /* Padding inside card */
            margin-bottom: 20px; /* Spacing between cards */
            text-align: center; /* Centered text */
            transition: transform 0.2s; /* Smooth hover effect */
            background-color: #fff; /* White background for card */
        }
        .company-card:hover {
            transform: scale(1.05); /* Slightly enlarge on hover */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Add shadow on hover */
        }
        .company-logo {
            width: 60px; /* Fixed width for logo */
            height: 60px; /* Fixed height for logo */
            margin-bottom: 10px; /* Space below logo */
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        .btn-visit {
            background-color: #28a}
        .company-card {
            border: none; /* Remove border */
            background-color: white; /* White background for cards */
            border-radius: 8px; /* Rounded corners */
            padding: 20px; /* Increased padding */
            margin-bottom: 20px; /* Spacing between cards */
            text-align: center; /* Centered text */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            transition: transform 0.2s; /* Smooth hover effect */
        }
        .company-card:hover {
            transform: scale(1.05); /* Slightly enlarge on hover */
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2); /* Add shadow on hover */
        }
        .company-logo {
            width: 50px; /* Set a fixed width for the logo */
            height: 50px; /* Set a fixed height for the logo */
            margin-bottom: 10px; /* Space below logo */
            border-radius: 50%; /* Make logo circular */
        }
        .btn-visit {
            background-color: #28a745; /* Green background */
            color: white; /* White text */
            border: none; /* No border */
            border-radius: 20px; /* Rounded button */
            padding: 8px 20px; /* Button padding */
        }
        .btn-visit:hover {
            background-color: #218838; /* Darker green on hover */
        }
        .company-description {
            color: #28a745; /* Green color for description text */
            font-size: 14px; /* Smaller font size */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="my-4 text-center">Companies</h1>

        @php
            // Sample companies data for testing
            $companies = [
                [
                    'name' => 'Company One',
                    'description' => 'Description for Company One.',
                    'logo' => 'company_one_logo.png'
                ],
                [
                    'name' => 'Company Two',
                    'description' => 'Description for Company Two.',
                    'logo' => 'company_two_logo.png'
                ],
                [
                    'name' => 'Company Three',
                    'description' => 'Description for Company Three.',
                    'logo' => 'company_three_logo.png'
                ]
            ];
        @endphp

        @if(count($companies))
            <div class="row">
                @foreach($companies as $company)
                    <div class="col-md-4 mb-4">
                        <div class="company-card">
                            <img src="{{ asset('images/companies/' . $company['logo']) }}" alt="{{ $company['name'] }} Logo" class="company-logo">
                            <h2>{{ $company['name'] }}</h2>
                            <p class="company-description">{{ Str::limit($company['description'], 60) }}</p>
                            <a href="{{ url('companies/' . $loop->index) }}" class="btn btn-visit">Visit Company</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center">No companies found.</p>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>