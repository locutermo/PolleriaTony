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
        
        $orders = Order::all()->where('type',1); //Pedidos pendientes

        return view('admin.md_serve_orders.index',[
          'orders' =>$orders,
        ]);

    }
}
