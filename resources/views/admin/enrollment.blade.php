@extends('admin.layoutadmin.layout')

@section('pagetitle', 'Enrollment')

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
            <button id="addEnrollmentBtn"
                class="flex items-center gap-2 bg-yellow-400 px-4 py-2 rounded-lg font-semibold hover:bg-yellow-500 transition">
                <i class="fa-solid fa-plus"></i>
                Create Enrollment
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
    <div class="bg-white rounded-xl mb-4 shadow-md p-6">

        <h2 class="font-semibold mb-4">Student Enrollment</h2>

        <div class="overflow-x-auto">
            <table id="studentEnrollmentTable" class="min-w-full border rounded-lg dataTable stripe hover">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3 text-left">#</th>
                        <th class="p-3 text-left">Student</th>
                        <th class="p-3 text-left">Email</th>
                        <th class="p-3 text-left">Program</th>
                        <th class="p-3 text-left">Status</th>
                        <th class="p-3 text-left">Enrolled At</th>
                        <th class="p-3 text-center">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($studentEnrollments as $enrollment)
                        <tr class="border-b">
                            <td class="p-3">{{ $loop->iteration }}</td>

                            <!-- Student Name -->
                            <td class="p-3">
                                {{ $enrollment->user->name ?? '-' }}
                            </td>

                            <!-- Email -->
                            <td class="p-3">
                                {{ $enrollment->user->email ?? '-' }}
                            </td>

                            <!-- Program -->
                            <td class="p-3">
                                {{ $enrollment->program->name ?? '-' }}
                            </td>

                            <!-- Status -->
                            <td class="p-3">
                                <span
                                    class="px-3 py-1 text-sm rounded-full
                        @if ($enrollment->isActive()) bg-green-200 text-green-700
                        @elseif($enrollment->isCompleted()) bg-blue-200 text-blue-700
                        @elseif($enrollment->isCancelled()) bg-red-200 text-red-700
                        @else bg-gray-200 text-gray-700 @endif
                    ">
                                    {{ ucfirst($enrollment->status) }}
                                </span>
                            </td>

                            <!-- Enrolled Date -->
                            <td class="p-3">
                                {{ $enrollment->enrolled_at?->format('d M Y') ?? '-' }}
                            </td>

                            <!-- Actions -->
                            <td class="p-3 flex justify-center gap-2">

                                <!-- VIEW -->
                                <button onclick="viewEnrollment({{ $enrollment->id }})" class="p-2 text-blue-600">
                                    <i class="fa-solid fa-eye"></i>
                                </button>

                                <!-- EDIT -->
                                <button onclick='editEnrollment(@json($enrollment))' class="p-2 text-yellow-500">
                                    <i class="fa-solid fa-pen"></i>
                                </button>

                                <!-- DELETE -->
                                <form action="{{ route('adminenrollments.destroy', $enrollment->id) }}" method="POST"
                                    onsubmit="return confirm('Delete this enrollment?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="p-2 text-red-600 hover:text-red-800">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-4 text-center text-gray-500">
                                No enrollments found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-md p-6">

        <h2 class="font-semibold mb-4">Teacher Enrollment</h2>

        <div class="overflow-x-auto">
            <table id="teacherEnrollmentTable" class="min-w-full border rounded-lg dataTable stripe hover">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3 text-left">#</th>
                        <th class="p-3 text-left">Student</th>
                        <th class="p-3 text-left">Email</th>
                        <th class="p-3 text-left">Program</th>
                        <th class="p-3 text-left">Status</th>
                        <th class="p-3 text-left">Enrolled At</th>
                        <th class="p-3 text-center">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($teacherEnrollments as $enrollment)
                        <tr class="border-b">
                            <td class="p-3">{{ $loop->iteration }}</td>

                            <!-- Student Name -->
                            <td class="p-3">
                                {{ $enrollment->user->name ?? '-' }}
                            </td>

                            <!-- Email -->
                            <td class="p-3">
                                {{ $enrollment->user->email ?? '-' }}
                            </td>

                            <!-- Program -->
                            <td class="p-3">
                                {{ $enrollment->program->name ?? '-' }}
                            </td>

                            <!-- Status -->
                            <td class="p-3">
                                <span
                                    class="px-3 py-1 text-sm rounded-full
                        @if ($enrollment->isActive()) bg-green-200 text-green-700
                        @elseif($enrollment->isCompleted()) bg-blue-200 text-blue-700
                        @elseif($enrollment->isCancelled()) bg-red-200 text-red-700
                        @else bg-gray-200 text-gray-700 @endif
                    ">
                                    {{ ucfirst($enrollment->status) }}
                                </span>
                            </td>

                            <!-- Enrolled Date -->
                            <td class="p-3">
                                {{ $enrollment->enrolled_at?->format('d M Y') ?? '-' }}
                            </td>

                            <!-- Actions -->
                            <td class="p-3 flex justify-center gap-2">

                                <!-- VIEW -->
                                <button onclick="viewEnrollment({{ $enrollment->id }})" class="p-2 text-blue-600">
                                    <i class="fa-solid fa-eye"></i>
                                </button>

                                <!-- EDIT -->
                                <button onclick='editEnrollment(@json($enrollment))' class="p-2 text-yellow-500">
                                    <i class="fa-solid fa-pen"></i>
                                </button>

                                <!-- DELETE -->
                                <form action="{{ route('adminenrollments.destroy', $enrollment->id) }}" method="POST"
                                    onsubmit="return confirm('Delete this enrollment?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="p-2 text-red-600 hover:text-red-800">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-4 text-center text-gray-500">
                                No enrollments found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>


@endsection


@section('scripts')
    <script>
        
        $.fn.dataTable.ext.errMode = 'none';
        $(document).ready(function() {
            $('#teacherEnrollmentTable').DataTable({
                pageLength: 5,
                paging: true,
                searching: true,
                ordering: true,
                responsive: true
            });
        });

        $(document).ready(function() {
            $('#studentEnrollmentTable').DataTable({
                pageLength: 5,
                paging: true,
                searching: true,
                ordering: true,
                responsive: true
            });
        });
    </script>
    <script>
        function openModal(id) {
            document.getElementById(id).classList.remove('hidden');
        }

        function closeModal(id) {
            document.getElementById(id).classList.add('hidden');
        }

        // ADD
        document.getElementById('addEnrollmentBtn').addEventListener('click', () => {
            openModal('addEnrollmentModal');
        });


        // VIEW
        function viewEnrollment(id) {
            fetch(`/enrollments/${id}`)
                .then(res => res.json())
                .then(Enrollment => {
                    document.getElementById('viewEnrollmentContent').innerHTML = `
                <p><b>Enrollmentname:</b> ${Enrollment.Enrollmentname}</p>
                <p><b>Name:</b> ${Enrollment.name}</p>
                <p><b>Email:</b> ${Enrollment.email}</p>
                <p><b>Role:</b> ${Enrollment.role}</p>
            `;
                    openModal('viewEnrollmentModal');
                });
        }

        // EDIT
        function editEnrollment(Enrollment) {
            document.getElementById('editEnrollmentForm').action = `/enrollments/${Enrollment.id}/update`;
            document.getElementById('edit_Enrollmentname').value = Enrollment.Enrollmentname;
            document.getElementById('edit_name').value = Enrollment.name;
            document.getElementById('edit_email').value = Enrollment.email;
            document.getElementById('edit_role').value = Enrollment.role;
            openModal('editEnrollmentModal');
        }
    </script>

@endsection
