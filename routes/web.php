<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::livewire('users', 'pages::admin.users.index')->name('users');
    Route::livewire('roles', 'pages::admin.roles.index')->name('roles');
});

require __DIR__ . '/settings.php';
