<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TerminatedCont extends Controller
{
    public function cancel_join(){
        return view('terminated.cancel_join');
    }


    public function resign(){
        return view('terminated.resign');
    }
}
