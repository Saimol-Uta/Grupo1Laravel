<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\RegistroDeCursoController;

Route::resource('Alumnos', AlumnosController::class);
Route::resource('RegistroDeCurso', RegistroDeCursoController::class);

// Rutas adicionales para funcionalidades especiales de Registro de Curso
Route::post('RegistroDeCurso/registrar-alumno', [RegistroDeCursoController::class, 'registrarAlumno'])->name('RegistroDeCurso.registrar');
Route::post('RegistroDeCurso/buscar-por-cedula', [RegistroDeCursoController::class, 'buscarPorCedula'])->name('RegistroDeCurso.buscar');