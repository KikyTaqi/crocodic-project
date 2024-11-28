<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class activity extends Model
{
    use HasFactory;
    protected $table = 'activity';
    protected $fillable = [
        'id_candidate',
        'id_user',
        'tgl',
        'deskripsi',
        'type'
    ];
}
