<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    protected $table = 'recetas';
    protected $guarded = ['id'];

    public function ingrediente_receta(){
        return $this->hasMany('App\IngredientesRecetas','id_receta','id');
    }

    public function comprobar_ingredientes_faltantes(){
        
        $ingredientes = array();
       
        foreach ($this->ingrediente_receta as $ingre_re){
            $ingrediente_individual = $ingre_re->ingrediente;
            if(($ingrediente_individual->cantidad-$ingre_re->cantidad) < 0){
                array_push($ingredientes,(object)$ingrediente_individual);
            }       
        }

        return $ingredientes;
    }
}
