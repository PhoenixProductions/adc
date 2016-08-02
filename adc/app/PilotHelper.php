<?php
namespace App;
use App\PilotRepository;

class PilotHelper {
	protected $request;
	protected $app;
	public function __construct($app) {//, PilotRepository $pilots) {
		$this->app = $app;
		//$this->pilots = $pilots;
		$this->request = $this->app['request'];
	}
	public function current() {
		$user = $this->request->user();
		$pilot = $user->pilots()->where('id', $user->activepilotid)->first();
		return $pilot;
	}
	
	public function greeting() {
		$greetings = ['Hello {name}.', 'Howdy {name}.', 'Good {timeofday} {name}.'];
		shuffle($greetings);
		$greeting = array_pop($greetings);
	
		$subs = [
			'name' => $this->current()->name,
			'timeofday' => 'morning'
		];
		foreach($subs as $sub=>$value) {
			$greeting = str_replace('{'.$sub.'}', $value, $greeting);
		}
		
		return $greeting;
	}
}