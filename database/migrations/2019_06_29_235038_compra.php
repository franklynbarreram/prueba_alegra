<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Compra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('id_ingrediente')->unsigned();
            $table->integer('id_orden')->unsigned();
            $table->integer('cantidad');
            $table->boolean('ultima')->default(true);
            $table->timestamps();
            
        });

        Schema::table('compras', function($table) {
            $table->foreign('id_ingrediente')->references('id')->on('ingredientes')->onDelete('cascade');
            $table->foreign('id_orden')->references('id')->on('ordenes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compras');
    }
}
