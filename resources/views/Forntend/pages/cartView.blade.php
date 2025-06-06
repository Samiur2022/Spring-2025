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
                                    <h2>Cart</h2>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb justify-content-center">
                                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                            <li class="breadcrumb-item"><a href="#">Cart</a></li> 
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
<section class="cart_area">
            <div class="container">
                <div class="cart_inner">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if( count($myCart) > 0)
                                @foreach($myCart as $cartData)
                                <tr>
                                    <td>
                                        <div class="media">
                                            <div class="d-flex">
                                                <img src="assets/img/gallery/best-books1.jpg" alt="" />
                                            </div>
                                            <div class="media-body">
                                                <p>{{$cartData['name']}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h5>{{$cartData['price']}}</h5>
                                    </td>
                                    <td>
                                        <div class="product_count">
                                            <span class="input-number-decrement"> <i class="ti-minus"></i></span>
                                            <input class="input-number" type="text" value="{{$cartData['quantity']}}" min="0" max="10">
                                            <span class="input-number-increment"> <i class="ti-plus"></i></span>
                                        </div>
                                    </td>
                                    <td>
                                        <h5>{{$cartData['subtotal']}}</h5>
                                    </td>
                                </tr>
                            @endforeach  
                                <tr class="bottom_button">
                                    <td>
                                        <a class="btn" href="#">Update Cart</a>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <div class="cupon_text float-right">
                                            <a class="btn" href="#">Close Coupon</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <h5>Subtotal</h5>
                                    </td>
                                    <td>
                                        <h5> {{array_sum ( array_column ( Session::get('cart') ,'subtotal' ))}} </h5>
                                    </td>
                                </tr>
                                @else
                                    <h2>Cart is Empty !!</h2>

                                @endif    
                                <!-- <tr class="shipping_area">
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <h5>Shipping</h5>
                                    </td>
                                    <td>
                                        <div class="shipping_box">
                                            <ul class="list">
                                                <li>
                                                    Flat Rate: $5.00
                                                    <input type="radio" aria-label="Radio button for following text input">
                                                </li>
                                                <li>
                                                    Free Shipping
                                                    <input type="radio" aria-label="Radio button for following text input">
                                                </li>
                                                <li>
                                                    Flat Rate: $10.00
                                                    <input type="radio" aria-label="Radio button for following text input">
                                                </li>
                                                <li class="active">
                                                    Local Delivery: $2.00
                                                    <input type="radio" aria-label="Radio button for following text input">
                                                </li>
                                            </ul>
                                            <h6>
                                                Calculate Shipping
                                                <i class="fa fa-caret-down" aria-hidden="true"></i>
                                            </h6>
                                            <select class="shipping_select">
                                                <option value="1">Bangladesh</option>
                                                <option value="2">India</option>
                                                <option value="4">Pakistan</option>
                                            </select>
                                            <select class="shipping_select section_bg">
                                                <option value="1">Select a State</option>
                                                <option value="2">Select a State</option>
                                                <option value="4">Select a State</option>
                                            </select>
                                            <input class="post_code" type="text" placeholder="Postcode/Zipcode" />
                                            <a class="btn" href="#">Update Details</a>
                                        </div>
                                    </td>
                                </tr> -->
                            </tbody>
                        </table>
                        <div class="checkout_btn_inner float-right" style="margin-right: 0;">
                            <a class="btn" href="#">Continue Shopping</a>
                            <a class="btn checkout_btn" href="{{ route('check.out') }}">Proceed to checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Cart Area =================-->
    </main>
@endsection