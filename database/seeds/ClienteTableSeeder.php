<?php

use Illuminate\Database\Seeder;
use App\Persona;
class ClienteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Persona::insert
			([
        		'tipo_persona'=>'Cliente',
        		'nombre_persona'=>'Jhovany Lopez',
        		'tipo_doc_persona'=>'Cedula de Ciudadania',
        		'num_doc_persona'=>'10101010101',
        		'dir_persona'=>'Calle 123# 456',
        		'telefono_persona'=>'7777777',
        		'email_persona'=>'jhobany@hotmail.com'
			]			
			);
    }
}
