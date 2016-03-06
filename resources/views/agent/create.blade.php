<!-- Create Agent -->

@extends('app')

@section('content')

<div class='form-group'>
    <form method='POST' action='{{action('AgentController@store')}}'>
        <div>
            Agent's Name
            <input type="text" name="name" value="" required>
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
            <button name='storage_type' value='create' type='submit'>Add Agent</button>
        </div>
    </form>
</div>

@stop