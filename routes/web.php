<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class,'dashboard']);


//Category

Route::get('/category/list', [CategoryController::class, 'list']);
Route::get('/category/form', [CategoryController::class, 'form']);
Route::post('/category/store', [CategoryController::class, 'store']);