<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list(){

        $product = Product::all();

        return view('productList', compact('product'));
    }

    public function form(){
        $category = Category::all();
        return view('productForm', compact('category'));
    }


    public function store(Request $request){
        // dd($request->all());

        //eloquent orm
        Product::create([
            'category_id'=>$request->cat_id,
            'name'=>$request->pro_name,
            'descp'=>$request->pro_decp
        ]);

        notify()->success('Product added');
        return redirect()->route('pro.list');
    }
}
