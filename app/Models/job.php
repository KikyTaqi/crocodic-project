<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job extends Model
{
    use HasFactory;
    protected $table='job';
    protected $primaryKey = 'id_job';

    public function candidates(){
        return $this->hasMany(Candidate::class, 'id_job', 'id_job');
    }

    protected $casts = [
        'form_data' => 'array'
    ];
}
