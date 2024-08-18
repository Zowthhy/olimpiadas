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
        Schema::create('cliente', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nombre', 100);
            $table->string('dni', 9)->unique('dni');
            $table->string('correo', 100)->unique('correo');
            $table->string('telefono', 15)->nullable();
            $table->text('direccion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cliente');
    }
};
