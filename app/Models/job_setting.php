<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job_setting extends Model
{
    use HasFactory;
    protected $table = 'job_settings';
    protected $primarykey = 'id_settings';

    protected $fillable = [
        'id_job',
        'screening',
        'psikotest',
        'interview_hr',
        'interview_user',
        'hiring',
        'peralihan',
        'medical_check_up'
    ];

    protected $casts = [
        'form_data' => 'array'
    ];
}
