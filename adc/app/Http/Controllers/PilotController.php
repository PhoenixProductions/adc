<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\PilotRepository;
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
		
		$request->user()->pilots()->create([
			'name' => $request->name
		]);
		return redirect('/profile');
	}
	public function switchpilot(Request $request) {
		// Display list of pilots for this account
	}
	
	public function setactivepilot(Request $request) {
		
	}
}
