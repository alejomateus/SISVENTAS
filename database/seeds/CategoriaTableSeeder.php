<?php

use Illuminate\Database\Seeder;
use App\Categoria;
class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::insert
			([[
				'nombre_categoria'=>"Televisores",
				'desc_categoria'=>"Televisores desde 28 pulgadas",
				'condi_categoria'=>"1"
			],
			[
				'nombre_categoria'=>"Laptops",
				'desc_categoria'=>"Todo tipo de Computadoras portatiles",
				'condi_categoria'=>"1",
			],
			[
				'nombre_categoria'=>"Smartphones",
				'desc_categoria'=>"Smartphones 4G",
				'condi_categoria'=>"1",
			],
			[
				'nombre_categoria'=>"Videojuegos",
				'desc_categoria'=>"Consolas de Videojuegos",
				'condi_categoria'=>"1",
			],
			[
				'nombre_categoria'=>"Autos",
				'desc_categoria'=>"Automoviles 2015 o mas",
				'condi_categoria'=>"1",
			],
			[
				'nombre_categoria'=>"Audio",
				'desc_categoria'=>"Teatros en casa o Estereos",
				'condi_categoria'=>"1",
			],
			[
				'nombre_categoria'=>"Deportes",
				'desc_categoria'=>"Maquinas de Ejercicio e instrumentos deportivos",
				'condi_categoria'=>"1",
			],
			[
				'nombre_categoria'=>"Camaras",
				'desc_categoria'=>"Camaras Digitales",
				'condi_categoria'=>"1",
			]
			]
			);
    }
}
