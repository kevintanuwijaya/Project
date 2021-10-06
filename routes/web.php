<?php

use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
    return view('pages/homepage');
});

Route::get('/login', [AuthController::class,'loginPage'] );

Route::get('/register', [AuthController::class,'registerPage']);

Route::get('/detail',function(){
    return view('pages/detailproductpage');
});

Route::get('/cart',function(){
    return view('pages/cartpage');
});

Route::get('/editcart',function(){
    return view('pages/editcartpage');
});

Route::get('/history',function(){
    return view('pages/historytransactionpage');
});

Route::get('/add',function(){
    return view('pages/addproductpage');
});

Route::get('/edit',function(){
    return view('pages/editproductpage');
});

Route::get('/managecategory',function(){
    return view('pages/managecategorypage');
});

Route::get('/manageproduct',function(){
    return view('pages/manageproductpage');
});

Route::get('/insert',function(){
    return view('pages/insertcategorypage');
});

Route::get('/editcategory',function(){
    return view('pages/editcategorypage');
});

Route::get('/search',function(){
    return view('pages/searchpage');
});

