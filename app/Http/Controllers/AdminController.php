<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
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

public function storeprogram(Request $request)
{
    $request->validate([
        'name'        => 'required|string|max:255',
        'level'       => 'nullable|string|max:255',
        'category'    => 'required|string|max:255',
        'slogan'      => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    // Handle image upload (public/img)
    $imagePath = null;
    if ($request->hasFile('image')) {
        $filename = time() . '_' . $request->image->getClientOriginalName();
        $request->image->move(public_path('img'), $filename);
        $imagePath = 'img/' . $filename;
    }

    Program::create([
        'name'        => $request->name,
        'level'       => $request->level,
        'category'    => $request->category,
        'slug'        => Str::slug($request->name),
        'slogan'      => $request->slogan,
        'description' => $request->description,
        'image'       => $imagePath,
    ]);

    return redirect()
        ->route('adminprogram')
        ->with('success', 'Program added successfully!');
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
