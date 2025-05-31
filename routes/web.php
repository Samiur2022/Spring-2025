<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Frontend\CustomerAuthController;
use App\Http\Controllers\Frontend\CustomerController;
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SslCommerzPaymentController;
use Illuminate\Support\Facades\Route;



//Frontend Route


Route::get('/registration',[CustomerAuthController::class,'viewRegForm'])->name('view.regForm');
Route::post('/submit',[CustomerAuthController::class,'regStoreForm'])->name('customer.submit');
Route::get('/login',[CustomerAuthController::class,'viewLogForm'])->name('customer.login');
Route::post('/customer/submit',[CustomerAuthController::class,'logStoreForm'])->name('customer.doLogin');


Route::get('/',[FrontendHomeController::class, 'home'])->name('home');


Route::get('/addToCart/{product}',[OrderController::class,'addToCart'])->name('add.cart');
Route::get('/cart',[OrderController::class,'cartView'])->name('cart.view');

Route::group(['middleware' => 'customerAuth'],function(){

    Route::get('/check-out',[OrderController::class,'checkOut'])->name('check.out');
    Route::post('/place-order',[OrderController::class,'placeOrder'])->name('place.order');


    Route::post('/success', [SslCommerzPaymentController::class, 'success']);
    Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
    Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);
        
    Route::get('/customer/profile',[CustomerController::class,'viewProfile'])->name('view.profile');



    //PAYMENT SSL

//SSLCOMMERZ END
    
});

//ssl commerz
Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);


Route::group(['prefix' => 'admin'],function(){

    //login Page

    Route::get('/login',[AuthenticationController::class, 'loginPageView'])->name('login');
    Route::post('/Dologin',[AuthenticationController::class, 'submit'])->name('do.login');

        Route::group(['middleware' => 'auth'],function(){
             Route::get('/logout',[AuthenticationController::class, 'logout'])->name('logout');
            //Category

            Route::get('/', [HomeController::class,'dashboard'])->name('dashboard');
            Route::get('/category/list', [CategoryController::class, 'list'])->name('cat.list');
            Route::get('/category/form', [CategoryController::class, 'form'])->name('cat.form');
            Route::post('/category/store', [CategoryController::class, 'store'])->name('cat.store');
            Route::get('/category/delete/{cat_id}', [CategoryController::class, 'delete'])->name('cat.delete');
        
            //product
            Route::get('/product/list',[ProductController::class, 'list'])->name('pro.list');
            Route::get('/product/form',[ProductController::class, 'form'])->name('pro.form');
            Route::post('/product/store',[ProductController::class, 'store'])->name('pro.store');
            Route::get('/product/delete',[ProductController::class, 'delete'])->name('pro.delete');

        });

});


