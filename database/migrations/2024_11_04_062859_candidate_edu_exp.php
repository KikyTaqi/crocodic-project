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
        if (!Schema::hasTable('candidate_edu_exp')) {
            Schema::create('candidate_edu_exp', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('id_candidate');
                $table->string('institusi');
                $table->string('gelar')->nullable();
                $table->string('jurusan')->nullable();
                $table->string('lokasi')->nullable();
                $table->string('ipk')->nullable();
                $table->string('tanggal_mulai')->nullable();
                $table->string('tanggal_selesai')->nullable();
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
