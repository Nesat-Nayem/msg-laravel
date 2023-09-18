<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                ->with('success', 'Signed in');
        }

        return redirect()->back()->with('error', 'Login details are not valid');
    }

    // public function registration()
    // {
    //     return view('auth.register');
    // }


    // public function customRegistration(Request $request)
    // {
    //     // dd($request);
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email|unique:users',
    //         'password' => 'required_with:confirmpassword|same:confirmpassword',
    //         'confirmpassword' => 'required|same:password'
    //     ]);

    //     $register = new User($request->input());
    //     $register->password = Hash::make($request->get('password'));
    //     $register->confirmpassword = Hash::make($request->get('confirmpassword'));
    //     $register->save();

    //     return redirect()->route('adminlogin')->withSuccess('You have signed-in');
    // }

    public function dashboard()
    {
        if (Auth::check()) {
            return view('admin.home');
        }

        return redirect("login")->with('error', 'You are not allowed to access');
    }


    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return redirect()->route('adminlogin');
    }
}
