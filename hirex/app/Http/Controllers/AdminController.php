<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Adjust according to your model

class AdminController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $users = User::all(); // Fetch all users or relevant data
        return view('dashboard.index', compact('users')); // Pass data to the view
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('admin.users.create'); // Adjust the view path
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create($validatedData);
        return redirect()->route('admin.index')->with('success', 'User created successfully.');
    }

    // Display the specified resource
    public function show(User $user)
    {
        return view('admin.users.show', compact('user')); // Adjust the view path
    }

    // Show the form for editing the specified resource
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user')); // Adjust the view path
    }

    // Update the specified resource in storage
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->update($validatedData);
        return redirect()->route('admin.index')->with('success', 'User updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.index')->with('success', 'User deleted successfully.');
    }
}
