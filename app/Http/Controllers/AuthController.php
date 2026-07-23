<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    { 
        return view('auth.login');
    }

    public function login(Request $request) 
    {
        $request->validate([
            'username' => ['required', 'min:4'],
            'password' => ['required', 'min:4']
        ]);

        $credentials = [
            'name' => $request->username,
            'password' => $request->password
        ];

        if(Auth::attempt($credentials, $request->boolean('remember')))
        {
            $request->session()->regenerate();
            if(Auth::user()->role === UserRole::ADMIN) {
                return redirect()->route('dashboard.index');
            }
            return redirect()->route('products.index');
        }
        
        return back()->withErrors([
            'login' => 'Invalid credentials'
        ]);
    }
    
 
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
                'username' => ['required', 'min:4'],
                'email' => ['required', 'email'],
                'password' => ['required', 'min:4']
        ]);

        $user = User::create([
                'name' => $validated['username'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password'])
        ]);
        Auth::login($user, true);
        
        return redirect()->route('products.index');
    }

    public function logout(Request $request) 
    {
        Auth::guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}