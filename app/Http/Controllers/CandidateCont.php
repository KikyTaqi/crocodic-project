<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\candidate;
use App\Models\job;

class CandidateCont extends Controller
{
    public function candidate(){
        $candidates = candidate::paginate(15);
        $jobs = job::get();
        return view('candidate.candidate', ['candidates' => $candidates,'jobs' => $jobs]);
    }
}
