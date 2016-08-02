<?php
namespace App;


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
		if (is_null($pilot)) {
			
		}
		return $pilot;
	}
	
	public function isCurrentPilot($pilot) {
		$cp = $this->current();
		if ($cp) {
			return $pilot->id == $cp->id;
		}
		return false;
	}
	
	public function greeting() {
		
		$greetings = ['Hello {name}.', 'Howdy {name}.', 'Good {timeofday}{name}.'];
		shuffle($greetings);
		$greeting = array_pop($greetings);
	
		$cp = $this->current();
		$subs = [
			'name' => empty($cp) ? "" : " ".$this->current()->name,
			'timeofday' => 'morning'
		];
		foreach($subs as $sub=>$value) {
			$greeting = str_replace('{'.$sub.'}', $value, $greeting);
		}
		
		return $greeting;
	}
	
	static $ranks = [
		'combat' => ["Harmless", 'Mostly Harmless', 'Novice', 'Competent', 'Expert','Master', 'Dangerous','Deadly', 'Elite'],
		'cqc' => ['Helpless','Mostly Helpless','Amateur','Semi Professional','Professional', 'Champion','Hero','Legend','Elite'],
		'exploration' => ['Aimless','Mostly Aimless','Scout','Surveyor','Trailblazer','"Pathfinder','Ranger', 'Pioneer','Elite'],
		'trade' => ['Penniless','Mostly Penniless','Peddler','Dealer','Merchant','Broker','Entrepreneur','Tycoon',' Elite']

	];
}