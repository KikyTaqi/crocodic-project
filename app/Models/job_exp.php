<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job_exp extends Model
{
    use HasFactory;
    protected $table = 'candidate_job_exp';
    protected $fillable = [
        'id_candidate',
        'nama_pekerjaan',
        'nama_perusahaan',
        'lokasi',
        'tipe_pekerjaan',
        'gaji',
        'mulai_kerja',
        'selesai_kerja',
        'deskripsi',
        'masih_bekerja'
    ];
}
