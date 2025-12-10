<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Show login form
     */
    public function showLoginForm()
    {
        return view('login');
    }

    public function loginindex()
    {
        return view('login');
    }

    /**
     * Handle login process
     */
    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Attempt login
        if (Auth::attempt($request->only('email', 'password'), $request->remember)) {
            $request->session()->regenerate();

            // OPTIONAL: redirect based on role
            $user = Auth::user();

            switch ($user->role) {
                case 'superadmin':
                    return redirect()->route('admindashboard');
                case 'admin':
                    return redirect()->route('admindashboard');
                case 'teacher':
                    return redirect()->route('studentdashboard');
                default:
                    return redirect()->route('studentdashboard');
            }
        }

        // If login failed
        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ]);
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('loginindex');
    }
}
