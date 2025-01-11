<?php

use Illuminate\Support\Facades\Route;

Route::prefix(config('cms.route.prefix'))->group(function () {
    Route::get('login', \LaravelCMS\Livewire\Auth\Login::class)->name('cms.login');
    Route::get('reset-password', \LaravelCMS\Livewire\Auth\ResetPassword::class)->name('cms.reset-password');

    Route::prefix('')->middleware(\LaravelCMS\Http\Middleware\AdminMiddleware::class)->group(function () {
        Route::get('', \LaravelCMS\Livewire\Admin\Dashboard::class)->name('cms.dashboard');

        Route::prefix('pages')->group(function () {
            Route::get('', )->name('cms.pages.index');
            Route::get('{page}', )->name('cms.pages.show');
        });
    });
});
