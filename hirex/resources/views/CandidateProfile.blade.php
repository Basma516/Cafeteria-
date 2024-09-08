
@extends('layouts.app')

@section('content')
    @if (Auth::user() && Auth::user()->role == 3)
        <div class="profile-card">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="2" class="text-center">User Profile</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td rowspan="4" class="text-center">
                            <img src="{{ $user->image ? asset('storage/' . $user->image) : 'https://via.placeholder.com/100' }}" alt="{{ $user->name }}">
                        </td>
                        <td><strong>Name:</strong> {{ $user->name }}</td>
                    </tr>
                    <tr>
                        <td><strong>Company:</strong> {{ $user->company_name ?? 'No company name provided' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Description:</strong> {{ $user->company_description ?? 'No description provided' }}</td>
                    </tr>
                    <tr>
                        <td><strong>Website:</strong> <a href="{{ $user->company_website ?? '#' }}">{{ $user->company_website ?? 'No website' }}</a></td>
                    </tr>

                    
                    @if($user->candidate)
                    <tr>
                        <td colspan="2"><strong>Skills:</strong> {{ $user->candidate->skills ?? 'No skills provided' }}</td>
                    </tr>
                    <tr>
                        <td colspan="2"><strong>Resume:</strong> 
                            @if($user->candidate->resume)
                                <a href="{{ asset('storage/' . $user->candidate->resume) }}">Download Resume</a>
                            @else
                                No resume uploaded
                            @endif
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>

           
            @if ($user->role != 3)
                <button class="btn btn-primary mt-3">Psots</button>
            @endif
        </div>
    @else
        <p>You do not have the correct permissions to view this page.</p>
    @endif
@endsection