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
        $agent = new Agent;
        $agent->name = Input::get('name');
        $agent->phone = Input::get('phone');
        $team = Team::find(Input::get('teamid'));
        $team->agents()->save($agent);
        
        return Redirect::to(action('AgentController@show', [$agent->id]));
    }
    
    public function update($id){
        $agent = Agent::findOrFail($id);
        $team = Team::find(Input::get('teamid'));
        $agent->phone = Input::get('phone');
        $agent->name = Input::get('name');
        $agent->team()->dissociate();
        $team->agents()->save($agent);
        
        return Redirect::to(action('AgentController@show', [$agent->id]));
    }
    
    public function destroy($id){
        $agent = Agent::findOrFail($id);
        $agent->delete();
        return Redirect::to(action('AgentController@index'));
    }
    
    public function edit($id){
        $agent = Agent::findOrFail($id);
        $teams = Team::all();
        return view('agent.update')->with(compact('agent', 'teams'));
    }
    
    /**
     * Gets the agents page
     * @return type The content for agents
     */
    public function index(){

        $agents = Agent::all();

        return view('agent.agents')->with(compact('agents'));
    }

    
    public function show($id){
        $agent = Agent::findOrFail($id);
        $agentsTeam = $agent->team;

        return view('agent.agent')->with(compact('agent', 'agentsTeam'));
    }
}
