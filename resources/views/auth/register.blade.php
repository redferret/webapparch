@extends('app')

@section('content')

<form method='POST' action='{{action('RegisterController@store')}}'>

    <div>
        Name
        <input type='text' name='name' value='' required>
    </div>

    <div>
        Email
        <input type='email' name='email' value='' required>
    </div>

    <div>
        Password
        <input type='password' name='password' required>
    </div>

    <div>
        Confirm Password
        <input type='password' name='password_confirmation' required>
    </div>

    <div>
        <button type='submit'>Register</button>
    </div>
</form>

@stop