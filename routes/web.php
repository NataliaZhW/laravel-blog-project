<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


// Redirect root to login
Route::get('/', function () {
    return redirect()->route('login');
});

// Auth routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected routes
Route::middleware('auth')->group(function () {
    // Posts
    Route::resource('posts', PostController::class);

    // Users
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

    // Profile
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::post('/profile', [UserController::class, 'updateProfile'])->name('profile.update');

    // About
    Route::get('/about', function () {
        return view('about');
    })->name('about');


});
// Route::get('/quick-check', function () {
//     return response()->json([
//         'is_authenticated' => auth()->check(),
//         'user_id' => auth()->id(),
//         'user' => auth()->user() ? [
//             'id' => auth()->user()->id,
//             'username' => auth()->user()->username,
//             'email' => auth()->user()->email
//         ] : null,
//         'session_id' => session()->getId()
//     ]);
// });
Route::get('/test-auth', function () {
    return "Auth ID: " . Auth::id() . " (type: " . gettype(Auth::id()) . ")";
});