@extends('layout.app')
@section('content')

<div class="container mt-4">
  <h1>Gestión de Registro de Cursos</h1>
  
  <!-- Mensajes de alerta -->
  @if(session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
  @endif

  @if(session('info'))
  <div class="alert alert-info alert-dismissible fade show" role="alert">
    {{ session('info') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
  @endif

  @if(session('warning'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ session('warning') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
  @endif

  <!-- Botón para crear nuevo registro -->
  <a href="{{route('RegistroDeCurso.create')}}" class="btn btn-success mb-3">Nuevo Registro de Curso</a>
  <a href="{{route('Alumnos.index')}}" class="btn btn-secondary mb-3">Ver Alumnos</a>
  
  <!-- Tabla de registros de cursos -->
  <h3>Listado de Registros de Cursos</h3>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre del Curso</th>
        <th>Cédula Alumno</th>
        <th>Nombre Alumno</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @forelse($registros as $registro)
      <tr>
        <td>{{$registro->id}}</td>
        <td>{{$registro->nombre}}</td>
        <td>{{$registro->CEDULA}}</td>
        <td>{{$registro->alumno ? $registro->alumno->NOMBRE . ' ' . $registro->alumno->APELLIDO : 'N/A'}}</td>
        <td>
          <form action="{{ route('RegistroDeCurso.destroy', ['RegistroDeCurso' => $registro->id]) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este registro?')">Eliminar</button>
          </form>
          <a href="{{ route('RegistroDeCurso.edit', ['RegistroDeCurso' => $registro->id]) }}" class="btn btn-warning btn-sm">Editar</a>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="5" class="text-center">No hay registros de cursos</td>
      </tr>
      @endforelse
    </tbody>
  </table>

  <hr class="my-4">

  <!-- Sección para registrar alumno en curso -->
  <h3>Registrar Alumno en Curso</h3>
  <div class="card mb-4">
    <div class="card-body">
      <form action="{{ route('RegistroDeCurso.registrar') }}" method="POST">
        @csrf
        <div class="row">
          <div class="col-md-5">
            <div class="form-group">
              <label for="nombre">Nombre del Curso</label>
              <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ej: Matemáticas" required>
            </div>
          </div>
          <div class="col-md-5">
            <div class="form-group">
              <label for="CEDULA">Seleccionar Alumno</label>
              <select name="CEDULA" id="CEDULA" class="form-control" required>
                <option value="">-- Seleccione un alumno --</option>
                @foreach($alumnos as $alumno)
                  <option value="{{$alumno->CEDULA}}">{{$alumno->CEDULA}} - {{$alumno->NOMBRE}} {{$alumno->APELLIDO}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-2">
            <label>&nbsp;</label>
            <button type="submit" class="btn btn-primary form-control">Registrar en Curso</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <hr class="my-4">

  <!-- Sección para buscar alumno por cédula -->
  <h3>Buscar Cursos de Alumno</h3>
  <div class="card">
    <div class="card-body">
      <form action="{{ route('RegistroDeCurso.buscar') }}" method="POST">
        @csrf
        <div class="row">
          <div class="col-md-10">
            <div class="form-group">
              <label for="cedula">Ingrese la Cédula del Alumno</label>
              <input type="text" name="cedula" id="cedula" class="form-control" placeholder="Ej: 1234567890" required>
            </div>
          </div>
          <div class="col-md-2">
            <label>&nbsp;</label>
            <button type="submit" class="btn btn-info form-control">Buscar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
