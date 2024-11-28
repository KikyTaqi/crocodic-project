<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllTables extends Migration
{
    public function up()
    {
        // Tabel cache
        Schema::create('cache', function (Blueprint $table) {
            $table->string('key', 255)->primary();
            $table->mediumText('value');
            $table->integer('expiration');
        });

        // Tabel cache_locks
        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key', 255)->primary();
            $table->string('owner', 255);
            $table->integer('expiration');
        });

        // Tabel failed_jobs
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('uuid', 255);
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });

        // Tabel job
        Schema::create('job', function (Blueprint $table) {
            $table->increments('id_job');
            $table->string('nama_job')->nullable();
            $table->string('job_category')->nullable();
            $table->string('job_level')->nullable();
            $table->bigInteger('gaji')->nullable();
            $table->integer('pengalaman')->nullable();
            $table->date('deadline_recruitment')->nullable();
            $table->string('nama_perusahaan')->nullable();
            $table->string('industri')->nullable();
            $table->longText('tentang_perusahaan')->nullable();
            $table->string('alamat')->nullable();
            $table->string('logo')->nullable();
            $table->longText('desc_pekerjaan')->nullable();
            $table->string('nomor_job')->nullable();
            $table->string('lokasi')->nullable();
            $table->integer('total_butuh')->nullable();
            $table->integer('status')->default(0);
            $table->longText('form_data')->nullable()->charset('utf8mb4')->collation('utf8mb4_bin');
            $table->timestamps(0)->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });

        // Tabel job_activity
        Schema::create('job_activity', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('id_job');
            $table->string('action');
            $table->string('person');
            $table->timestamps();
        });

        // Tabel job_config
        Schema::create('job_config', function (Blueprint $table) {
            $table->increments('id_config');
            $table->integer('id_job');
            $table->integer('tampilkan_nama_perusahaan')->nullable();
            $table->integer('foto_profil')->nullable();
            $table->integer('status_pernikahan')->nullable();
            $table->integer('agama')->nullable();
            $table->integer('tinggi_badan')->nullable();
            $table->integer('berat_badan')->nullable();
            $table->integer('pendidikan')->nullable();
            $table->integer('pengalaman_kerja')->nullable();
        });

        // Tabel job_settings
        Schema::create('job_settings', function (Blueprint $table) {
            $table->increments('id_settings');
            $table->integer('id_job');
            $table->string('auto_res')->nullable();
            $table->text('subject')->nullable();
            $table->text('body')->nullable();
            $table->integer('screening')->default(0);
            $table->integer('psikotest')->default(0);
            $table->integer('interview_hr')->default(0);
            $table->integer('interview_user')->default(0);
            $table->integer('hiring')->default(0);
            $table->integer('peralihan')->default(0);
            $table->integer('medical_check_up')->default(0);
            $table->timestamps();
        });

        // Tabel migrations
        Schema::create('migrations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('migration');
            $table->integer('batch');
        });

        // Tabel password_reset_tokens
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email');
            $table->string('token');
            $table->timestamp('created_at')->nullable();
            $table->primary('email');
        });

        // Tabel personal_access_tokens
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('tokenable_type');
            $table->bigInteger('tokenable_id')->unsigned();
            $table->string('name');
            $table->string('token', 64);
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
            $table->unique('token');
            $table->index(['tokenable_type', 'tokenable_id']);
        });

        // Tabel pic
        Schema::create('pic', function (Blueprint $table) {
            $table->increments('id_pic');
            $table->string('nama');
            $table->string('role');
            $table->string('email');
            $table->string('office');
        });

        // Tabel sessions
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity');
            $table->primary('id');
            $table->index('user_id');
            $table->index('last_activity');
        });

        // Tabel task
        Schema::create('task', function (Blueprint $table) {
            $table->increments('id_task');
            $table->string('id_user');
            $table->string('job');
            $table->string('posisi');
            $table->time('jam_awal');
            $table->time('jam_akhir');
        });

        // Tabel users
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('nik_ish')->unsigned();
            $table->string('name');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('foto_profile', 50);
            $table->string('remember_token', 100)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cache');
        Schema::dropIfExists('cache_locks');
        Schema::dropIfExists('failed_jobs');
        Schema::dropIfExists('job');
        Schema::dropIfExists('job_activity');
        Schema::dropIfExists('job_config');
        Schema::dropIfExists('job_settings');
        Schema::dropIfExists('migrations');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('personal_access_tokens');
        Schema::dropIfExists('pic');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('task');
        Schema::dropIfExists('users');
    }
}
