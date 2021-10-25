<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Symfony\Contracts\Service\Attribute\Required;

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

    public function remember(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $remember = $request->input('remember');


        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            // dd($credentials);

            if(!empty($remember)){
                $email = $request->input('email');
                $password = $request->input('password');

                $minute = 300;
                Cookie::queue(Cookie::make('email', $email, $minute));
                Cookie::queue(Cookie::make('password', $password, $minute));
            }
            $request->session()->regenerate();


            return redirect()->intended('/');
        }
        else{
            return back()->with('errorLogin', 'Login Failed!');
        }
    }



    public function register(Request $request)
    {
        $validated = $request->validate([
            'fullname' => 'required|min:5',
            'gender' => 'required',
            'address' => 'required|min:10',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'confirm-password' => 'same:password',
            'agree' => 'required'
        ]);
    }

    public function logout(Request $request){

        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');

    }

}
