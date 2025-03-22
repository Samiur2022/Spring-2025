<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class,'dashboard']);


//Category

Route::get('/category/list', [CategoryController::class, 'list'])->name('cat.list');
Route::get('/category/form', [CategoryController::class, 'form'])->name('cat.form');
Route::post('/category/store', [CategoryController::class, 'store'])->name('cat.store');
Route::get('/category/delete/{cat_id}', [CategoryController::class, 'delete'])->name('cat.delete');


