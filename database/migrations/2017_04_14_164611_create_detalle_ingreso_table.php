<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleIngresoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ingreso', function (Blueprint $table) {
            $table->increments('id_detalle_ingreso');
            $table->integer('id_ingreso')->unsigned();
            $table->foreign('id_ingreso')->references('id_ingreso')->on('ingresos');
            $table->integer('id_articulo')->unsigned();
            $table->foreign('id_articulo')->references('id_articulo')->on('articulos');
            $table->integer('cantidad_detalle_ingreso');
            $table->decimal('precio_compra_detalle_ingreso',11,2);
            $table->decimal('precio_venta_detalle_ingreso',11,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('detalle_ingreso');
    }
}
