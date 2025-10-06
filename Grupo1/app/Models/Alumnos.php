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

    /**
     * Relación uno a muchos con RegistroDeCurso
     * Un alumno puede tener muchos registros de curso
     */
    public function registrosDeCurso()
    {
        return $this->hasMany(RegistroDeCurso::class, 'CEDULA', 'CEDULA');
    }
}
