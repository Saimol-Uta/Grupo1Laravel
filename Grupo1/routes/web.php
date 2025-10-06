<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnosController;

Route::resource('Alumnos', AlumnosController::class);