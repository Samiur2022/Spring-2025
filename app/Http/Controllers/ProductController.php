<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
         //dd($request->all());

         //validation
         $validation = Validator::make($request->all(),[
            'pro_name' => 'required|string',
            'pro_decp' => 'required',
            'product_price' => 'required',
            'product_stock' => 'required',
            'product_image' => 'required|file|max:10240'

         ]);

         if($validation->fails()){
            toastr()->title('Product Form')->success($validation->getMessageBag());
            return redirect()->back();
         }

         //file upload
         if($request->hasFile('product_image')){
            $file = $request->file('product_image');
            $FileName = date('YmdHis').'.'.$file->getClientOriginalExtension();
            $file->storeAs('/Products',$FileName);

         }


       //query
        Product::create([
            'category_id'=>$request->cat_id,
            'name'=>$request->pro_name,
            'descp'=>$request->pro_decp,
            'price' =>$request->product_price,
            'stock'=>$request->product_stock,
            'discount'=>$request->product_discount,
            'image'=>$FileName
        ]);

        toastr()->title('Product')->success('Product added');
        return redirect()->route('pro.list');
    }
}
