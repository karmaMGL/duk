<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Welcome route
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Authentication Routes for regular users
Route::middleware('guest:web')->group(function () {
    Route::get('auth/login', [AuthController::class, 'showLoginForm'])->name('auth.login');
    Route::post('auth/login', [AuthController::class, 'login']);
    Route::get('auth/register', [AuthController::class, 'showRegistrationForm'])->name('auth.register.page');
    Route::post('auth/register', [AuthController::class, 'register'])->name('auth.register');
});

// Admin Authentication Routes
Route::middleware('guest:admin')->group(function () {
    Route::get('auth/admin/login', [AuthController::class, 'showAdminLoginForm'])->name('auth.admin.login');
    Route::post('auth/admin/login/submit', [AuthController::class, 'adminLogin'])->name('auth.admin.login.post');
});

// Logout Routes
Route::post('auth/logout', [AuthController::class, 'logout'])
    ->middleware('auth:web')
    ->name('logout');

Route::post('admin/logout', [AuthController::class, 'adminLogout'])
    ->name('auth.admin.logout');
Route::get('admin   /dashboard', [adminController::class, 'index'])->name('admin.dashboard');


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
Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('/dashboard', [adminController::class, 'index'])->name('admin.dashboard');
    Route::get('/sections', [adminController::class, 'sections'])->name('admin.sections');
    Route::get('/sections/{id}', [adminController::class, 'sectionsItem'])->name('admin.sections.item');

    Route::post('/sections', [adminController::class, 'storeSection'])->name('admin.sections.store');
    Route::get('/sections/delete/{id}', [adminController::class, 'destroySection'])->name('admin.sections.destroy');
    Route::get('/questions', [adminController::class, 'questions'])->name('admin.questions');
    Route::get('/questions/{id}', [adminController::class, 'questionsItem'])->name('admin.questions.item');
    Route::get('/questions/new', [adminController::class, 'newQuestion'])->name('admin.questions.new');
    Route::post('/questions', [adminController::class, 'storeQuestion'])->name('admin.questions.store');
    Route::get('/feedback', [adminController::class, 'feedback'])->name('admin.feedback');
    Route::get('/discounts', [adminController::class, 'discount'])->name('admin.discount');
    Route::get('/discounts/new', [adminController::class, 'newDiscount'])->name('admin.discounts.new');
    Route::post('/discounts', [adminController::class, 'storeDiscount'])->name('admin.discounts.store');
    Route::get('/companies', [adminController::class, 'company'])->name('admin.company');
    Route::get('/companies/new', [adminController::class, 'newCompany'])->name('admin.companies.new');
    Route::post('/companies', [adminController::class, 'storeCompany'])->name('admin.companies.store');
});
