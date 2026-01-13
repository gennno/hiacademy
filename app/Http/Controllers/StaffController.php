<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Program;
use App\Models\Lesson;
use App\Models\Registration;
use App\Models\Material;
use App\Models\Task;
use App\Models\Enrollment;
use App\Models\Invoice;
use App\Models\User;
use App\Models\Report;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Models\InvoiceItem;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function staffdashboard()
    {
        return view('staff.dashboard');
    }

public function staffprogram(Request $request)
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

    return view('staff.program', compact('programs', 'categories'));
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
        ->route('staffprogram')
        ->with('success', 'Program added successfully!');
}

public function programdestroy(Program $program)
{

    $program->delete();

    return redirect()
        ->route('staffprogram')
        ->with('success', 'Program deleted successfully!');
}


public function programupdate(Request $request, Program $program)
{
    $request->validate([
        'name'        => 'required|string|max:255',
        'level'       => 'nullable|string|max:255',
        'category'    => 'required|string|max:255',
        'slogan'      => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    // Handle image replace
    if ($request->hasFile('image')) {

        $filename = time() . '_' . $request->image->getClientOriginalName();
        $request->image->move(public_path('img'), $filename);
        $program->image = 'img/' . $filename;
    }

    // Update fields
    $program->update([
        'name'        => $request->name,
        'level'       => $request->level,
        'category'    => $request->category,
        'slogan'      => $request->slogan,
        'description' => $request->description,
    ]);

    return redirect()
        ->route('staffprogram')
        ->with('success', 'Program updated successfully!');
}

    public function staffDetailProgram(Program $program)
    {

        // Ambil lesson milik program ini
        $lessons = $program->lessons;

        // Dummy progress (nanti bisa dari lesson_progress table)
        $progressPercent = 65;

        return view('staff.detail-program', compact(
            'program',
            'lessons',
            'progressPercent'
        ));
    }
        public function staffinvoice()
    {
        $invoices = Invoice::latest()->get();
        return view('staff.invoice', compact('invoices'));
    }
        public function stafflessondetail(Program $program, Lesson $lesson)
    {

            // if ($lesson->program_id !== $program->id) {
            //     abort(404);
            // }

            $lesson->load(['materials', 'tasks']);

            return view('staff.detail-lesson', compact(
                'program',
                'lesson'
            ));
    }
    

    public function staffregistration()
    {
        $registrations = Registration::latest()->get();

        return view('staff.registration', compact('registrations'));
    }

    public function staffreport()
    {
        $reports = Report::latest()->get();
        $certificates = Certificate::latest()->get();


        return view('staff.report', compact('reports', 'certificates'));
    }

        public function staffenrollment()
    {
        $enrollments = Enrollment::latest()->get();

        return view('staff.enrollment', compact('enrollments'));
    }

        public function storeinvoice(Request $request)
    {
        DB::transaction(function () use ($request) {

            $subtotal = collect($request->items)->sum('amount');

            $invoice = Invoice::create([
                'invoice_number' => 'INV' . date('Y') . rand(1000, 9999),
                'invoice_date' => now(),

                'customer_name' => $request->customer_name,
                'customer_email' => $request->customer_email,
                'customer_phone' => $request->customer_phone,
                'customer_address' => $request->customer_address,

                'subtotal' => $subtotal,
                'discount' => 0,
                'grand_total' => $subtotal,
            ]);

            foreach ($request->items as $item) {
                $invoice->items()->create($item);
            }
        });

        return redirect()->back()->with('success', 'Invoice created');
    }

    public function showinvoice(Invoice $invoice)
    {
        $invoice->load('items');
        return response()->json($invoice);
    }

    public function editinvoice(Invoice $invoice)
    {
        $invoice->load('items');
        return response()->json($invoice);
    }


    public function updateinvoice(Request $request, Invoice $invoice)
    {
        DB::transaction(function () use ($request, $invoice) {

            $subtotal = collect($request->items)->sum('amount');

            $invoice->update([
                'customer_name' => $request->customer_name,
                'customer_email' => $request->customer_email,
                'customer_phone' => $request->customer_phone,
                'customer_address' => $request->customer_address,
                'subtotal' => $subtotal,
                'grand_total' => $subtotal,
            ]);

            $invoice->items()->delete();

            foreach ($request->items as $item) {
                $invoice->items()->create($item);
            }
        });

        return redirect()->route('staffinvoice');
    }

    public function destroyinvoice(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->back()->with('success', 'Invoice deleted');
    }
    
    public function generateinvoice(Invoice $invoice)
{
    $invoice->load('items');

    $pdf = Pdf::loadView('staff.invoicepdf', [
        'invoice' => $invoice
    ])->setPaper('A4');

    return $pdf->stream($invoice->invoice_number . '.pdf');
    // or ->download()
}

public function stafflessonstore(Request $request)
{
    $request->validate([
        'program_id' => 'required|exists:programs,id',
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'order' => 'nullable|integer',
    ]);

    Lesson::create([
        'program_id' => $request->program_id,
        'title' => $request->title,
        'description' => $request->description,
        'order' => $request->order ?? 0,
    ]);

    return redirect()->back()->with('success', 'Lesson added successfully.');
}
    
public function stafflessonupdate(Request $request, Lesson $lesson)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'order' => 'nullable|integer',
    ]);

    $lesson->update($request->only('title', 'description', 'order'));

    return back()->with('success', 'Lesson updated.');
}

public function stafflessondestroy(Lesson $lesson)
{
    $lesson->delete();
    return back()->with('success', 'Lesson deleted.');
}
public function staffmaterialstore(Request $request)
{
    $request->validate([
        'lesson_id' => 'required|exists:lessons,id',
        'type' => 'required|in:text,image,link,pdf',
        'order' => 'nullable|integer',
    ]);

    $content = null;

    if ($request->type === 'text') {
        $content = $request->content_text;
    }

    if ($request->type === 'link') {
        $content = $request->content_link;
    }

    if (in_array($request->type, ['image', 'pdf'])) {
        $content = $request->file('content_file')
            ->store('materials', 'public');
    }

    Material::create([
        'lesson_id' => $request->lesson_id,
        'type' => $request->type,
        'content' => $content,
        'order' => $request->order ?? 0,
    ]);

    return back()->with('success', 'Material added.');
}


public function staffmaterialupdate(Request $request, Material $material)
{
    $request->validate([
        'type' => 'required|in:text,image,link,pdf',
        'content' => 'required',
        'order' => 'nullable|integer',
    ]);

    $material->update($request->only('type', 'content', 'order'));

    return back()->with('success', 'Material updated.');
}

public function staffmaterialdestroy(Material $material)
{
    $material->delete();
    return back()->with('success', 'Material deleted.');
}
    
}
