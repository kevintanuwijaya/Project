<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [GeneralController::class,'homePage']);

Route::get('/home', [GeneralController::class,'homePage']);

Route::get('/login', [AuthController::class,'loginPage'] );

Route::get('/register', [AuthController::class,'registerPage']);


//CARTS
Route::get('/cart',[CartController::class,'index']);

Route::get('/cart/{id}',[CartController::class,'edit']);


//PRODUCT
Route::get('/product/edit/{id}',[ProductController::class,'create']);

Route::get('/product/insert/{id}',[ProductController::class,'edit']);

Route::get('/products',[ProductController::class,'index']);

Route::get('/product/{id}',[ProductController::class,'show']);


//CATEGORY
Route::get('/categories',[CategoryController::class,'index']);

Route::get('/category/{id}',[CategoryController::class,'edit']);

Route::get('/category',[CategoryController::class,'create']);


//HISTORY
Route::get('/history',function(){
    return view('pages.historytransactionpage');
});


//SEARCH
Route::get('/search',function(){
    return view('pages/searchpage');
});

