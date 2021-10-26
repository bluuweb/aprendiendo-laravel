<h1>Lista de empleados</h1>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido P</th>
      <th scope="col">Apellido M</th>
      <th scope="col">Correo</th>
      <th scope="col">IMG</th>
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
            <td>{{$item->foto}}</td>
            <img src={{$item->foto}} alt="">
        </tr>
    @endforeach
  </tbody>
</table>