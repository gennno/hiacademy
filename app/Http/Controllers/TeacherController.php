<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Program;
use App\Models\Enrollment;
use App\Models\Lesson;
use App\Models\Report;
use App\Models\Certificate;


class TeacherController extends Controller
{

    public function teacherdashboard(Request $request)
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
        return view('teacher.dashboard', compact('programs', 'categories'));
    }
    public function teachermyprogram(Request $request)
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

        return view('teacher.myprogram', compact('programs', 'categories'));
    }

    public function teacherdetailprogram(Program $program)
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

        return view('teacher.detail-program', compact(
            'program',
            'lessons',
            'progressPercent'
        ));
    }

    public function teacherlessondetail(Program $program, Lesson $lesson)
    {
            $user = auth()->user();

            if (! $program->enrollments()
                ->where('user_id', $user->id)
                ->exists()) {
                abort(403);
            }

            // if ($lesson->program_id !== $program->id) {
            //     abort(404);
            // }

            $lesson->load(['materials', 'tasks']);

            return view('teacher.detail-lesson', compact(
                'program',
                'lesson'
            ));
    }

    public function teacherreport()
    {
        $reports = Report::latest()->get();
        $certificates = Certificate::latest()->get();


        return view('teacher.report', compact('reports', 'certificates'));
    }
    
    
    public function teacherreportshow(Report $report)
    {


        return view('teacher.report-detail', compact('report'));
    }

        public function teachercertificatestore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'program_name' => 'required|string|max:255',
            'academic_year' => 'required|string|max:20',
            'completion_date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        $validated['user_id'] = auth()->id();

        Certificate::create($validated);

        return back()->with('success', 'Certificate created successfully!');
    }

}
