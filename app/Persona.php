<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'personas';
	protected $primaryKey = 'id_persona';
   	protected $fillable = [
        'tipo_persona',
        'nombre_persona',
        'tipo_doc_persona',
        'num_doc_persona',
        'dir_persona',
        'telefono_persona',
        'email_persona'
    ];
    public $timestamps = false;
}
