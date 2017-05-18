<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsers extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('users', function (Blueprint $table) {
			$table->increments('id');
			$table->string('nombres', 30);
			$table->string('apellido1', 25);
			$table->string('apellido2', 25);
			$table->string('email', 30)->unique();
			$table->string('password', 60);
			$table->string('api_token')->unique();
			$table->rememberToken();
			$table->date('fecha_nac');
			$table->string('dni', 10)->nullable()->unique();
			$table->string('direccion', 50)->nullable();
			$table->string('descripcion', 150)->nullable();
			$table->string('celular', 15)->nullable()->unique();
			$table->string('image_url', 100)->nullable()->unique();
			$table->decimal('longitude', 11, 8)->nullable();
			$table->decimal('latitude', 10, 8)->nullable();
			$table->enum('tipo_usuario', [
				'independiente',
				'empresa',
			]);
			$table->enum('tipo_formalidad', [
				'informal',
				'formal',
				'en proceso',
			]);
			$table->char('situacion_usuario_id', 11);
			$table->char('ubigeo_id', 6);

			$table->foreign('situacion_usuario_id')->references('situacion')->on('situacion_usuarios');
			$table->foreign('ubigeo_id')->references('cod_ubigeo')->on('ubigeos');
			$table->timestamps();
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('users');
	}
}
