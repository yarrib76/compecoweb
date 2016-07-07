<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCobroAlquileresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cobro_alquileres', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->integer('alquiler_id')->unsigned();
            $table->foreign('alquiler_id')->references('id')->on('alquileres');
            $table->double('importe_alquiler');
            $table->dateTime('fecha_cobro');
            $table->integer('cobrador_id')->unsigned();
            $table->foreign('cobrador_id')->references('id')->on('users');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cobro_alquileres');
	}

}
