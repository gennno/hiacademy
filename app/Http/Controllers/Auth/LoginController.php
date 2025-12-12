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
            'username' => 'required|string',
            'password' => 'required'
        ]);

        // Attempt login using username instead of email
        if (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password
        ], $request->remember)) 
        {
            $request->session()->regenerate();

            // OPTIONAL: redirect based on role
            $user = Auth::user();

            switch ($user->role) {
                case 'superadmin':
                    return redirect()->route('admindashboard')->with('login_success', true);
                case 'admin':
                    return redirect()->route('admindashboard')->with('login_success', true);
                case 'teacher':
                    return redirect()->route('studentdashboard')->with('login_success', true);
                default:
                    return redirect()->route('studentdashboard')->with('login_success', true);
            }
        }

        // If login failed
        return back()->withErrors([
            'username' => 'Invalid username or password.',
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
