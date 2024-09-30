<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HiringCont extends Controller
{
    public function hiring(){
        return view('hiring.hiring');
    
    }
    public function reportHiring(){
        return view('hiring.reportHiring');
    }
}
