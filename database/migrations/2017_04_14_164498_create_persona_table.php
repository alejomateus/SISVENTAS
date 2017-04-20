<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->increments('id_persona',30);
            $table->string('tipo_persona',20);
            $table->string('nombre_persona',50);
            $table->string('tipo_doc_persona',20);
            $table->string('num_doc_persona',30)->unique();
            $table->string('dir_persona',70)->nullable();
            $table->string('telefono_persona',30)->nullable();
            $table->string('email_persona',50)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('personas');
    }
}
