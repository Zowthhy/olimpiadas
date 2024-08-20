<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\entrega;
use App\Models\Pedido;

class entregaController extends Controller
{
    //Se crea la entrega en la BD cuendo se entrega el pedido
    public function add($pedidoId){


        entrega::create([
            "id_pedido" => $pedidoId,
        ]);

        $pedido = Pedido::find($pedidoId);
        $pedido -> id_e = 2;
        $pedido->update();
        return back()->with("success","");
        
    }
}
