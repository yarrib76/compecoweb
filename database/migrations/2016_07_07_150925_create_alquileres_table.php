<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlquileresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('alquileres', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('depto_id')->unsigned();
            $table->foreign('depto_id')->references('id')->on('departamentos');
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_vencimiento');
            $table->double('importe_alquiler');
            $table->boolean('estado_alquiler');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('alquileres');
	}

}
