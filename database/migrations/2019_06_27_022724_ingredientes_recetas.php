<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IngredientesRecetas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredientes_recetas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('id_ingrediente')->unsigned();
            $table->integer('id_receta')->unsigned();
            $table->integer('cantidad');
            $table->timestamps();
            
        });

        Schema::table('ingredientes_recetas', function($table) {
            $table->foreign('id_ingrediente')->references('id')->on('ingredientes')->onDelete('cascade');
            $table->foreign('id_receta')->references('id')->on('recetas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredientes_recetas');
    }
}
