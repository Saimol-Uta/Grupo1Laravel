<?php

namespace App\Http\Controllers;

use App\Models\RegistroDeCurso;
use App\Models\Alumnos;
use Illuminate\Http\Request;

class RegistroDeCursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registros = RegistroDeCurso::with('alumno')->get();
        $alumnos = Alumnos::all();
        return view('RegistroDeCurso.index', compact('registros', 'alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $alumnos = Alumnos::all();
        return view('RegistroDeCurso.create', compact('alumnos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'CEDULA' => 'required|exists:alumnos,CEDULA'
        ]);

        RegistroDeCurso::create($request->all());
        
        return redirect()->route('RegistroDeCurso.index')
            ->with('success', 'Registro de curso creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $registro = RegistroDeCurso::findOrFail($id);
        $alumnos = Alumnos::all();
        return view('RegistroDeCurso.edit', compact('registro', 'alumnos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'CEDULA' => 'required|exists:alumnos,CEDULA'
        ]);

        $registro = RegistroDeCurso::findOrFail($id);
        $registro->update($request->all());
        
        return redirect()->route('RegistroDeCurso.index')
            ->with('success', 'Registro de curso actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $registro = RegistroDeCurso::findOrFail($id);
        $registro->delete();
        
        return redirect()->route('RegistroDeCurso.index')
            ->with('success', 'Registro de curso eliminado exitosamente.');
    }

    /**
     * Registrar un alumno en un curso
     */
    public function registrarAlumno(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'CEDULA' => 'required|exists:alumnos,CEDULA'
        ]);

        RegistroDeCurso::create([
            'nombre' => $request->nombre,
            'CEDULA' => $request->CEDULA
        ]);

        return redirect()->route('RegistroDeCurso.index')
            ->with('success', 'Alumno registrado en el curso exitosamente.');
    }

    /**
     * Buscar cursos de un alumno por cédula
     */
    public function buscarPorCedula(Request $request)
    {
        $request->validate([
            'cedula' => 'required|string'
        ]);

        $alumno = Alumnos::where('CEDULA', $request->cedula)->first();
        $registros = RegistroDeCurso::with('alumno')->get();
        $alumnos = Alumnos::all();

        if ($alumno) {
            $cursosAlumno = RegistroDeCurso::where('CEDULA', $request->cedula)->get();
            
            if ($cursosAlumno->count() > 0) {
                $listaCursos = $cursosAlumno->pluck('nombre')->implode(', ');
                return view('RegistroDeCurso.index', compact('registros', 'alumnos', 'alumno', 'cursosAlumno'))
                    ->with('info', "El alumno {$alumno->NOMBRE} {$alumno->APELLIDO} está inscrito en: {$listaCursos}");
            } else {
                return view('RegistroDeCurso.index', compact('registros', 'alumnos'))
                    ->with('warning', 'El alumno no está registrado en ningún curso.');
            }
        } else {
            return view('RegistroDeCurso.index', compact('registros', 'alumnos'))
                ->with('warning', 'No se encontró el alumno con esa cédula.');
        }
    }
}
