<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order as Order ; 

class ServeOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $orders = Order::all(); //Pedidos pendientes
        $info = view('admin.md_serve_orders.info',['order'=>null]);

        return view('admin.md_serve_orders.index',[
          'orders' =>$orders,
          'info' => $info,
        ]);

    }
    

    public function endOrder(Request $request){
        $order =  Order::find($request->id);
        $order->state = 3 ;
        $order->save();
    }

    public function acceptOrder(Request $request){
        $order =  Order::find($request->id);
        $order->state = 2 ;
        $order->save();
    }

    public function product($id){

        $order = Order::find($id);
        return  view('admin.md_serve_orders.info', [
           'order' => $order,
        ]);
    }
}
