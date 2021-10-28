@extends('plantilla.plantilla')

@section('contenido')

<h1 class="text-primary h3 text-center my-3">Crear usuario</h1>

<form
  enctype="multipart/form-data"
  method="POST"
  action={{route("empleado.store")}}
>
@csrf
    <input
      name="nombre"
      placeholder="Nombre"
      type="text"
      class="form-control mb-2"
    >
    <input type="text" name="apellido_paterno" placeholder="A Paterno" class="form-control mb-2">
    <input type="text" name="apellido_materno" placeholder="A Materno" class="form-control mb-2">
    <input type="email" name="correo" placeholder="Correo" class="form-control mb-2">
    <input type="file" name="foto" class="form-control mb-2">
    <button type="submit" class="btn btn-primary">Agregar</button>
</form>

@endsection
