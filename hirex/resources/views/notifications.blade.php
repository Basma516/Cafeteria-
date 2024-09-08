@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Notifications</h1>

        @forelse($notifications as $notification)
            <div class="card mb-3 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ $notification->data['jobTitle'] ?? 'N/A' }}</h5>
                    <p class="card-text">
                        <span>Status: </span>
                        @if($notification->data['status'] == 'accepted' || $notification->data['status'] == 1)
                            <span class="badge bg-success">Accepted</span>
                        @elseif($notification->data['status'] == 'rejected' || $notification->data['status'] == 2)
                            <span class="badge bg-danger">Rejected</span>
                        @else
                            <span class="badge bg-secondary">Unknown</span>
                        @endif
                    </p>
                    <p class="card-text">
                        <small class="text-muted">Received on: {{ $notification->created_at->format('d M Y, h:i A') }}</small>
                    </p>
                </div>
            </div>
        @empty
            <div class="alert alert-info">No notifications available.</div>
        @endforelse
    </div>
@endsection
