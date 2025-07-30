<?php

use App\Http\Controllers\adminController;
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
    Route::get('auth/admin/login', [AuthController::class, 'showAdminLoginForm'])->name('auth.admin.login');
    Route::post('auth/admin/login', [AuthController::class, 'adminLogin'])->name('auth.admin.login.post');
});
Route::get('admin/default', [AuthController::class, 'adminDefault'])->name('auth.admin.default');
Route::get('admin/logout', [AuthController::class, 'adminLogout'])->name('auth.admin.logout');
// Logout Route (should be accessible when authenticated)
Route::post('auth/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');
Route::get('/admin/dashboard', [adminController::class, 'index'])->name('admin.dashboard');

// Authenticated Routes
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Practice
    Route::get('/practice', [DashboardController::class, 'practice'])->name('practice');

    // Road Signs
    Route::get('/road-signs', [DashboardController::class, 'roadSigns'])->name('road-signs');
    Route::get('/exams', [DashboardController::class, 'exams'])->name('exams');
    Route::get('/exams/dynamic', [DashboardController::class, 'examDynamic'])->name('exams.dynamic');
    Route::get('/exams/static', [DashboardController::class, 'examStatic'])->name('exams.static');
    Route::get('/sections', [DashboardController::class, 'sections'])->name('sections');
    Route::get('/sections/{id}', [DashboardController::class, 'sectionsItem'])->name('sections.item');
    // Study Guide
    Route::get('/study-guide', [DashboardController::class, 'studyGuide'])->name('study-guide');

    // User Profile
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');

    // User Settings
    Route::get('/settings', [DashboardController::class, 'settings'])->name('settings');
});
Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [adminController::class, 'index'])->name('admin.dashboard');
        Route::get('/sections', [adminController::class, 'sections'])->name('admin.sections');
        Route::get('/sections/{id}', [adminController::class, 'sectionsItem'])->name('admin.sections.item');
        Route::get('/questions', [adminController::class, 'questions'])->name('admin.questions');
        Route::get('/feedback', [adminController::class, 'feedback'])->name('admin.feedback');
        Route::get('/discounts', [adminController::class, 'discount'])->name('admin.discount');
        Route::get('/companies', [adminController::class, 'company'])->name('admin.company');
        Route::prefix('questions')->group(function () {
            Route::get('/new', [adminController::class, 'newQuestion'])->name('admin.questions.new');
        });
    });
});
