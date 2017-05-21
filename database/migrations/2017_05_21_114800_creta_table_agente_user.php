<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CretaTableAgenteUser extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('agente_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('agente_id')->unsigned();
            $table->string('sistema_operativo');
            $table->string('navegador')->nullable();
            $table->string('nombre_dispositivo')->nullable();
            $table->string('version_smartphone')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('agente_id')->references('id')->on('agentes')->onDelete('cascade');
            $table->unique([
                'user_id',
                'agente_id',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('agente_user');
    }
}
