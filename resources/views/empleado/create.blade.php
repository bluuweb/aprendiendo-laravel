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
      {{-- eso hace que si envias el formulario con unos campos vacios y la validacion falla no se perdera lo que habias escrito antes --}}
      value="{{ old('nombre') }}"
    >
    @error('nombre')
        <p class="text-danger">{{ $message }}</p>
    @enderror
    
    <input
      class="form-control mb-2"
      name="apellido_paterno"
      placeholder="A Paterno"
      type="text"
      value="{{ old('apellido_paterno') }}"
    >
    @error('apellido_paterno')
        <p class="text-danger">{{ $message }}</p>
    @enderror
    
    <input
      class="form-control mb-2"
      name="apellido_materno"
      placeholder="A Materno"
      type="text"
      value="{{ old('apellido_materno') }}"
    >
    @error('apellido_materno')
        <p class="text-danger">{{ $message }}</p>
    @enderror
   
    <input
      class="form-control mb-2"
      name="correo"
      placeholder="Correo"
      type="email"
      value="{{ old('correo') }}"
    >
    @error('correo')
        <p class="text-danger">{{ $message }}</p>
    @enderror
    <input
      class="form-control mb-2"
      name="foto"
      type="file"
    >
    @error('foto')
        <p class="text-danger">{{ $message }}</p>
    @enderror
    <button type="submit" class="btn btn-primary">Agregar</button>
</form>

@endsection
