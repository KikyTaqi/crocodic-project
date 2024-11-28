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
        Schema::create('candidate_skills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_candidate');
            $table->string('kategori'); // Contoh: 'Softskill', 'Hardskill'
            $table->string('deskripsi'); // Contoh: 'Kreatif', 'Komunikasi'
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
