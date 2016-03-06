
@extends('app')

@section('content')

<div class='page-header'>
    <h2>Agent Info</h2>
</div>
<strong>{{$agent->name}} - <a href="{{action('TeamController@team',[$agentsTeam->id])}}">{{$agentsTeam->name}}</a></strong>
<div>Phone - {{$agent->phone}}</div>
<ul>
    
    @foreach ($agent->listings as $listing)
    <li>
        <a href="{{action('ListingController@listing',[$listing->id])}}">{{$listing->name}}</a>
    </li>
    @endforeach
</ul>
@stop    
@section('user_content')
<div>
    <a href="{{action('AgentController@store')}}">Add Agent</a>
</div>
<div>
    <a href='{{action('AgentController@update', [$agent->id])}}'>Update Agent</a>
</div>
@stop
