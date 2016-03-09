<!-- Create Team -->

@extends('app')

@section('content')
<div>Add a new Team</div>
@stop

@section('guest_content')
<div>No Access by Guest</div>
<a href='/'>Back to Home</a>
@stop

@section('user_content')

<div class='form-group'>
    <form method='POST' action='{{action('TeamController@store')}}'>
        <div>
            <label for='name' value=''>Name of the Team</label>
            <input type='text' name='name' value='' required>
        </div>
        
        <br/>
        
        <div>
            <label for='phone' value=''>Phone Number</label>
            <input type='text' name='phone' value='' required>
        </div>
        
        <br/>
        
        <div>
            <button name='storage_type' type='submit'>Add Team</button>
        </div>
    </form>
</div>

@stop