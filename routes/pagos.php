<?php
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| rutas  APi Flow
|--------------------------------------------------------------------------
*/
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    //creacion del customer
    Route::get('flow/customer/show-cliente', \App\Livewire\Flow\Customer\ShowClientes::class)->name('customer.show-cliente');
    Route::get('flow/customer/crear-cliente', \App\Livewire\Flow\Customer\CrearCliente::class)->name('customer.crear-cliente');
    Route::get('flow/customer/registar-tarjeta', \App\Livewire\Flow\Customer\RegistrarTarjeta::class)->name('customer.registar-tarjeta');

    //subscripcion
    Route::get('flow/subscripcion/crear-suscripcion-plan', \App\Livewire\Flow\Subscripcion\CrearSuscripcionPlan::class)->name('subscripcion.crear-suscripcion-plan');
    Route::get('flow/subscripcion/show-suscripcion-plan', \App\Livewire\Flow\Subscripcion\ShowSuscripcionPlan::class)->name('subscripcion.show-suscripcion-plan');
});


