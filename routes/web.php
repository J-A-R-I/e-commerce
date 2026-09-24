<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('backend', 'backend')->name('backend');

    Route::livewire('users', 'pages::admin.users.index')->name('users');
    Route::livewire('users/show/{user}', 'pages::admin.users.show')->name('users.show');
    Route::livewire('users/edit/{user}', 'pages::admin.users.edit')->name('users.edit');
    Route::livewire('users/create', 'pages::admin.users.create')->name('users.create');

    Route::livewire('roles', 'pages::admin.roles.index')->name('roles');
    Route::livewire('roles/show/{role}', 'pages::admin.roles.show')->name('roles.show');
    Route::livewire('roles/edit/{role}', 'pages::admin.roles.edit')->name('roles.edit');
    Route::livewire('roles/create', 'pages::admin.roles.create')->name('roles.create');

    Route::livewire('stores', 'pages::admin.stores.index')->name('stores');
    Route::livewire('stores/show/{store}', 'pages::admin.stores.show')->name('stores.show');
    Route::livewire('stores/edit/{store}', 'pages::admin.stores.edit')->name('stores.edit');
    Route::livewire('stores/create', 'pages::admin.stores.create')->name('stores.create');
});

require __DIR__ . '/settings.php';
