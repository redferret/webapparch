<!-- Update Agent -->

@extends('app')

@section('content')
<div>Edit Agent Info</div>
@stop

@section('guest_content')
<div>No Access by Guest</div>
<a href='/'>Back to Home</a>
@stop

@section('user_content')

<div class='form-group'>
    <form method='POST' action='{{action('AgentController@update', [$agent->id])}}'>
        
        <div>
            <div>
                <label for='name'>Agent</label>
                <input type='tel' name='name' value='{{$agent->name}}'>
            </div>
        </div>
        <br/>
        
        <div>
            <label for='phone'>Phone Number</label>
            <input type='tel' name='phone' value='{{$agent->phone}}'>
        </div>
        
        <br/>
        
        <div>
            <label for='teamid'>Team</label>
            <select name='teamid'>
                @foreach ($teams as $team)
                <option value='{{$team->id}}' >
                    {{$team->name}}
                </option>
                @endforeach
            </select>
        </div>
        
        <br/>
        
        <div>
            <button type='submit'>Update Agent</button>
        </div>
        <br/>
        
    </form>
    <form method='Post' action='{{action('AgentController@destroy', [$agent->id])}}'>
        <div>
            <button type='submit'>Delete Agent</button>
        </div>
    </form>
</div>

@stop