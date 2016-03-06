
@extends('app')

@section('content')

<strong>Available Listings</strong>
<ul>
    @foreach ($listings as $listing)

    <li>
        <a href="{{action('ListingController@listing', [$listing->id])}}">{{$listing->name}}</a>
    </li>

    @endforeach
</ul>
@stop

@section('user_edits')
<div>
    <a href='{{action('ListingController@create')}}'>Add Listing</a>
</div>
<div>
    <a href='{{action('ListingController@update')}}'>Update a Listing</a>
</div>
@stop