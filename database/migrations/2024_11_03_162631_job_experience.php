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
        if (!Schema::hasTable('candidate_job_exp')) {
            Schema::create('candidate_job_exp', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('id_candidate');
                $table->string('nama_pekerjaan');
                $table->string('nama_perusahaan');
                $table->string('lokasi');
                $table->string('tipe_pekerjaan');
                $table->integer('gaji');
                $table->date('mulai_kerja');
                $table->date('selesai_kerja');
                $table->string('deskripsi');
                $table->string('masih_bekerja');
                $table->timestamps();
            
                $table->foreign('id_candidate')->references('id_candidate')->on('candidates')->onDelete('cascade');
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
