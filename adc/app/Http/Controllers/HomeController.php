<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Repositories\PilotRepository;

class HomeController extends Controller
{
	protected $pilots;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PilotRepository $pilots)
    {
        $this->middleware('auth');
		$this->pilots = $pilots;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$pilot = $this->pilots->currentPilot($request->user());
        return view('home',[
			'pilot' => $pilot
		]);
    }
}
