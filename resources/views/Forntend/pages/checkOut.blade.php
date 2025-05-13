@extends('Forntend.master')

@section('content')
 <main>
        <!-- Hero area Start-->
        <div class="hero-area section-bg2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="slider-area">
                            <div class="slider-height2 slider-bg4 d-flex align-items-center justify-content-center">
                                <div class="hero-caption hero-caption2">
                                    <h2>Checkout</h2>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb justify-content-center">
                                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                            <li class="breadcrumb-item"><a href="#">Checkout</a></li> 
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <!--  Hero area End -->
        <!-- Checkout Area Start-->
        <section class="checkout_area">
            <div class="container">
                
                
                <div class="billing_details">
                    <div class="row">
                        <div class="col-lg-8">
                            <h3>Billing Details</h3>
                            <form class="row contact_form" action="{{route('place.order')}}" method="post" novalidate="novalidate">
                            @csrf    
                            <div class="col-md-6 form-group p_star">
                                    <input type="text" value="{{auth('customer')->user()->name}}" class="form-control" id="first" name="name" />
                                    <span class="placeholder" data-placeholder=""></span>
                                </div>
                                <!-- <div class="col-md-6 form-group p_star">
                                    <input type="text" class="form-control" id="last" name="name" />
                                    <span class="placeholder" data-placeholder=""></span>
                                </div> -->
                                <!-- <div class="col-md-12 form-group">
                                    <input type="text" class="form-control" id="company" name="company" placeholder="Company name" />
                                </div> -->
                                <div class="col-md-6 form-group p_star">
                                    <input type="number" value="{{auth('customer')->user()->phone}}" class="form-control" id="number" name="number" />
                                    <span class="placeholder" data-placeholder=""></span>
                                </div>
                                <div class="col-md-6 form-group p_star">
                                    <input type="email" value="{{auth('customer')->user()->email}}"  class="form-control" id="email" name="email" />
                                    <span class="placeholder" data-placeholder=""></span>
                                </div>
                                
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="add1" name="add1" />
                                    <span class="placeholder" data-placeholder="Address"></span>
                                </div>
                                
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="city" name="city" />
                                    <span class="placeholder" data-placeholder="Town/City"></span>
                                </div>
                                <!-- <div class="col-md-12 form-group p_star">
                                    <select class="country_select">
                                        <option value="1">District</option>
                                        <option value="2">District</option>
                                        <option value="4">District</option>
                                    </select>
                                </div> -->
                                <!-- <div class="col-md-12 form-group">
                                    <input type="text" class="form-control" id="zip" name="zip" placeholder="Postcode/ZIP" />
                                </div> -->
                                <!-- <div class="col-md-12 form-group">
                                    <div class="checkout-cap">
                                        <input type="checkbox" id="fruit1" name="keep-log">
                                        <label for="fruit1">Create an account?</label>
                                    </div>
                                </div> -->
                                <!-- <div class="col-md-12 form-group">
                                    <div class="creat_account">
                                        <h3>Shipping Details</h3>
                                        <div class="checkout-cap">
                                            <input type="checkbox" id="f-option3" name="selector" />
                                            <label for="f-option3">Ship to a different address?</label>
                                        </div>
                                    </div>
                                    <textarea class="form-control" name="message" id="message" rows="1" placeholder="Order Notes"></textarea>
                                </div> -->
                           
                        </div>
                        <div class="col-lg-4">
                            <div class="order_box">
                                <h2>Your Order</h2>
                                <ul class="list">
                                    <li>
                                        <a href="#">Product<span>Total</span>
                                        </a>
                                    </li>
                                    @if(count($myCart) > 0)
                                    @foreach($myCart as $cartData)
                                    <li>
                                        <!-- <input type="hidden" name="P_name" value="{{$cartData['name']}}">
                                        <input type="hidden" name="P_name" value="{{$cartData['quantity']}}">
                                        <input type="hidden" name="P_name" value="{{$cartData['name']}}"> -->
                                        <a href="#">{{$cartData['name']}}
                                            <span class="middle">x {{$cartData['quantity']}}</span>
                                            <span class="last">{{$cartData['subtotal']}}</span>
                                        </a>
                                    </li>
                                    @endforeach
                                    <!-- <li>
                                        <a href="#">Fresh Tomatoes
                                            <span class="middle">x 02</span>
                                            <span class="last">$720.00</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Fresh Brocoli
                                            <span class="middle">x 02</span>
                                            <span class="last">$720.00</span>
                                        </a>
                                    </li> -->
                                </ul>
                                <ul class="list list_2">
                                    <li>
                                        <a href="#">Subtotal <span>{{array_sum( array_column(Session::get('cart'),'subtotal'))}} BDT</span></a>
                                    </li>
                                    <li>
                                        <a href="#">Shipping
                                            <span>Flat rate: 100 BDT</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Total<span>{{array_sum( array_column(Session::get('cart'),'subtotal')) + 100 }} BDT</span>
                                        <input type="hidden" name="total_amount" value="{{array_sum( array_column(Session::get('cart'),'subtotal')) }}">
                                        </a>
                                    </li>
                                </ul>
                                <div class="payment_item">
                                    <div class="radion_btn">
                                        <input type="radio" id="f-option5" value="CASH" name="pay" />
                                        <label for="f-option5">CASH</label>
                                        <div class="check"></div>
                                    </div>
                                    <p> Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode. </p>
                                </div>
                                <div class="payment_item active">
                                    <div class="radion_btn">
                                        <input type="radio" id="f-option6" value="SSL" name="pay" />
                                        <label for="f-option6">SSL </label>
                                        <img src="assets/img/gallery/card.jpg" alt="" />
                                        <div class="check"></div>
                                    </div>
                                    <p> Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode. </p>
                                </div>
                                <div class="creat_account checkout-cap">
                                    <input type="checkbox" id="f-option8" name="selector" />
                                    <label for="f-option8">I’ve read and accept the  <a href="#">terms & conditions*</a> </label>
                                </div>
                                <button type="submit" class="btn w-100" href="#">Place Order</button>
                            </div>
                             </form>
                            @else
                             <h2>No DATA</h2>
                             @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Checkout Area -->
    </main>

@endsection