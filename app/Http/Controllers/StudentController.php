<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Program;

class StudentController extends Controller
{
    public function studentdashboard()
    {
        return view('lms.dashboard');
    }


    public function studentmyprogram(Request $request)
{
    $query = Program::query();

    // 🔍 Search by name
    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    // 🏷 Filter by category
    if ($request->filled('category')) {
        $query->where('category', $request->category);
    }

    $programs = $query->latest()->get();

    // Get distinct categories for filter dropdown
    $categories = Program::select('category')->distinct()->pluck('category');

    return view('lms.myprogram', compact('programs', 'categories'));
}

        public function studentdetailprogram()
    {
        return view('lms.detail-program');
    }
    
}
