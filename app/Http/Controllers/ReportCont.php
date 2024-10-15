<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportCont extends Controller
{
    public function hiringIndex(){
        return view('report.hiring');
    }

    public function joIndex(){
        return view('report.jo');
    }
}
