
@extends('app')

@section('content')

<strong>Available Listings</strong>
<ul>
    @foreach ($listings as $listing)

    <li>
        <a href='{{action('ListingController@show', [$listing->id])}}'>{{$listing->name}}</a>
    </li>

    @endforeach
</ul>
@stop

@section('user_content')
<div>
    <a href='{{action('ListingController@create')}}'>Add Listing</a>
</div>
@stop