<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm(){
        return view('admin.auth.login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        if(Auth::attempt($request->only('email', 'password'), $request->filled('remember_me'))) {
            if(Auth::user()->role !== 'admin') {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->back()->withInput()->withErrors(['email' => __('auth.only_admin_login')]);
            }
            return redirect()->route('admin.dashboard');
        }

         return redirect()->back()->withInput()->withErrors(['email' => __('auth.failed')]);
    }
}
