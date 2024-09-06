<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Login extends Controller
{
    public function login(){
        // dd(Hash::make('daivakhau1'));
        if (Auth::check()) {
            return redirect('dashboard');
        }else{
            return view('login');
        }
    }

    public function prsLogin(Request $req){
        
        $credentials = $req->validate([
            'nik_ish' => 'required',
            'password' => 'required',
        ]);
        
        if (Auth::Attempt($credentials)) {
            // return redirect('/');
            return redirect('/dashboard');
        }else{
            return redirect('/');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
