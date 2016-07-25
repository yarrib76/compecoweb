<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddObservacionesToImporteAlquileresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('importe_alquileres', function(Blueprint $table)
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
		Schema::table('importe_alquileres', function(Blueprint $table)
		{
            $table->string('observaciones',200);
        });
	}

}
