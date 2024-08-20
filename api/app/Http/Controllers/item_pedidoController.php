<?php

namespace App\Http\Controllers;
use App\Models\item_pedidos;
use App\Models\Producto;
use App\Models\Pedido;

use Illuminate\Http\Request;

class item_pedidoController extends Controller
{
    public function store($pedidoId){

        $precio_total = 0;
        $carrito = session()->get('carrito', []);
        $pedido = Pedido::find($pedidoId);

        foreach ($carrito as $productoPedido) {

            //Se reduce el stock del producto pedido
            $producto = Producto::find($productoPedido['codigo']);
            $producto -> stock -= $productoPedido['quantity'];
            $producto -> update();


            //Se calcula el precio parcial y total del pedido
            $precio_parcial = $productoPedido['quantity'] * $productoPedido['precio'];
            $precio_total +=  $precio_parcial;
            
        item_pedidos::create([
            'cantidad'=> $productoPedido['quantity'],
            'precio_parcial'=> $precio_parcial,
            'id_pedido'=> $pedido -> id,
            'id_producto'=> $productoPedido['codigo'],
        ]);
    };

        $pedido->precio_total = $precio_total;
        $pedido->update();

        app(CarritoController::class)->clearCarrito();

    }


    public function destroy($pedidoId){

        item_pedidos::where('id_pedido', $pedidoId)->delete();

    }
}