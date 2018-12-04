<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Order as Order ; 
use App\Product as Product ; 
use App\Table as Table ; 


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        $products = Product::all();
        $tables = Table::all()->where('state',1); //Mesas libres

        $new = view('admin.md_orders.new',[
          'order' => null,
          'products'=>$products,
          'tables'=>$tables,
        ]);
        

        $show = view('admin.md_orders.show',[
            'orders' => $orders,
            'products' => null ,
            'tables'=>null,
        ]);

        //Verificar permisos del empleado
        return view('admin.md_orders.index',[
          'new' => $new,
         'show' => $show,
       ]);
    }

    public function product(Request $request){
        $product = Product::find($request->id);

        $obj = (object) array('name'=>$product->name,'price'=>$product->price,'stock' => $product->stock, 'description' => $product->description ,'waitTime' => $product->waitTime);
        return json_encode($obj);
    }

    public function store(Request $request){

        $order = Order::create([
            'worker_id' => Auth::User()->worker->id ,
            'table_id' => $request->table ,
            'observation' => $request->observation ,
            'totalPrice' => $request->totalPrice ,
            'state' => 1 ,
            'date' => new Carbon('America/Lima'),
        ]);

        $table = Table::find($request->table);
        $table->state = 2 ; 
        //Cambiar el estado de la mesa a ocupado para que no se elija
        $table->save();

        foreach ($request->products as $i => $product) {
            //Disminuyendo la cantidad a cada producto
            $p = Product::find($product['id']);
            $p->stock  = $p->stock - $product['count'];
            $p->save();
            $order->products()->attach($product['id'],['quantify'=> $product['count']]);
            

            // DB::table('orders_products')->insert([
            //     'product_id' => $product['id'],
            //     'order_id' => $order->id,
            //     'quantify' => $product['count'],
            //    ]);
        }
    }

    public function update(Request $request){

        $order = Order::find($request->id);
        $order->totalPrice = $request->totalPrice ; 
        $order->observation = $request->observation ;
        $order->save();

        $old_products = $order->products;
        // $order->products()->delete();
        // $products = $order->products();
        // $order->products()->detach();
        
        foreach ($request->products as $i => $product) {
            //Disminuyendo la cantidad a cada producto
            $p = Product::find($product['id']);
            //Lista de productos que tenia el pedido
            // foreach ($old_products as $key => $pro) {
                //Si el producto de la nueva lista de productos del pedido que se genera al actualizar esta en la lista que se borró
                //entonces no se le quitará el stock
                
                    // if($p->id!= $pro->id){ //Si no esta es porque es un nuevo producto
                    if(($old_products->where('id',$p->id))->isEmpty()){//No está 
                        $p->stock  = $p->stock - $product['count'];
                        $order->products()->attach($p->id,['quantify'=> $product['count']]);
                        
                    }
                
            // }
            
            //Solo debe disminuir el stock en caso el producto no este en la lista de pedidos
            $p->save();
            
            
        }

        
    }


    public function edit($id)
    {
      $order = Order::find($id);
        $products = $order->products;
        foreach ($products as $key => $product) {
            
            $product->cant = $product->pivot->quantify ;
        }
      
      
      $obj = (object) array('table_id'=>$order->table->id,'order'=>$order,'totalPrice' => $order->totalPrice ,'observation' => $order->observation , 'products' => $products );
      return json_encode($obj);
    }

}
