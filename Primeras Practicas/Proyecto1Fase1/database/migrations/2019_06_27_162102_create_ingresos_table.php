<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingresos', function (Blueprint $table) {
            $table->increments('id');
            $table->string("tipo_comprobante");
            $table->string("serie_comprobante");
            $table->string("num_comprobante");
            $table->datetime("fecha_hora");
            $table->double("impuesto");
            $table->double("total_compra");
            $table->string("estado");
            $table->integer('id_proveedor')->unsigned();
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_proveedor')->references('id')
                ->on('proveedores')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_usuario')->references('id')
                ->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingresos');
    }
}
