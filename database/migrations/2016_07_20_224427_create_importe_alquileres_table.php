<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImporteAlquileresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('importe_alquileres', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->date('fecha');
            $table->double('importe_alquiler');
            $table->integer('alquiler_id')->unsigned();
            $table->foreign('alquiler_id')->references('id')->on('alquileres')->onDelete('cascade');

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('importe_alquileres');
	}

}
