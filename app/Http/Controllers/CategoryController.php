<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list(){

        $cat = Category::all();
        return view('Backend.categoryList',compact('cat'));
    }


    public function form(){
        return view('Backend.categoryForm');
    }

    public function store(Request $request){
       
       // dd($request->all());
      

        Category::create([

            "name"=>$request->cat_name,
            "descp"=>$request->cat_decp
        ]);
        toastr()->title('Category')->success('Category Added');

        return redirect()->route('cat.list');



    }


    public function delete($cat_id){
        $category = Category::find($cat_id);
        $category->delete();
        toastr()->title('Category')->error('Category Deleted');
        return redirect()->back();


    }
}
