<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    class Categoria extends Model
{
	protected $table = 'articulos';
	protected $primaryKey = 'id_articulo';
   	protected $fillable = [
        'id_categoria',
        'codigo_articulo',
        'nombre_articulo',
        'stock_articulo',
        'desc_articulo',
        'imagen_articulo',
        'estado_articulo'
    ];
    public $timestamps = false;
}

}
