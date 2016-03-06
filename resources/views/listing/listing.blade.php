
@extends('app')

@section('content')

<table class="table">
    <th>Listing</th>
    <th>Agent(s)</th>
    <tr>
        <td>{{$listing->name}}</td>
        <td>
            <ul>
                @foreach($listing->agents as $agent)
                <li>
                    <a href="{{action('AgentController@agent',[$agent->id])}}">{{$agent->name}}</a>
                </li>
                @endforeach
            </ul>
        </td>
    </tr>
</table>
@stop

