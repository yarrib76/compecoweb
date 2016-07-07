<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadoImpuestosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('estado_impuestos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
            $table->integer('impuesto_id')->unsigned();
            $table->foreign('impuesto_id')->references('id')->on('impuestos');
            $table->dateTime('fecha_pago');
            $table->integer('estado_deuda_id')->unsigned();
            $table->foreign('estado_deuda_id')->references('id')->on('estados_deudas');
            $table->integer('alquiler_id')->unsigned();
            $table->foreign('alquiler_id')->references('id')->on('alquileres');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('estado_impuestos');
	}

}
