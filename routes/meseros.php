<?php
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum', 'verified', 'mesero'])->group(function () {
   // Route::get('mesero/home', \App\Livewire\Mesero\Home::class)->name('mesero.home');
   Route::get('/mesero/validar/ticket/{id}/{user_id}/',\App\Livewire\Mesero\Validar\Ticket::class)->name('validar.ticket');
});

Route::get('/mesero/home', \App\Livewire\Mesero\Home::class)->name('mesero.home');

Route::get('/mesero/validar/ticket/{id}/{user_id}/',\App\Livewire\Mesero\Validar\Ticket::class)->name('validar.ticket');
