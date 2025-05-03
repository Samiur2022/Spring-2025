<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list(){

        $product = Product::with('category')->paginate(10);

        return view('Backend.productList', compact('product'));
    }

    public function form(){
        $category = Category::all();
        return view('Backend.productForm', compact('category'));
    }


    public function store(Request $request){
         dd($request->all());

         //file upload
         if($request->hasFile('product_image')){
            $file = $request->file('product_image');
            $FileName = date('YmdHis').'.'.$file->getClientOriginalExtension();
            $file->storeAs('/Products',$FileName);

         }

        //eloquent orm
        Product::create([
            'category_id'=>$request->cat_id,
            'name'=>$request->pro_name,
            'descp'=>$request->pro_decp,
            'image'=>$FileName
        ]);

        toastr()->title('Product')->success('Product added');
        return redirect()->route('pro.list');
    }
}
