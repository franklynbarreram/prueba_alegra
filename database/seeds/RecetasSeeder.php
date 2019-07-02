<?php

use Illuminate\Database\Seeder;
use App\Receta;
use App\IngredientesRecetas;

class RecetasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Inicializando recetas principales
        $recetas = [
            ['nombre' => 'Arepa'],['nombre' => 'Caldo de pollo'],['nombre' => 'Changua'],
            ['nombre' => 'Tamal'], ['nombre' => 'Mondongo'],['nombre' => 'Carne a la llanera']
        ];

        Receta::insert($recetas);

        $ingredientes_recetas = [
            ['id_ingrediente' =>1,'id_receta'=>1,'cantidad'=>2],
            ['id_ingrediente' =>2,'id_receta'=>1,'cantidad'=>3],
            ['id_ingrediente' =>3,'id_receta'=>1,'cantidad'=>1],
            ['id_ingrediente' =>6,'id_receta'=>1,'cantidad'=>3],
            
            ['id_ingrediente' =>4,'id_receta'=>2,'cantidad'=>1],
            ['id_ingrediente' =>5,'id_receta'=>2,'cantidad'=>2],
            
            ['id_ingrediente' =>6,'id_receta'=>3,'cantidad'=>1],
            ['id_ingrediente' =>7,'id_receta'=>3,'cantidad'=>1],
            ['id_ingrediente' =>8,'id_receta'=>3,'cantidad'=>1],
            ['id_ingrediente' =>9,'id_receta'=>3,'cantidad'=>2],
            ['id_ingrediente' =>10,'id_receta'=>3,'cantidad'=>2],
            ['id_ingrediente' =>1,'id_receta'=>3,'cantidad'=>1],

            ['id_ingrediente' =>1,'id_receta'=>4,'cantidad'=>3],
            ['id_ingrediente' =>3,'id_receta'=>4,'cantidad'=>2],
            ['id_ingrediente' =>7,'id_receta'=>4,'cantidad'=>1],
            ['id_ingrediente' =>10,'id_receta'=>4,'cantidad'=>2],

            ['id_ingrediente' =>2,'id_receta'=>5,'cantidad'=>1],
            ['id_ingrediente' =>4,'id_receta'=>5,'cantidad'=>1],
            ['id_ingrediente' =>6,'id_receta'=>5,'cantidad'=>4],

            ['id_ingrediente' =>5,'id_receta'=>6,'cantidad'=>3],
            ['id_ingrediente' =>1,'id_receta'=>6,'cantidad'=>2],
        ];

        IngredientesRecetas::insert($ingredientes_recetas);

    }
}
