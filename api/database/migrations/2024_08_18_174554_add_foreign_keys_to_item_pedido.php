<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('item_pedido', function (Blueprint $table) {
            $table->foreign(['id_pedido'], 'item_pedido_ibfk_1')->references(['id'])->on('pedidos')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['id_producto'], 'item_pedido_ibfk_2')->references(['codigo'])->on('producto')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('item_pedido', function (Blueprint $table) {
            $table->dropForeign('item_pedido_ibfk_1');
            $table->dropForeign('item_pedido_ibfk_2');
        });
    }
};
