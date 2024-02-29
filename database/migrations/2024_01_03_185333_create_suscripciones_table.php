<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('suscripciones', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('users')
            ->onDelete('no action')
            ->onUpdate('no action');


            $table->unsignedBigInteger('tipo_suscripciones_id');
            $table->foreign('tipo_suscripciones_id')->references('id')->on('tipo_suscripciones')
            ->onDelete('no action')
            ->onUpdate('no action');

            $table->unsignedBigInteger('status_suscripciones_id');
            $table->foreign('status_suscripciones_id')->references('id')->on('status_suscripciones')
            ->onDelete('no action')
            ->onUpdate('no action');

            $table->unsignedBigInteger('planes_id');
            $table->foreign('planes_id')->references('id')->on('planes')
            ->onDelete('no action')
            ->onUpdate('no action');

            $table->date('fecha_inicio');
            $table->date('fecha_vencimiento');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suscripciones');
    }
};
