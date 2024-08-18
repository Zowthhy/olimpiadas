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
        Schema::create('entrega', function (Blueprint $table) {
            $table->integer('id', true);
            $table->date('fecha');
            $table->time('hora')->nullable();
            $table->integer('id_p')->nullable()->index('id_p');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrega');
    }
};
