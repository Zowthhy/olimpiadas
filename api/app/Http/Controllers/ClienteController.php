<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = User::all();
        return view("cliente.index", ['clientes' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);
        return view("cliente.show", ['cliente' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateIdType(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'Usuario no encontrado.');
        }

        if ($user -> id_type == 1){
            $user -> id_type = 2;
        }else{
           $user -> id_type = 1;
        };

        $user->save();

        return redirect()->back()->with('success', 'ID Type actualizado correctamente.');

    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user -> delete();
    }
}
