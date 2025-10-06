<?php

namespace App\Http\Controllers;

use App\Models\Alumnos;


use Illuminate\Http\Request;

class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = Alumnos::with('registrosDeCurso')->get();
        return view('Alumnos.index', compact('alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Alumnos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'CEDULA' => 'required | unique:alumnos',
                'NOMBRE' => 'required',
                'APELLIDO' => 'required',
                'DIRECCION' => 'required',
                'TELEFONO' => 'required'
            ]
        );
        
        Alumnos::create($request->all());
        
        return redirect()->route('Alumnos.index')
            ->with('success', 'Alumno creado exitosamente.');
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
        $alumno = Alumnos::findOrFail($id);
        return view('Alumnos.edit', compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'CEDULA' => 'required|unique:alumnos,CEDULA,' . $id . ',CEDULA',
            'NOMBRE' => 'required',
            'APELLIDO' => 'required',
            'DIRECCION' => 'required',
            'TELEFONO' => 'required',
        ]);
        
        $alumno = Alumnos::findOrFail($id);
        $alumno->update($request->all());
        
        return redirect()->route('Alumnos.index')
            ->with('success', 'Alumno actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $alumno = Alumnos::findOrFail($id);
        $alumno->delete();
        return redirect()->route('Alumnos.index')
            ->with('success', 'Alumno eliminado exitosamente.');
    }
}
