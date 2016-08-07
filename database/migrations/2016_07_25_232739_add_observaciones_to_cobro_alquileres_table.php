<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddObservacionesToCobroAlquileresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cobro_alquileres', function(Blueprint $table)
		{
            $table->string('observaciones',200);
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cobro_alquileres', function(Blueprint $table)
		{
        //    $table->string('observaciones',200);
        });
	}

}
