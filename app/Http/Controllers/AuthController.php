<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class AuthController extends Controller
{
    //
    public function register(Request $request) {


        $fields = $request->validate([
            'name'  => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'unique:users', 'email'], 
            'password' => ['required', 'min:8', 'confirmed']
        ]);


        $user = User::create($fields);
        
        Auth::login($user);
        event(new Registered($user));
        return redirect()->route('dashboard');
        
    }


    public function login(Request $request) {


        $fields = $request->validate([
            'email' => ['required', 'max:255'],
            'password' => ['required', 'min:8']
        ]);

        if (Auth::attempt($fields, $request->remember)) {
            $request->session()->regenerate();
 
            return redirect()->intended('write/dashboard');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');


    }


    public function logout(Request $request) {

        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect()->route('home');
        
    }
}
