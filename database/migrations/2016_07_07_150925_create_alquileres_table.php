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
            $table->integer('deuda_alquiler_id')->unsigned();
            $table->foreign('deuda_alquiler_id')->references('id')->on('estados_deudas');
            $table->integer('deuda_impuesto_id')->unsigned();
            $table->foreign('deuda_impuesto_id')->references('id')->on('estados_deudas');
            $table->double('importe_alquiler');
            $table->integer('estado_alquiler')->unsigned();
            $table->foreign('estado_alquiler')->references('id')->on('estados_deptos');
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
