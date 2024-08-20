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
        Schema::create('item_pedido', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('cantidad');
            $table->integer('id_pedido')->nullable()->index('id_pedido');
            $table->integer('id_producto')->nullable()->index('id_producto');
            $table->integer('precio_parcial')->nullable()->index('precio_parcial');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_pedido');
    }
};
