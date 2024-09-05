<!-- resources/views/notifications/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Your Notifications</h2>
    @if($notifications->isEmpty())
        <p>No notifications found.</p>
    @else
        <ul>
            @foreach($notifications as $notification)
                <li>
                    <strong>{{ $notification->job->title }}</strong> - {{ $notification->status }}<br>
                    Received on: {{ $notification->created_at->format('d M Y, H:i') }}<br>
                    Status: {{ $notification->read ? 'Read' : 'Unread' }}
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
