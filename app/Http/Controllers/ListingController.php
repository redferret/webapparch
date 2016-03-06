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
        
        Listing::storeByType(Input::get('storage_type'));
        $listings = Listing::all();
        return Redirect::to('/listings')->with(compact('listings'));
    }
    
    public function update(){
        $agents = Agent::all();
        $listings = Listing::all();
        return view('listing.update')->with(compact('agents', 'listings'));
    }
    
    /**
     * The content for the teams
     * @return type
     */
    public function listings(){
        $listings = Listing::all();
        
        return view('listing.listings')->with(compact('listings'));
    }
    
    /**
     * The content for each team
     * @param type $id The id of the team to search for
     * @return type The content
     */
    public function listing($id){
        $listing = Listing::findOrFail($id);
        
        return view('listing.listing')->with(compact('listing'));
    }
}
