<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTipoUsuarios extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tipo_usuarios', function (Blueprint $table) {
            $table->increments('id', false, true);
            $table->string('tipoUsuario', 15)->unique();
            $table->string('descripcion', 70)->nullable();
        });
        DB::table('tipo_usuarios')->insert([
            'id'          => 1,
            'tipoUsuario' => 'independientes',
        ]);
        DB::table('tipo_usuarios')->insert([
            'id'          => 2,
            'tipoUsuario' => 'empresas',
        ]);
        DB::table('tipo_usuarios')->insert([
            'id'          => 3,
            'tipoUsuario' => 'trabajador',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('tipo_usuarios');
    }
}
