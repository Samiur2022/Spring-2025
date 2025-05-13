@extends('Forntend.master')

@section('content')

<main class="login-bg">
        <!-- login Area Start -->
        <div class="login-form-area">
            <div class="login-form">
                <!-- Login Heading -->
                <div class="login-heading">
                    <span>Login</span>
                    <p>Enter Login details to get access</p>
                </div>
                <!-- Single Input Fields -->
            <form action="{{route('customer.doLogin')}}" method="post">
                @csrf
                <div class="input-box">
                    <div class="single-input-fields">
                        <label>Username or Email Address</label>
                        <input name="email" type="text" placeholder="Username / Email address">
                    </div>
                    <div class="single-input-fields">
                        <label>Password</label>
                        <input name="password" type="password" placeholder="Enter Password">
                    </div>
                    <!-- <div class="single-input-fields login-check">
                        <input type="checkbox" id="fruit1" name="keep-log">
                        <label for="fruit1">Keep me logged in</label>
                        <a href="#" class="f-right">Forgot Password?</a>
                    </div> -->
                </div>
               
                <!-- form Footer -->
                <div class="login-footer">
                    <p>Don’t have an account? <a href="{{ route('view.regForm')}}">Sign Up</a>  here</p>
                    <button class="submit-btn3">Login</button>
                </div>
             </form>    
            </div>
        </div>
        <!-- login Area End -->
    </main>

@endsection
















 