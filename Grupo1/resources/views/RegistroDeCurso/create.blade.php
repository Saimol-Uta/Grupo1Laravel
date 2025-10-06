@extends('layout.app')
@section('content')
<div class="container mt-4">
  <h1>Crear Nuevo Registro de Curso</h1>
  
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <form action="{{ route('RegistroDeCurso.store') }}" method="POST">
    @csrf 
    <div class="form-group mb-3">
      <label for="nombre">Nombre del Curso</label>
      <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}" placeholder="Ingrese el nombre del curso" required>
    </div>
    <div class="form-group mb-3">
      <label for="CEDULA">Seleccionar Alumno</label>
      <select name="CEDULA" id="CEDULA" class="form-control" required>
        <option value="">-- Seleccione un alumno --</option>
        @foreach($alumnos as $alumno)
          <option value="{{$alumno->CEDULA}}" {{ old('CEDULA') == $alumno->CEDULA ? 'selected' : '' }}>
           {{$alumno->NOMBRE}} {{$alumno->APELLIDO}}
          </option>
        @endforeach
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ route('RegistroDeCurso.index') }}" class="btn btn-secondary">Cancelar</a>
  </form>
</div>
@endsection
