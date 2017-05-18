<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUbigeos extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('ubigeos', function (Blueprint $table) {
			$table->char("cod_ubigeo", 6);
			$table->string('departamento', 23);
			$table->string('provincia', 25);
			$table->string('distrito', 36);
			$table->primary('cod_ubigeo');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('ubigeos');
	}
}
