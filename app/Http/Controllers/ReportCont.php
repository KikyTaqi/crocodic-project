<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportCont extends Controller
{
    public function hiringIndex(){
        return view('report_hiring.index');
    }
}
