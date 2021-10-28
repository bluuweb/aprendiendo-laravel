@extends('plantilla.plantilla')

@section('contenido')
<h1>Lista de empleados</h1>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido P</th>
      <th scope="col">Apellido M</th>
      <th scope="col">Correo</th>
      <th scope="col">Imagen</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($empleados as $item)
        <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{{$item->nombre}}</td>
            <td>{{$item->apellido_paterno}}</td>
            <td>{{$item->apellido_materno}}</td>
            <td>{{$item->correo}}</td>
            <td>
                <img src="{{asset("storage/$item->foto") }}" alt="" width="50px">
            </td>
        </tr>
    @endforeach
  </tbody>
</table>

@endsection