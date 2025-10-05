<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\BrandSettingController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\ContactInfoController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/packages', [HomeController::class, 'packages'])->name('packages');
Route::get('/portfolio', [HomeController::class, 'portfolio'])->name('portfolio');
Route::get('/team', [HomeController::class, 'team'])->name('team');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// Admin Routes
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    
    // Brand Settings
    Route::resource('brand-settings', BrandSettingController::class)->only(['index', 'edit', 'update']);
    
    // Services
    Route::resource('services', ServiceController::class);
    
    // Packages
    Route::resource('packages', PackageController::class);
    
    // Portfolio
    Route::resource('portfolios', PortfolioController::class);
    
    // Team Members
    Route::resource('team-members', TeamMemberController::class);
    
    // Contact Info
    Route::resource('contact-infos', ContactInfoController::class);
});

// Breeze Auth Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
