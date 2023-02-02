<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){

        return Product::all();

    }
    public function Store(Request $request){

        $request->validate([
            'name'=>'required',
            'slug'=>'required',
            'price'=>'required'
        ]);

        return Product::create($request->all());

    }
    public function Edit($id){

        return Product::findOrFail($id);


    }
    public function Update(Request $request,$id){

     $product= Product::findOrFail($id);
     $product->update($request->all());
     return $product;

    }
    public function Delete($id){

        return Product::destroy($id);


    }
    public function Search($name){

        return Product::where('name','like','%'.$name.'%')->get();


    }

}
