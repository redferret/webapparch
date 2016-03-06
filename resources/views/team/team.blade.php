
@extends('app')

@section('content')
<strong>Team - {{$team->name}}</strong>
<p>
    <strong>Agents</strong>
    @foreach ($agents as $agent)
    <ul>
        <li>
            <a href="{{action('AgentController@agent', [$agent->id])}}">{{$agent->name}}</a>
        </li>
        <ul>
            @foreach ($agent->listings as $listing)
            <li>
                <a href="{{action('ListingController@listing', [$listing->id])}}">{{$listing->name}}</a>
            </li>
            @endforeach
        </ul>    
    </ul>
    @endforeach
    
</p>

@stop

@section('user_edits')
<div>
    <a href="{{action('AgentController@create')}}">Add Agent</a>
</div>
<div>
    <a href="{{action('AgentController@update')}}">Update Agent</a>
</div>
@stop