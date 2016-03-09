
@extends('app')

@section('content')
<div>Update Listing</div>
@stop

@section('guest_content')
<div>No Access by Guest</div>
<a href='/'>Back to Home</a>
@stop

@section('user_content')

<div class='form-group'>
    <form method='Post' action='{{action('ListingController@update',[$listing->id])}}'>
        
        <div>
            <label for='name'>Listing</label>
            <input type='text' name='name' value='{{$listing->name}}'/>
        </div>
        
        <br/>
        
        <div>
            <label for='agentid'>Agents</label>
            <select name='agentid'>
                @foreach ($agents as $agent)
                <option value='{{$agent->id}}'>
                    {{$agent->name}}
                </option>
                @endforeach
            </select>
        </div>
        
        <br/>
        
        <div>
            <button type='submit'>Update Listing</button>
        </div>
        
    </form>
    <form method='Post' action='{{action('ListingController@destroy', [$listing->id])}}'>
        <div>
            <button type='submit'>Delete Listing</button>
        </div>
    </form>
</div>

@stop