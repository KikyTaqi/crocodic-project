<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class edu_exp extends Model
{
    use HasFactory;
    protected $table = 'candidate_edu_exp';
    protected $fillable = [
        'id_candidate',
        'institusi',
        'gelar',
        'jurusan',
        'lokasi',
        'ipk',
        'tgl_mulai',
        'tgl_selesai',
    ];
}
