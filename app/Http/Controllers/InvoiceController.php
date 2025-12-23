<?php
namespace App\Http\Controllers;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{

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

        return redirect()->route('invoices.index');
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->back()->with('success', 'Invoice deleted');
    }
}
