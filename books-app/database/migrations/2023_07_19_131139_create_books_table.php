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
            $table->timestamps();
            $table->string('title');
            $table->integer('page_count');
            $table->string('year');
            $table->foreignId('letter_id')->constrained();
            $table->foreignId('language_id')->constrained();
            $table->foreignId('binding_id')->constrained();
            $table->foreignId('format_id')->constrained();
            $table->foreignId('publisher_id')->constrained();
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
