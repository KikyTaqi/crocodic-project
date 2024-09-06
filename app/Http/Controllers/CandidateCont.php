<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\candidate;

class CandidateCont extends Controller
{
    public function candidate(){
        $candidates = candidate::paginate(15);
        return view('candidate.candidate', ['candidates' => $candidates]);
    }
}
