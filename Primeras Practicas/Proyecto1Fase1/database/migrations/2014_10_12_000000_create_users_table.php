<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',255);
            $table->string('apellidos',255);
            $table->string('tipo_documento',255);
            $table->string('num_documento',255);
            $table->string('direccion',500);
            $table->string('telefono',50);
            $table->string('email',70)->unique();
            $table->string('password',128);
            $table->boolean('condicion')->default(0);            
            $table->integer('id_rol')->unsigned();
            $table->foreign('id_rol')->references('id')
                ->on('rols')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
