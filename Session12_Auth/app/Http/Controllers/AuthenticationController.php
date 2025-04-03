<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    public function homePage(){
        return view('welcome');
    }

    public function getRegisterPage(){
        return view('register');
    }

    public function getLoginPage(){
        return view('login');
    }

    public function register(Request $request){
        $request->validate([
            'name'=>['required', 'min:2'],
            'email'=>['required', 'email'],
            'password'=>['required']
        ]);

        // dd($request->all());
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> Hash::make($request->password) //Bisa juga pake bycrypt
        ]);

        return redirect()->route('view.login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function login(Request $request){
        $request->validate([
            'email'=>['required', 'email'],
            'password'=>['required']
        ]);


        //Pake library untuk authentikasi
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $request->session()->regenerate();

            return redirect()->route('view.home');
        }

        return redirect('view.login')->with(['error' => 'login credential is not right']);
    }

    public function signout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('view.login');
    }
}
