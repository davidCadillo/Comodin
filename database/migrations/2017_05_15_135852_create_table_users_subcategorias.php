<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsersSubcategorias extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('subcategoria_user', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('subcategoria_id')->unsigned();
			$table->string('descripcion', 50);
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('subcategoria_id')->references('id')->on('subcategorias')->onDelete('cascade');
			$table->unique([
				'user_id',
				'subcategoria_id',
			]);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('users_subcategorias');
	}
}
