<?php 
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\CustomerAuthController;
// use App\Http\Controllers\CustomerController; 


Route::get('/admin/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');


Route::get('/admin/profile', [AdminAuthController::class, 'profile'])->name('admin.profile');

// Route::get('/', function () {
//     return view('home'); // Points to the home.blade.php view
// })->name('home'); // Assigns the name 'home' to this route
Route::get('/', function () {
    return redirect()->route('customer.login'); // Redirects to the customer login route
})->name('home'); // Assigns the name 'home' to this route
// // web.php
// Route::post('/customers/store', [CustomerController::class, 'store'])->name('customers.store');

 Route::resource('customers', CustomerController::class);
Route::resource('orders', OrderController::class);
Route::resource('services', ServiceController::class);


// Admin Authentication Routes
Route::get('/admin/register', [AdminAuthController::class, 'showRegisterForm'])->name('admin.register');
Route::post('/admin/register', [AdminAuthController::class, 'register']);
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/logout', [AdminAuthController::class, 'destroy'])->name('logout');
Route::get('/admin/profile', [AdminAuthController::class, 'profile'])->name('admin.profile');




// Customer Authentication Routes
Route::get('/customer/register', [CustomerAuthController::class, 'showRegisterForm'])->name('customer.register');
Route::post('/customer/register', [CustomerAuthController::class, 'register']);
Route::get('/customer/login', [CustomerAuthController::class, 'showLoginForm'])->name('customer.login');
Route::post('/customer/login', [CustomerAuthController::class, 'login']);
// In web.php
Route::post('customer/logout', [CustomerAuthController::class, 'logout'])->name('customer.logout');


// Customer Auth Routes

Route::get('/customer/dashboard', [CustomerAuthController::class, 'dashboard'])->name('customer.dashboard');

// Add this route to your web.php
Route::get('/home', function () {
    return view('home'); // Make sure to create a view named 'home.blade.php'
})->name('homepage');