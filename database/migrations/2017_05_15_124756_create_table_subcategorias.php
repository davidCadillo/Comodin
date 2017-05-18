<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSubcategorias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('subcategorias', function (Blueprint $table) {
		    $table->increments('id');
		    $table->string('nombre', 60)->unique();
		    $table->string('descripcion', 100)->nullable();
		    $table->integer('categoria_id')->unsigned();
		    $table->foreign('categoria_id')->references('id')->on('categorias')->onUpdate('CASCADE')
		          ->onDelete('CASCADE');
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subcategorias');
    }
}
