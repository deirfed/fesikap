<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MiscellaneousController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;


Auth::routes();

Route::get('/', function () {
    return redirect('/dashboard');
})->middleware('auth');

Route::group(['middleware' => 'auth'], function () {

    Route::middleware('role:admin')->group(function () {
        Route::controller(ViewController::class)->group(function () {
            Route::get('/form-activity', 'form_activity')->name('form-activity');
            Route::get('/admin', 'admin_page')->name('admin');
        });
    });

    Route::controller(ViewController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/profile', 'profile')->name('profile');
        Route::get('/detail', 'detail')->name('detail');
        Route::get('/data-pemilu', 'data_pemilu')->name('data-pemilu');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/data-user', 'index')->name('data-user');
        Route::get('/create', 'create')->name('create.user');
        Route::post('/store', 'store')->name('store.user');
    });

    Route::controller(MiscellaneousController::class)->group(function () {
        Route::get('/request-fitur', 'request_fitur')->name('request-fitur');
        Route::get('/info-web', 'info_web')->name('info-web');
    });
});
