<!-- Create Team -->

@extends('app')

@section('content')
@stop

@section('guest_content')
<div>No Access by Guest</div>
<a href='/'>Back to Home</a>
@stop

@section('user_content')

<div class='form-group'>
    <form method='POST' action='{{action('TeamController@store')}}'>
        <div>
            Name of the Team
            <input type="text" name="name" value="" required>
        </div>
        
        <br/>
        
        <div>
            <button name='storage_type' value='create' type='submit'>Add Team</button>
        </div>
    </form>
</div>

@stop