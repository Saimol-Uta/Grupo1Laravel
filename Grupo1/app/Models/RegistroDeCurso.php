<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegistroDeCurso extends Model
{
    protected $table = 'registro_de_curso';
    
    protected $fillable = ['nombre', 'CEDULA'];

    /**
     * Relación con Alumnos
     * Un registro pertenece a un alumno
     */
    public function alumno()
    {
        return $this->belongsTo(Alumnos::class, 'CEDULA', 'CEDULA');
    }
}
