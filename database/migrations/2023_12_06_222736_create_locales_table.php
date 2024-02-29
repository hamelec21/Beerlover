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
        Schema::create('locales', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('direccion');
            $table->string('imagen');

            $table->unsignedBigInteger('especialidades_id');
            $table->foreign('especialidades_id')->references('id')->on('especialidades')
            ->onDelete('no action')
            ->onUpdate('no action');

            $table->unsignedBigInteger('comunas_id');
            $table->foreign('comunas_id')->references('id')->on('comunas')
            ->onDelete('no action')
            ->onUpdate('no action');

            $table->unsignedBigInteger('sectores_id');
            $table->foreign('sectores_id')->references('id')->on('sectores')
            ->onDelete('no action')
            ->onUpdate('no action');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locales');
    }
};
