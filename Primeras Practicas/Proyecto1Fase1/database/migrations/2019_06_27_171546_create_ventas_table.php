<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_cliente')->unsigned();
            $table->integer('id_usuario')->unsigned();
            $table->string("tipo_comprobante");
            $table->string("serie_comprobante");
            $table->string("num_comprobante");
            $table->datetime("fecha_hora");
            $table->double("impuesto");
            $table->double("total_venta");
            $table->string("estado");
            
            $table->foreign('id_cliente')->references('id')
                ->on('clientes')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('ventas');
    }
}
