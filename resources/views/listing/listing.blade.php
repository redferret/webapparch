
@extends('app')


@section('content')

<table class='table'>
    <th>Listing</th>
    <th>Agent(s)</th>
    <tr>
        <td>{{$listing->name}}</td>
        <td>
            <ul>
                @foreach($listing->agents as $agent)
                <li>
                    <a href='{{action('AgentController@show',[$agent->id])}}'>{{$agent->name}}</a>
                </li>
                @endforeach
            </ul>
        </td>
    </tr>
</table>
@stop

@section('user_content')
<div>
    <a href='{{action('ListingController@edit', [$listing->id])}}'>Update Listing</a>
</div>
@stop