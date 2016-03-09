@extends('app')

@section('content')
@stop

@section('user_content')
<div>You are logged in</div>
@stop

@section('guest_content')

<form method='POST' action='{{action('RegisterController@store')}}'>

    <div>
        <label for='name'>Name</label>
        <input type='text' name='name' value='' required>
    </div>
    <br/>
    <div>
        <label for='email'>Email</label>
        <input type='email' name='email' value='' required>
    </div>
    <br/>
    <div>
        <label for='password'>Password</label>
        <input type='password' name='password' required>
    </div>
    <br/>
    <div>
        <label for='password_confirmation'>Confirm Password</label>
        <input type='password' name='password_confirmation' required>
    </div>
    <br/>
    <div>
        <button type='submit'>Register</button>
    </div>
</form>

@stop