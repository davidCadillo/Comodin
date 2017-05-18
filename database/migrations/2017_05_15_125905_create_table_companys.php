<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCompanys extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('companys', function (Blueprint $table) {
			$table->increments('id');
			$table->char('ruc', 11)->unique();
			$table->string('nombre_comercial', 50);
			$table->string('razon_social', 50);
			$table->string('direccion', 50);
			$table->string('descripcion', 150);
			$table->integer('rubro_id')->unsigned();
			$table->foreign('rubro_id')->references('id')->on('rubros');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('companys');
	}
}
