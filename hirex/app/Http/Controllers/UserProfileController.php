<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserProfileController extends Controller
{
    /**
     * Show the candidate profile for users with role 3.
     *
     * @param int $userId
     * @return \Illuminate\View\View
     */
    public function showCandidateProfile($userId)
    {
        if (Auth::check()) {
            // Fetch the currently authenticated user
            $user = Auth::user();

            // Check if the user has the role of a candidate (role = 3)
            if ($user->role == 3) {
                // Fetch the user along with the candidate profile
                $user = User::with('candidate')->findOrFail($user->id);

                // Pass the user to the view
                return view('candidates.CandidateProfile', compact('user'));
            } else {
                // Redirect or show an error if the user is not a candidate
                return redirect()->route('home')->with('error', 'You are not authorized to view this profile.');
            }
        } else {
            // Redirect to login if the user is not authenticated
            return redirect()->route('login')->with('error', 'Please log in to view your profile.');
        }
    }

    /**
     * Show all candidate profiles (for users with role 3).
     *
     * @return \Illuminate\View\View
     */
    public function showAllCandidates()
    {   // Fetch the currently authenticated user
            $user = Auth::user();

            // Check if the user has the role of a candidate (role = 3)
            if ($user->role == 3) {
                // Fetch the user along with the candidate profile
                $user = User::with('candidate')->findOrFail($user->id);

                // Pass the user to the view
                return view('candidates.CandidateProfile', compact('user'));
            } else {
                // Redirect or show an error if the user is not a candidate
                return redirect()->route('home')->with('error', 'You are not authorized to view this profile.');
            }
    }
}
