@extends('plantilla.plantilla')

@section('contenido')

{{-- Editar --}}
{{-- {{$empleado}} --}}
<h1 class="h3 text-primary text-center my-5">Editar Empleado</h1>
<form
  enctype="multipart/form-data"
  action={{ route('empleado.update', $empleado->id) }}
  method="POST"
>
    @csrf
    @method('PUT')
    <input
      class="form-control mb-2"
      type="text"
      value="{{$empleado->nombre}}"
      name="nombre"
    >
    @error('nombre')
        <p class="text-danger">{{ $message }}</p>
    @enderror

    <input
      class="form-control mb-2"
      type="text"
      value="{{$empleado->apellido_paterno}}"
      name="apellido_paterno"
    >
    @error('apellido_paterno')
        <p class="text-danger">{{ $message }}</p>
    @enderror

    <input
      class="form-control mb-2"
      type="text"
      value="{{$empleado->apellido_materno}}"
      name="apellido_materno"
    >
    @error('apellido_materno')
        <p class="text-danger">{{ $message }}</p>
    @enderror

    <input
      class="form-control mb-2"
      type="text"
      value="{{$empleado->correo}}"
      name="correo"
    >
    @error('correo')
        <p class="text-danger">{{ $message }}</p>
    @enderror
    
    <img src="{{asset("storage/$empleado->foto")}}" alt="" width="50px">
    <input
      class="form-control mb-2"
      type="file"
      name="foto"
    >
    @error('foto')
        <p class="text-danger">{{ $message }}</p>
    @enderror

    <button class="btn btn-warning">Actualizar</button>
</form>

@endsection