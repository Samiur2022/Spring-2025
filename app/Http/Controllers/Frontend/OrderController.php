<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Library\SslCommerz\SslCommerzNotification;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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

  //  dd($request->all());

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
      'Pay_Status'=>'COD'
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

    //call payment if ssl/online payment
    if($request->pay == 'SSL')
    {
      //initiate payment gateway
      $this->payNow($myorder);
    }

    toastr()->title('Place Order')->success(' Place Order successfully!');
    $myCart = Session::forget('cart');
    return redirect()->route('home');
  }


  public function payNow($order) {


    $post_data = array();
        $post_data['total_amount'] = $order->Total; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = $order->id; // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $order->receiver_name;
        $post_data['cus_email'] = $order->receiver_email;
        $post_data['cus_add1'] = $order->receiver_add1;
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = $order->receiver_mobile;
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";

        $order->update([
          'Pay_Status'=>'pending'
        ]);

      
        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }

  
  }







}
