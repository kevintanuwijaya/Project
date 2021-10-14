<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //

    public function loginPage()
    {
        return view('pages.loginpage');
    }

    public function registerPage()
    {
        return view('pages.registerpage');
    }

    public function login()
    {

    }

    public function register()
    {
        
    }

}
