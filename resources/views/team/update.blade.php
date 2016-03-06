<!-- Update Agent -->

@extends('app')

@section('content')
<div>Remove Team</div>
@stop

@section('guest_content')
<div>No Access by Guest</div>
<a href='/'>Back to Home</a>
@stop

@section('user_content')

<div class='form-group'>
    <form method='POST' action='{{action('TeamController@store')}}'>
        
        <div>
            Teams
            <select name='teamid'>
                @foreach ($teams as $team)
                <option value='{{$team->id}}'>
                    {{$team->name}}
                </option>
                @endforeach
            </select>
        </div>
        
        <br/>
        
        <div>
            <button name='storage_type' value='delete' type='submit'>Delete Team</button>
        </div>
    </form>
</div>

@stop