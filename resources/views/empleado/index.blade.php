@extends('plantilla.plantilla')

@section('contenido')
<h1 class="text-primary text-center my-5 h3">Lista de empleados</h1>

@if (session('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('message')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<a href="{{ route('empleado.create') }}" type="button" class="btn btn-primary w-100 my-2">Registrar empleado</a>

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
            <td>
                <a
                  class="float-start me-2 btn btn-primary btn-sm"
                  href="{{ route('empleado.edit', $item->id) }}"
                >
                    Edit
                </a>
                <form
                  class="float-start"
                  method="POST"
                  action="{{ route('empleado.destroy', $item->id) }}"
                >
                    @csrf
                    @method('DELETE')
                    <button
                      class="btn btn-danger btn-sm"
                      type="submit"
                    >
                        Eliminar
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
  </tbody>
</table>
{{ $empleados->links() }}

@endsection