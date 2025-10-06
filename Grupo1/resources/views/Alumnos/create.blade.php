@extends('layout.app')
@section('content')
<div class="container mt-4">
    <form action="{{ route('Alumnos.store') }}" method="POST">
        @csrf 
        <div class="form-group">
      <label for="CEDULA">Cédula</label>
      <input type="text" class="form-control" name="CEDULA">
    </div>
    <div class="form-group">
      <label for="NOMBRE">Nombre</label>
      <input type="text" class="form-control" name="NOMBRE">
    </div>
    <div class="form-group">
      <label for="APELLIDO">Apellido</label>
      <input type="text" class="form-control" name="APELLIDO">
    </div>
    <div class="form-group">
      <label for="DIRECCION">Dirección</label>
      <input type="text" class="form-control" name="DIRECCION">
    </div>
        <div class="form-group">
      <label for="TELEFONO">Teléfono</label>
      <input type="text" class="form-control" name="TELEFONO">
    </div>
    <div class="mt-3">
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ route('Alumnos.index') }}" class="btn btn-secondary">Volver</a>
    </div>

  </form>
  
</div>
  </form>
</div>
@endsection