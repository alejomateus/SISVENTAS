<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
	protected $table = 'categorias';
	protected $primaryKey = 'id_categoria';
   	protected $fillable = [
        'nombre_categoria', 'desc_categoria', 'condi_categoria'
    ];
    public $timestamps = false;
}
