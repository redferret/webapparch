
@extends('app')

@section('content')

<strong>List of available Companies/Teams</strong>
<ul>
    @foreach ($teams as $team)
    <li>
        <a href="{{action('TeamController@team', [$team->id])}}">{{$team->name}}</a>
    </li>
    @endforeach
</ul>

@stop

@section('useredits')
<div>
    <a href="{{action('TeamController@create')}}">Add a Team</a>
</div>
<div>
    <a href="{{action('TeamController@update')}}">Remove a Team</a>
</div>
@stop