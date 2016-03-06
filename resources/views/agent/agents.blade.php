
@extends('app')

@section('content')
<div>List of all registered agents</div>
@stop

@section('guest_content')
<div>No Access by Guest</div>
<a href='/'>Back to Home</a>
@stop

@section('user_content')

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
            <a href='{{action('AgentController@agent', [$agent->id])}}'>{{$agent->name}}</a>
        </td>
        <td>
            <a href='{{action('TeamController@team', [$agent->team->id])}}'>{{$agent->team->name}}</a>
        </td>
    </tr>
    @endforeach

</table>
@stop