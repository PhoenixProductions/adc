<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pilot;
use App\Group;
use App\Repositories\GroupRepository;
use App\Http\Requests;

class GroupController extends Controller
{
	/**
	 * @var GroupRepository
	 */
	protected $groups;
	public function __construct(GroupRepository $groups) {
		$this->middleware('auth');
		$this->groups = $groups;
	}
    function index() {
    	return view('group.index', [
    		'groups' => $this->groups->all()
    	]);
    }
}
