<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTipoFormalidad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_formalidads', function (Blueprint $table) {
            $table->increments('id', false, true);
            $table->string('formalidad', 15)->unique();
            $table->string('descripcion', 70)->nullable();
        });

        DB::table('tipo_formalidads')->insert([
            'id'         => 1,
            'formalidad' => 'formal',
        ]);

        DB::table('tipo_formalidads')->insert([
            'id'         => 2,
            'formalidad' => 'informal',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_formalidads');
    }
}
