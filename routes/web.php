<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect()->route('login'))->name('home');

Route::get('/dashboard', App\Livewire\Dashboard::class)->middleware(['auth', 'verified'])->name('dashboard');

require base_path('routes/auth.php');
