<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all();

        return view('producto.index', ['productos' => $productos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('producto.create');
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
                $producto = Producto::create([
                    'codigo' => $validatedData['codigo'],
                    'precio' => $validatedData['precio'],
                    'stock' => $validatedData['stock'],
                    'descripcion' => $validatedData['descripcion'],
                ]);
        
                return to_route('producto.show', $producto)->with('message', 'Note was create');

        }
            
        
        
    

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        return view('producto.show', ['producto' => $producto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        return view('producto.edit', ['producto' => $producto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        $data = $request ->validate([
            'codigo' => ['required', 'integer'],
            'precio' => ['required', 'integer'],
            'stock' => ['required', 'integer'],
            'descripcion' => ['required', 'string']
        ]);

        $producto->update($data);

        return to_route('producto.show', $producto)->with('message', 'Note was updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        $producto -> delete();

        return to_route('producto.index')->with('message','Product was deleted');
    }
}
