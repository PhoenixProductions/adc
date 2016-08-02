<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('groups', function (Blueprint $table) {
    		$table->increments('id');
    		$table->timestamps();
    		$table->string('name');
    		$table->integer('group_id')->nullable();	// an id of another group that this "belongs" to
    		$table->integer('scope')->default(0);	
    		/* 
    		 * Scope of the group so 
    		 * 0 == Wing/Flight
    		 * 100 == Squadron
    		 * 200 == Station
    		 * 300 == Command
    		 * 400 == Force
    		 * Now getting into very broad factions
    		 * 1000 == Minor Faction
    		 * 1100 == Major Faction 
    		 * 9999 == Power
    		 */ 
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    	Schema::drop('groups');
    }
}
