<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_venta')->unsigned();
            $table->integer('id_articulo')->unsigned();
            $table->integer("cantidad");
            $table->double("precio_venta");
            $table->double("descuento");
            $table->timestamps();
            $table->foreign('id_venta')->references('id')
                ->on('ventas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_articulo')->references('id')
                ->on('articulos')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_ventas');
    }
}
