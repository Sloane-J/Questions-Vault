<?php

use Illuminate\Support\Facades\Route;

// Basic Routes
Route::view('/', 'welcome')->name('home');

// Authentication routes (auto-loaded from Jetstream/Livewire)
require __DIR__.'/auth.php';

// Authenticated Routes (all roles)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    
    // Add profile route that the navigation expects
    Route::view('/profile', 'profile')->name('profile');
});

// Admin-Only Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::view('/dashboard', 'admin.dashboard')->name('admin.dashboard');
    // Add more admin routes later...
});

// Student-Only Routes
Route::middleware(['auth', 'student'])->prefix('student')->group(function () {
    Route::view('/dashboard', 'student.dashboard')->name('student.dashboard');
    // Add more student routes later...
});