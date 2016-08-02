<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\PilotHelper;
/**
 * Pilots describes the user in space.
 * A user may have multiple pilots.
 *
*/
class CreatePilotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pilots', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
			$table->integer('user_id');
			$table->string('name');
			// Ranks
			$table->enum('rankcombat', PilotHelper::$ranks['combat']);
			$table->enum('rankcqc', PilotHelper::$ranks['cqc']);
			$table->enum('rankexploration', PilotHelper::$ranks['exploration']);
			$table->enum('ranktrade', PilotHelper::$ranks['trade']);
			// Progress to "next" rank
			$table->integer('progresscombat');
			$table->integer('progresscqc');
			$table->integer('progressexploration');
			$table->integer('progresstrade');

			// "personal" information
			$table->date('birthdate');	
			$table->longText('biography');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pilots');
    }
}
