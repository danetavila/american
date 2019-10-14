@extends('layout.cabecera')
@section('content')
<h1 class="text-center">Ver Órdenes</h1>
<div class="col-md-12 ">
    <div class="col-md-6 col-md-offset-3 border" >
        @foreach($products as $product)
            <li><a href="#">{{ $product->name}}</a></li>
        @endforeach
    </div>    
</div>
@endsection