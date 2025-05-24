<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Karim007\SslcommerzLaravel\SslCommerz\SslCommerzNotification;
use PhpParser\Node\Expr\FuncCall;

class OrderController extends Controller
{
  public function addToCart($product_id)
  {

    //  dd($product_id);

    $myCart = session()->get('cart');

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

      session()->put('cart', $cartFirst);
      toastr()->title('Add Cart')->success('First Product Added successfully!');

      return redirect()->back();
    }



    if (array_key_exists($product_id, $myCart)) {

      //quantity[+1] Subtotal (price * quantity)

      $myCart[$product_id]['quantity'] = $myCart[$product_id]['quantity'] + 1;
      $myCart[$product_id]['subtotal'] = $myCart[$product_id]['price'] * $myCart[$product_id]['quantity'];


      session()->put('cart', $myCart);
      toastr()->title('Add Cart')->success('Product Updated successfully!');
      return redirect()->back();
    } 

    else 
    {

      $product = Product::find($product_id);

      $myCart[$product_id] = [

        // array_key => value

        'id' => $product->id,
        'name' => $product->name,
        'image' => $product->image,
        'price' => $product->price,
        'quantity' => 1,
        'subtotal' => $product->price * 1

      ];

      session()->put('cart', $myCart);
      toastr()->title('Add Cart')->success(' New Product Added successfully!');
      return redirect()->back();
    }

  }



  //cart Page View

  public function cartView(){

    $myCart = Session::get('cart') ?? [];
    // dd($myCart);
   // $cart = Session::get('cart') ?? [];
    return view('Forntend.pages.cartView',compact('myCart'));
  }


  public function checkOut(){

  //  $customer = Customer
     $myCart = Session::get('cart') ?? [];
    return view('Forntend.pages.checkOut',compact('myCart'));
  }

  public function placeOrder(Request $request){

   //dd($request->all());

    //validation for student work

   $myorder = Order::create([
      'customer_id' => auth('customer')->user()->id,
      'receiver_name' =>$request->name,
      'receiver_mobile' =>$request->number,
      'receiver_email' =>$request->email,
      'receiver_add1' =>$request->add1,
      'receiver_city' =>$request->city,
      'subtotal' =>$request->total_amount,
      'Total' =>$request->total_amount + 100,
      'Pay_Method' =>$request->pay,
    ]);

    $myCart = Session::get('cart');

    foreach($myCart as $cartData)
    {
      OrderDetail::create([
        'order_id' => $myorder->id,
        'product_id'=>$cartData['id'],
        'pro_quentity'=>$cartData['quantity'],
        'unit_price'=>$cartData['price'],
        'subtotal'=>$cartData['subtotal'],
      ]);

    }

    if($request->pay == 'SSL'){
      $this->payNow($myorder);

     // dd("ami");
    }


    toastr()->title('Place Order')->success(' Place Order successfully!');
    $myCart = Session::forget('cart');
    return redirect()->route('view.profile');




  }


  public function payNow($myorder){

   
   

  }



}
