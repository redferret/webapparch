<?php

namespace App;

use App\Agent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class Team extends Model
{
    
    protected $fillable = [
        'name'
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
