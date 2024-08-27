<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pic extends Model
{
    use HasFactory;
    protected $table='pic';
    protected $primarykey='id_pic';
}
