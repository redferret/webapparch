<!-- Update Agent -->

@extends('app')

@section('content')

<div class='form-group'>
    <form method='POST' action='{{action('AgentController@store')}}'>
        
        <div>
            Agents
            <select name='agentid'>
                @foreach ($agents as $agent)
                <option value='{{$agent->id}}'>
                    {{$agent->name}}
                </option>
                @endforeach
            </select>
        </div>
        <br/>
        
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
            <button name='storage_type' value='update' type='submit'>Update Agent</button>
        </div>
        <br/>
        <div>
            <button name='storage_type' value='delete' type='submit'>Delete Agent</button>
        </div>
    </form>
</div>

@stop