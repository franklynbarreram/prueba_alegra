<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Receta;
use App\Ingrediente;
use App\IngredientesRecetas;
use App\Orden;
use App\Jobs\ComprarMercado;

class CocinaController extends Controller
{
    public function index(){

        $recetas = Receta::all();
        $ordenes = Orden::orderBy('id', 'desc')->paginate(10);
        $recetas_completas = array();
        
        foreach($recetas as $r){

            $ingredientes = array();

            foreach($r->ingrediente_receta as $ingre_re){

                $ingrediente = Ingrediente::where('id',$ingre_re->id_ingrediente)->get()->first();
                $temp = ['nombre'=>$ingrediente->nombre,'cantidad'=>$ingre_re->cantidad];
                array_push($ingredientes,$temp);
            }

            $temp = array('nombre'=>$r->nombre,'ingredientes'=>$ingredientes);
            array_push($recetas_completas,$temp);
        }

        return view('cocina',["recetas"=>$recetas_completas,"ordenes"=>$ordenes]);
    }

    public function crear_orden(){

        $receta_aleatoria = rand(1,Receta::all()->count());
        $ingredientes = Ingrediente::all();
        $receta = Receta::find($receta_aleatoria);
        $estado = 1;    
        $ingredientes_faltantes = $receta->comprobar_ingredientes_faltantes();

        if(count($ingredientes_faltantes) == 0){
            $estado = 1;
        }else{
            $estado=2;
        }
        
        $orden = Orden::create([
            'id_receta'=>$receta_aleatoria , 
            'id_estado'=>$estado,
        ]); 
  
        if($estado ==1){
            foreach($ingredientes as $ingrediente){
                
                $ing_rece = IngredientesRecetas::where('id_receta',$receta_aleatoria)->where('id_ingrediente',$ingrediente->id)->get();
                
                foreach($ing_rece as $ingrediente_receta){
                  $temp = Ingrediente::find($ingrediente_receta->id_ingrediente);
                  $temp->cantidad = $temp->cantidad-$ingrediente_receta->cantidad;
                  $temp->update();
                }
            }
        }else{    
            foreach ($ingredientes_faltantes as $pos => $ingrediente) {
                if ($pos === sizeof($ingredientes_faltantes)-1) {
                  
                    ComprarMercado::dispatch($orden,$ingrediente,true);
                } else {
                    ComprarMercado::dispatch($orden,$ingrediente,false);
                }
            }
        }

      return redirect()->back();
    }
}
