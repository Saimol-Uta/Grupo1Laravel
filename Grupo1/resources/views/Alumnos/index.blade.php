@section('content')
@extends('layout.app')

<div class="container mt-4">
  <h1>Listado de alumnos</h1>
  <a href="{{route('Alumnos.create')}}" class="btn btn-success">Nuevo Alumno</a>
  @if(session('success'))
  <div class="alert alert-success"> {{ session('success') }} </div>
  @endif
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>CEDULA</th>
        <th>NOMBRE</th>
        <th>APELLIDO</th>
        <th>DIRECCION</th>
        <th>TELEFONO</th>
      </tr>

    </thead>
    <tbody>
      @forelse($alumnos as $alumno)
      <tr>
        <td>{{$alumno->CEDULA}}</td>
        <td>{{$alumno->NOMBRE}}</td>
        <td>{{$alumno->APELLIDO}}</td>
        <td>{{$alumno->DIRECCION}}</td>
        <td>{{$alumno->TELEFONO}}</td>

        <td>
          <form action="{{ route('Alumnos.destroy', $alumno->CEDULA) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este alumno?')">Eliminar</button>
          </form>

          <a href="{{ route('Alumnos.edit', $alumno->CEDULA) }}" class="btn btn-warning btn-sm">Editar</a>
        </td>





      </tr>
      @empty
      <tr>
        <td colspan="5" class="text-center">No hay alumnos registrados</td>
      </tr>
      @endforelse

    </tbody>
  </table>
</div>
@endsection