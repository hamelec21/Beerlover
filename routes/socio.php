<?php
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| rutas Socios
|--------------------------------------------------------------------------
*/

Route::middleware(['auth:sanctum', 'verified', 'role:socio'])->group(function () {

    Route::get('/socio/home', \App\Livewire\Socio\Home::class)->name('socio.home');

    Route::get('/socio/qr/{id}', \App\Livewire\Socio\Qr::class)->name('socio.qr');

});
