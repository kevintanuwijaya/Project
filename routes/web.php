<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Role;
use App\Models\Transaction;
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

Route::middleware('isGuest')->group(function(){
    Route::get('/login', [AuthController::class,'loginPage']);

    Route::post('/login', [AuthController::class,'login'] );

    Route::get('/register', [AuthController::class,'registerPage']);

    Route::post('/register', [AuthController::class,'register']);
});

Route::get('/logout', [AuthController::class, 'logout'])->middleware('isLogin');

Route::get('/search', [GeneralController::class, 'search']);

//CARTS
Route::prefix('cart')->middleware('isUser')->group(function(){
    Route::get('/',[CartController::class,'create']);

    Route::get('/{cart_id}/{product_id}',[CartController::class,'edit']);
    
    Route::patch('/{cart_id}/{product_id}',[CartController::class,'update']);
    
    Route::put('/{product_id}',[CartController::class,'store']);
    
    Route::post('/checkout',[CartController::class,'checkout']);
    
    Route::delete('/{cart_id}/{product_id}',[CartController::class,'destroy']);
});

//PRODUCT
Route::prefix('product')->group(function(){
    Route::middleware('isAdmin')->group(function(){
        Route::get('/edit/{id}',[ProductController::class,'edit']);
        
        Route::get('/insert',[ProductController::class,'create']);

        Route::put('/',[ProductController::class,'store']);

        Route::patch('/{id}',[ProductController::class,'update']);

        Route::delete('/{id}',[ProductController::class,'destroy']);

        Route::get('/',[ProductController::class,'index']);
    });

    Route::get('/{id}',[ProductController::class,'show']);
});

//CATEGORY
Route::prefix('category')->middleware('isAdmin')->group(function(){
    Route::get('/',[CategoryController::class,'index']);

    Route::get('/{id}',[CategoryController::class,'edit']);

    Route::patch('/{id}',[CategoryController::class,'update']);

    Route::get('/',[CategoryController::class,'create']);

    Route::put('/',[CategoryController::class,'store']);

    Route::delete('/{id}',[CategoryController::class,'destroy']);
});

//HISTORY
Route::get('/history/{user_id}',[TransactionController::class, 'transactionHistory'])->middleware('isUser');

