<?php

use App\Http\Controllers\admin\AdministratorController;
use App\Http\Controllers\admin\AktivitasController;
use App\Http\Controllers\admin\InformasiController;
use App\Http\Controllers\admin\IsuController;
use App\Http\Controllers\admin\NavigasiController;
use App\Http\Controllers\admin\PemiluController;
use App\Http\Controllers\admin\PhotoAktivitasController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\RequestController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MiscellaneousController;
use App\Http\Controllers\user\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;

Auth::routes();

Route::get('/', function () {
    return redirect()->route('menu.index');
})->middleware('auth');

Route::group(['middleware' => 'auth'], function () {

    Route::resource('/dashboard', DashboardController::class);
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/menu', 'mainMenu')->name('menu.index');
    });

    Route::resource('/user', UserController::class);
    Route::delete('/admin/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');


    Route::resource('/administrator', AdministratorController::class);

    Route::resource('/profile', ProfileController::class);

    Route::resource('/pemilu', PemiluController::class);

    Route::resource('/informasi', InformasiController::class);

    Route::resource('/request', RequestController::class);

    Route::resource('/aktivitas', AktivitasController::class);

    Route::resource('/photo-aktivitas', PhotoAktivitasController::class);

    Route::resource('/isu', IsuController::class);
});
