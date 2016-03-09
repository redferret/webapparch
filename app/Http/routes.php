<?php
Route::get('team/edit/{id}', 'TeamController@edit');
Route::post('team/update/{id}', 'TeamController@update');
Route::post('team/store', 'TeamController@store');
Route::get('teams', 'TeamController@index');
Route::get('teams/create', 'TeamController@create');
Route::get('teams/{id}', 'TeamController@show');
Route::post('team/{id}/destroy', 'TeamController@destroy');

Route::get("/", "RootController@root");

Route::get('agent/edit/{id}', 'AgentController@edit');
Route::post('agent/update/{id}', 'AgentController@update');
Route::post('agent/store', 'AgentController@store');
Route::get('agents', 'AgentController@index');
Route::get('agents/create', 'AgentController@create');
Route::get('agents/{id}', 'AgentController@show');
Route::post('agent/{id}/destroy', 'AgentController@destroy');

Route::get('listing/edit/{id}', 'ListingController@edit');
Route::post('listing/update/{id}', 'ListingController@update');
Route::post('listing/store', 'ListingController@store');
Route::get('listings', 'ListingController@index');
Route::get('listings/create', 'ListingController@create');
Route::get('listings/{id}', 'ListingController@show');
Route::post('listing/{id}/destroy', 'ListingController@destroy');

Route::resource('sessions', 'SessionController');
Route::get('login', 'SessionController@login');
Route::get('logout', 'SessionController@logout');

Route::resource('register', 'RegisterController');
Route::get('register', "RegisterController@reg");

