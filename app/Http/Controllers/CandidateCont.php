<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CandidateCont extends Controller
{
    public function candidate(){
        return view('candidate.candidate');
    }
}
