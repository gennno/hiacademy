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
                        <th class="p-3 text-left">Username</th>
                        <th class="p-3 text-left">Program</th>
                        <th class="p-3 text-left">Status</th>
                        <th class="p-3 text-left">Enrolled At</th>
                        <th class="p-3 text-left">Completed At</th>
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
                                {{ $enrollment->user->username ?? '-' }}
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

                            <td class="p-3">
                                {{ $enrollment->completed_at?->format('d M Y') ?? '-' }}
                            </td>

                            <!-- Actions -->
                            <td class="p-3 flex justify-center gap-2">

                                <!-- EDIT -->
                                <button onclick="editEnrollment('student', {{ $enrollment->id }})"
                                    class="p-2 text-yellow-500">
                                    <i class="fa-solid fa-pen"></i>
                                </button>

                                <!-- DELETE -->
                                <form action="{{ route('adminenrollments.destroy', ['type' => 'student', 'id' => $enrollment->id]) }}" 
                                    method="POST"
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
                        <th class="p-3 text-left">Username</th>
                        <th class="p-3 text-left">Program</th>
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
                                {{ $enrollment->user->username ?? '-' }}
                            </td>

                            <!-- Program -->
                            <td class="p-3">
                                {{ $enrollment->program->name ?? '-' }}
                            </td>

                            <!-- Enrolled Date -->
                            <td class="p-3">
                                {{ $enrollment->created_at?->format('d M Y') ?? '-' }}
                            </td>

                            <!-- Actions -->
                            <td class="p-3 flex justify-center gap-2">

                                <!-- EDIT -->
                                <button onclick="editEnrollment('teacher', {{ $enrollment->id }})"
                                    class="p-2 text-yellow-500">
                                    <i class="fa-solid fa-pen"></i>
                                </button>

                                <!-- DELETE -->
                                <form action="{{ route('adminenrollments.destroy', ['type' => 'teacher', 'id' => $enrollment->id]) }}"
                                    method="POST"
                                    onsubmit="return confirm('Delete this assignment?')">
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


    <!-- CREATE ENROLLMENT MODAL -->
    <div id="createEnrollmentModal"
        class="fixed inset-0 bg-black bg-opacity-40 hidden items-center justify-center z-50">

        <div class="bg-white w-full max-w-lg rounded-xl shadow-lg p-6 relative">

            <!-- CLOSE BUTTON -->
            <button id="closeEnrollmentModal"
                class="absolute top-3 right-3 text-gray-500 hover:text-black">
                <i class="fa-solid fa-xmark"></i>
            </button>

            <h2 class="text-lg font-semibold mb-4">Create Enrollment</h2>

            <form method="POST" action="{{ route('adminenrollments.store') }}">
                @csrf

                <!-- TYPE -->
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Enrollment Type</label>
                    <select id="enrollmentType" name="type"
                        class="w-full border rounded-lg p-2">
                        <option value="student">Student Enrollment</option>
                        <option value="teacher">Teacher Assignment</option>
                    </select>
                </div>
                
                <!-- USER -->
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">User</label>
                    <select id="userSelect" name="user_id" class="w-full border rounded-lg p-2 searchable-select" required>
                        <option value="">Select User</option>

                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" data-role="{{ $user->role }}">
                                {{ $user->username }} ({{ $user->name }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- PROGRAM -->
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Program</label>
                    <select name="program_id" class="w-full border rounded-lg p-2 searchable-select" required>
                        <option value="">Select Program</option>
                        @foreach ($programs as $program)
                            <option value="{{ $program->id }}">
                                {{ $program->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- STATUS (only student) -->
                <div id="statusField" class="mb-4">
                    <label class="block text-sm font-medium mb-1">Status</label>
                    <select name="status" class="w-full border rounded-lg p-2">
                        <option value="active">Active</option>
                        <option value="completed">Completed</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>

                <button
                    class="w-full bg-yellow-400 hover:bg-yellow-500 py-2 rounded-lg font-semibold">
                    Create
                </button>

            </form>
        </div>
    </div>

    <!-- EDIT ENROLLMENT MODAL -->
    <div id="editEnrollmentModal"
        class="fixed inset-0 bg-black bg-opacity-40 hidden items-center justify-center z-50">

        <div class="bg-white w-full max-w-lg rounded-xl shadow-lg p-6 relative">

            <!-- CLOSE -->
            <button id="closeEditEnrollmentModal"
                class="absolute top-3 right-3 text-gray-500 hover:text-black">
                <i class="fa-solid fa-xmark"></i>
            </button>

            <h2 class="text-lg font-semibold mb-4">Edit Enrollment</h2>

            <form id="editEnrollmentForm" method="POST">
                @csrf
                @method('PUT')

                <!-- USER -->
    <div class="mb-4">
        <label class="block text-sm font-medium mb-1">User</label>

        <div id="editUserDisplay"
            class="w-full border rounded-lg p-2 bg-gray-100 text-gray-700">
            -
        </div>

        <input type="hidden" name="user_id" id="editUserId">
    </div>

                <!-- PROGRAM -->
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Program</label>
                    <select name="program_id" id="editProgram"
                        class="w-full border rounded-lg p-2 searchable-select">

                        @foreach ($programs as $program)
                            <option value="{{ $program->id }}">
                                {{ $program->name }}
                            </option>
                        @endforeach

                    </select>
                </div>

                <!-- STATUS -->
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Status</label>
                    <select name="status" id="editStatus"
                        class="w-full border rounded-lg p-2">

                        <option value="active">Active</option>
                        <option value="completed">Completed</option>
                        <option value="cancelled">Cancelled</option>

                    </select>
                </div>

                <button
                    class="w-full bg-yellow-400 hover:bg-yellow-500 py-2 rounded-lg font-semibold">
                    Update Enrollment
                </button>

            </form>

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
    $(document).ready(function () {

        const modal = document.getElementById('createEnrollmentModal');
        const openBtn = document.getElementById('addEnrollmentBtn');
        const closeBtn = document.getElementById('closeEnrollmentModal');
        const typeSelect = document.getElementById('enrollmentType');
        const statusField = document.getElementById('statusField');
        const userSelect = $('#userSelect');

        // SELECT2 INIT
        $('.searchable-select').select2({
            placeholder: "Search and select...",
            allowClear: true,
            width: '100%'
        });

        // OPEN MODAL
        openBtn.onclick = () => {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        };

        // CLOSE MODAL
        closeBtn.onclick = () => {
            modal.classList.add('hidden');
        };

        window.onclick = function(e) {
            if (e.target === modal) {
                modal.classList.add('hidden');
            }
        };

        // FILTER USER BASED ON TYPE
        function filterUsers() {

            const type = typeSelect.value;

            $('#userSelect option').each(function () {

                const role = $(this).data('role');

                if (!role) return;

                if (type === 'student' && role !== 'student') {
                    $(this).prop('disabled', true);
                } 
                else if (type === 'teacher' && role !== 'teacher') {
                    $(this).prop('disabled', true);
                } 
                else {
                    $(this).prop('disabled', false);
                }

            });

            userSelect.val(null).trigger('change');
        }

        // TOGGLE STATUS FIELD
        function toggleStatus() {

            if (typeSelect.value === 'teacher') {
                statusField.style.display = 'none';
            } else {
                statusField.style.display = 'block';
            }

        }

        // EVENT
        typeSelect.addEventListener('change', function () {
            filterUsers();
            toggleStatus();
        });

    });
    </script>
<script>

const editModal = document.getElementById("editEnrollmentModal");
const closeEditModal = document.getElementById("closeEditEnrollmentModal");
const editForm = document.getElementById("editEnrollmentForm");
const editUserDisplay = document.getElementById("editUserDisplay");
const editUserId = document.getElementById("editUserId");
const editProgram = document.getElementById("editProgram");
const editStatus = document.getElementById("editStatus");

function editEnrollment(type, id) {

    fetch(`/admin/enrollments/${type}/${id}`)
        .then(res => res.json())
        .then(data => {

            editForm.action = `/admin/enrollments/${type}/${id}`;

            // set user
            editUserId.value = data.user_id;
            editUserDisplay.innerText =
                `${data.user.username} (${data.user.name})`;

            // program
            editProgram.value = data.program_id;

            if(data.status){
                editStatus.value = data.status;
            }

            $('#editProgram').trigger('change');

            if(type === 'teacher'){
                editStatus.parentElement.style.display = "none";
            }else{
                editStatus.parentElement.style.display = "block";
            }

            editModal.classList.remove("hidden");
            editModal.classList.add("flex");
        });
}

// close modal button
closeEditModal.onclick = () => {
    editModal.classList.add("hidden");
    editModal.classList.remove("flex");
}

// close when clicking outside
window.addEventListener("click", function(e){
    if(e.target === editModal){
        editModal.classList.add("hidden");
        editModal.classList.remove("flex");
    }
})

</script>
@endsection
