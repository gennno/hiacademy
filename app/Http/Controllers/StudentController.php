<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Program;
use App\Models\Enrollment;
use App\Models\Lesson;
use App\Models\Report;

class StudentController extends Controller
{
    public function studentdashboard(Request $request)
    {
    $user = auth()->user();

    $query = Program::query()

        // 🔒 HANYA program yang user enroll
        ->whereHas('enrollments', function ($q) use ($user) {
            $q->where('user_id', $user->id);
        });

    // 🔍 Search by program name
    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    // 🏷 Filter by category
    if ($request->filled('category')) {
        $query->where('category', $request->category);
    }

    $programs = $query->latest()->get();

    // 🔽 Category filter hanya dari program yang dimiliki user
    $categories = Program::whereHas('enrollments', function ($q) use ($user) {
            $q->where('user_id', $user->id);
        })
        ->select('category')
        ->distinct()
        ->pluck('category');
        return view('lms.dashboard', compact('programs', 'categories'));
    }


public function studentmyprogram(Request $request)
{
    $user = auth()->user();

    $query = Program::query()

        // 🔒 HANYA program yang user enroll
        ->whereHas('enrollments', function ($q) use ($user) {
            $q->where('user_id', $user->id);
        });

    // 🔍 Search by program name
    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    // 🏷 Filter by category
    if ($request->filled('category')) {
        $query->where('category', $request->category);
    }

    $programs = $query->latest()->get();

    // 🔽 Category filter hanya dari program yang dimiliki user
    $categories = Program::whereHas('enrollments', function ($q) use ($user) {
            $q->where('user_id', $user->id);
        })
        ->select('category')
        ->distinct()
        ->pluck('category');

    return view('lms.myprogram', compact('programs', 'categories'));
}

public function studentDetailProgram(Program $program)
{
    $user = auth()->user();

    // 🔐 Security: hanya program yang user enroll
    if (! $program->enrollments()
        ->where('user_id', $user->id)
        ->exists()) {
        abort(403);
    }

    // Ambil lesson milik program ini
    $lessons = $program->lessons;

    // Dummy progress (nanti bisa dari lesson_progress table)
    $progressPercent = 65;

    return view('lms.detail-program', compact(
        'program',
        'lessons',
        'progressPercent'
    ));
}

public function studentlessondetail(Program $program, Lesson $lesson)
    {
            $user = auth()->user();

            if (! $program->enrollments()
                ->where('user_id', $user->id)
                ->exists()) {
                abort(403);
            }

            if ($lesson->program_id !== $program->id) {
                abort(404);
            }

            $lesson->load(['materials', 'tasks']);

            return view('lms.detail-lesson', compact(
                'program',
                'lesson'
            ));
    }

        public function studentreport()
    {
        $user = auth()->user();
        $reports = Report::with(['program', 'lesson'])
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        return view('lms.report', compact('reports'));
    }
    
}
