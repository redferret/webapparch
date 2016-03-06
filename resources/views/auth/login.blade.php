@extends('app')
@section('user_content')
<div>Already logged in</div>
@stop
@section('guest_content')
<br/>
<div class='form-group'>
    <form method="POST" action="{{action('SessionController@store')}}">

        <div>
            Email
            <input type="email" name="email" value="" required>
        </div>
        <br/>
        <div>
            Password
            <input type="password" name="password" id="password" required>
        </div>
        <br/>
        <div>
            <button type="submit">Login</button>
        </div>
    </form>
</div>
@stop