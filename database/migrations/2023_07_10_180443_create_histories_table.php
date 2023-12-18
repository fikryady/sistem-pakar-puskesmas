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
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->string('kd_konsultasi');
            $table->date('tgl');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('disease_id');
            $table->text('symptom_id');
            $table->decimal('bayes_value', 4, 2);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('disease_id')->references('id')->on('diseases')->onDelete('cascade');
        $table->foreign('symptom_id')->references('id')->on('symptoms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};
