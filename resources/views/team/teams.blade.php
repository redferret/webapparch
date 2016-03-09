
@extends('app')


@section('content')

<strong>List of available Companies/Teams</strong>
<ul>
    @foreach ($teams as $team)
    <li>
        <a href='{{action('TeamController@show', [$team->id])}}'>{{$team->name}}</a>
    </li>
    @endforeach
</ul>

@stop

@section('user_content')
<div>
    <a href='{{action('TeamController@create')}}'>Add a Team</a>
</div>
@stop