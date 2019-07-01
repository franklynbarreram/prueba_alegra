<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ordenes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('id_receta')->unsigned();
            $table->integer('id_estado')->unsigned();
            $table->timestamps();
            
        });

        Schema::table('ordenes', function($table) {
            $table->foreign('id_receta')->references('id')->on('recetas')->onDelete('cascade');
            $table->foreign('id_estado')->references('id')->on('estados')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordenes');
    }
}
