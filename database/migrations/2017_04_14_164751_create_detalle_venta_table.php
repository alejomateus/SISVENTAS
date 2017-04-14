<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_venta', function (Blueprint $table) {
            $table->increments('id_detalle_venta');
            $table->integer('id_venta')->unsigned();
            $table->foreign('id_venta')->references('id_venta')->on('ventas');
            $table->integer('id_articulo')->unsigned();
            $table->foreign('id_articulo')->references('id_articulo')->on('articulos');
            $table->integer('cantidad_detalle_venta');
            $table->decimal('precio_venta_detalle_venta',11,2);
            $table->decimal('descuento_detalle_venta',11,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('detalle_venta');
    }
}
