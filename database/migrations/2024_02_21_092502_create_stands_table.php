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
        Schema::create('stands', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('description')->nullable();
            $table->string('number');
            $table->double('surface');
            $table->enum('status_reservation', ['free', 'reserved', 'occupied']);
            $table->timestamps();
        
            // Make sure to adjust the foreign key constraint to match your users table name and column names
            $table->foreign('user_id')->references('UserID')->on('user_utilisateurs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stands');
    }
};
