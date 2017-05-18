<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSituacionUsuarios extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('situacion_usuarios', function (Blueprint $table) {
			$table->char('situacion', 11);
			$table->string('descripcion', 40)->nullable();
			$table->primary('situacion');
		});
		DB::table('situacion_usuarios')->insert([
			'situacion' => 'habilitado',
		]);

		DB::table('situacion_usuarios')->insert([
			'situacion' => 'suspendido',
		]);
		DB::table('situacion_usuarios')->insert([
			'situacion' => 'eliminado',
		]);
		DB::table('situacion_usuarios')->insert([
			'situacion' => 'multado',
		]);
		DB::table('situacion_usuarios')->insert([
			'situacion' => 'estafador',
		]);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('situacion_usuarios');
	}
}
