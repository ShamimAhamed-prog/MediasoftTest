<?php

namespace App\Http\Controllers;

use App\Models\User;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminLoginController extends Controller
{
    public function Login(){
        return View('admin.login');
    }

    public function adminLogin( Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        if(Auth::guard('web')->attempt(['email'=>$request->email, 'password'=>$request->password])){
            return redirect('/AdminDashboard');
            
        }else{
            Session::flash('error-msg','Invalid email or password');
            return redirect()->back();
        }

    }

    public function RegisterForm( Request $request)
    {
        return View('admin.register');
    }

    public function register(Request $request) {
        $request->validate([
            'email' => 'required|email|unique:users',
            'name' => 'required',
            'password' => 'required',
        ]);
    
        $user = User::create([
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'password' => Hash::make($request->input('password')),
        ]);
    
        auth()->login($user);

        Session::flash('success', 'Registration successful!');
        return redirect('/login/admin');
    }
    
    public function logout(Request $request) {
        Auth::logout();
        Session::flush();
        return redirect('/login/admin');
    }
}
