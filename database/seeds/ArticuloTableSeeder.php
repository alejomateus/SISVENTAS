<?php

use Illuminate\Database\Seeder;
use App\Articulo;
class ArticuloTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Articulo::insert
			([
				'nombre_articulo'=>"Asus Zenfone 2 Laser",
				'id_categoria'=>"3",
				'codigo_articulo'=>"01010101",
				'stock_articulo'=>"100",
				'imagen_articulo'=>"asuszenfone2.png",
				'estado_articulo'=>"Activo"
			]			
			);
    }
}
