<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Agent;
use App\Team;
use Illuminate\Support\Facades\Input;

class Agent extends Model
{
    
    // Allowed fields to be created for mass assignments
    // Laravel protects from mass assignments unless we
    // specifiy which fields can be mass assigned.
    protected $fillable = [
        'name', 'phone'
    ];
    
    public function listings(){
        return $this->belongsToMany('App\Listing')->withTimestamps();
    }
    
    public function team(){
        return $this->belongsTo('App\Team');
    }

    protected static function oncreate(){
        $agent = new Agent;
        $agent->name = Input::get('name');
        $agent->phone = Input::get('phone');
        $team = Team::find(Input::get('teamid'));
        $team->agents()->save($agent);
    }
    
    protected static function onupdate(){
        $agent = Agent::where('name', Input::get('name'))->first();
        $team = Team::find(Input::get('teamid'));
        $agent->phone = Input::get('phone');
        $agent->name = Input::get('name');
        $agent->team()->dissociate();
        $team->agents()->save($agent);
    }
    protected static function ondelete(){
        $agent = Agent::find(Input::get('agentid'));
        $agent->delete();
    }
    
    public static function storeByType($type){
        $tasks = Agent::$storage_task;
        Agent::$tasks[$type]();
    }
    protected static $storage_task = [
        'create'=>'oncreate',
        'delete'=>'ondelete',
        'update'=>'onupdate',
    ];
}
