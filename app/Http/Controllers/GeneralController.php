<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    //

    public function homePage()
    {
        $products = Product::paginate(6);

        return view('pages.homepage',['products' => $products]);
    }

    public function search(Request $request){
        $products = Product::where('name', 'like', '%'.$request->get('product_name').'%')->paginate(6);
        return view('pages.homepage', ['products' => $products]);
    }
}
