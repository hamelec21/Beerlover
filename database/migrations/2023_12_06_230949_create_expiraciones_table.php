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
        Schema::create('expiraciones', function (Blueprint $table) {
            $table->id();
            $table->string('plazo');
            $table->unsignedBigInteger('tickets_id');
            $table->foreign('tickets_id')->references('id')->on('tickets')
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
        Schema::dropIfExists('expiraciones');
    }
};
