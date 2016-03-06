<?php

namespace App\Providers;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class Authen extends ServiceProvider {
    
    private static $auth = false, $nameofuser = "";
    private static $logout = false;
    
    /**
     * Flags the app to log out the user when they are redirected
     * to another page.
     */
    public static function logout(){
        Authen::$logout = true;
    }
    
    /**
     * Performs a logout if the user is being logged out, or authenticates
     * the user.
     */
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
    
    /**
     * Checks to see if the user is logged in.
     * @return type True if the user is logged in, false otherwise
     */
    public static function check(){
        return Authen::$auth;
    }
    /**
     * Retrives the user's name
     * @return type The name of the user currently logged in.
     */
    public static function name(){
        return Authen::$nameofuser;
    }
    
    /**
     * Logs the user in, or grants access to restricted pages.
     * @param type $name The name of the user.
     */
    public static function grant($name){
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['nameofuser'] = $name;
    }
}

