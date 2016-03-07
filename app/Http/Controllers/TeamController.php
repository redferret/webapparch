<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
class TeamController extends Controller
{
    
    public function create(){
        return view('team.create');
    }
    
    public function store(){
        
        Team::storeByType(Input::get('storage_type'));
        $id = Input::get('teamid');
        $team = Team::findOrFail($id);
        return Redirect::to('/team/'.$id)->with(compact('team'));
    }
    
    public function update($id){
        $team = Team::findOrFail($id);
        return view('team.update')->with(compact('team'));
    }
    
    /**
     * The content for the teams
     * @return type
     */
    public function teams(){
        $teams = Team::all();
        
        return view('team.teams')->with(compact('teams'));
    }
    
    /**
     * The content for each team
     * @param type $id The id of the team to search for
     * @return type The content
     */
    public function team($id){
        $team = Team::findOrFail($id);
        $agents = $team->agents;
        return view('team.team')->with(compact('team', 'agents'));
    }
}
