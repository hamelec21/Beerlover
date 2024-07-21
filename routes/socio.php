<?php
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| rutas Socios
|--------------------------------------------------------------------------
*/

Route::middleware(['auth:sanctum', 'verified', 'role:socio'])->group(function () {
    Route::get('/socio/qr/{id}', \App\Livewire\Socio\Qr::class)->name('socio.qr');

    Route::get('/socio/comercio/{id}', \App\Livewire\Socio\Comercio::class)->name('socio.comercio');
});

Route::get('/socio/home', \App\Livewire\Socio\Home::class)->name('socio.home');
