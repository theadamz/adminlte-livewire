<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect()->route('login'))->name('home');
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', App\Livewire\Setting\Profile::class)->name('settings.profile');
});

Route::get('/dashboard', App\Livewire\Dashboard::class)->middleware(['auth', 'verified'])->name('dashboard');

require base_path('routes/auth.php');
