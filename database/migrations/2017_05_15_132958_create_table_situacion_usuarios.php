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
            $table->increments('id', false, true);
            $table->string('situacion', 15)->unique();
            $table->string('descripcion', 70)->nullable();
        });
        DB::table('situacion_usuarios')->insert([
            'id'        => 1,
            'situacion' => 'habilitado',
        ]);

        DB::table('situacion_usuarios')->insert([
            'id'        => 2,
            'situacion' => 'deshabilitado',
        ]);

        DB::table('situacion_usuarios')->insert([
            'id'        => 3,
            'situacion' => 'suspendido',
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
