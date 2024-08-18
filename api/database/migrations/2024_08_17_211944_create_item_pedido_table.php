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
            $table->integer('id_pe')->nullable()->index('id_pe');
            $table->integer('id_pr')->nullable()->index('id_pr');
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
