<?php 

namespace App\Repositories;

use App\User;

class PilotRepository {
	/**
	 * Get all pilots for a given user
	*/
	public function forUser(User $user) {
		return $user->pilots()
		->orderBy('name', 'asc')
		->get();
	}
	
	public function currentPilot(User $user) {
		return $user->pilots()->where('id', $user->activepilotid)->first();
	}
}