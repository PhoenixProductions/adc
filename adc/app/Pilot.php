<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pilot extends Model
{
	protected $fillable =[
		'name'
	];
	
	protected $hidden = [
		
	];
	public function user() {
		return $this->belongsTo('App\User');
	}
}
