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
     Schema::create('author', function 
     (Blueprint $table){
     $table-> id();
     $table-> STRING('AU_NOME');
     $table-> STRING('AU_EMAIL')->unique();
     $table-> DATETIME('AU_ANIVERSARIO')->nullable();
     $table-> timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
     schema::dropIfExists('author');
  }
};
