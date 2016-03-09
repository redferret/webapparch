<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

}
