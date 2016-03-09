<?php

use App\Providers\Authen;

Authen::authenticate();


// Example for {!! !!}
$exp_br = "<br/>";
$exp_title = "<strong>Title</strong>";
$exp_enable = false;
?>

@section('content')

    @if(Authen::check())
    
        <div>Welcome back {{Authen::name()}}!</div>
        
    @else
    
        <div>Welcome!</div>

        @if($exp_enable)
            <br/>
            {{$exp_br}}
            {{$exp_title}}
            {!!$exp_br!!}
            {!!$exp_title!!}
            {{$undefined or "Default"}}
        @endif

    @endif

@stop

<!DOCTYPE html>
<html>
    <head>
        <title>Laravel Web App - Realty</title>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' type='text/css' href='{{ asset('css/main.css') }}'/>
        
    </head>
    <body>
        
        <div class='blog-masthead'>
            
            <div class='container'>
                <img src='http://ivtowersrealty.com/wp-content/uploads/2015/02/for-sale.jpg'
             style='width: 150px; height: 100px'>
                <nav class='blog-nav'>
                    <a class='blog-nav-item' href='/'>Home</a>
    
                    @if (Authen::check())
                        <a class='blog-nav-item' href='{{action('SessionController@logout')}}'>Log Out</a>
                        <a class='blog-nav-item' href='/agents'>Agents</a>
                    @else
                        <a class='blog-nav-item' href='/login'>Log In</a>
                        <a class='blog-nav-item' href='/register'>Sign Up</a>
                    @endif
                    
                    <a class='blog-nav-item' href='/listings'>Listings</a>
                    <a class='blog-nav-item' href='/teams'>Companies</a>
                </nav>
            </div>
        </div>
        <br/>
        
        <div class='row'>
            
            <div class='col-md-6'>
                <div>@yield('content')</div>
                
                <div>
                    @if(Authen::check())
                        @yield('user_content')
                    @else
                        @yield('guest_content')
                    @endif
                </div>
            </div>
            
        </div>
        
        
    </body>

</html>

