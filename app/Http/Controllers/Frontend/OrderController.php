<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
  public function addToCart($product_id)
  {

    //  dd($product_id);

    $myCart = Session::get('cart');

    //dd($myCart);
    
    
    if (empty($myCart)) {
      // amar cart empty or not empty
      $product = Product::find($product_id);

      $cartFirst[$product_id] = [

        // array_key => value

        'id' => $product->id,
        'name' => $product->name,
        'image' => $product->image,
        'price' => $product->price,
        'quantity' => 1,
        'subtotal' => $product->price * 1

      ];

      Session::put('cart', $cartFirst);
      toastr()->title('Add Cart')->success('First Product Added successfully!');

      return redirect()->back();
    }



    if (array_key_exists($product_id, $myCart)) {

      //quantity[+1] Subtotal (price * quantity)

      $myCart[$product_id]['quantity'] = $myCart[$product_id]['quantity'] + 1;
      $myCart[$product_id]['subtotal'] = $myCart[$product_id]['price'] * $myCart[$product_id]['quantity'];


      Session::put('cart', $myCart);
      toastr()->title('Add Cart')->success('Product Updated successfully!');
      return redirect()->back();
    } 

    else 
    {

      $product = Product::find($product_id);

      $newCart[$product_id] = [

        // array_key => value

        'id' => $product->id,
        'name' => $product->name,
        'image' => $product->image,
        'price' => $product->price,
        'quantity' => 1,
        'subtotal' => $product->price * 1

      ];

      Session::put('cart', $newCart);
      toastr()->title('Add Cart')->success(' New Product Added successfully!');
      return redirect()->back();
    }

  }



  //cart Page View

  public function cartView(){


    $myCart = Session::get('cart');
     dd($myCart);
    return view('Forntend.pages.cartView',compact('myCart'));
  }



}
