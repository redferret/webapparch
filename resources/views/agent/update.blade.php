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
    <form method='POST' action='{{action('AgentController@store')}}'>
        
        <div>
            <div>
                <input type='hidden' name='agentid' value='{{$agent->id}}'/>
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
            <button name='storage_type' value='update' type='submit'>Update Agent</button>
        </div>
        <br/>
        <div>
            <button name='storage_type' value='delete' type='submit'>Delete Agent</button>
        </div>
    </form>
</div>

@stop