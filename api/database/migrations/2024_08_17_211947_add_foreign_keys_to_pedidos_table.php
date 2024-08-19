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
        Schema::table('pedidos', function (Blueprint $table) {
            $table->foreign(['cliente'], 'pedidos_ibfk_1')->references(['id'])->on('users')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['id_e'], 'pedidos_ibfk_2')->references(['id'])->on('estado')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['id_p'], 'pedidos_ibfk_3')->references(['id'])->on('pago')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pedidos', function (Blueprint $table) {
            $table->dropForeign('pedidos_ibfk_1');
            $table->dropForeign('pedidos_ibfk_2');
            $table->dropForeign('pedidos_ibfk_3');
        });
    }
};
