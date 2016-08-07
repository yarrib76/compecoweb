<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistroCobroAlquileresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('registro_cobro_alquileres', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->double('importe_alquiler');
            $table->dateTime('fecha_pago');
            $table->integer('cobro_alquiler_id')->unsigned();
            $table->foreign('cobro_alquiler_id')->references('id')->on('cobro_alquileres')->onDelete('cascade');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('registro_cobro_alquileres');
	}

}
