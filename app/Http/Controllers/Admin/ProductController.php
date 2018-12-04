<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Product as Product;

class ProductController extends Controller
{
    public function index(){

        $products = Product::all();

        $new = view('admin.md_products.new',[
            'products' => $products,
            'product' => null
        ]);

        $edit = view('admin.md_products.edit',[
            'products' => $products,
            'product' => null
        ]);

        $show = view('admin.md_products.show',[
            'products' => $products,
            'product' => null
        ]);

        return view('admin.md_products.index',[
            'new' => $new,
            'edit' => $edit,
            'show' => $show
        ]);
    }
}
