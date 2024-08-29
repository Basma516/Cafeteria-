<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Page Title -->
    <title>@yield('title', config('app.name', 'Laravel App'))</title>

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon" type="image/x-icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
        <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/logo-transparent.png') }}" type="image/x-icon">

   

   

    <!-- Custom Styles -->
    <style>
        body {
            background-color: #f8f9fa; /* Light background color */
        }

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

        .primary-bg {
            background-color: #5289b5;
        }

        .secondary-bg {
            background-color: #afd8f2;
        }

        .light-bg {
            background-color: #edf2f3;
        }

        .dark-text {
            color: #1f3541;
        }

        .primary-text {
            color: #5289b5;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="light-bg">
    @include('layouts.nav') <!-- Include the navigation here -->

    <div id="app" class="container">
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/bs4/dt-1.10.22/r-2.2.6/sc-2.0.3/sb-1.0.0/sp-1.2.1/datatables.min.js"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
