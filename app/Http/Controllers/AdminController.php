<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Program;
use App\Models\Registration;
use App\Models\Enrollment;
use App\Models\Invoice;
use App\Models\Report;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Models\InvoiceItem;
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

public function programdestroy(Program $program)
{

    $program->delete();

    return redirect()
        ->route('adminprogram')
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
        ->route('adminprogram')
        ->with('success', 'Program updated successfully!');
}

        public function admindetailprogram()
    {
        return view('admin.detail-program');
    }

        public function admininvoice()
    {
        $invoices = Invoice::latest()->get();
        return view('admin.invoice', compact('invoices'));
    }
    

    public function adminregistration()
    {
        $registrations = Registration::latest()->get();

        return view('admin.registration', compact('registrations'));
    }

    public function adminreport()
    {
        $reports = Report::latest()->get();
        $certificates = Certificate::latest()->get();


        return view('admin.report', compact('reports', 'certificates'));
    }

        public function adminenrollment()
    {
        $enrollments = Enrollment::latest()->get();

        return view('admin.enrollment', compact('enrollments'));
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

        return redirect()->route('admininvoice');
    }

    public function destroyinvoice(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->back()->with('success', 'Invoice deleted');
    }
    
    public function generateinvoice(Invoice $invoice)
{
    $invoice->load('items');

    $pdf = Pdf::loadView('admin.invoicepdf', [
        'invoice' => $invoice
    ])->setPaper('A4');

    return $pdf->stream($invoice->invoice_number . '.pdf');
    // or ->download()
}


    
}
