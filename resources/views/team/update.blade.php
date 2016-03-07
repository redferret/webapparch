<!-- Update Team -->

@extends('app')

@section('content')
<div>Edit Team</div>
@stop

@section('guest_content')
<div>No Access by Guest</div>
<a href='/'>Back to Home</a>
@stop

@section('user_content')

<div class='form-group'>
    <form method='POST' action='{{action('TeamController@store')}}'>
        
        <div>
            <input type='hidden' name='teamid' value='{{$team->id}}'/>
            <label for='name'>Team</label>
            <input name='name' value='{{$team->name}}'/>
        </div>
        <br/>
        <div>
            <label for='phone'>Phone</label>
            <input name='phone' value='{{$team->phone}}'/>
        </div>
        
        <br/>
        <div>
            <button name='storage_type' value='update' type='submit'>Update Team</button>
        </div>
        
        <br/>
        <div>
            <button name='storage_type' value='delete' type='submit'>Delete Team</button>
        </div>
    </form>
</div>

@stop