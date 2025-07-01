<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Welcome route
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('auth/login', [AuthController::class, 'showLoginForm'])->name('auth.login');
    Route::post('auth/login', [AuthController::class, 'login']);
    Route::get('auth/register', [AuthController::class, 'showRegistrationForm'])->name('auth.register.page');
    Route::post('auth/register', [AuthController::class, 'register'])->name('auth.register');
});

// Logout Route (should be accessible when authenticated)
Route::post('auth/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Authenticated Routes
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Practice
    Route::get('/practice', [DashboardController::class, 'practice'])->name('practice');

    // Road Signs
    Route::get('/road-signs', [DashboardController::class, 'roadSigns'])->name('road-signs');
    Route::get('/exams', [DashboardController::class, 'exams'])->name('exams');
    Route::get('/sections', [DashboardController::class, 'sections'])->name('sections');

    // Study Guide
    Route::get('/study-guide', [DashboardController::class, 'studyGuide'])->name('study-guide');

    // User Profile
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');

    // User Settings
    Route::get('/settings', [DashboardController::class, 'settings'])->name('settings');
});
