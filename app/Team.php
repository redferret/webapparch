<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    
    protected $fillable = [
        'name', 'phone'
    ];
 
    public function agents(){
        return $this->hasMany('App\Agent');
    }
}
