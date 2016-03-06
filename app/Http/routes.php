<?php
Route::resource('sessions', 'SessionController');
Route::resource('register', 'RegisterController');
Route::resource('agents', 'AgentController');
Route::resource('listings', 'ListingController');
Route::resource('teams', 'TeamController');

Route::get("/", "RootController@root");

Route::get("agents", "AgentController@agents");
Route::get("agent/create", "AgentController@create");
Route::get("agent/update/{id}", "AgentController@update");
Route::get("agent/{id}", 'AgentController@agent');

Route::get("listings", "ListingController@listings");
Route::get("listing/create", "ListingController@create");
Route::get("listing/update", "ListingController@update");
Route::get("listing/{id}", 'ListingController@listing');

Route::get("teams", "TeamController@teams");
Route::get("team/create", "TeamController@create");
Route::get("team/update", "TeamController@update");
Route::get("team/{id}", 'TeamController@team');

Route::get('login', 'SessionController@login');
Route::get('logout', 'SessionController@logout');

Route::get('register', "RegisterController@reg");

