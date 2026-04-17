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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('BO_TITULO');
            $table->integer('BO_PAGINA');
            $table->foreignId('AU_ID')->constrained('author');
            $table->foreignId('CAT_ID')->constrained('categories');
            $table->foreignId('PUB_ID')->constrained('publishers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
