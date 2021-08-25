<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;

class Administrador extends Authenticable
{   
    use Notifiable;
    protected $table = 'administradores'; //Indicamos el nombre de la tabla
    protected $fillable = ['usuario','nombre','email','telefono','pass']; //Indicamos los nombres de los campos en la tabla
    public $timestamps = false; //Indicamos que no usaremos timestamps
    protected $hidden = ['pass', 'api_token'];

    public function getAuthPassword(){
        return $this->attributes['pass'];
    }
}
