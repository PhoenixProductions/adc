<?php

namespace App\Repositories;

use App\User;
use App\Group;

class GroupRepository {
	/**
	 * Get all pilots for a given user
	 */
	public function forUser(User $user) {
		return $user->groups()
		->orderBy('name', 'asc')
		->get();
	}
	
	public function all() {
		return Group::all();
	}
	
	public function forGroup(Group $group) {
		return $group->groups()
		->orderBy('name', 'asc')
		->get();
	}
}