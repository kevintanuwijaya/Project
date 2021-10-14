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
}
