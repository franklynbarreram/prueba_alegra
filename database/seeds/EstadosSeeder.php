<?php

use Illuminate\Database\Seeder;
use App\Estado;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Inicializando estados principales
        $estados = [
            ['nombre' => 'Completado'],['nombre' => 'En espera'],   
        ];

        Estado::insert($estados);
    }
}
