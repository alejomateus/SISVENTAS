<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngresoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingresos', function (Blueprint $table) {
            $table->increments('id_ingreso');
            $table->integer('id_proveedor')->unsigned();
            $table->foreign('id_proveedor')->references('id_persona')->on('personas');
            $table->string('tipo_comprobante_ingreso',30);
            $table->string('serie_comprobante_ingreso',15)->nullable();
            $table->string('num_comprobante_ingreso',20);
            $table->dateTime('fecha_hora_ingreso');
            $table->decimal('impuesto_ingreso',4,2);
            $table->string('estado_ingreso',20);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ingresos');
    }
}
