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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id('ReservationID');
            $table->unsignedBigInteger('ExposantID');
            $table->unsignedBigInteger('StandID');
            $table->date('DateReservation');
            $table->date('DateDebut');
            $table->date('DateFin');
            $table->enum('Statut', ['Confirmée', 'En attente', 'Annulée']);
            $table->timestamps();

            $table->foreign('ExposantID')->references('UserID')->on('user_utilisateurs')->where('Role', 'Exposant');
            $table->foreign('StandID')->references('id')->on('stands');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
