<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            // dd($credentials);
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
