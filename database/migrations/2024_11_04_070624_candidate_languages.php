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
        Schema::create('candidate_languages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_candidate');
            $table->string('bahasa');
            $table->string('berbicara'); // Contoh: lancar, baik, dasar
            $table->string('menulis');   // Contoh: lancar, baik, dasar
            $table->timestamps();

            // $table->foreign('id_candidate')->references('id_candidate')->on('candidates')->onDelete('cascade');
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
