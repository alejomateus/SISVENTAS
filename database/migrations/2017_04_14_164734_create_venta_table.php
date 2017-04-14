<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->increments('id_venta');
            $table->integer('id_cliente')->unsigned();
            $table->foreign('id_cliente')->references('id_persona')->on('personas');
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->string('tipo_comprobante_venta',30);
            $table->string('serie_comprobante_venta',15)->nullable();
            $table->string('num_comprobante_venta',20);
            $table->dateTime('fecha_hora_venta');
            $table->decimal('impuesto_venta',4,2);
            $table->decimal('total_venta',11,2);
            $table->string('estado_venta',20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ventas');
    }
}
