<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    //

    public function homePage()
    {
        return view('pages.homepage');
    }
}
