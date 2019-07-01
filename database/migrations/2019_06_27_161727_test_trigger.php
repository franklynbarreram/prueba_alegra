<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TestTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
          DB::unprepared("
                CREATE TRIGGER update_orden AFTER UPDATE ON ordenes
                FOR EACH ROW BEGIN
                    UPDATE ingredientes SET cantidad=cantidad-(
                        SELECT cantidad from ingredientes_recetas 
                        WHERE ingredientes_recetas.id_receta=NEW.id_receta && 
                        ingredientes_recetas.id_ingrediente=ingredientes.id)
                        WHERE NEW.id_estado=1 && OLD.id_estado=2 && ingredientes.id in (
                        SELECT id_ingrediente FROM ingredientes_recetas 
                        WHERE ingredientes_recetas.id_receta=NEW.id_receta);
                END
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
