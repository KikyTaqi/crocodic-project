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
        $plainPassword = 'nisacookie';
        $storedHash = '$2a$12$wBayhAh2psI1nIrIKDWl3uMDyxzE6mv.eoyknjUHpyDz9OPJpYjiO';

        if (Hash::check($plainPassword, $storedHash)) {
            dd('Password is correct!');
        } else {
            dd('Password is incorrect!');
        }
        if (Auth::check()) {
            return redirect('dashboard');
        }else{
            return view('login');
        }
    }

    public function prsLogin(Request $req){
        
        // $credentials = $req->validate([
        //     'nik_ish' => 'required',
        //     'password' => 'required',
        // ]);
        
        // if (Auth::Attempt($credentials)) {
        //     // return redirect('/');
        //     return redirect('/dashboard');
        // }else{
        //     return redirect('/');
        // }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
