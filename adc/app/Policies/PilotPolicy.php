<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use App\Pilot;
use Log;

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
		Log::info("Authorising delete");
		Log::debug($user->id);
		Log::debug($pilot->user_id);
		$result =  $user->id == $pilot->user_id;
		Log::info("Result: ".$result);
		return $result;
		
	}
	
	/**
	 * Can user switch to a specified pilot.
	 * 
	 * Answer: Only if they own the pilot
	*/
	public function switchToPilot(User $user, Pilot $pilot) {
		return $user->id == $pilot->user_id;
	}
}
