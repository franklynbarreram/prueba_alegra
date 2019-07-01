<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IngredientesRecetas extends Model
{
    protected $table = 'ingredientes_recetas';
    protected $guarded = ['id','id_ingrediente','id_receta'];

    public function ingrediente(){
        return $this->belongsTo('App\Ingrediente','id_ingrediente','id');
    }
}
