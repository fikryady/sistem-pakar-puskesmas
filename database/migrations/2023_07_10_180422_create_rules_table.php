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
        Schema::create('rules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('disease_id');
            $table->foreignId('symptom_id');
            $table->timestamps();

            $table->foreign('disease_id')->references('id')->on('diseases')->onDelete('cascade');
            $table->foreign('symptom_id')->references('id')->on('symptoms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rules');
    }
};
