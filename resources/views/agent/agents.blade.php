
@extends('app')

@section('content')
<strong>List of all registered agents</strong>

<title>Agents</title>

<table class='table'>
    <th>
        Agent
    </th>
    <th>
        Team
    </th>
    @foreach ($agents as $agent)
    <tr>
        <td>
            <a href='{{action('AgentController@show', [$agent->id])}}'>{{$agent->name}}</a>
        </td>
        <td>
            <a href='{{action('TeamController@show', [$agent->team->id])}}'>{{$agent->team->name}}</a>
        </td>
    </tr>
    @endforeach

    
    
</table>

@stop

@section('user_content')
<div>
    <a href='{{action('AgentController@create')}}'>Add Agent</a>
</div>
@stop