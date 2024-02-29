<?php
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum', 'verified', 'mesero'])->group(function () {
    Route::get('mesero/home', \App\Livewire\Mesero\Home::class)->name('mesero.home');
});

Route::get('/mesero/home', \App\Livewire\Mesero\Home::class)->name('mesero.home');
