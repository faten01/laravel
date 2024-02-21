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
    {Schema::table('users', function (Blueprint $table) {
        $table->string('nom');
        $table->string('Prenom');
        $table->string('MotDePasse');
        $table->rememberToken();
        $table->string('Telephone');
        $table->enum('Role', ['Exposant', 'Visiteur', 'Admin']);
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
