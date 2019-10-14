<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DavilaOrder</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
        <!-- Latest compiled and minified CSS -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
        

  <script>
        $(document).ready(function() {
            $("#producto").change(function(){
                val=$(this).val();                
                if(val>0){
                    $( "#formas" ).prop( "disabled", false );
                }else{
                    $( "#formas" ).prop( "disabled", true );
                    $("#formas").val("");
                    $(".ocultar").css('display','none');                }
            });

            $("#formas").change(function(){
                val=$(this).val();
                if(val>0){
                    $(".ocultar").css('display','block');
                }else{
                    $(".ocultar").css('display','none');
                }
            });

            $("#generar").click(function(){
                $("#forden").submit();
            });

            $("#agregar").click(function(){
                //appenad
                //busco los valores
                pro=$("#producto").val();
                prot=$('select[name="producto"] option:selected').text();
                forma=$("#formas").val();
                format=$('select[name="formas"] option:selected').text();
                valor=parseFloat($("#valor_entregado").val());
                infopro=prot.split("-");
                infopro2=infopro[1].split(":");
                valores=0;
                formastotal=0;
                productostotal=0;

                //verifico si el producto esta en la tabla
                if ($("#tableproductos #"+pro).length){
                  valores=1;
                  infopro2[1]=0;
                }

                if((pro>0) &&(forma>0) && (valor>0)){
                    //agrego en la vista
                     //sumar todos los valores de cambio
                    $("#tableformas").find("tr").each(function(){
                        formastotal+=parseFloat($(this).children().data('id'));                        
                    });

                    $("#tableproductos").find(".price").each(function(){                       
                        productostotal+=parseFloat($(this).data('price'));                        
                    });
                    
                    //producto
                    if(valores==0){
                        //ingresar producto
                        nuevaFilaproducto="<tr id='"+pro+"'><td>"+infopro[0]+"</td><td class='price' data-price='"+infopro2[1]+"'>"+infopro2[1]+"</td></tr>";
                        $("#tableproductos").append(nuevaFilaproducto);
                        fp='<input type="hidden" name="productsf[]" value='+pro+'>';
                        $("#forden").append(fp);
                        fpp='<input type="hidden" name="productsfp[]" value='+infopro2[1]+'>';
                        $("#forden").append(fpp);
                    }   
                    
                    //ingresar forma
                    nuevaFilaforma="<tr><td data-id='"+valor+"'>"+format+" "+ valor+"</td></tr>";
                    $("#tableformas").append(nuevaFilaforma);
                    ff='<input type="hidden" name="paymentsf[]" value='+forma+'>';
                    $("#forden").append(ff);
                    ffv='<input type="hidden" name="paymentsfv[]" value='+valor+'>';
                    $("#forden").append(ffv);
                    
                                        

                    //cambio 
                    cambio=productostotal+parseFloat(infopro2[1])-formastotal-valor;
                    $("#cambiof").val(cambio);
                    $("#totalf").val(productostotal);

                    if(cambio>0){
                        nuevaFilacambio="<tr><td>Falta: "+cambio+"</td></tr>";
                        
                    }else{
                        nuevaFilacambio="<tr><td>Cambio: "+parseFloat(cambio*-1)+"</td></tr>";
                    }
                    //forma
                    
                    $("#tablecambio tr:last").remove();
                    $("#tablecambio").append(nuevaFilacambio);                                       
                    $("#formas").val('');
                    $("#valor_entregado").val('');
                }else{
                    alert("Debe ingresar todos los datos");
                }

            });
        });
    </script>
    <style>
        .border2{
            min-height:60%;
            border: 1px solid green;
            padding: 2%;
            border-radius: 10px;
        }
        .border{
            min-height:80%;
            border: 1px solid green;
            padding: 2%;
            border-radius: 10px;
            height:500px;
        }
        .ocultar{
            display: none;
        }

    </style>
    </head>
    <body>
        <div class="row">
            <nav>
                <ul class="nav nav-tabs">
                  <li role="presentation" class="active" ><a href="{{route('products.show')}}">Ver Órdenes</a></li>
                  <li role="presentation"><a href="{{route('products.create')}}">Crear Producto</a></li>
                  <li role="presentation"><a href="{{route('products.index')}}"> Crear Órdenes</a></li>
                </ul>
            </nav>
        </div>  
        <div class="row">   
            @yield('content')
        </div>      
    </body>
</html>
