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
            $table->string('Nom')->default(''); // Provide a default value (empty string in this case)
            $table->string('Prenom')->default('');
            $table->string('Email')->unique()->default('');
            $table->string('Telephone')->default('');
            $table->enum('Role', ['Exposant', 'Visiteur', 'Admin']);
            $table->string('MotDePasse')->default('');
            $table->timestamps();

          
        });

        Schema::table('user_utilisateurs', function (Blueprint $table) {
            $table->string('api_token', 80)->after('MotDePasse') // adjust the column definition as needed
                  ->unique()
                  ->nullable()
                  ->default(null);
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
