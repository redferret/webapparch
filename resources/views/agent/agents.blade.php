
@extends('app')

@section('guest_content')
<div>No Access by Guest</div>
@stop

@section('user_content')

<title>Agents</title>

<table class="table">
    <th>
        Agent
    </th>
    <th>
        Team
    </th>
    @foreach ($agents as $agent)
    <tr>
        <td>
            <a href="{{action('AgentController@agent', [$agent->id])}}">{{$agent->name}}</a>
        </td>
        <td>
            <a href="{{action('TeamController@team', [$agent->team->id])}}">{{$agent->team->name}}</a>
        </td>
    </tr>
    @endforeach

</table>
@stop