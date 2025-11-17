<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }
        public function preschoolindex()
    {
        return view('preschool.home');
    }
        public function englishindex()
    {
        return view('english.home');
    }
        public function mathindex()
    {
        return view('math.home');
    }
        public function preschoolabout()
    {
        return view('preschool.about');
    }
        public function preschooladmission()
    {
        return view('preschool.admission');
    }
        public function ipc()
    {
        return view('preschool.ipc');
    }
        public function loginindex()
    {
        return view('login');
    }
        public function loginpreschool()
    {
        return view('preschool.login');
    }
        public function booktrial()
    {
        return view('booktrial');
    }

        public function register()
    {
        return view('register');
    }
}
