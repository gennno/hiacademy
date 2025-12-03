<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function studentdashboard()
    {
        return view('lms.dashboard');
    }

    public function studentmyprogram()
    {
        return view('lms.myprogram');
    }

        public function studentdetailprogram()
    {
        return view('lms.detail-program');
    }
    
}
