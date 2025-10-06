@extends('layout.app')
@section('content')
<div class="container mt-4">
  <form action="{{ route('Alumnos.update', $alumno->CEDULA) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="CEDULA">Cédula</label>
      <input type="text" class="form-control" name="CEDULA" value="{{ $alumno->CEDULA }}" readonly>
    </div>
    <div class="form-group">
      <label for="NOMBRE">Nombre</label>
      <input type="text" class="form-control" name="NOMBRE" value="{{ $alumno->NOMBRE }}">
    </div>
    <div class="form-group">
      <label for="APELLIDO">Apellido</label>
      <input type="text" class="form-control" name="APELLIDO" value="{{ $alumno->APELLIDO }}">
    </div>
    <div class="form-group">
      <label for="DIRECCION">Dirección</label>
      <input type="text" class="form-control" name="DIRECCION" value="{{ $alumno->DIRECCION }}">
    </div>
    <div class="form-group">
      <label for="TELEFONO">Teléfono</label>
      <input type="text" class="form-control" name="TELEFONO" value="{{ $alumno->TELEFONO }}">
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ route('Alumnos.index') }}" class="btn btn-secondary">Volver</a>
  </form>
</div>
@endsection