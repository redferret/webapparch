<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Team;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
class AgentController extends Controller
{
    
    
    public function create(){
        
        $teams = Team::all();
        
        return view('agent.create')->with(compact('teams'));
    }
    
    public function store(){
        
        Agent::storeByType(Input::get('storage_type'));
        $agents = Agent::all();
        return Redirect::to('/agents')->with(compact('agents'));
    }
    
    public function update(){
        
        $agents = Agent::all();
        $teams = Team::all();
        
        return view('agent.update')->with(compact('agents','teams'));
    }
    
    /**
     * Gets the agents page
     * @return type The content for agents
     */
    public function agents(){

        $agents = Agent::all();

        return view('agent.agents')->with(compact('agents'));
    }

    
    public function agent($id){
        $agent = Agent::findOrFail($id);
        $agentsTeam = $agent->team;
        /**
         * array compact ( mixed $varname1 [, mixed $... ] )
         * Creates an array containing variables and their values.
         * 
         * For each of these, compact() looks for a variable with that name 
         * in the current symbol table and adds it to the output array 
         * such that the variable name becomes the key and the contents 
         * of the variable become the value for that key. In short, 
         * it does the opposite of extract().
         * 
         * Any strings that are not set will simply be skipped.
         * http://php.net/manual/en/function.compact.php
         */
        return view('agent.agent')->with(compact('agent', 'agentsTeam', 'var'));
    }
}
