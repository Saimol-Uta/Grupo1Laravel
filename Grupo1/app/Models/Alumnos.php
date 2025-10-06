<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    // Disable automatic created_at/updated_at columns since the table doesn't have them
    public $timestamps = false;

    // Configure primary key since table doesn't use the default 'id'
    protected $primaryKey = 'CEDULA';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['CEDULA', 'NOMBRE', 'APELLIDO', 'DIRECCION', 'TELEFONO'];

}
