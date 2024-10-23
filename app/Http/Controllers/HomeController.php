<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // Check if the user is authenticated
        if (Auth::guard('admin')->check()) {
            // If the admin is logged in, you can pass data to the view if needed
            return view('admin.home'); // Return the admin home view
        }

        // You can also handle the case for regular users or guests
        return view('welcome'); // Return the default welcome view
    }
}

