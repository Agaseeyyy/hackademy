<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', function () {
    return view('visitors.home'); // Or your home page view
});

Route::get('/tutorials', [CourseController::class, 'index'])->name('courses');
Route::get('/tutorials/{id}', [CourseController::class, 'show'])->name('courses.show');

Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');
Route::get('/blogs/{id}', [BlogController::class, 'show'])->name('blogs.show');

Route::get('/about-us', function () {
    return view('visitors.about');
});

Route::get('/contact-us', function () {
    return view('visitors.contact');
});

Route::get('/terms-and-conditions', function () {
    return view('visitors.terms');
});

Route::get('/privacy-policy', function () {
    return view('visitors.privacy');
});

// Authentication Routes for Admin/Management
Route::get('/manage/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/manage/login', [AuthController::class, 'login'])->name('login.submit')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Admin Routes (Protected)
Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/blogs', function() {
        return view('admin.blogs.index');
    })->name('blogs.index');

    // User Management Route (Simplified)
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
});

// User Blog Management Route
Route::middleware(['auth'])->group(function () { // Only requires login, not admin
    Route::get('/manage-blogs', function() {
        return view('user.blogs.index'); // Loads livewire-blog for regular users
    })->name('user.blogs.index');
});

// Fallback route for unauthenticated access to admin areas (optional)
Route::get('/admin/{any?}', function () {
    return redirect()->route('login');
})->where('any', '.*');