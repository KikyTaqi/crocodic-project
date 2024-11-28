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
        if (!Schema::hasTable('activity')) {
            Schema::create('activity', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('id_candidate');
                $table->unsignedBigInteger('id_user');
                $table->date('tgl');
                $table->string('deskripsi');
                $table->string('type');
                $table->timestamps();
            
                $table->foreign('id_candidate')->references('id_candidate')->on('candidates')->onDelete('cascade');
                $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
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
