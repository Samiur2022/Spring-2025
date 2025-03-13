<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list(){
        return view('categoryList');
    }


    public function form(){
        return view('categoryForm');
    }

    public function store(Request $request){
       
       // dd($request->all());
      

        Category::create([

            "name"=>$request->cat_name,
            "descp"=>$request->cat_decp
        ]);

        return redirect()->back();



    }
}
