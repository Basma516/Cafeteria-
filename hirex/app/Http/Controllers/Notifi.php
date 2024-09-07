<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\DatabaseNotification;  // Use the correct notification model
use Illuminate\Http\Request;

class Notifi extends Controller
{
    /**
     * Display a list of notifications for the authenticated user.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
    
        // Fetch notifications related to job application status updates
        $notifications = $user->notifications()
                              ->where('type', 'App\Notifications\ApplicationStatusUpdatedNotification')
                              ->orderBy('created_at', 'desc')
                              ->get();
    
        // Mark notifications as read
        $user->unreadNotifications->markAsRead();
    
        return view('notifications', compact('notifications'));
    }
    
    
}
