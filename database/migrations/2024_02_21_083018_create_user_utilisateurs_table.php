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
        Schema::create('user_utilisateurs', function (Blueprint $table) {
            $table->id('UserID');
            $table->string('Nom');
            $table->string('Prenom');
            $table->string('Email')->unique();
            $table->string('Telephone');
            $table->enum('Role', ['Exposant', 'Visiteur', 'Admin']);
            $table->string('MotDePasse');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_utilisateurs');
    }
};
