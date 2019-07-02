<?php

use Illuminate\Database\Seeder;
use App\Ingrediente;

class IngredienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        //Inicializando ingredientes principales
        $ingredientes = [
            [
                'nombre' => 'tomato',
                'cantidad' => 5,
            ],
            [
                'nombre' => 'lemon',
                'cantidad' => 5,
            ],
            [
                'nombre' => 'potato',
                'cantidad' => 5,
            ],
            [
                'nombre' => 'rice',
                'cantidad' => 5,
            ],
            [
                'nombre' => 'ketchup',
                'cantidad' => 5,
            ],
            [
                'nombre' => 'lettuce',
                'cantidad' => 5,
            ],
            [
                'nombre' => 'onion',
                'cantidad' => 5,
            ],
            [
                'nombre' => 'cheese',
                'cantidad' => 5,
            ],
            [
                'nombre' => 'meat',
                'cantidad' => 5,
            ],
            [
                'nombre' => 'chicken',
                'cantidad' => 5,
            ]     
        ];

        Ingrediente::insert($ingredientes);
    }
}
