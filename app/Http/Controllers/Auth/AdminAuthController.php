<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // Ensure you have User model for admin
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.admin.register');
    }

    public function register(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Check if user already exists
        if (User::where('email', $request->email)->exists()) {
            return redirect()->back()
                ->with('error', 'This email is already registered.')
                ->withInput();
        }

        // Create the user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.login')->with('success', 'Registration successful. Please log in.');
    }

    public function showLoginForm()
    {
        return view('auth.admin.login');
    }

    public function login(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the user in
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // If successful, redirect to the admin dashboard
            return redirect()->route('admin.dashboard');
        }

        // If unsuccessful, redirect back with an error message
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        return redirect('/'); // Redirect to the desired page after logout
    }

    public function profile()
    {
        return view('admin.profile'); // This should match the view file you created
    }

    public function dashboard()
    {
        return view('admin.dashboard'); // Points to the admin dashboard view
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Log out the user
        return redirect('/admin/login'); // Redirect to the desired page after logout
    }
}
