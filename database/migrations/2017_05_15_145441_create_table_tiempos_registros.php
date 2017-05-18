<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTiemposRegistros extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tiempos_registros', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('tclick_acceso', 9, 3);
            $table->decimal('tquery_api', 9, 3);
            $table->decimal('tregistrar', 9, 3);
            $table->decimal('tconfirmar', 9, 3);
            $table->decimal('tguardar_perfil', 9, 3);
            $table->decimal('talerta', 9, 3);
            $table->integer('user_id')->unsigned()->unique();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('tiempos_registros');
    }
}
