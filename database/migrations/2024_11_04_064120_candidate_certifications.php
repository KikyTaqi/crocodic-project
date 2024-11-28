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
        if (!Schema::hasTable('candidate_certifications')) {
            Schema::create('candidate_certifications', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('id_candidate');
                $table->string('nama_pelatihan');
                $table->string('tempat');
                $table->date('tanggal')->nullable();
                $table->string('deskripsi')->nullable();
                $table->string('file_sertifikat')->nullable();
                $table->timestamps();
    
                $table->foreign('id_candidate')->references('id_candidate')->on('candidate')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
