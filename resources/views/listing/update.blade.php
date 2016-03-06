
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
    <form method='POST' action='{{action('ListingController@store')}}'>
        
        <div>
            Listing
            <select name='listingid'>
                @foreach ($listings as $listing)
                <option value='{{$listing->id}}'>
                    {{$listing->name}}
                </option>
                @endforeach
            </select>
        </div>
        
        <br/>
        
        <div>
            Agents
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
            <button name='storage_type' value='update' type='submit'>Update Listing</button>
        </div>
        <div>
            <button name='storage_type' value='delete' type='submit'>Delete Listing</button>
        </div>
    </form>
</div>

@stop