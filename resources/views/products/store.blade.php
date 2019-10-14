@extends('layout.cabecera')
@section('content')
<h1>store</h1>
<div>
    <form method='POST' action='{{route(products.store)}}'>

        <div class="form-group">
            <label for="exampleInputEmail1">Nombre Producto</label>
            <input type="text" required class="form-control" id="exampleInputEmail1" placeholder="Nombre Producto">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Precio del Producto</label>
            <input type="number" required class="form-control" id="exampleInputPassword1" placeholder="Precio del Producto">
        </div>
        <button type="submit" class="btn btn-default">Guardar</button>
    </form>
</div>}
@endsection