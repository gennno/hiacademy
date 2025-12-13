<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function staffdashboard()
    {
        return view('staff.dashboard');
    }

    public function staffprogram()
    {
        return view('staff.program');
    }

        public function staffdetailprogram()
    {
        return view('staff.detail-program');
    }

        public function staffinvoice()
    {
        return view('staff.invoice');
    }
    
}
