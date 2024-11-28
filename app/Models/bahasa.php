<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bahasa extends Model
{
    use HasFactory;
    protected $table = 'candidate_languages';
    protected $fillable = [
        'id_candidate',
        'bahasa',
        'berbicara',
        'menulis',
    ];
}
