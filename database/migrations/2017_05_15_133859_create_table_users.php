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

			/*BEGIN Definiciónn de tipos*/
			$table->char('ubigeo_id', 6);
			$table->integer('situacion_usuario_id')->unsigned()->default(1);
			$table->integer('tipo_formalidad_id')->unsigned();
			$table->integer('tipo_usuario_id')->unsigned();
			$table->integer('agente_id')->unsigned();
			/*END Definiciónn de tipos*/

			/*BEGIN Definición de claves foráneas*/
			$table->foreign('ubigeo_id')->references('cod_ubigeo')->on('ubigeos');
			$table->foreign('situacion_usuario_id')->references('id')->on('situacion_usuarios');
			$table->foreign('tipo_formalidad_id')->references('id')->on('tipo_formalidads');
			$table->foreign('tipo_usuario_id')->references('id')->on('tipo_usuarios');
			$table->foreign('agente_id')->references('id')->on('agentes');
			$table->timestamps();
			/*END Definición de claves foráneas*/
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
