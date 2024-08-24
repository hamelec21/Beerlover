<?php

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Controllers\QrCodeController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\QRAuth;
use App\Livewire\QRAuth as LivewireQRAuth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/mensaje', function () {
    return view('mensaje');
});



Route::get('/', function () {
    return view('home');
});

Route::get('/nosotros', function () {
    return view('nosotros');
});

Route::get('/terminos-y-condiciones', function () {
    return view('terminos-y-condiciones');
});

Route::get('/terminos-y-condiciones', function () {
    return view('terminos-y-condiciones');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified', 'superadmin'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//rutas Publicas
Route::get('/comercio-asociados', \App\Livewire\ComercioAsociados::class)->name('comercio-asociados');
Route::get('/comercio/{id}', \App\Livewire\Comercio::class)->name('comercio');
//Registro de nuevo socio
Route::get('/registro', \App\Livewire\Registro::class)->name('registro');

Route::get('/busquedas/buscarhomemenu', App\Livewire\Busquedas\buscarhomemenu::class)->name('buscarhomemenu');

