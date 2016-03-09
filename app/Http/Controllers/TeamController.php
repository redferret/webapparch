<?php

namespace App\Http\Controllers;

use App\Team;
use App\Agent;
use Illuminate\Support\Facades\Input;
class TeamController extends Controller
{

    public function create(){
        return view('team.create');
    }
    
    public function destroy($id){
        $team = Team::findOrFail($id);

        $agents = $team->agents;

        foreach ($agents as $agent){
            Agent::destroy($agent->id);
        }
        Team::destroy($id);
        
        return $this->index();
    }
    
    public function store(){
        
        Team::create(['name'=>Input::get('name'), 'phone'=>Input::get('phone')]);
        
        return $this->index();
    }
    
    public function teamUpdate($id){
        $team = Team::findOrFail($id);
        return view('team.update')->with(compact('team'));
    }
    
    public function update($id){
        $team = Team::find($id);
        $team->name = Input::get('name');
        $team->phone = Input::get('phone');
        $team->save();
        return $this->show($id);
    }
    
    /**
     * The content for the teams
     * @return type
     */
    public function index(){
        $teams = Team::all();
        
        return view('team.teams')->with(compact('teams'));
    }
    
    /**
     * The content for each team
     * @param type $id The id of the team to search for
     * @return type The content
     */
    public function show($id){
        $team = Team::findOrFail($id);
        $agents = $team->agents;
        return view('team.team')->with(compact('team', 'agents'));
    }
}
