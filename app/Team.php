<?php

namespace App;

use App\Agent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class Team extends Model
{
    
    protected $fillable = [
        'name', 'phone'
    ];
 
    protected static function oncreate(){
        Team::create(['name'=>Input::get('name')]);
    }
    
    protected static function ondelete(){
        $id = Input::get('teamid');
        $team = Team::find($id);

        $agents = $team->agents;

        foreach ($agents as $agent){
            Agent::destroy($agent->id);
        }
        Team::destroy($id);
    }
    
    protected static function onupdate(){
        $id = Input::get('teamid');
        $team = Team::find($id);
        $team->name = Input::get('name');
        $team->phone = Input::get('phone');
        $team->save();
    }

    public static function storeByType($type){
        $tasks = Team::$storage_task;
        Team::$tasks[$type]();
    }
    protected static $storage_task = [
        'create'=>'oncreate',
        'delete'=>'ondelete',
        'update'=>'onupdate',
    ];
    
    
    public function agents(){
        return $this->hasMany('App\Agent');
    }
}
