<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CancelCont extends Controller
{
    public function cancel_join(){
        return view('cancel_join.cancel_join');
    }

    public function create(){
        return view('cancel_join.create');
    }
}
