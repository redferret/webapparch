<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use App\Providers\Authen;
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
            
            $user = User::where('email', Input::get('email'))->first();
            
            if ($user == null){
            
                $user = User::create([
                    'name'=>Input::get('name'), 
                    'email'=>Input::get('email'), 
                    'password'=>Hash::make($password)]);
                $user->save();

                Authen::grant($user->name);
                return Redirect::to("/");
                
            } else {
                $msg = "User already exists";
            }
        }else{
            $msg = "Passwords don't match";
        }
        
        return "Registration Failed: ".$msg;
    }
}
