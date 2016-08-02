<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gate;
use App\Http\Requests;
use App\Pilot;
use App\Repositories\PilotRepository;
use Log;

class PilotController extends Controller
{
	/**
	 * @var PilotRepository
	 */
	protected $pilots;
    public function __construct(PilotRepository $pilots) {
		$this->middleware('auth');
		$this->pilots = $pilots;
	}
	
	public function index(Request $request) {
		return view('profile.index',[
			'pilots' => $this->pilots->forUser($request->user())
		]);
	}
	public function create() {
		return view('profile.create');
	}
	/**
	 * Store / Update a pilot
	*/
	public function store(Request $request) {
		$this->validate($request, 
		[
			'name' => 'required'
		]);
		
		$p = $request->user()->pilots()->create([
			'name' => $request->name
		]);
		return redirect('/profile');
	}
	
	public function destroy(Request $request, Pilot $pilot) {
		$user = $request->user();
		$this->authorize('destroy', $pilot);
		$pilot->delete();
		return redirect('/profile');
	}
	public function view(Pilot $pilot) {
		return view('profile.view',[
			'pilot' => $pilot
		]);
	}
	public function switchpilot(Request $request) {
		// Display list of pilots for this account
	}
	
	public function setactivepilot(Request $request, Pilot $pilot) {
		$user = $request->user();
		$this->authorize('switchToPilot', $pilot);
		$user->activepilotid = $pilot->id;
		$user->save();
		return redirect('/home');
	}
}
