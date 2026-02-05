@extends('admin.layoutadmin.layout')

@section('pagetitle', 'Invoice')

@section('content')

    <div class="bg-white rounded-xl shadow-md p-4 mb-4">
        <div class="flex flex-col md:flex-row justify-between items-center gap-6">

            <!-- LEFT: BACK BUTTON -->
            <a href="{{ route('admindashboard') }}"
                class="flex items-center gap-2 px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg transition">
                <i class="fa-solid fa-arrow-left"></i>
                <span>Back</span>
            </a>
            <div class="flex gap-3">

                <button onclick="openInvoiceModal()"
                    class="flex items-center gap-2 bg-yellow-400 px-4 py-2 rounded-lg font-semibold hover:bg-yellow-500 transition">
                    <i class="fa-solid fa-plus"></i>
                    Create Invoice
                </button>

                <button onclick="openReceiptModal()"
                    class="flex items-center gap-2 bg-yellow-400 px-4 py-2 rounded-lg font-semibold hover:bg-yellow-500 transition">
                    <i class="fa-solid fa-plus"></i>
                    Create Receipt
                </button>
            </div>
        </div>
    </div>
    <style>
        /* ---- DataTables Styling Fix ---- */
        .invoice-table-wrapper .dataTables_wrapper {
            padding-top: 10px;
        }

        /* Make top bar flex */
        .dataTables_wrapper .dataTables_length,
        .dataTables_wrapper .dataTables_filter {
            display: flex !important;
            align-items: center;
        }

        /* Force same row */
        .dataTables_wrapper .dataTables_length {
            float: left !important;
        }

        .dataTables_wrapper .dataTables_filter {
            float: right !important;
            margin-bottom: 0 !important;
        }

        /* Fix layout float clearing */
        .dataTables_wrapper::after {
            content: "";
            display: block;
            clear: both;
        }

        /* Search input styling */
        .dataTables_wrapper .dataTables_filter input {
            padding: 8px 10px;
            border-radius: 8px;
            border: 1px solid #d1d5db;
            width: 220px;
        }

        /* Dropdown styling */
        .dataTables_length select {
            padding: 8px 28px 8px 10px;
            border-radius: 8px;
            border: 1px solid #d1d5db;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' stroke='%23000' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' class='feather feather-chevron-down' viewBox='0 0 24 24'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 16px;
            appearance: none;
        }

        /* Pagination */
        .dataTables_paginate {
            margin-top: 12px;
            display: flex;
            justify-content: center;
        }

        .dataTables_paginate .paginate_button {
            padding: 6px 12px !important;
            margin: 2px;
            border-radius: 6px;
            background-color: #f3f4f6;
        }

        .dataTables_paginate .paginate_button.current {
            background-color: #facc15 !important;
            font-weight: bold;
            color: black !important;
        }

        /* Hover highlight */
        table.dataTable tbody tr:hover {
            background-color: #fffbe6;
            transition: 0.2s;
        }

        /* Action Buttons */
        .table-action-btn {
            padding: 6px 12px;
            border-radius: 8px;
            font-weight: 600;
            transition: 0.2s;
        }

        .table-action-btn.update {
            background-color: #fef9c3;
            border: 1px solid #fde047;
        }

        .table-action-btn.view {
            background-color: #bfdbfe;
            border: 1px solid #60a5fa;
        }

        .table-action-btn.delete {
            background-color: #fecaca;
            border: 1px solid #f87171;
        }

        .table-action-btn:hover {
            transform: scale(1.05);
        }
    </style>

    <!-- TABLE CARD -->
    <div class="bg-white rounded-xl shadow-md mb-4 p-6">

        <h2 class="font-semibold mb-4">Invoice List</h2>

        <div class="overflow-x-auto">
            <table id="invoiceTable" class="min-w-full border rounded-lg dataTable stripe hover">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3 text-left">Invoice #</th>
                        <th class="p-3 text-left">Customer</th>
                        <th class="p-3 text-left">Amount</th>
                        <th class="p-3 text-left">Invoice Date</th>
                        <th class="p-3 text-center">Actions</th>
                    </tr>
                </thead>


                <tbody>
                    @forelse ($invoices as $invoice)
                        <tr class="border-b">
                            <td class="p-3 font-semibold">
                                {{ $invoice->invoice_number }}
                            </td>

                            <td class="p-3">
                                <div class="font-medium">{{ $invoice->customer_name }}</div>
                                <div class="text-sm text-gray-500">{{ $invoice->customer_email }}</div>
                            </td>

                            <td class="p-3">
                                Rp {{ number_format($invoice->grand_total, 0, ',', '.') }}
                            </td>

                            <td class="p-3">
                                {{ \Carbon\Carbon::parse($invoice->invoice_date)->format('d M Y') }}
                            </td>

                            <td class="p-3 flex justify-center gap-2">
                                <!-- VIEW -->
                                <button onclick="viewInvoice({{ $invoice->id }})" class="table-action-btn view"
                                    title="View Invoice">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                <!-- EDIT -->
                                <button onclick="editInvoice({{ $invoice->id }})" class="table-action-btn update"
                                    title="Edit Invoice">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <!-- GENERATE PDF -->
                                <a href="{{ route('admininvoices.generate', $invoice->id) }}" target="_blank"
                                    class="table-action-btn bg-green-200 border border-green-400" title="Generate Invoice">
                                    <i class="fa-solid fa-download"></i>
                                </a>
                                <form action="{{ route('admininvoices.destroy', $invoice) }}" method="POST"
                                    onsubmit="return confirm('Delete this invoice?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="table-action-btn delete" title="Delete Invoice">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-6 text-center text-gray-500">
                                No invoices found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- TABLE CARD -->
    <div class="bg-white rounded-xl shadow-md p-6">

        <h2 class="font-semibold mb-4">Receipt List</h2>

        <div class="overflow-x-auto">
            <table id="receiptTable" class="min-w-full border rounded-lg dataTable stripe hover">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3 text-left">Receipt #</th>
                        <th class="p-3 text-left">Invoice #</th>
                        <th class="p-3 text-left">Customer</th>
                        <th class="p-3 text-left">Amount</th>
                        <th class="p-3 text-left">Receipt Date</th>
                        <th class="p-3 text-center">Actions</th>
                    </tr>
                </thead>


                <tbody>
                    @forelse ($receipts as $receipt)
                        <tr class="border-b">
                            <td class="p-3 font-semibold">
                                {{ $receipt->receipt_number }}
                            </td>

                            <td class="p-3 font-semibold">
                                {{ $receipt->invoice_number }}
                            </td>

                            <td class="p-3">
                                <div class="font-medium">{{ $receipt->customer_name }}</div>
                                <div class="text-sm text-gray-500">{{ $receipt->customer_email }}</div>
                            </td>

                            <td class="p-3">
                                Rp {{ number_format($receipt->total_paid, 0, ',', '.') }}
                            </td>

                            <td class="p-3">
                                {{ \Carbon\Carbon::parse($receipt->receipt_date)->format('d M Y') }}
                            </td>

                            <td class="p-3 flex justify-center gap-2">
                                <!-- VIEW -->
                                <button onclick="viewReceipt({{ $receipt->id }})" class="table-action-btn view"
                                    title="View Invoice">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                <!-- EDIT -->
                                <button onclick="editRecipt({{ $receipt->id }})" class="table-action-btn update"
                                    title="Edit Invoice">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <!-- GENERATE PDF -->
                                <a href="{{ route('adminreceipt.generate', $receipt->id) }}" target="_blank"
                                    class="table-action-btn bg-green-200 border border-green-400" title="Generate Invoice">
                                    <i class="fa-solid fa-download"></i>
                                </a>

                                <form action="{{ route('adminreceipts.destroy', $receipt) }}" method="POST"
                                    onsubmit="return confirm('Delete this invoice?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="table-action-btn delete" title="Delete Invoice">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-6 text-center text-gray-500">
                                No Receipt found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>

    <div id="viewInvoiceModal" class="fixed inset-0 bg-black/50 hidden z-50 flex items-center justify-center">
        <div class="bg-white max-w-4xl w-full rounded-xl p-6">

            <div class="flex justify-between mb-4">
                <h3 class="font-semibold text-lg">Invoice Detail</h3>
                <button onclick="closeViewModal()">✕</button>
            </div>

            <div id="viewInvoiceContent" class="space-y-4">
                <!-- Filled by JS -->
            </div>
        </div>
    </div>
    <div id="editInvoiceModal" class="fixed inset-0 bg-black/50 hidden z-50 flex items-center justify-center">
        <div class="bg-white max-w-4xl w-full rounded-xl p-6">

            <div class="flex justify-between mb-4">
                <h3 class="font-semibold text-lg">Edit Invoice</h3>
                <button onclick="closeEditModal()">✕</button>
            </div>

            <form id="editInvoiceForm" method="POST">
                @csrf
                @method('PUT')

                <div id="editInvoiceItems"></div>

                <div class="text-right mt-6">
                    <button class="bg-yellow-400 px-6 py-2 rounded-lg font-semibold">
                        Update Invoice
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div id="viewReceiptModal" class="fixed inset-0 bg-black/50 hidden z-50 flex items-center justify-center">
        <div class="bg-white max-w-4xl w-full rounded-xl p-6">

            <div class="flex justify-between mb-4">
                <h3 class="font-semibold text-lg">Invoice Detail</h3>
                <button onclick="closeViewReceiptModal()">✕</button>
            </div>

            <div id="viewReceiptContent" class="space-y-4">
                <!-- Filled by JS -->
            </div>
        </div>
    </div>
    <div id="editReceiptModal" class="fixed inset-0 bg-black/50 hidden z-50 flex items-center justify-center">
        <div class="bg-white max-w-4xl w-full rounded-xl p-6">

            <div class="flex justify-between mb-4">
                <h3 class="font-semibold text-lg">Edit Invoice</h3>
                <button onclick="closeEditReceiptModal()">✕</button>
            </div>

            <form id="editReceiptForm" method="POST">
                @csrf
                @method('PUT')

                <div id="editReceiptItems"></div>

                <div class="text-right mt-6">
                    <button class="bg-yellow-400 px-6 py-2 rounded-lg font-semibold">
                        Update Receipt
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- Add Invoice -->
    <div id="invoiceModal" class="fixed inset-0 z-[9991] hidden bg-black/50 flex items-center justify-center px-4">

        <div class="bg-white w-full max-w-5xl rounded-2xl shadow-xl flex flex-col max-h-[90vh]">

            <!-- HEADER -->
            <div class="flex justify-between items-center px-6 py-4 border-b">
                <h3 class="text-xl font-semibold">Create Invoice</h3>
                <button onclick="closeInvoiceModal()" class="text-gray-500 hover:text-gray-700">
                    <i class="fa-solid fa-xmark text-xl"></i>
                </button>
            </div>

            <!-- BODY -->
            <form action="{{ route('admininvoices.store') }}" method="POST" class="flex-1 overflow-y-auto px-6 py-5 space-y-6">
                @csrf

                <!-- CUSTOMER INFO -->
                <div>
                    <h4 class="font-semibold mb-3">Customer Information</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <input name="customer_name" required class="border rounded-lg px-4 py-3"
                            placeholder="Customer Name">

                        <input name="customer_email" required class="border rounded-lg px-4 py-3"
                            placeholder="Customer Email">

                        <input name="customer_phone" class="border rounded-lg px-4 py-3" placeholder="Phone" required>

                        <input name="customer_address" class="border rounded-lg px-4 py-3" placeholder="Address" required>
                    </div>
                </div>

                <!-- ITEMS -->
                <div>
                    <div class="flex justify-between items-center mb-3">
                        <h4 class="font-semibold">Invoice Items</h4>
                        <button type="button" onclick="addItem()"
                            class="px-4 py-2 text-sm bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            + Add Item
                        </button>
                    </div>

                    <!-- TABLE HEADER (Desktop Only) -->
                    <div class="hidden md:grid grid-cols-12 gap-2 text-sm font-medium text-gray-600 mb-2">
                        <div class="col-span-2">Program</div>
                        <div class="col-span-2">Level</div>
                        <div class="col-span-2">Category</div>
                        <div class="col-span-2">Description</div>
                        <div class="col-span-1">Discount</div>
                        <div class="col-span-2 text-left">Amount</div>
                        <div class="col-span-1"></div>
                    </div>

                    <!-- ITEMS WRAPPER -->
                    <div id="itemsWrapper" class="space-y-4">
                        <div class="item-row grid grid-cols-1 md:grid-cols-12 gap-3 border rounded-xl p-4">

                            <input name="items[0][Program]" class="md:col-span-2 border rounded-lg px-3 py-2"
                                placeholder="Program" required>

                            <select name="items[0][level]" class="md:col-span-2 border rounded-lg px-3 py-2">
                                <option value="">Level</option>
                                <option value="Pre-Nursery">Pre-Nursery</option>
                                <option value="Nursery">Nursery</option>
                                <option value="Kindergarten 1">Kindergarten 1</option>
                                <option value="Kindergarten 2">Kindergarten 2</option>
                                <option value="Kindergarten 3">Kindergarten 3</option>
                            </select>

                            <select name="items[0][category]" class="md:col-span-2 border rounded-lg px-3 py-2">
                                <option value="">Category</option>
                                <option value="Preschool">Preschool</option>
                                <option value="English">English</option>
                                <option value="Math">Math</option>
                            </select>

                            <input name="items[0][description]" class="md:col-span-2 border rounded-lg px-3 py-2"
                                placeholder="Description" required>

                            <input name="items[0][discount]" type="number"
                                class="md:col-span-1 border rounded-lg px-3 py-2 text-right" placeholder="0">

                            <input name="items[0][amount]" type="number"
                                class="md:col-span-2 border rounded-lg px-3 py-2 text-right" placeholder="0" required>

                            <button type="button" onclick="removeItem(this)"
                                class="md:col-span-1 flex items-center justify-center text-red-600 hover:bg-red-50 rounded-lg">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </div>

                </div>

                <!-- FOOTER -->
                <div class="sticky bottom-0 bg-white pt-4 border-t flex justify-end">
                    <button class="bg-yellow-400 hover:bg-yellow-500 px-8 py-3 rounded-xl font-semibold">
                        Save Invoice
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- Add Receipt -->
    <div id="receiptModal" class="fixed inset-0 z-[9991] hidden bg-black/50 flex items-center justify-center px-4">

        <div class="bg-white w-full max-w-5xl rounded-2xl shadow-xl flex flex-col max-h-[90vh]">

            <!-- HEADER -->
            <div class="flex justify-between items-center px-6 py-4 border-b">
                <h3 class="text-xl font-semibold">Create Receipt</h3>
                <button onclick="closeReceiptModal()" class="text-gray-500 hover:text-gray-700">
                    <i class="fa-solid fa-xmark text-xl"></i>
                </button>
            </div>

            <!-- BODY -->
            <form action="{{ route('adminreceipts.store') }}" method="POST" class="flex-1 overflow-y-auto px-6 py-5 space-y-6">
                @csrf

                <!-- RECEIPT INFO -->
                <div>
                    <h4 class="font-semibold mb-3">Receipt Information</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <input type="date" name="receipt_date" class="border rounded-lg px-4 py-3" required>

                        <input name="invoice_number" class="border rounded-lg px-4 py-3"
                            placeholder="Invoice Number (INV2026001)" required>
                    </div>
                </div>

                <!-- CUSTOMER INFO -->
                <div>
                    <h4 class="font-semibold mb-3">Customer Information</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <input name="customer_name" required class="border rounded-lg px-4 py-3"
                            placeholder="Customer Name">

                        <input name="customer_email" required class="border rounded-lg px-4 py-3"
                            placeholder="Customer Email">

                        <input name="customer_phone" required class="border rounded-lg px-4 py-3" placeholder="Phone">

                        <input name="customer_address" required class="border rounded-lg px-4 py-3" placeholder="Address">
                    </div>
                </div>

                <!-- ITEMS -->
                <div>
                    <div class="flex justify-between items-center mb-3">
                        <h4 class="font-semibold">Receipt Items</h4>
                        <button type="button" onclick="addReceiptItem()"
                            class="px-4 py-2 text-sm bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            + Add Item
                        </button>
                    </div>

                    <!-- TABLE HEADER (Desktop Only) -->
                    <div class="hidden md:grid grid-cols-12 gap-2 text-sm font-medium text-gray-600 mb-2">
                        <div class="col-span-2">Program</div>
                        <div class="col-span-2">Level</div>
                        <div class="col-span-2">Category</div>
                        <div class="col-span-3">Description</div>
                        <div class="col-span-2 text-left">Paid Amount</div>
                        <div class="col-span-1"></div>
                    </div>


                    <!-- ITEMS WRAPPER -->
                    <div id="receiptitemsWrapper" class="space-y-4">
                        <div class="item-row grid grid-cols-1 md:grid-cols-12 gap-3 border rounded-xl p-4">

                            <input name="items[0][program_name]" class="md:col-span-2 border rounded-lg px-3 py-2"
                                placeholder="Program" required>

                            <select name="items[0][level]" class="md:col-span-2 border rounded-lg px-3 py-2">
                                <option value="">Level</option>
                                <option value="Pre-Nursery">Pre-Nursery</option>
                                <option value="Nursery">Nursery</option>
                                <option value="Kindergarten 1">Kindergarten 1</option>
                                <option value="Kindergarten 2">Kindergarten 2</option>
                                <option value="Kindergarten 3">Kindergarten 3</option>
                            </select>

                            <select name="items[0][category]" class="md:col-span-2 border rounded-lg px-3 py-2">
                                <option value="">Category</option>
                                <option value="Preschool">Preschool</option>
                                <option value="English">English</option>
                                <option value="Math">Math</option>
                            </select>

                            <input name="items[0][description]" class="md:col-span-3 border rounded-lg px-3 py-2"
                                placeholder="Description" required>

                            <input name="items[0][paid_amount]" type="number" step="0.01"
                                class="md:col-span-2 border rounded-lg px-3 py-2 text-right" placeholder="0" required>

                            <button type="button" onclick="removeReceiptItem(this)"
                                class="md:col-span-1 flex items-center justify-center text-red-600 hover:bg-red-50 rounded-lg">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </div>

                </div>

                <!-- FOOTER -->
                <div class="sticky bottom-0 bg-white pt-4 border-t flex justify-end">
                    <button class="bg-yellow-400 hover:bg-yellow-500 px-8 py-3 rounded-xl font-semibold">
                        Save Receipt
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- Add Item Invoice -->
    <script>
        let invoiceItemIndex = 1;

        function addItem() {
            const wrapper = document.getElementById('itemsWrapper');

            wrapper.insertAdjacentHTML('beforeend', `
            <div class="item-row grid grid-cols-1 md:grid-cols-12 gap-3 border rounded-xl p-4">

                <input name="items[${invoiceItemIndex}][Program]"
                    class="md:col-span-2 border rounded-lg px-3 py-2"
                    placeholder="Program" required>

                <select name="items[${invoiceItemIndex}][level]"
                    class="md:col-span-2 border rounded-lg px-3 py-2">
                    <option value="">Level</option>
                    <option value="Pre-Nursery">Pre-Nursery</option>
                    <option value="Nursery">Nursery</option>
                    <option value="Kindergarten 1">Kindergarten 1</option>
                    <option value="Kindergarten 2">Kindergarten 2</option>
                    <option value="Kindergarten 3">Kindergarten 3</option>
                </select>

                <select name="items[${invoiceItemIndex}][category]"
                    class="md:col-span-2 border rounded-lg px-3 py-2">
                    <option value="">Category</option>
                    <option value="Preschool">Preschool</option>
                    <option value="English">English</option>
                    <option value="Math">Math</option>
                </select>

                <input name="items[${invoiceItemIndex}][description]"
                    class="md:col-span-2 border rounded-lg px-3 py-2"
                    placeholder="Description" required>

                <input name="items[${invoiceItemIndex}][discount]" type="number"
                    class="md:col-span-1 border rounded-lg px-3 py-2 text-right"
                    placeholder="0">

                <input name="items[${invoiceItemIndex}][amount]" type="number"
                    class="md:col-span-2 border rounded-lg px-3 py-2 text-right"
                    placeholder="0" required>

                <button type="button" onclick="removeItem(this)"
                    class="md:col-span-1 flex items-center justify-center text-red-600 hover:bg-red-50 rounded-lg">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </div>
        `);

            invoiceItemIndex++;
        }

        function removeItem(btn) {
            btn.closest('.item-row').remove();
        }
    </script>
    <!-- Add Item Receipt -->
    <script>
        let receiptItemIndex = 1;

        function addReceiptItem() {
            const wrapper = document.getElementById('receiptitemsWrapper');

            wrapper.insertAdjacentHTML('beforeend', `
            <div class="item-row grid grid-cols-1 md:grid-cols-12 gap-3 border rounded-xl p-4">

                <input name="items[${receiptItemIndex}][program_name]"
                    class="md:col-span-2 border rounded-lg px-3 py-2"
                    placeholder="Program" required>

                <select name="items[${receiptItemIndex}][level]"
                    class="md:col-span-2 border rounded-lg px-3 py-2">
                    <option value="">Level</option>
                    <option value="Pre-Nursery">Pre-Nursery</option>
                    <option value="Nursery">Nursery</option>
                    <option value="Kindergarten 1">Kindergarten 1</option>
                    <option value="Kindergarten 2">Kindergarten 2</option>
                    <option value="Kindergarten 3">Kindergarten 3</option>
                </select>

                <select name="items[${receiptItemIndex}][category]"
                    class="md:col-span-2 border rounded-lg px-3 py-2">
                    <option value="">Category</option>
                    <option value="Preschool">Preschool</option>
                    <option value="English">English</option>
                    <option value="Math">Math</option>
                </select>

                <input name="items[${receiptItemIndex}][description]"
                    class="md:col-span-3 border rounded-lg px-3 py-2"
                    placeholder="Description" required>

                <input name="items[${receiptItemIndex}][paid_amount]" type="number" step="0.01"
                    class="md:col-span-2 border rounded-lg px-3 py-2 text-right"
                    placeholder="0" required>

                <button type="button" onclick="removeReceiptItem(this)"
                    class="md:col-span-1 flex items-center justify-center text-red-600 hover:bg-red-50 rounded-lg">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </div>
        `);

            receiptItemIndex++;
        }

        function removeReceiptItem(btn) {
            btn.closest('.item-row').remove();
        }
    </script>

    <!-- Trigger Invoice Modal -->
    <script>
        function openInvoiceModal() {
            document.getElementById('invoiceModal').classList.remove('hidden');
        }

        function closeInvoiceModal() {
            document.getElementById('invoiceModal').classList.add('hidden');
        }
    </script>
    <!-- Trigger Receipt Modal -->
    <script>
        function openReceiptModal() {
            document.getElementById('receiptModal').classList.remove('hidden');
        }

        function closeReceiptModal() {
            document.getElementById('receiptModal').classList.add('hidden');
        }
    </script>
    <!-- Action Invoice Modal -->
    <script>
        function viewInvoice(id) {
            fetch(`/admin/invoices/${id}`)
                .then(res => res.json())
                .then(data => {
                    let html = `
                                                    <div><strong>${data.invoice_number}</strong></div>
                                                    <div>${data.customer_name}</div>
                                                    <div>${data.customer_email}</div>
                                                    <hr>
                                                `;

                    data.items.forEach(item => {
                        html += `<div>${item.program_name} - Rp ${item.amount}</div>`;
                    });

                    document.getElementById('viewInvoiceContent').innerHTML = html;
                    document.getElementById('viewInvoiceModal').classList.remove('hidden');
                });
        }

        function editInvoice(id) {
            fetch(`/admin/invoices/${id}/edit`)
                .then(res => res.json())
                .then(data => {

                    document.getElementById('editInvoiceForm')
                        .setAttribute('action', `/admin/invoices/${id}`);

                    let html = '';

                    data.items.forEach((item, index) => {
                        html += `
                                                        <div class="grid grid-cols-5 gap-2 mb-2">
                                                            <input name="items[${index}][program_name]" value="${item.program_name}" class="border p-2 rounded">
                                                            <input name="items[${index}][level]" value="${item.level}" class="border p-2 rounded">
                                                            <input name="items[${index}][category]" value="${item.category}" class="border p-2 rounded">
                                                            <input name="items[${index}][description]" value="${item.description}" class="border p-2 rounded">
                                                            <input name="items[${index}][amount]" value="${item.amount}" type="number" class="border p-2 rounded">
                                                        </div>
                                                    `;
                    });

                    document.getElementById('editInvoiceItems').innerHTML = html;
                    document.getElementById('editInvoiceModal').classList.remove('hidden');
                });
        }

        function closeViewModal() {
            document.getElementById('viewInvoiceModal').classList.add('hidden');
        }

        function closeEditModal() {
            document.getElementById('editInvoiceModal').classList.add('hidden');
        }
    </script>
    <!-- Action Receipt Modal -->
    <script>
        function viewReceipt(id) {
            fetch(`/admin/receipts/${id}`)
                .then(res => res.json())
                .then(data => {
                    let html = `
                                                    <div><strong>${data.invoice_number}</strong></div>
                                                    <div>${data.customer_name}</div>
                                                    <div>${data.customer_email}</div>
                                                    <hr>
                                                `;

                    data.items.forEach(item => {
                        html += `<div>${item.program_name} - Rp ${item.amount}</div>`;
                    });

                    document.getElementById('viewReceiptContent').innerHTML = html;
                    document.getElementById('viewReceiptModal').classList.remove('hidden');
                });
        }

        function editReceipt(id) {
            fetch(`/admin/receipts/${id}/edit`)
                .then(res => res.json())
                .then(data => {

                    document.getElementById('editReceiptForm')
                        .setAttribute('action', `/admin/receipts/${id}`);

                    let html = '';

                    data.items.forEach((item, index) => {
                        html += `
                                                        <div class="grid grid-cols-5 gap-2 mb-2">
                                                            <input name="items[${index}][program_name]" value="${item.program_name}" class="border p-2 rounded">
                                                            <input name="items[${index}][level]" value="${item.level}" class="border p-2 rounded">
                                                            <input name="items[${index}][category]" value="${item.category}" class="border p-2 rounded">
                                                            <input name="items[${index}][description]" value="${item.description}" class="border p-2 rounded">
                                                            <input name="items[${index}][amount]" value="${item.amount}" type="number" class="border p-2 rounded">
                                                        </div>
                                                    `;
                    });

                    document.getElementById('editReceiptItems').innerHTML = html;
                    document.getElementById('editReceiptModal').classList.remove('hidden');
                });
        }

        function closeViewReceiptModal() {
            document.getElementById('viewReceiptModal').classList.add('hidden');
        }

        function closeEditReceiptModal() {
            document.getElementById('editReceiptModal').classList.add('hidden');
        }
    </script>

@endsection


@section('scripts')
    <script>

        $.fn.dataTable.ext.errMode = 'none';
        $(document).ready(function () {
            $('#invoiceTable').DataTable({
                pageLength: 5,
                paging: true,
                searching: true,
                ordering: true,
                responsive: true
            });
        });
    </script>
    <script>

        $.fn.dataTable.ext.errMode = 'none';
        $(document).ready(function () {
            $('#receiptTable').DataTable({
                pageLength: 5,
                paging: true,
                searching: true,
                ordering: true,
                responsive: true
            });
        });
    </script>
@endsection