<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\User;

class RegisterController extends Controller
{
    
    public function reg(){
        return view('auth.register');
    }
    
    public function store(){
        
        $password = Input::get('password');
        $confirm = Input::get('password_confirmation');
        
        if ($password == $confirm){
            if (!Auth::attempt(Input::only('email', 'password'))){
                $user = User::create([
                    'name'=>Input::get('name'), 
                    'email'=>Input::get('email'), 
                    'password'=>Hash::make($password)]);
                $user->save();
                
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['nameofuser'] = Input::get('name');
                return Redirect::to("/");
            }else{
                $msg = "User already exists";
            }
        }else{
            $msg = "Passwords don't match";
        }
        
        return "Registration Failed: ".$msg;
    }
}
