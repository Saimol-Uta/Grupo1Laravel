@section('content')

<div class="container mt-4">
  <h1>Listado de alumnos</h1>
  <a href="{{route('alumnos.create')}}" class="btn btn-primary">Nuevo Alumno</a>
  <table>
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
      </tr>
      @endforelse

    </tbody>
  </table>
</div>
@endsection