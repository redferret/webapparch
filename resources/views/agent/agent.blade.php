
@extends('app')

@section('content')

<div class='page-header'>
    <h2>Agent Info</h2>
</div>
<strong>{{$agent->name}} - <a href="{{action('TeamController@team',[$agentsTeam->id])}}">{{$agentsTeam->name}}</a></strong>
<ul>

    @foreach ($agent->listings as $listing)
    <li>
        <a href="{{action('ListingController@listing',[$listing->id])}}">{{$listing->name}}</a>
    </li>
    @endforeach
</ul>
@stop    
