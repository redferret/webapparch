<?php

namespace App\Http\Controllers;

use App\Team;
use App\Agent;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
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
        
        return Redirect::to(action('TeamController@index'));
    }
    
    public function store(){
        
        $team = Team::create(['name'=>Input::get('name'), 'phone'=>Input::get('phone')]);
        
        return Redirect::to(action('TeamController@show', [$team->id]));
    }
    
    public function edit($id){
        $team = Team::findOrFail($id);
        return view('team.update')->with(compact('team'));
    }
    
    public function update($id){
        $team = Team::find($id);
        $team->name = Input::get('name');
        $team->phone = Input::get('phone');
        $team->save();
        return Redirect::to(action('TeamController@show', [$team->id]));
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
