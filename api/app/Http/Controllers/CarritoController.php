<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\carrito;
use Illuminate\Http\Request;

class CarritoController extends Controller
{

    public function index()
    {
        $carrito = session()->get('carrito',[]);
        return view('carrito.carrito',compact('carrito'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function add(Request $request, $productoId)
    {
        {
            $producto = Producto::findOrFail($productoId);
    
            $carrito = session()->get('carrito', []);
            
            if (isset($carrito[$productoId])) {
                $carrito[$productoId]['quantity']++;
            } else {
                $carrito[$productoId] = [
                    'descripcion' => $producto->descripcion,
                    'precio' => $producto->precio,
                    'quantity' => 1
                ];
            }
    
            session()->put('carrito', $carrito);


            return redirect()->back()->with('success', 'Producto añadido al carrito.');

        }
    }

    public function remove(carrito $carrito, $productoId)
    {
        {
            $carrito = session()->get('carrito', []);
            
            if (isset($carrito[$productoId])) {
                unset($carrito[$productoId]);
                session()->put('carrito', $carrito);
            }
    
            return redirect()->back()->with('success', 'Producto eliminado del carrito.');
        }
    }
    public function clearCart()
{
    // Eliminar solo el carrito
    session()->forget('carrito');

}
}
