<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Order as Order ; 

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
        $new = view('admin.md_order.new',[
          'order' => null
        ]);
        

        $show = view('admin.md_order.show',[
            'orders' => $orders
        ]);
        
        //Verificar permisos del empleado
        return view('admin.md_order.index',[
          'new' => $new,
         'show' => $show,
       ]);
    }

}
