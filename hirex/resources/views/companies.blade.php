@extends('layouts.app')

@section('title', 'Companies')

@section('content')
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
@endsection
