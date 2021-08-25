<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Places extends Model
{
    use HasFactory;
    protected $table = 'places'; //Indicamos el nombre de la tabla
    protected $fillable = ['busqueda','lat','lon','nombre','ubicacion','tipo', 'valoracion']; //Indicamos los nombres de los campos en la tabla
    public $timestamps = false; //Indicamos que no usaremos timestamps
}
