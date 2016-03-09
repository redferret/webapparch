<!-- Create Listing -->

@extends('app')

@section('content')
@stop

@section('guest_content')
<div>No Access by Guest</div>
<a href='/'>Back to Home</a>
@stop

@section('user_content')

<div class='form-group'>
    <form method='Post' action='{{action('ListingController@store')}}'>
        <div>
            <label for='name'>Address</label>
            <input type='text' name='name' value='' required>
        </div>
        <br/>
        
        <div>
            <button type='submit'>Add Listing</button>
        </div>
    </form>
</div>
@stop