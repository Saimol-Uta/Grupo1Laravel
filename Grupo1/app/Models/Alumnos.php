<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    protected $fillable = ['CEDULA', 'NOMBRE', 'APELLIDO', 'DIRECCION', 'TELEFONO'];

}
