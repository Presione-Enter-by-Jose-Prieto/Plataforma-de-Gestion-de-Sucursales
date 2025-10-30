<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Acceso;

Route::get('/', function () {
    return view('acceso');
});

Route::view('/login', 'acceso')->name('login');
Route::post('/acceso', [Acceso::class, 'acceso'])->name('acceso');

Route::middleware(['auth'])->group(function () {
    // Logout
    Route::post('/logout', [Acceso::class, 'logout'])->name('logout');

    // App
    Route::view('/inicio', 'app.inicio')->name('inicio');

});