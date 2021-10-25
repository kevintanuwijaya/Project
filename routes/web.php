<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\ProductController;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Role;
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

Route::post('/login', [AuthController::class,'login'] );

Route::post('/register', [AuthController::class,'register']);

Route::get('/logout', [AuthController::class, 'logout']);


//CARTS
Route::get('/cart',[CartController::class,'create']);

Route::get('/cart/edit/{cart_id}/{product_id}',[CartController::class,'edit']);

Route::post('/cart/edit/{cart_id}/{product_id}',[CartController::class,'update']);

Route::post('/cart/insert',[CartController::class,'store']);

Route::post('/cart/checkout',[CartController::class,'checkout']);

Route::post('/cart/delete/{id}',[CartController::class,'destroy']);


//PRODUCT
Route::get('/product/edit/{id}',[ProductController::class,'edit']);

Route::get('/product/insert',[ProductController::class,'create']);

Route::post('/product/insert',[ProductController::class,'store']);

Route::post('/product/update/{id}',[ProductController::class,'update']);

Route::delete('/product/delete/{id}',[ProductController::class,'destroy']);

Route::get('/products',[ProductController::class,'index']);

Route::get('/product/{id}',[ProductController::class,'show']);


//CATEGORY
Route::get('/categories',[CategoryController::class,'index']);

Route::get('/category/update/{id}',[CategoryController::class,'edit']);

Route::post('/category/update/{id}',[CategoryController::class,'update']);

Route::get('/category/insert',[CategoryController::class,'create']);

Route::post('/category/insert',[CategoryController::class,'store']);

Route::post('/category/delete/{id}',[CategoryController::class,'destroy']);



//HISTORY
Route::get('/history',function(){
    return view('pages.historytransactionpage');
});


//SEARCH
Route::get('/search',function(){
    return view('pages/searchpage');
});

