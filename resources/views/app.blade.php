<?php

use App\Providers\Authen;

Authen::authenticate();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Laravel Web App - Realty</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <style>
        body {
            padding-top: 20px;
            padding-bottom: 20px;
        }

        .navbar {
            margin-bottom: 20px;
        }
        
        h4 {
            margin-top: 25px;
        }
        .row {
            margin-bottom: 20px;
        }
        .row .row {
            margin-top: 10px;
            margin-bottom: 0;
        }
        [class*="col-"] {
            padding-top: 15px;
            padding-bottom: 15px;
            background-color: #eee;
            background-color: rgba(86,61,124,.15);
            border: 1px solid #ddd;
            border: 1px solid rgba(86,61,124,.2);
        }

        hr {
            margin-top: 40px;
            margin-bottom: 40px;
        }

/*
 * Globals
 */

body {
  font-family: Georgia, "Times New Roman", Times, serif;
  color: #555;
}

h1, .h1,
h2, .h2,
h3, .h3,
h4, .h4,
h5, .h5,
h6, .h6 {
  margin-top: 0;
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-weight: normal;
  color: #333;
}


/*
 * Override Bootstrap's default container.
 */

@media (min-width: 1200px) {
  .container {
    width: 970px;
  }
}


/*
 * Masthead for nav
 */

.blog-masthead {
  background-color: #428bca;
  -webkit-box-shadow: inset 0 -2px 5px rgba(0,0,0,.1);
          box-shadow: inset 0 -2px 5px rgba(0,0,0,.1);
}

/* Nav links */
.blog-nav-item {
  position: relative;
  display: inline-block;
  padding: 10px;
  font-weight: 500;
  color: #cdddeb;
}
.blog-nav-item:hover,
.blog-nav-item:focus {
  color: #fff;
  text-decoration: none;
}

/* Active state gets a caret at the bottom */
.blog-nav .active {
  color: #fff;
}
.blog-nav .active:after {
  position: absolute;
  bottom: 0;
  left: 50%;
  width: 0;
  height: 0;
  margin-left: -5px;
  vertical-align: middle;
  content: " ";
  border-right: 5px solid transparent;
  border-bottom: 5px solid;
  border-left: 5px solid transparent;
}


/*
 * Blog name and description
 */

.blog-header {
  padding-top: 20px;
  padding-bottom: 20px;
}
.blog-title {
  margin-top: 30px;
  margin-bottom: 0;
  font-size: 60px;
  font-weight: normal;
}
.blog-description {
  font-size: 20px;
  color: #999;
}


/*
 * Main column and sidebar layout
 */

.blog-main {
  font-size: 18px;
  line-height: 1.5;
}

/* Sidebar modules for boxing content */
.sidebar-module {
  padding: 15px;
  margin: 0 -15px 15px;
}
.sidebar-module-inset {
  padding: 15px;
  background-color: #f5f5f5;
  border-radius: 4px;
}
.sidebar-module-inset p:last-child,
.sidebar-module-inset ul:last-child,
.sidebar-module-inset ol:last-child {
  margin-bottom: 0;
}


/* Pagination */
.pager {
  margin-bottom: 60px;
  text-align: left;
}
.pager > li > a {
  width: 140px;
  padding: 10px 20px;
  text-align: center;
  border-radius: 30px;
}


/*
 * Blog posts
 */

.blog-post {
  margin-bottom: 60px;
}
.blog-post-title {
  margin-bottom: 5px;
  font-size: 40px;
}
.blog-post-meta {
  margin-bottom: 20px;
  color: #999;
}


/*
 * Footer
 */

.blog-footer {
  padding: 40px 0;
  color: #999;
  text-align: center;
  background-color: #f9f9f9;
  border-top: 1px solid #e5e5e5;
}
.blog-footer p:last-child {
  margin-bottom: 0;
}

        </style>
    </head>
    <body>
        
        <div class="blog-masthead">
            
            <div class="container">
                <img src='http://ivtowersrealty.com/wp-content/uploads/2015/02/for-sale.jpg'
             style='width: 150px; height: 100px'>
                <nav class="blog-nav">
                    <a class="blog-nav-item" href="/">Home</a>
    
                    @if (Authen::check())
                        <a class='blog-nav-item' href='{{action('SessionController@logout')}}'>Log Out</a>
                    @else
                        <a class='blog-nav-item' href='/login'>Log In</a>
                        <a class="blog-nav-item" href="/register">Sign Up</a>
                    @endif
                    
                    <a class="blog-nav-item" href="/listings">Listings</a>
                    <a class="blog-nav-item" href="/teams">Companies</a>
                </nav>
            </div>
        </div>
        <br/>
        
        <div class='row'>
            
            @if(Authen::check())
                Current User: {{Authen::name()}}
            @endif
            
            <div class='col-md-6'>
                @yield('content')
            </div>
            <div>
                @if(Authen::check())
                    @yield('useredits')
                @endif
            </div>
        </div>
        
        
    </body>

</html>

