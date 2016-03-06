<!-- Create Agent -->

@extends('app')

@section('content')
@stop

@section('guest_content')
<div>No Access by Guest</div>
<a href='/'>Back to Home</a>
@stop
@section('user_content')

<div class='form-group'>
    <form method='POST' action='{{action('AgentController@store')}}'>
        <div>
            <label for='name'>Agent's Name</label>
            <input type="text" name="name" value="" required>
        </div>
        <br/>
        
        <div>
            <label for='phone'>Phone Number</label>
            <input type='tel' name='phone' value="" required>
        </div>
        
        <br/>
        
        <div>
            <label for='teamid'>Teams</label>
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