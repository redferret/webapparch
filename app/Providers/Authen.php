<?php

namespace App\Providers;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class Authen extends ServiceProvider {
    
    private static $auth = false, $nameofuser = "";
    private static $logout = false;
    
    public static function logout(){
        Authen::$logout = true;
    }
    
    public static function authenticate(){
        session_start();
        if (Authen::$logout){
            unset($_SESSION['loggedin']);
            unset($_SESSION['nameofuser']);
            Authen::$logout = false;
            Authen::$auth = false;
        }else{
            if (isset($_SESSION['loggedin'])){
                Authen::$auth = $_SESSION['loggedin'];
                Authen::$nameofuser = $_SESSION['nameofuser'];
            }
        }
    }
    
    public static function check(){
        return Authen::$auth;
    }
    public static function name(){
        return Authen::$nameofuser;
    }
    
    public static function grant($name){
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['nameofuser'] = $name;
    }
}

