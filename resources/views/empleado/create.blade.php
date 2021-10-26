<h1 class="text-primary">Crear usuario</h1>

<form
  enctype="multipart/form-data"
  method="POST"
  action={{route("empleado.store")}}
>
@csrf
    <input type="text" name="nombre" placeholder="Nombre">
    <input type="text" name="apellido_paterno" placeholder="A Paterno">
    <input type="text" name="apellido_materno" placeholder="A Materno">
    <input type="email" name="correo" placeholder="Correo">
    <input type="file" name="foto">
    <button type="submit">Agregar</button>
</form>