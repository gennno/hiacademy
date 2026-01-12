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

        <!-- RIGHT: CREATE NEW -->
        <button class="flex items-center gap-2 bg-yellow-400 px-4 py-2 rounded-lg font-semibold hover:bg-yellow-500 transition">
            <i class="fa-solid fa-plus"></i>
            Add User
        </button>
    </div>
</div>
<style>
  /* ---- DataTables Styling Fix ---- */
.dataTables_wrapper {
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
<div class="bg-white rounded-xl shadow-md p-6">

    {{-- <h2 class="font-semibold mb-4">Invoice List</h2>

    <div class="overflow-x-auto">
        <table id="invoiceTable" class="min-w-full border rounded-lg dataTable stripe hover">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left">#ID</th>
                    <th class="p-3 text-left">Customer</th>
                    <th class="p-3 text-left">Amount</th>
                    <th class="p-3 text-left">Status</th>
                    <th class="p-3 text-left">Date</th>
                    <th class="p-3 text-center">Actions</th>
                </tr>
            </thead>

            <tbody>
                <tr class="border-b">
                    <td class="p-3">INV001</td>
                    <td class="p-3">John Doe</td>
                    <td class="p-3">$120.00</td>
                    <td class="p-3"><span class="px-3 py-1 text-sm bg-green-200 text-green-700 rounded-full">Paid</span></td>
                    <td class="p-3">03 Dec 2025</td>
                    <td class="p-3 flex justify-center gap-2">
                        <button class="p-2 text-blue-600 hover:text-blue-800 table-action-btn view"><i class="fa-solid fa-eye"></i></button>
                        <button class="p-2 text-yellow-500 hover:text-yellow-600 table-action-btn update"><i class="fa-solid fa-pen"></i></button>
                        <button class="p-2 text-red-600 hover:text-red-800 table-action-btn delete"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>

                <tr class="border-b">
                    <td class="p-3">INV002</td>
                    <td class="p-3">Sarah Smith</td>
                    <td class="p-3">$89.00</td>
                    <td class="p-3"><span class="px-3 py-1 text-sm bg-red-200 text-red-700 rounded-full">Unpaid</span></td>
                    <td class="p-3">28 Nov 2025</td>
                    <td class="p-3 flex justify-center gap-2">
                        <button class="p-2 text-blue-600 hover:text-blue-800 table-action-btn view"><i class="fa-solid fa-eye"></i></button>
                        <button class="p-2 text-yellow-500 hover:text-yellow-600 table-action-btn update"><i class="fa-solid fa-pen"></i></button>
                        <button class="p-2 text-red-600 hover:text-red-800 table-action-btn delete"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>

                <tr class="border-b">
                    <td class="p-3">INV003</td>
                    <td class="p-3">Michael Brown</td>
                    <td class="p-3">$250.00</td>
                    <td class="p-3"><span class="px-3 py-1 text-sm bg-green-200 text-green-700 rounded-full">Paid</span></td>
                    <td class="p-3">20 Nov 2025</td>
                    <td class="p-3 flex justify-center gap-2">
                        <button class="p-2 text-blue-600 hover:text-blue-800 table-action-btn view"><i class="fa-solid fa-eye"></i></button>
                        <button class="p-2 text-yellow-500 hover:text-yellow-600 table-action-btn update"><i class="fa-solid fa-pen"></i></button>
                        <button class="p-2 text-red-600 hover:text-red-800 table-action-btn delete"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
            </tbody>

        </table>
    </div> --}}
</div>

@endsection


@section('scripts')
<script>
$(document).ready(function() {
    $('#invoiceTable').DataTable({
        pageLength: 5,
        paging: true,
        searching: true,
        ordering: true,
        responsive: true
    });
});
</script>
@endsection