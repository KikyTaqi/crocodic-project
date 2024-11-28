<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StopJoCont extends Controller
{
    public function index(){
        return view('stop_jo.index');
    }
}
