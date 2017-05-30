<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAgentes extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('agentes', function (Blueprint $table) {
            $table->increments('id', false, true);
            $table->string('nombre', '15');
            $table->string('descripcion', '30')->nullable();
        });
        DB::table('agentes')->insert([
            'id'     => 1,
            'nombre' => 'WEB',
        ]);
        DB::table('agentes')->insert([
            'id'     => 2,
            'nombre' => 'SMARTPHONE',
        ]);
        DB::table('agentes')->insert([
            'id'     => 3,
            'nombre' => 'TABLET',
        ]);
        DB::table('agentes')->insert([
            'id'     => 4,
            'nombre' => 'ROBOT',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('agentes');
    }
}
