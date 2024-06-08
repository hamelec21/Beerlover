<?php
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum', 'verified', 'superadmin'])->group(function () {
    //show-usuario
    Route::get('usuario/show/{id}', \App\Livewire\Usuario\Show::class)->name('show');

});

Route::middleware(['auth:sanctum', 'verified', 'superadmin'])->group(function () {
    //creacion del customer
    Route::get('cupone/show-cupones', \App\Livewire\Cupone\ShowCupones::class)->name('show-cupones');
    Route::get('cupone/crear-cupon', \App\Livewire\Cupone\CrearCupon::class)->name('crear-cupon');
    Route::get('cupone/editar-cupon/{id}', \App\Livewire\Cupone\EditarCupon::class)->name('editar-cupon');

});

//rutas de bloqueo
Route::middleware(['auth:sanctum', 'verified', 'superadmin'])->group(function () {
    //creacion del customer
    Route::get('bloqueo/show-bloqueo', \App\Livewire\Bloqueo\ShowBloqueo::class)->name('show-bloqueo');
    Route::get('bloqueo/editar-bloqueo/{id}', \App\Livewire\Bloqueo\EditarBloqueo::class)->name('editar-bloqueo');
});

//rutas crear meseros
Route::middleware(['auth:sanctum', 'verified', 'superadmin'])->group(function () {
    //creacion del customer
    Route::get('mesero/registro/show-mesero', \App\Livewire\Mesero\Registro\ShowMesero::class)->name('show-mesero');
    Route::get('mesero/registro/crear-mesero', \App\Livewire\Mesero\Registro\CrearMesero::class)->name('crear-mesero');
    Route::get('mesero/registro/editar-mesero/{id}', \App\Livewire\Mesero\Registro\EditarMesero::class)->name('editar-mesero');
});


//rutas planes
Route::middleware(['auth:sanctum', 'verified', 'superadmin'])->group(function () {

    Route::get('plan/show-planes', \App\Livewire\Plan\ShowPlanes::class)->name('show-planes');
    Route::get('plan/crear-plan', \App\Livewire\Plan\CrearPlan::class)->name('crear-plan');
    Route::get('plan/editar-plan/{id}', \App\Livewire\Plan\EditarPlan::class)->name('editar-plan');
});



//rutas de suscritos
Route::middleware(['auth:sanctum', 'verified', 'superadmin'])->group(function () {
    Route::get('suscripcion/show-suscritos', \App\Livewire\Suscripcion\ShowSuscritos::class)->name('show-suscritos');
    Route::get('suscripcion/editar-suscrito/{id}', \App\Livewire\Suscripcion\EditarSuscrito::class)->name('editar-suscrito');
});



//rutas status suscripciones
Route::middleware(['auth:sanctum', 'verified', 'superadmin'])->group(function () {

    Route::get('status-suscripcion/show-status-suscripciones', \App\Livewire\StatusSuscripcion\ShowStatusSuscripciones::class)->name('show-status-suscripciones');
    Route::get('status-suscripcion/crear-status-suscripciones', \App\Livewire\StatusSuscripcion\CrearStatusSuscripciones::class)->name('crear-status-suscripciones');
    Route::get('status-suscripcion/editar-status-suscripciones/{id}', \App\Livewire\StatusSuscripcion\EditarStatusSuscripciones::class)->name('editar-status-suscripciones');
});

 //rutas tipo-subcripciones
Route::middleware(['auth:sanctum', 'verified', 'superadmin'])->group(function () {

    Route::get('tipo-suscripcion/show-tipo-suscripciones', \App\Livewire\TipoSuscripcion\ShowTipoSuscripciones::class)->name('show-tipo-suscripciones');
    Route::get('tipo-suscripcion/crear-tipo-suscripciones', \App\Livewire\TipoSuscripcion\CrearTipoSuscripcion::class)->name('crear-tipo-suscripciones');
    Route::get('tipo-suscripcion/editar-tipo-suscripciones/{id}', \App\Livewire\TipoSuscripcion\EditarTipoSuscripcion::class)->name('editar-tipo-suscripciones');
});
// rutas show-tickets

