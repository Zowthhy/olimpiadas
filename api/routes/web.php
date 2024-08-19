<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;




    //Route::get('/producto', [ProductoController::class, 'index'])->name('producto.index');
    // Route::get('/producto/create', [ProductoController:class, 'create'])->name('producto.create');
    // Route::post('/producto', [ProductoController::class, 'store'])->name('producto.store');
    // Route::get('/producto/{id}', [ProductoController::class, 'show'])->name('producto.show');
    // Route::get('/producto/{id}/edit', [ProductoController::class, 'edit'])->name('producto.edit');
    // Route::put('/producto/{id}', [ProductoController::class, 'update'])->name('producto.update');
    // Route::delete('/producto/{id}', [ProductoController::class, 'destroy'])->name('producto.destroy');

Route::resource('producto', ProductoController::class);

Route::resource('pedido', PedidoController::class);

Route::resource('cliente', ClienteController::class);

Route::put('/cliente/{id}/update-id-type', [ClienteController::class, 'updateIdType'])->name('cliente.updateIdType');

Route::get('/index', function() {
    return view('index');
})->middleware(['auth', 'verified'])->name('index');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
