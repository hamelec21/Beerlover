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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_ticket');
            $table->unsignedBigInteger('ticket_status_id');
            $table->foreign('ticket_status_id')->references('id')->on('ticket_status')
            ->onDelete('no action')
            ->onUpdate('no action');

            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users')
            ->onDelete('no action')
            ->onUpdate('no action');

            $table->unsignedBigInteger('locales_id');
            $table->foreign('locales_id')->references('id')->on('locales')
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
        Schema::dropIfExists('tickets');
    }
};
