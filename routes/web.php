<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::livewire('store/create', 'pages::frontend.stores.create')->name('frontend.stores.create');

    Route::middleware(['admin'])->prefix('backend')->group(function () {
        Route::livewire('/', 'pages::backend')->name('backend');

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

    Route::middleware(['vendor'])->prefix('dashboard/{store:slug}')->group(function () {
        Route::livewire('/', 'pages::dashboard')->name('dashboard');

        Route::livewire('products', 'pages::vendors.products.index')->name('products');
        Route::livewire('products/show/{product}', 'pages::vendors.products.show')->name('products.show');
        Route::livewire('products/edit/{product}', 'pages::vendors.products.edit')->name('products.edit');
        Route::livewire('products/create', 'pages::vendors.products.create')->name('products.create');

        Route::livewire('categories', 'pages::vendors.categories.index')->name('categories');
        Route::livewire('categories/show/{category}', 'pages::vendors.categories.show')->name('categories.show');
        Route::livewire('categories/edit/{category}', 'pages::vendors.categories.edit')->name('categories.edit');
        Route::livewire('categories/create', 'pages::vendors.categories.create')->name('categories.create');
    });
});

require __DIR__.'/settings.php';
