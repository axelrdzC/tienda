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
        Schema::create('inventario', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad_actual');
            $table->integer('stock_min');
            $table->integer('stock_max');
            $table->unsignedBigInteger('id_productos');
            $table->foreign('id_productos')->references('id')->on('productos');
            $table->unsignedBigInteger('id_almacen');
            $table->foreign('id_almacen')->references('id')->on('almacenes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventario');
    }
};
