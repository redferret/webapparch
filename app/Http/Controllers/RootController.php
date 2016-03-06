<?php

namespace App\Http\Controllers;


class RootController extends Controller
{
    
    /**
     * Gets the root page of the web app
     * @return type The root/home page
     */
    public function root(){
        
        return view("app");
    }
}
