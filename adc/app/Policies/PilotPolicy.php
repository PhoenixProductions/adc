<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

class PilotPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
	
	/**
	 * Can only be deleted by their owning user
	*/
	public function destroy(User $user, Pilot $pilot) {
		return $user->id = $pilot->user_id;
	}
}
