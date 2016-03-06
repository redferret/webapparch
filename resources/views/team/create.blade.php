<!-- Create Team -->

@extends('app')

@section('content')

<div class='form-group'>
    <form method='POST' action='{{action('TeamController@store')}}'>
        <div>
            Name of the Team
            <input type="text" name="name" value="" required>
        </div>
        
        <br/>
        
        <div>
            <button name='storage_type' value='create' type='submit'>Add Team</button>
        </div>
    </form>
</div>

@stop