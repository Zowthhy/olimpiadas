<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pedidos = Pedido::with('clientes')->get();
        return view('pedido.index', ['pedidos' => $pedidos]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedido $pedido)
    {
        $items_pedidos = $pedido->item_pedido;

        if (!$pedido) {
            // Si no se encuentra el pedido, retorna un error 404
            return response()->json(['error' => 'Pedido no encontrado'], 404);
        }

        return view('pedido.show', ['items_pedidos' => $pedido->items, 'pedido' => $pedido]);
    }

    public function create()
    {
        return view('carrito');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

                 $userId = Auth::user() -> id;

                // Crear un nuevo producto en la base de datos con la Id de cliente
                $pedido = Pedido::create([
                    'cliente' => $userId,
                ]);

                app(Item_PedidoController::class)->store($pedido -> id);
                return redirect()->route('carrito.carrito');
        }
            

    /**
     * Show the form for editing the specified resource.
     */
    
    public function edit(Pedido $pedido)
    {
        return view('pedido.edit', ['pedido' => $pedido]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pedido $pedido)
    {
        $data = $request ->validate([
            'id_e' => ['required', 'integer'],

        ]);

        $pedido->update($data);

        return to_route('pedido.show', $pedido)->with('message', 'pedido actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedido $pedido)
    {   
        app(Item_PedidoController::class)->destroy($pedido -> id);
        $pedido -> delete();

        return to_route('pedido.index')->with('message','El pedido fue anulado');
    }

    public function destroyUser(Pedido $pedido, $pedidoId)
    {
        $pedido = Pedido::find($pedidoId);
        app(Item_PedidoController::class)->destroy($pedidoId);
        $pedido -> delete();

        return to_route('pedido.indexUser')->with('message','El pedido fue anulado');
    }

    public function indexUser()
    {
        // Obtener el usuario autenticado
        $user = Auth::user();
        
        // Obtener solo los pedidos asignados a este usuario
        $pedidos = $user->pedidos()->get();

        // Pasar los pedidos a la vista
        return view('pedido.indexUser', ['pedidos' => $pedidos]);
    }


    public function showUser(Pedido $pedido, $id){

            $pedido = Pedido::find($id);
            $items_pedidos = $pedido->item_pedido;
    
            if (!$pedido) {
                // Si no se encuentra el pedido, retorna un error 404
                return response()->json(['error' => 'Pedido no encontrado'], 404);
            }
    
            return view('pedido.showUser', ['pedido' => $pedido, 'items_pedidos'=> $pedido -> items]);
        
    }

}

