<!-- Create Listing -->

@extends('app')

@section('content')

<div class='form-group'>
    <form method='POST' action='{{action('ListingController@store')}}'>
        <div>
            Listing
            <input type="text" name="name" value="" required>
        </div>
        <br/>
        
        <div>
            <button name='storage_type' value='create' type='submit'>Add Listing</button>
        </div>
    </form>
</div>
@stop