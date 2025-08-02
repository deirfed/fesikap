<?php

use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(ViewController::class)->group(function () {
    Route::get('/main-dashboard', 'main_dashboard')->name('main-dashboard');
    Route::get('/profile', 'profile')->name('profile');
    Route::get('/admin', 'admin_page')->name('admin');
    Route::get('/admin2', 'admin2_page')->name('admin2');
    Route::get('/admin3', 'admin3_page')->name('admin3');
    Route::get('/admin4', 'admin4_page')->name('admin4');
    Route::get('/form', 'form_page')->name('form');
    Route::get('/detail', 'detail')->name('detail');
});
