<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use GuzzleHttp\Client;
use App\Compra;
use App\Ingrediente;
use App\Orden;
use App\Receta;
use App\IngredientesRecetas;

class ComprarMercado implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    

    protected $ingrediente;
    protected $orden;
    protected $ultimo;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($orden_llegada,$ingrediente_llegada,$ultimo_llegada)
    {
        $this->ingrediente = $ingrediente_llegada;
        $this->orden = $orden_llegada;
        $this->ultimo = $ultimo_llegada;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $ingrediente = $this->ingrediente;
        $orden = $this->orden;
        $ultimo = $this->ultimo;
        $ingredientes = Ingrediente::all();

        $peticion = new Client(['base_uri' => 'https://recruitment.alegra.com/api/farmers-market']);
        $respuesta = $peticion->get('buy?ingredient='.$ingrediente->nombre);
        $compra = json_decode($respuesta->getBody()->getContents());
        
        if($compra->quantitySold > 0){

            Compra::create(['id_ingrediente'=>$ingrediente->id,'id_orden'=>$orden->id
            ,'cantidad'=>$compra->quantitySold]);

            $ingre = Ingrediente::find($ingrediente->id);
            $ingre->cantidad = $ingre->cantidad + $compra->quantitySold;
            $ingre->update();

            $receta = Receta::find($orden->id_receta);

            if($ultimo == true){ 
               $ingredientes_faltantes = $receta->comprobar_ingredientes_faltantes();
               if(count($ingredientes_faltantes) == 0){
                    $or = Orden::find($orden->id);
                    $or->id_estado = 1;
                    $or->update();
                }else{
                    foreach ($ingredientes_faltantes as $pos => $aux) {
                        if ($pos === sizeof($ingredientes_faltantes)-1) {
                            ComprarMercado::dispatch($orden,$aux,true);
                        } else {
                            ComprarMercado::dispatch($orden,$aux,false);
                        }
                    }
                } 
            }

        }else{
            if($orden->id_estado == 2){
                ComprarMercado::dispatch($orden,$ingrediente,$ultimo);
            } 
        }
    }
}
