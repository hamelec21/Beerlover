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

Route::get('/socio/terminos-y-condiciones', \App\Livewire\Socio\TerminosYCondiciones::class)->name('socio.terminos-y-condiciones');
Route::get('/socio/nosotros', \App\Livewire\Socio\Nosotros::class)->name('socio.nosotros');


Route::get('/busquedas/buscarhomemenusocio', App\Livewire\Busquedas\buscarhomemenu::class)->name('buscarhomemenusocio');
