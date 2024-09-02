<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\task;
use App\Models\job;
use App\Models\candidate;
use App\Models\pic;
use App\Models\job_setting;
use App\Models\job_activity;
use App\Models\job_config;
use Carbon\Carbon;

class Login extends Controller
{
    public function login(){
        return view('login');
    }
}
