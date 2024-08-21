<?php

use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\entregaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;




    //Route::get('/producto', [ProductoController::class, 'index'])->name('producto.index');
    // Route::get('/producto/create', [ProductoController:class, 'create'])->name('producto.create');
    // Route::post('/producto', [ProductoController::class, 'store'])->name('producto.store');
    // Route::get('/producto/{id}', [ProductoController::class, 'show'])->name('producto.show');
    // Route::get('/producto/{id}/edit', [ProductoController::class, 'edit'])->name('producto.edit');
    // Route::put('/producto/{id}', [ProductoController::class, 'update'])->name('producto.update');
    // Route::delete('/producto/{id}', [ProductoController::class, 'destroy'])->name('producto.destroy');


// Rutas para producto    

Route::resource('producto', ProductoController::class);
Route::get('/index', [ProductoController::class, 'indexUser'])->name('producto.indexUser');
Route::get('/', [ProductoController::class,'indexUser'])->name('indexUser');

// Rutas cliente

Route::resource('cliente', ClienteController::class);
Route::put('/cliente/{id}/update-id-type', [ClienteController::class, 'updateIdType'])->name('cliente.updateIdType');

// Rutas para pedidos

Route::resource('pedido', PedidoController::class);
Route::get('/indexUser', [PedidoController::class, 'indexUser'])->name('pedido.indexUser');
Route::delete('/destroyUser/{id}', [PedidoController::class, 'destroyUser'])->name('pedido.destroyUser');
Route::get('/showUser/{id}', [PedidoController::class, 'showUser'])->name('pedido.showUser');
Route::get('/historialUser', [PedidoController::class, 'historialUser'])->name('pedido.historialUser');

// Rutas entrega

Route::get('/entrega/{id}', [entregaController::class,'add'])->name('entrega.add');

// Rutas carrito

Route::post('/carrito/add/{productoId}', [CarritoController::class, 'add'])->name('carrito.add');
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.carrito');
Route::post('/carrito/remove/{productoId}', [CarritoController::class, 'remove'])->name('carrito.remove');
Route::get('/carrito/clear', function () {
    session()->forget('carrito'); // Vacía solo el carrito
    return redirect()->back()->with('success', 'Carrito vaciado correctamente.');
})->name('carrito.clear');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Rutas perfil

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
