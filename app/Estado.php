<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estados';
    protected $guarded = ['id','id_receta','id_estado'];
}
