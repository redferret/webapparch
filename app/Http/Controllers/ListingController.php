<?php

namespace App\Http\Controllers;


use App\Listing;
use App\Agent;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class ListingController extends Controller
{
    
    public function create(){
        return view('listing.create');
    }
    
    public function store(){
        
        $listing = Listing::create(['name'=>Input::get('name')]);
        
        return Redirect::to(action('ListingController@show', [$listing->id]));
    }
    
    public function update($id){
        
        $listing = Listing::find($id);
        $agent = Agent::find(Input::get('agentid'));
        $listing->agents()->save($agent);
        
        return Redirect::to(action('ListingController@show', [$listing->id]));
    }
    
    public function destroy($id){
        
        $listing = Listing::find($id);
        $listing->delete();
        
        return Redirect::to(action('ListingController@index'));
    }
    
    public function edit($id){
        $listing = Listing::findOrFail($id);
        $agents = Agent::all();
        return view('listing.update')->with(compact('listing', 'agents'));
    }
    /**
     * The content for the teams
     * @return type
     */
    public function index(){
        $listings = Listing::all();
        return view('listing.listings')->with(compact('listings'));
    }
    
    /**
     * The content for each team
     * @param type $id The id of the team to search for
     * @return type The content
     */
    public function show($id){
        $listing = Listing::findOrFail($id);
        return view('listing.listing')->with(compact('listing'));
    }
}
