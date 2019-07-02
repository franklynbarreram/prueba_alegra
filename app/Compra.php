<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table = 'compras';
    protected $fillable = ['id','id_ingrediente','id_orden','cantidad'];

    public function ingrediente(){
        return $this->belongsTo('App\Ingrediente','id_ingrediente','id');
    }
}
