@extends('app')
@section('content')

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