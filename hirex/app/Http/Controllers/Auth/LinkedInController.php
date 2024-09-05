<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Exception;

class LinkedInController extends Controller
{
    public function redirectToLinkedIn()
    {
        return Socialite::driver('linkedin')
        ->scopes(['r_liteprofile', 'r_emailaddress'])
        ->redirect();
    }

    public function handleLinkedInCallback()
    {
        try {
            $user = Socialite::driver('linkedin')->user();

            // Check if the user already exists
            $existingUser = User::where('email', $user->email)->first();
            if ($existingUser) {
                Auth::login($existingUser);
            } else {
                // Register the new user
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'linkedin_id' => $user->id,
                    'avatar' => $user->avatar,
                    'password' => bcrypt('default-password'), // Consider generating a secure password
                ]);

                Auth::login($newUser);
            }

            return redirect()->route('home');
        } catch (Exception $e) {
            return redirect()->route('login')->with('error', 'Unable to login using LinkedIn. Please try again.');
        }
    }
}
