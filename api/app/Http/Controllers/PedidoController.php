<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pedidos = Pedido::all();

        return view('pedido.index', ['pedidos' => $pedidos]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedido $pedido)
    {
        return view('show.index', ['pedido' => $pedido]);
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
                // Validar los datos del formulario

                $validatedData = $request->validate([
                    'codigo' => 'required|unique:producto,codigo|max:255',
                    'precio' => 'required|numeric',
                    'stock' => 'required|integer',
                    'descripcion' => 'nullable|string',
                ]);
        
                // Crear un nuevo producto en la base de datos
                $pedido = Pedido::create([
                    'codigo' => $validatedData['codigo'],
                    'precio' => $validatedData['precio'],
                    'stock' => $validatedData['stock'],
                    'descripcion' => $validatedData['descripcion'],
                ]);
        
                return to_route('producto.show', $pedido)->with('message', 'Note was create');

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
        $pedido -> delete();

        return to_route('pedido.index')->with('message','El pedido fue anulado');
    }
}
