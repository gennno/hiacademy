@extends('admin.layoutadmin.layout')

@section('pagetitle', 'Invoice')

@section('content')
    @php
        $finalReports = $reports->where('type', 'final');
        $otherReports = $reports->where('type', '!=', 'final');
    @endphp
<div class="bg-white rounded-xl shadow-md p-4 mb-4">
    <div class="flex justify-between items-center">

        <!-- LEFT: BACK BUTTON -->
        <a href="{{ route('admindashboard') }}"
           class="flex items-center gap-2 px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg transition">
            <i class="fa-solid fa-arrow-left"></i>
            <span>Back</span>
        </a>

        <!-- RIGHT: ACTION BUTTONS -->
        <div class="flex gap-3">
            <a href=""
               class="flex items-center gap-2 bg-yellow-400 px-4 py-2 rounded-lg font-semibold hover:bg-yellow-500 transition">
                <i class="fa-solid fa-plus"></i>
                Create Report
            </a>

            <a href=""
               class="flex items-center gap-2 bg-yellow-400 px-4 py-2 rounded-lg font-semibold hover:bg-yellow-500 transition">
                <i class="fa-solid fa-plus"></i>
                Create Certificate
            </a>
        </div>

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

        /* Action column responsive */
        .action-wrapper {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }

        @media (max-width: 640px) {
            .action-wrapper {
                flex-direction: column;
                align-items: stretch;
            }

            .action-wrapper a {
                width: 100%;
                text-align: center;
            }
        }

        /* Prevent table breaking on mobile */
        .dataTables_wrapper .dataTable {
            width: 100% !important;
        }

        /* ===========================
               RESPONSIVE CARD MODE
               =========================== */

        /* Hide card view on desktop */
        .report-cards {
            display: none;
        }

        /* Mobile + Tablet */
        @media (max-width: 1023px) {

            /* Hide tables */
            .report-table-wrapper {
                display: none;
            }

            /* Show cards */
            .report-cards {
                display: block;
            }

            .report-card {
                border: 1px solid #e5e7eb;
                border-radius: 12px;
                padding: 16px;
                margin-bottom: 16px;
                background: #ffffff;
                box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
            }

            .report-card-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 10px;
            }

            .report-type {
                font-size: 13px;
                padding: 4px 10px;
                border-radius: 999px;
                font-weight: 600;
                text-transform: capitalize;
            }

            .report-program {
                font-weight: 700;
                font-size: 16px;
            }

            .report-meta {
                font-size: 14px;
                color: #6b7280;
                margin: 6px 0;
            }

            .report-desc {
                font-size: 14px;
                margin-top: 8px;
            }

            .report-actions {
                margin-top: 12px;
                display: flex;
                gap: 8px;
                flex-wrap: wrap;
            }

            .report-actions a {
                flex: 1;
                text-align: center;
            }
        }
    </style>

    <!-- TABLE CARD -->
    <div class="bg-white rounded-xl shadow-md p-6">

        <h2 class="font-semibold mb-4">My Reports</h2>
        <div class="report-table-wrapper">
            <div class="overflow-x-auto">
                <table id="reportTable" class="min-w-full border rounded-lg dataTable stripe hover">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-3 text-left">#</th>
                            <th class="p-3 text-left">Program</th>
                            <th class="p-3 text-left">Lesson</th>
                            <th class="p-3 text-left">Report Type</th>
                            <th class="p-3 text-left">Date</th>
                            <th class="p-3 text-left">Description</th>
                            <th class="p-3 text-left">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($otherReports as $report)
                            <tr class="border-b">
                                <td class="p-3">{{ $loop->iteration }}</td>

                                <td class="p-3">{{ $report->program->name ?? '-' }}</td>

                                <td class="p-3">{{ $report->lesson?->title ?? '—' }}</td>

                                <td class="p-3 capitalize">{{ $report->type }}</td>

                                <td class="p-3">{{ $report->created_at->format('d M Y') }}</td>

                                <td class="p-3">{{ Str::limit($report->description, 50) }}</td>

                                <td class="p-3">
                                    <div class="action-wrapper">
                                        @if ($report->file)
                                            <a href="{{ route('student.reports.show', $report->id) }}"
                                                class="table-action-btn view">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>

                                            <a href="{{ asset($report->file) }}" download
                                                class="table-action-btn bg-green-200 border border-green-400">
                                                <i class="fa-solid fa-download"></i>
                                            </a>
                                            <a href="{{ asset($report->file) }}" download
                                                class="table-action-btn bg-yellow-200 border border-yellow-400">
                                                <i class="fa-solid fa-pencil"></i>
                                            </a>
                                            <a href="{{ asset($report->file) }}" download
                                                class="table-action-btn bg-red-200 border border-red-400">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </a>
                                        @else
                                            <span class="text-gray-400 italic">No File</span>
                                        @endif

                                    </div>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="p-4 text-center text-gray-500">
                                    No reports available
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
        <div class="report-cards">
            @forelse ($otherReports as $report)
                <div class="report-card">
                    <div class="report-card-header">
                        <div class="report-program">
                            {{ $report->program->name ?? '-' }}
                        </div>
                        <span class="report-type px-3 py-1 rounded-full text-sm font-semibold
                                            @if($report->type === 'lesson')
                                                bg-blue-100 text-blue-800
                                            @elseif($report->type === 'weekly')
                                                bg-green-100 text-green-800
                                            @elseif($report->type === 'monthly')
                                                bg-yellow-100 text-yellow-800
                                            @elseif($report->type === 'final')
                                                bg-red-100 text-red-800
                                            @else
                                                bg-gray-100 text-gray-800
                                            @endif
                                        ">
                            {{ ucfirst($report->type) }}
                        </span>
                    </div>
                    @if ($report->lesson)
                        <div class="report-meta">
                            Lesson: {{ $report->lesson->title }}
                        </div>
                    @endif
                    <div class="report-meta">
                        Date: {{ $report->created_at->format('d M Y') }}
                    </div>
                    <div class="report-desc">
                        {{ Str::limit($report->description, 100) }}
                    </div>
                    <div class="report-actions">
                        @if ($report->file)
                            <a href="{{ route('student.reports.show', $report->id) }}" class="table-action-btn view">
                                <i class="fa-solid fa-file-pdf"></i> Detail
                            </a>

                            <a href="{{ asset($report->file) }}" download
                                class="table-action-btn bg-green-200 border border-green-400">
                                <i class="fa-solid fa-download"></i> Download
                            </a>
                        @else
                            <span class="text-gray-400 italic">No File</span>
                        @endif
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-500">
                    No reports available
                </p>
            @endforelse
        </div>
    </div>
    <div class="bg-white rounded-xl shadow-md p-6 mt-8">
        <h2 class="font-semibold mb-4 text-red-600">
            Final Reports
        </h2>
        <div class="report-table-wrapper">
            <div class="overflow-x-auto">
                <table id="finalReportTable" class="min-w-full border rounded-lg dataTable stripe hover">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-3 text-left">#</th>
                            <th class="p-3 text-left">Program</th>
                            <th class="p-3 text-left">Date</th>
                            <th class="p-3 text-left">Description</th>
                            <th class="p-3 text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($finalReports as $report)
                            <tr class="border-b">
                                <td class="p-3">{{ $loop->iteration }}</td>
                                <td class="p-3">{{ $report->program->name ?? '-' }}</td>
                                <td class="p-3">{{ $report->created_at->format('d M Y') }}</td>
                                <td class="p-3">
                                    {{ Str::limit($report->description, 80) }}
                                </td>
                                <td class="p-3">
                                    <div class="action-wrapper">
                                        @if ($report->file)
                                            <a href="{{ route('student.reports.show', $report->id) }}"
                                                class="table-action-btn view">
                                                <i class="fa-solid fa-file-pdf"></i> Detail
                                            </a>

                                            <a href="{{ asset($report->file) }}" download
                                                class="table-action-btn bg-green-200 border border-green-400">
                                                <i class="fa-solid fa-download"></i> Download
                                            </a>
                                        @else
                                            <span class="text-gray-400 italic">No File</span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-4 text-center text-gray-500">
                                    No final report submitted
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="report-cards">
            @forelse ($finalReports as $report)
                <div class="report-card border-red-200">

                    <div class="report-card-header">
                        <div class="report-program">
                            {{ $report->program->name ?? '-' }}
                        </div>

                        <span class="report-type px-3 py-1 rounded-full text-sm font-semibold
                                            @if($report->type === 'lesson')
                                                bg-blue-100 text-blue-800
                                            @elseif($report->type === 'weekly')
                                                bg-green-100 text-green-800
                                            @elseif($report->type === 'monthly')
                                                bg-yellow-100 text-yellow-800
                                            @elseif($report->type === 'final')
                                                bg-red-100 text-red-800
                                            @else
                                                bg-gray-100 text-gray-800
                                            @endif
                                        ">
                            {{ ucfirst($report->type) }}
                        </span>
                    </div>

                    <div class="report-meta">
                        Date: {{ $report->created_at->format('d M Y') }}
                    </div>

                    <div class="report-desc">
                        {{ Str::limit($report->description, 120) }}
                    </div>

                    <div class="report-actions">
                        @if ($report->file)
                            <a href="{{ route('student.reports.show', $report->id) }}" class="table-action-btn view">
                                <i class="fa-solid fa-file-pdf"></i> Detail
                            </a>
                            <a href="{{ asset($report->file) }}" download
                                class="table-action-btn bg-green-200 border border-green-400">
                                <i class="fa-solid fa-download"></i> Download
                            </a>
                        @else
                            <span class="text-gray-400 italic">No File</span>
                        @endif
                    </div>

                </div>
            @empty
                <p class="text-center text-gray-500">
                    No final report submitted
                </p>
            @endforelse
        </div>

    </div>

    <div class="bg-white rounded-xl shadow-md p-6 mt-8">

        <h2 class="font-semibold mb-4 text-yellow-600">
            Certificate
        </h2>
        <div class="report-table-wrapper">
            <div class="overflow-x-auto">
                <table class="min-w-full border dataTable rounded-lg">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-3 text-left">#</th>
                            <th class="p-3 text-left">Certificate</th>
                            <th class="p-3 text-left">Program</th>
                            <th class="p-3 text-left">Academic Year</th>
                            <th class="p-3 text-left">Completion Date</th>
                            <th class="p-3 text-left">Status</th>
                            <th class="p-3 text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($certificates as $certificate)
                            <tr class="border-b">
                                <td class="p-3">{{ $loop->iteration }}</td>

                                <td class="p-3 font-medium">
                                    {{ $certificate->name }}
                                </td>

                                <td class="p-3">
                                    {{ $certificate->program_name }}
                                </td>

                                <td class="p-3">
                                    {{ $certificate->academic_year }}
                                </td>

                                <td class="p-3">
                                    {{ $certificate->formatted_completion_date }}
                                </td>

                                <td class="p-3">
                                    <span
                                        class="px-3 py-1 rounded-full text-sm font-semibold
                                {{ $certificate->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-600' }}">
                                        {{ ucfirst($certificate->status) }}
                                    </span>
                                </td>
                                <td class="p-3">
                                    @if ($certificate->file)
                                        <a href="{{ asset($certificate->file) }}" download
                                            class="table-action-btn bg-green-200 border border-green-400">
                                            <i class="fa-solid fa-download"></i> Download
                                        </a>
                                    @else
                                        <span class="text-gray-400 italic">No File</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="p-4 text-center text-gray-500">
                                    No certificates available
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
<div class="report-cards">
    @forelse ($certificates as $certificate)
        <div class="report-card border-yellow-200">

            <div class="report-card-header">
                <div class="report-program font-semibold">
                    {{ $certificate->name }}
                </div>

                <span class="px-3 py-1 rounded-full text-sm font-semibold
                    {{ $certificate->status === 'active'
                        ? 'bg-green-100 text-green-800'
                        : 'bg-gray-100 text-gray-600' }}">
                    {{ ucfirst($certificate->status) }}
                </span>
            </div>

            <div class="report-meta text-sm text-gray-600">
                Program: {{ $certificate->program_name }} <br>
                Academic Year: {{ $certificate->academic_year }} <br>
                Completed: {{ $certificate->formatted_completion_date }}
            </div>

            <div class="report-desc mt-2">
                {{ Str::limit($certificate->description, 120) }}
            </div>

            <div class="report-actions mt-3">
                @if ($certificate->file)
                    <a href="{{ asset($certificate->file) }}" download
                       class="table-action-btn bg-green-200 border border-green-400">
                        <i class="fa-solid fa-download"></i> Download
                    </a>
                @else
                    <span class="text-gray-400 italic">No File</span>
                @endif
            </div>

        </div>
    @empty
        <p class="text-center text-gray-500">
            No certificates found
        </p>
    @endforelse
</div>


    </div>

@endsection


@section('scripts')
    <script>
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
@endsection