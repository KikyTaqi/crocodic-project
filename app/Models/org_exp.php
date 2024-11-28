<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class org_exp extends Model
{
    use HasFactory;
    protected $table = 'candidate_organizational_exp';
    protected $fillable = [
        'id_candidate',
        'nama_organisasi',
        'nama_tempat',
        'jabatan',
        'tahun_mulai',
        'tahun_selesai',
    ];
}
