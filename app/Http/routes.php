<?php
Route::resource('sessions', 'SessionController');
Route::resource('register', 'RegisterController');
Route::resource('agents', 'AgentController');
Route::resource('listings', 'ListingController');

Route::get('team/edit/{id}', 'TeamController@teamUpdate');
Route::post('team/update/{id}', 'TeamController@update');
Route::post('team/store', 'TeamController@store');
Route::get('teams', 'TeamController@index');
Route::get('teams/create', 'TeamController@create');
Route::get('teams/{id}', 'TeamController@show');
Route::post('team/{id}/destroy', 'TeamController@destroy');

Route::get("/", "RootController@root");

Route::get("agents", "AgentController@agents");
Route::get("agent/create", "AgentController@create");
Route::get("agent/update/{id}", "AgentController@update");
Route::get("agent/{id}", 'AgentController@agent');

Route::get("listings", "ListingController@listings");
Route::get("listing/create", "ListingController@create");
Route::get("listing/update", "ListingController@update");
Route::get("listing/{id}", 'ListingController@listing');

Route::get('login', 'SessionController@login');
Route::get('logout', 'SessionController@logout');

Route::get('register', "RegisterController@reg");

