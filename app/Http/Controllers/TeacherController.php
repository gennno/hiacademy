<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function teacherdashboard()
    {
        return view('teacher.dashboard');
    }

    public function teachermyprogram()
    {
        return view('teacher.myprogram');
    }

        public function teacherdetailprogram()
    {
        return view('teacher.detail-program');
    }
    
}
