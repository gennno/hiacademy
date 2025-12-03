<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admindashboard()
    {
        return view('admin.dashboard');
    }

    public function adminprogram()
    {
        return view('admin.program');
    }

        public function admindetailprogram()
    {
        return view('admin.detail-program');
    }

        public function admininvoice()
    {
        return view('admin.invoice');
    }
    
}
