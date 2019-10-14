@extends('layout.cabecera')
@section('content')
<h1 class="text-center">Crear Orden</h1>
<div class="col-md-12 ">
    <div class="col-md-6 border" >
        <form class="form-horizontal">
            <div class="form-group">
                <label for="productos" class="col-sm-2 control-label">Productos</label>
                <div class="col-sm-10">
                    <select class="form-control" id="producto" name="producto">
                        <option value="" required>Seleccione</option>
                        @foreach($data['products'] as $product)
                            <option value="{{$product->id}}">{{$product->name.' - Price:'. $product->price}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="formas" class="col-sm-2 control-label">Formas de Pago</label>
                <div class="col-sm-10">
                    <select id="formas" disabled="disabled" name="formas" class="form-control" required>
                        <option value="">Seleccione</option>
                        @foreach($data['payments'] as $payment)
                            <option value="{{$payment->id}}">{{$payment->name}}</option>
                        @endforeach
                    </select>
                    
                </div>
            </div>    
            <div class="form-group ocultar">
                <label for="formas" class="col-sm-2 control-label">Valor Entregado</label>
                <div class="col-sm-10">
                    <input type="text" id="valor_entregado" name="valor_entregado" class="form-control" required placeholder="Valor entregado">
                </div>
            </div>    

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="button" id="agregar" class="btn btn-success">Agregar</button>
                </div>
            </div>
        </form> 
    </div>
    <div class="col-md-6 border" >        
        <div class="col-md-6 col-md-offset-3 border2 ">
            <div class="orden text-center">
                <div id="numero">Orden #1</div>
                <div class="text-center">Productos</div>
                <div>
                    <table id="tableproductos" class="table table-striped" >
                        <thead>
                            <tr>
                                <td>Nombre</td>
                                <td>Precio</td>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
                <div id="formaspago" class="col-md-12">
                    <table id="tableformas" class="table text-right" >                        
                        <tbody>
                            
                        </tbody>
                    </table>                                      
                </div>
                <div id="cambio" class="col-md-12">
                    <table id="tablecambio" class="table text-right" >                        
                        <tbody>
                            
                        </tbody>
                    </table>                                      
                </div>
                
                <div class="col-md-12">
                    <button type="button" id="generar" class="btn btn-success text-center">Generar</button>
                </div>                
            </div>           
        </div>
        <form class="hidden" method="POST" action="{{route('products.orden')}}" id="forden">
            @csrf            
            <input type="hidden" name="cambiof" id="cambiof" value=0>
            <input type="hidden" name="totalf" id="totalf" value=0>           
        </form>
    </div>
</div>
@endsection