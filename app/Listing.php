<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use App\Agent;

class Listing extends Model
{
    
    protected $fillable = ['name'];
    
    public function agents(){
        return $this->belongsToMany('App\Agent')->withTimestamps();
    }
    
    protected static function oncreate(){
        Listing::create(['name'=>Input::get('name')]);
    }
    
    protected static function onupdate(){
        $listing = Listing::find(Input::get('listingid'));
        $agent = Agent::find(Input::get('agentid'));
        $listing->agents()->save($agent);
    }
    protected static function ondelete(){
        $listing = Listing::find(Input::get('listingid'));
        $listing->delete();
    }
    
    public static function storeByType($type){
        $tasks = Listing::$storage_task;
        Listing::$tasks[$type]();
    }
    protected static $storage_task = [
        'create'=>'oncreate',
        'delete'=>'ondelete',
        'update'=>'onupdate',
    ];
}
