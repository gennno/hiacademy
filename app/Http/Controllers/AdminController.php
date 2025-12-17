<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;

class AdminController extends Controller
{
    public function admindashboard()
    {
        return view('admin.dashboard');
    }

public function adminprogram(Request $request)
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

    return view('admin.program', compact('programs', 'categories'));
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
