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
        $id = Input::get('agentid');
        $agent = Agent::findOrFail($id);
        return Redirect::to('/agent/'.$id)->with(compact('agent'));
    }
    
    public function update($id){
        
        $agent = Agent::findOrFail($id);
        $teams = Team::all();
        
        return view('agent.update')->with(compact('agent','teams'));
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

        return view('agent.agent')->with(compact('agent', 'agentsTeam'));
    }
}
