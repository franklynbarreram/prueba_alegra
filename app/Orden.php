<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $table = 'ordenes';
    protected $fillable = ['id','id_receta','id_estado'];

    public function receta(){
        return $this->belongsTo('App\Receta','id_receta','id');
    }
    public function compra(){
        return $this->hasMany('App\Compra','id_orden','id');
    }
    public function estado(){
        return $this->belongsTo('App\Estado','id_estado','id');
    }
}
