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
            $table->unsignedBigInteger('cliente')->nullable(false);
            $table->integer('id_e')->nullable()->index('id_e')->default(1);
            $table->integer('id_p')->nullable()->index('id_p')->default(1);
            $table->integer('precio_total')->index('precio_total')->nullable();
            $table->timestamps();
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
