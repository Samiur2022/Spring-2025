<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


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
        

        });

  

   


});


