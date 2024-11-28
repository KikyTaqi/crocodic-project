<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->timestamps();
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
        // Schema::create('migrations', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('migration');
        //     $table->integer('batch');
        // });

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

        // Tabel kandidat
        Schema::create('candidate', function (Blueprint $table) {
            $table->id('id_candidate');
            $table->integer('id_job')->unsigned();
            $table->string('nama', 255);
            $table->string('process', 50);
            $table->integer('tags')->unsigned();
            $table->string('domisili', 255);
            $table->integer('gender')->unsigned();
            $table->integer('usia')->unsigned();
            $table->string('pendidikan', 255);
            $table->string('layanan', 255);
            $table->string('jabatan', 255);
            $table->string('minat', 255);
            $table->string('status', 50);
            $table->string('email', 255);
            $table->string('no_hp', 255);
            $table->float('rating')->default(0);
            $table->string('foto_profile', 50)->nullable();
            $table->string('foto_cv', 255);
            $table->timestamps();
        });
        Schema::create('candidate_job_exp', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_candidate');
            $table->string('nama_pekerjaan');
            $table->string('nama_perusahaan');
            $table->string('lokasi');
            $table->string('tipe_pekerjaan');
            $table->integer('gaji');
            $table->string('mulai_kerja');
            $table->string('selesai_kerja');
            $table->string('pengalaman');
            $table->string('deskripsi');
            $table->string('masih_bekerja');
            $table->timestamps();
        
            $table->foreign('id_candidate')->references('id_candidate')->on('candidate')->onDelete('cascade');
        });
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

            $table->foreign('id_candidate')->references('id_candidate')->on('candidate')->onDelete('cascade');
        });
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
        Schema::create('candidate_organizational_exp', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_candidate');
            $table->string('nama_organisasi');
            $table->string('nama_tempat');
            $table->string('jabatan');
            $table->year('tahun_mulai');
            $table->year('tahun_selesai')->nullable();
            $table->timestamps();

            $table->foreign('id_candidate')->references('id_candidate')->on('candidate')->onDelete('cascade');
        });
        Schema::create('candidate_languages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_candidate');
            $table->string('bahasa');
            $table->string('berbicara');
            $table->string('menulis');
            $table->timestamps();

            $table->foreign('id_candidate')->references('id_candidate')->on('candidate')->onDelete('cascade');
        });
        Schema::create('candidate_skills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_candidate');
            $table->string('kategori');
            $table->string('deskripsi');
            $table->timestamps();

            $table->foreign('id_candidate')->references('id_candidate')->on('candidate')->onDelete('cascade');
        });
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->string('id_candidate');
            $table->string('id_user');
            $table->timestamp('time');
            $table->string('note');
            $table->timestamps();
        });
        Schema::create('activity', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_candidate');
            $table->unsignedBigInteger('id_user');
            $table->date('tgl');
            $table->string('deskripsi');
            $table->string('type');
            $table->timestamps();
        
            $table->foreign('id_candidate')->references('id_candidate')->on('candidate')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('candidate');
        Schema::dropIfExists('candidate_job_exp');
        Schema::dropIfExists('candidate_edu_exp');
        Schema::dropIfExists('candidate_certifications');
        Schema::dropIfExists('candidate_organizational_exp');
        Schema::dropIfExists('candidate_languages');
        Schema::dropIfExists('candidate_skills');
        Schema::dropIfExists('notes');
        Schema::dropIfExists('activity');
    }
};
