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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->integer('id', true);
            $table->date('fecha');
            $table->integer('id_c')->nullable()->index('id_c');
            $table->integer('id_e')->nullable()->index('id_e');
            $table->integer('id_p')->nullable()->index('id_p');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
