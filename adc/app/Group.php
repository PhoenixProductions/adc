<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
    	'name', 
    	'scope'
    ];
    
    protected $hidden = [
    	
    ];
    
    public function subgroups() {
    	return $this->hasMany('App\Group');
    }
    
    public function parent() {
    	return $this->belongsTo('App\Group');
    }
    
    public function pilots() {
    	return $this->belongsToMany('App\Pilot');
    }
}
