<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('lms.dashboard');
    }

        public function program()
    {
        return view('lms.program-detail');
    }
    
}
