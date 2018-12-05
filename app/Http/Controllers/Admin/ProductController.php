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

    public function store(Request $request){
       $urlImgName = ($request->file('urlImgProduct')!=null)?time().$request->file('urlImgProduct')->getClientOriginalName():null;
        Product::create([
            'name' => $request->name,
            'stock' => $request->stock,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $urlImgName,
            'waitTime' => $request->waitTime,
        ]);

        if($urlImgName != null) \Storage::disk('localProduct')->put($urlImgName, \File::get($request->file('urlImgProduct')));
    
        return "1";
    }

    public function edit($id){
        $product = Product::find($id);
        return view('admin.md_products.edit',[
            'product' => $product,
        ]);
    }

    public function update(Request $request){
        $urlImgName = ($request->file('urlImgEditP')!=null)?time().$request->file('urlImgEditP')->getClientOriginalName():null;
        $productEdit = Product::find($request->id);
        $productEdit->name = $request->name;
        $productEdit->stock = $request->stock;
        $productEdit->description = $request->description;
        $productEdit->price = $request->price;
        $productEdit->waitTime = $request->waitTime;
        if($urlImgName != null){
            $productEdit->image = $urlImgName;
        }


        $productEdit->save();

        //Si la imagen con mismo nombre existe, la actualiza
        if($urlImgName!=null) \Storage::disk('localProduct')->put($urlImgName, \File::get($request->file('urlImgEditP')));

        return "0";

    }

    public function destroy($id){
        $product = Product::find($id);
        $object = (object) array('caso' =>0 , 'titulo' => 'Operación Exitosa!!', 'texto' => 'Se eliminó el producto '.$product->name.' correctamente !');
        $product->delete();
        return json_encode($object);
    }

    public function destroyValidation($id){
        $product = Product::find($id);
        $obj = (object) array('titulo' => '¿Estás Seguro(a)?', 'texto' => 'Se eliminara el producto '.$product->name.'!');
        return json_encode($obj);
    }
}
