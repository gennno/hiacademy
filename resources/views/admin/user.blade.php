@extends('admin.layoutadmin.layout')

@section('pagetitle', 'User Management')

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
<button id="addUserBtn"
    class="flex items-center gap-2 bg-yellow-400 px-4 py-2 rounded-lg font-semibold hover:bg-yellow-500 transition">
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

    <h2 class="font-semibold mb-4">User List</h2>

    <div class="overflow-x-auto">
        <table id="userTable" class="min-w-full border rounded-lg dataTable stripe hover">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left">#</th>
                    <th class="p-3 text-left">Username</th>
                    <th class="p-3 text-left">Name</th>
                    <th class="p-3 text-left">Email</th>
                    <th class="p-3 text-left">Role</th>
                    <th class="p-3 text-center">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($users as $user)
                    <tr class="border-b">
                        <td class="p-3">{{ $loop->iteration }}</td>
                        <td class="p-3">{{ $user->username }}</td>
                        <td class="p-3">{{ $user->name }}</td>
                        <td class="p-3">{{ $user->email }}</td>
                        <td class="p-3">
                            <span class="px-3 py-1 text-sm rounded-full
                                @if($user->isAdmin()) bg-red-200 text-red-700
                                @elseif($user->isTeacher()) bg-blue-200 text-blue-700
                                @elseif($user->isStaff()) bg-yellow-200 text-yellow-700
                                @else bg-green-200 text-green-700
                                @endif
                            ">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td class="p-3 flex justify-center gap-2">
<!-- VIEW -->
<button onclick="viewUser({{ $user->id }})" class="p-2 text-blue-600">
    <i class="fa-solid fa-eye"></i>
</button>

<!-- EDIT -->
<button onclick='editUser(@json($user))' class="p-2 text-yellow-500">
    <i class="fa-solid fa-pen"></i>
</button>


                            <!-- DELETE -->
<form action="{{ route('users.destroy', $user->id) }}"
      method="POST"
      onsubmit="return confirm('Delete this user?')">
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
                        <td colspan="6" class="p-4 text-center text-gray-500">
                            No users found
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>
        <!-- ADD USER MODAL -->
<div id="addUserModal" class="fixed inset-0 bg-black/40 hidden flex items-center justify-center z-50">
    <div class="bg-white rounded-xl w-full max-w-lg p-6">
        <h2 class="text-lg font-semibold mb-4">Add User</h2>

        <form action="{{ route('users.store') }}" method="POST" class="space-y-3">
            @csrf

            <input name="username" placeholder="Username" class="w-full border p-2 rounded" required>
            <input name="name" placeholder="Name" class="w-full border p-2 rounded" required>
            <input name="email" type="email" placeholder="Email" class="w-full border p-2 rounded" required>
            <input name="password" type="password" placeholder="Password" class="w-full border p-2 rounded" required>

            <select name="role" class="w-full border p-2 rounded" required>
                <option value="">-- Select Role --</option>
                <option value="admin">Admin</option>
                <option value="teacher">Teacher</option>
                <option value="staff">Staff</option>
                <option value="student">Student</option>
            </select>

            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeModal('addUserModal')" class="px-4 py-2 bg-gray-200 rounded">Cancel</button>
                <button class="px-4 py-2 bg-yellow-400 rounded font-semibold">Save</button>
            </div>
        </form>
    </div>
</div>
<!-- VIEW USER MODAL -->
<div id="viewUserModal" class="fixed inset-0 bg-black/40 hidden flex items-center justify-center z-50">
    <div class="bg-white rounded-xl w-full max-w-md p-6">
        <h2 class="text-lg font-semibold mb-4">User Detail</h2>

        <div id="viewUserContent" class="space-y-2 text-sm"></div>

        <div class="text-right mt-4">
            <button onclick="closeModal('viewUserModal')" class="px-4 py-2 bg-gray-200 rounded">Close</button>
        </div>
    </div>
</div>
<!-- EDIT USER MODAL -->
<div id="editUserModal" class="fixed inset-0 bg-black/40 hidden flex items-center justify-center z-50">
    <div class="bg-white rounded-xl w-full max-w-lg p-6">
        <h2 class="text-lg font-semibold mb-4">Edit User</h2>

        <form id="editUserForm" method="POST" class="space-y-3">
            @csrf
            @method('PUT')

            <input name="username" id="edit_username" class="w-full border p-2 rounded">
            <input name="name" id="edit_name" class="w-full border p-2 rounded">
            <input name="email" id="edit_email" type="email" class="w-full border p-2 rounded">
            <input name="password" type="password" placeholder="New password (optional)" class="w-full border p-2 rounded">

            <select name="role" id="edit_role" class="w-full border p-2 rounded">
                <option value="admin">Admin</option>
                <option value="teacher">Teacher</option>
                <option value="staff">Staff</option>
                <option value="student">Student</option>
            </select>

            <div class="flex justify-end gap-2">
                <button type="button" onclick="closeModal('editUserModal')" class="px-4 py-2 bg-gray-200 rounded">Cancel</button>
                <button class="px-4 py-2 bg-yellow-400 rounded font-semibold">Update</button>
            </div>
        </form>
    </div>
</div>

    </div>
</div>


@endsection


@section('scripts')
<script>
$(document).ready(function() {
    $('#userTable').DataTable({
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
document.getElementById('addUserBtn').addEventListener('click', () => {
    openModal('addUserModal');
});


// VIEW
function viewUser(id) {
    fetch(`/users/${id}`)
        .then(res => res.json())
        .then(user => {
            document.getElementById('viewUserContent').innerHTML = `
                <p><b>Username:</b> ${user.username}</p>
                <p><b>Name:</b> ${user.name}</p>
                <p><b>Email:</b> ${user.email}</p>
                <p><b>Role:</b> ${user.role}</p>
            `;
            openModal('viewUserModal');
        });
}

// EDIT
function editUser(user) {
document.getElementById('editUserForm').action = `/users/${user.id}/update`;
    document.getElementById('edit_username').value = user.username;
    document.getElementById('edit_name').value = user.name;
    document.getElementById('edit_email').value = user.email;
    document.getElementById('edit_role').value = user.role;
    openModal('editUserModal');
}
</script>

@endsection