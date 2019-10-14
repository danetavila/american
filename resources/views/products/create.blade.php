@extends('layout.cabecera')
@section('content')
<h1 class="text-center">Crear Productos</h1>
<div class="col-md-6 col-md-offset-3" >
   
    @if (session('status'))
        <div class='alert alert-success alert-dismissible' role='alert'>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ session('status') }}
        </div>
    @endif
    <form method="POST" action="{{route('products.store')}}">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Nombre Producto</label>
            <input type="text" name="name" required class="form-control" id="exampleInputEmail1" placeholder="Nombre Producto">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Precio del Producto</label>
            <input type="number" name="price" required class="form-control" id="exampleInputPassword1" placeholder="Precio del Producto">
        </div>
        <button type="submit" class="btn btn-success text-center">Guardar</button>
        <button class="btn btn-default text-center">Volver</button>
    </form>
</div>
@endsection
