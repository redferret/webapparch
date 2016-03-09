
@extends('app')

@section('content')
<strong>Team - {{$team->name}}</strong>
<div>Phone: {{$team->phone}}</div>
<p>
    <strong>Agents</strong>
    @foreach ($agents as $agent)
    <ul>
        
        <li>
            <a href='{{action('AgentController@show', [$agent->id])}}'>{{$agent->name}}</a>
        </li>
        
        <ul>
            @foreach ($agent->listings as $listing)
            <li>
                <a href='{{action('ListingController@show', [$listing->id])}}'>{{$listing->name}}</a>
            </li>
            @endforeach
        </ul>    
    </ul>
    @endforeach
    
</p>

@stop

@section('user_content')
<div>
    <a href='{{action('TeamController@edit', [$team->id])}}'>Update Team</a>
</div>
@stop