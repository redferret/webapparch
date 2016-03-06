<?php

namespace App\Http\Controllers;

use App\Providers\Authen;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SessionController extends Controller
{
    
    public function login(){

        if (Authen::check()){
            return view('app');
        }else{
            return view('auth.login');
        }
        
    }

    public function logout(){
        Authen::logout();
        return view('app');
    }
    
    public function store(){
        
        if (Auth::attempt(Input::only('email', 'password'))){
            Authen::grant(Auth::user()->name);
            return Redirect::to('/');
        }else{
            return 'login Failed!';
        }
    }
    
}
