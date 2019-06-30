<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleIngresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ingresos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_ingreso')->unsigned();
            $table->integer('id_articulo')->unsigned();
            $table->integer("cantidad");
            $table->double("precio_compra");
            $table->timestamps();
            $table->foreign('id_ingreso')->references('id')
                ->on('ingresos')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('detalle_ingresos');
    }
}
