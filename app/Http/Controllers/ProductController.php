<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Payments;
use App\Orderpayments;
use App\Order;
use App\Detailsorder;

class ProductController extends Controller
{
    public function index(){
        $data=array
        (
            'products' => Product::get(),
            'payments' => Payments::get(),
        );
        return view('products.index', compact('data'));
    }

    public function show(){
        $products = Product::get();
        return view('products.show',compact('products'));
    }

    public function create(){
        return view('products.create');
    }

    public function store(Request $request){
       
        
        $producto = new Product;

        $producto->name = $request->name;
        $producto->price = $request->price;
        if($producto->save())
            //$request->session()->flash('alert-success', 'El producto se ha creado exitosamente'); 
            //Session::flash('success', 'El producto se ha creado exitosamente');
            return redirect()->route('products.create')->with('status', 'El producto se ha creado exitosamente');
    
        
    }
    public function orden(Request $request){
        $numeroorden=1;
        //return $request;
        $paymentsf=$request->paymentsf;
        $paymentsfv=$request->paymentsfv;
        $productos=$request->productsf;
        $productosprice=$request->productsfp;
        
        $order = new Order;
        $order->numberorder=$numeroorden;
        $order->totalprice=$request->totalf;
        
        if($order->save()){
            $orden=$order->id;
            //ingreso los pagos
            foreach ($paymentsf as $key => $value) {
                $orderpayments = new Orderpayments;
                $orderpayments->order_id=$orden;
                $orderpayments->payments_id=$value;
                $orderpayments->value=$paymentsfv[$key]; 
                $orderpayments->save();               
            }
            //ingreso los detalles
            foreach ($productos as $key => $value) {
                $detailsorder = new Detailsorder;
                $detailsorder->product_id=$value;
                $detailsorder->order_id=$orden;
                $detailsorder->product_price=$productosprice[$key];      
                $detailsorder->save();          
            }
            return redirect()->route('products.create')->with('status', 'El registro se ha creado exitosamente');
        }else{
            return redirect()->route('products.create')->with('status', 'El registro no se pudo crear');
        }
    
        
    }
}