Route::middleware(['auth:sanctum', 'verified', 'superadmin'])->group(function () {

    Route::get('/ticket/show-tickets', \App\Livewire\Ticket\ShowTickets::class)->name('ticket.show-tickets');
});

//Rutas Modulo de Comercio
Route::middleware(['auth:sanctum', 'verified', 'superadmin'])->group(function () {
    Route::get('/comercios/show-comercio', \App\Livewire\Comercios\ShowComercio::class)->name('show-comercio');
    Route::get('/comercios/crear-comercio', \App\Livewire\Comercios\CrearComercio::class)->name('crear-comercio');
    Route::get('/comercios/editar-comercio/{id}', \App\Livewire\Comercios\EditarComercio::class)->name('editar-comercio');
});
//rutas del modulo Modulo estado de usuario

Route::middleware(['auth:sanctum', 'verified', 'superadmin'])->group(function () {
    //Staus de Usuarios
    Route::get('/status/usuario-status/show-status-usuario', \App\Livewire\Status\UsuarioStatus\ShowStatusUsuario::class)->name('show-status-usuario');
    Route::get('/status/usuario-status/crear-status-usuario', \App\Livewire\Status\UsuarioStatus\CrearStatusUsuario::class)->name('crear-status-usuario');
    Route::get('/status/usuario-status/editar-status-usuario/{id}', \App\Livewire\Status\UsuarioStatus\EditarStatusUsuario::class)->name('editar-status-usuario');
});


//rutas del modulo Modulo estado de Ticket
Route::middleware(['auth:sanctum', 'verified', 'superadmin'])->group(function () {
    //Staus de ticket
    Route::get('/status/ticket/show-ticket', \App\Livewire\Status\Ticket\ShowTicket::class)->name('show-ticket');
    Route::get('/status/ticket/crear-ticket', \App\Livewire\Status\Ticket\CrearTicket::class)->name('crear-ticket');
    Route::get('/status/ticket/editar-ticket/{id}', \App\Livewire\Status\Ticket\EditarTicket::class)->name('editar-ticket');
});


//Rutas del Modulo de Comunas
Route::middleware(['auth:sanctum', 'verified', 'superadmin'])->group(function () {
    Route::get('/comunas/show-comunas', \App\Livewire\Comunas\ShowComunas::class)->name('show-comunas');
    Route::get('/comunas/crear-comuna', \App\Livewire\Comunas\CrearComuna::class)->name('crear-comuna');
    Route::get('/comunas/editar-comuna/{id}', \App\Livewire\Comunas\EditarComuna::class)->name('editar-comuna');
});
//Rutas del Modulo de Sectores

Route::middleware(['auth:sanctum', 'verified', 'superadmin'])->group(function () {
    Route::get('/sectores/show-sectores', \App\Livewire\Sectores\ShowSectores::class)->name('show-sectores');
    Route::get('/sectores/crear-sectore', \App\Livewire\Sectores\CrearSector::class)->name('crear-sector');
    Route::get('/sectores/editar-sectore/{id}', \App\Livewire\Sectores\EditarSector::class)->name('editar-sector');
});
//Rutas del Modulo de Especialidad

Route::middleware(['auth:sanctum', 'verified', 'superadmin'])->group(function () {
    Route::get('/especialidad/show-especialidad', \App\Livewire\Especialidad\ShowEspecialidad::class)->name('show-especialidad');
    Route::get('/especialidad/crear-especialidad', \App\Livewire\Especialidad\CrearEspecialidad::class)->name('crear-especialidad');
    Route::get('/especialidad/editar-especialidad/{id}', \App\Livewire\Especialidad\EditarEspecialidad::class)->name('editar-especialidad');
});




//Grupos de Rutas  roles permisos

Route::middleware(['auth:sanctum', 'verified', 'superadmin'])->group(function () {

    Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.delete');
    Route::resource('permissions', App\Http\Controllers\PermissionController::class);
    Route::resource('roles', App\Http\Controllers\RoleController::class);
});
