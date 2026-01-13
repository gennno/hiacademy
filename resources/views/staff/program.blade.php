@extends('staff.layoutadmin.layout')

@section('pagetitle', 'Manage Programs')

@section('content')

    <div class="mb-6">

        <!-- MAIN CARD WRAPPER -->
        <div class="bg-[#FBFBFB] border-4 border-transparent rounded-3xl shadow-xl p-6">

            <!-- HEADER -->
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-2xl font-bold text-yellow-500">📚 Manage Programs</h3>

                <!-- BUTTON ADD PROGRAM -->
                <button onclick="openAddModal()"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-5 py-2 rounded-xl shadow-md">
                    ➕ Add Program
                </button>

            </div>
            <form method="GET" action="{{ route('staffprogram') }}" class="mb-6">
                <div class="flex flex-col md:flex-row gap-3">

                    <!-- Search -->
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="🔍 Search program name..."
                        class="w-full md:w-1/3 px-4 py-2 border rounded-xl focus:ring focus:ring-blue-200">

                    <!-- Category Filter -->
                    <select name="category" class="w-full md:w-1/4 px-4 py-2 border rounded-xl">
                        <option value="">All Categories</option>

                        @foreach ($categories as $category)
                            <option value="{{ $category }}" {{ request('category') === $category ? 'selected' : '' }}>
                                {{ $category }}
                            </option>
                        @endforeach
                    </select>

                    <!-- Buttons -->
                    <div class="flex gap-2">
                        <button type="submit"
                            class="px-5 py-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-xl">
                            Apply
                        </button>

                        <a href="{{ route('staffprogram') }}" class="px-5 py-2 bg-gray-300 hover:bg-gray-400 rounded-xl">
                            Reset
                        </a>
                    </div>
                </div>
            </form>
            @if (session('success'))
                <div id="successToast" class="fixed top-20 left-1/2 -translate-x-1/2 z-50">
                    <div class="bg-green-500 text-white px-6 py-4 rounded-xl shadow-lg flex items-center gap-3
                                   animate-[slideDown_0.3s_ease-out]">

                        <span class="text-xl">✅</span>
                        <span class="font-semibold">{{ session('success') }}</span>
                    </div>
                </div>

                <script>
                    setTimeout(() => {
                        const toast = document.getElementById('successToast');
                        if (toast) toast.remove();
                    }, 3000);
                </script>
            @endif


            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">

                @foreach ($programs as $program)
                        <div
                            class="bg-[#FBFBFB] rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border-2 hover:border-4 border-indigo-400 hover:border-yellow-400 max-w-sm">

                            <!-- IMAGE -->
                            <div class="relative h-48 w-full overflow-hidden">
                                <img src="{{ $program->image
                    ? asset($program->image)
                    : asset('img/default-program.png') }}" class="w-full h-full object-cover">
                                @php
                                    $categoryColors = [
                                        'Preschool' => 'text-white bg-pink-500',
                                        'Child Dev' => 'text-white bg-purple-500',
                                        'English' => 'text-black bg-yellow-400',
                                        'Mandarin' => 'text-white bg-red-500',
                                        'Math' => 'text-white bg-indigo-600',
                                        'Coding' => 'text-white bg-emerald-500',
                                        'Design' => 'text-white bg-fuchsia-500',
                                        'Life Skill' => 'text-white bg-orange-500',
                                        'Architect' => 'text-white bg-sky-500',
                                        'Parenting' => 'text-white bg-rose-500',
                                    ];
                                @endphp


                                <span class="absolute top-3 left-3 text-xs font-semibold
                                                                                            {{ $categoryColors[$program->category] ?? 'text-white bg-gray-500' }}
                                                                                            px-3 py-1 rounded-full shadow-md">
                                    {{ $program->category }}
                                </span>

                            </div>

                            <!-- CONTENT -->
                            <div class="p-5 pt-2 space-y-3">
                                <div>
                                    <h5 class="text-lg font-semibold mt-2">
                                        {{ $program->name }}
                                    </h5>

                                    <p class="text-sm text-gray-500">
                                        {{ $program->slogan }}
                                    </p>
                                </div>

                                <!-- ACTIONS -->
                                <div class="flex flex-col sm:flex-row justify-between gap-3 pt-3">

                                    <!-- Open -->
                                    <button
                                        onclick="event.stopPropagation(); window.location='{{ route('staffdetailprogram', $program->slug) }}'"
                                        class="w-full sm:w-auto px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white font-semibold rounded-lg transition">
                                        🔍 Open
                                    </button>

                                    <!-- Edit -->
                                    <button onclick="event.stopPropagation(); openEditModal(@js($program))"
                                        class="w-full sm:w-auto px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-black font-semibold rounded-lg transition">
                                        ✏️ Edit
                                    </button>


                                    <!-- Delete -->
                                    <form action="{{ route('staff.programs.destroy', $program) }}" method="POST"
                                        onsubmit="event.stopPropagation(); return confirm('Delete this program?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            class="w-full sm:w-auto px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-semibold rounded-lg transition">
                                            🗑 Delete
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                @endforeach

            </div>


        </div>
    </div>

    <div id="modalAddProgram" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50 px-4">

        <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg p-6 overflow-y-auto max-h-[90vh]">

            <!-- Header -->
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-blue-500">➕ Add New Program</h3>
                <button onclick="closeAddModal()" class="text-gray-500 hover:text-gray-700 text-xl">
                    ✖
                </button>
            </div>

            <!-- FORM -->
            <form method="POST" action="{{ route('staff.programs.store') }}" enctype="multipart/form-data"
                class="space-y-4">
                @csrf

                <div>
                    <label class="text-sm font-semibold">Program Name</label>
                    <input type="text" name="name" required
                        class="w-full p-2 border rounded-lg focus:ring focus:ring-blue-200">
                </div>

                <div>
                    <label class="text-sm font-semibold">Level</label>
                    <input type="text" name="level" class="w-full p-2 border rounded-lg focus:ring focus:ring-blue-200">
                </div>

                <div>
                    <label class="text-sm font-semibold">Category</label>
                    <select name="category" required class="w-full p-2 border rounded-lg focus:ring focus:ring-blue-200">
                        <option value="">-- Select Category --</option>
                        <option>Preschool</option>
                        <option>Child Dev</option>
                        <option>English</option>
                        <option>Mandarin</option>
                        <option>Math</option>
                        <option>Coding</option>
                        <option>Design</option>
                        <option>Life Skill</option>
                        <option>Architect</option>
                        <option>Parenting</option>
                    </select>
                </div>

                <div>
                    <label class="text-sm font-semibold">Slogan</label>
                    <input type="text" name="slogan" class="w-full p-2 border rounded-lg focus:ring focus:ring-blue-200">
                </div>

                <div>
                    <label class="text-sm font-semibold">Description</label>
                    <textarea name="description" rows="3"
                        class="w-full p-2 border rounded-lg focus:ring focus:ring-blue-200"></textarea>
                </div>

                <div>
                    <label class="text-sm font-semibold">Image</label>
                    <input type="file" name="image" class="w-full p-2 border rounded-lg">
                </div>

                <!-- Actions -->
                <div class="flex flex-col sm:flex-row justify-end gap-3 pt-4">
                    <button type="button" onclick="closeAddModal()"
                        class="px-4 py-2 rounded-lg bg-gray-300 hover:bg-gray-400">
                        Cancel
                    </button>

                    <button type="submit"
                        class="px-5 py-2 rounded-lg bg-blue-500 hover:bg-blue-600 text-white font-semibold">
                        Save Program
                    </button>
                </div>

            </form>
        </div>
    </div>


    <div id="modalEditProgram" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50 px-4">

        <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg p-6 max-h-[90vh] overflow-y-auto">

            <!-- Header -->
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-yellow-400">✏️ Edit Program</h3>
                <button onclick="closeEditModal()" class="text-gray-500 hover:text-gray-700 text-xl">✖</button>
            </div>

            <!-- FORM -->
            <form id="editProgramForm" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="text-sm font-semibold">Program Name</label>
                    <input type="text" name="name" id="edit_name" class="w-full p-2 border rounded-lg">
                </div>

                <div>
                    <label class="text-sm font-semibold">Level</label>
                    <input type="text" name="level" id="edit_level" class="w-full p-2 border rounded-lg">
                </div>

                <div>
                    <label class="text-sm font-semibold">Category</label>
                    <select name="category" id="edit_category" class="w-full p-2 border rounded-lg">
                        <option>Preschool</option>
                        <option>Child Dev</option>
                        <option>English</option>
                        <option>Mandarin</option>
                        <option>Math</option>
                        <option>Coding</option>
                        <option>Design</option>
                        <option>Life Skill</option>
                        <option>Architect</option>
                        <option>Parenting</option>
                    </select>
                </div>

                <div>
                    <label class="text-sm font-semibold">Slogan</label>
                    <input type="text" name="slogan" id="edit_slogan" class="w-full p-2 border rounded-lg">
                </div>

                <div>
                    <label class="text-sm font-semibold">Description</label>
                    <textarea name="description" id="edit_description" rows="3"
                        class="w-full p-2 border rounded-lg"></textarea>
                </div>

                <div>
                    <label class="text-sm font-semibold">Image (optional)</label>
                    <input type="file" name="image" class="w-full p-2 border rounded-lg">
                </div>

                <!-- Actions -->
                <div class="flex flex-col sm:flex-row justify-end gap-3 pt-4">
                    <button type="button" onclick="closeEditModal()"
                        class="px-4 py-2 rounded-lg bg-gray-300 hover:bg-gray-400">
                        Cancel
                    </button>

                    <button type="submit" class="px-5 py-2 rounded-lg bg-yellow-400 hover:bg-yellow-500 font-semibold">
                        Update Program
                    </button>
                </div>

            </form>
        </div>
    </div>

    <script>
        function openEditModal(program) {
            const form = document.getElementById('editProgramForm');

            form.action = `/staff/programs/${program.id}`;

            document.getElementById('edit_name').value = program.name ?? '';
            document.getElementById('edit_level').value = program.level ?? '';
            document.getElementById('edit_category').value = program.category ?? '';
            document.getElementById('edit_slogan').value = program.slogan ?? '';
            document.getElementById('edit_description').value = program.description ?? '';

            document.getElementById('modalEditProgram').classList.remove('hidden');
        }

        function closeEditModal() {
            document.getElementById('modalEditProgram').classList.add('hidden');
        }

        document.addEventListener('click', function (e) {
            if (e.target.id === 'modalEditProgram') {
                closeEditModal();
            }
        });
    </script>

    <script>
        function openAddModal() {
            document.getElementById('modalAddProgram').classList.remove('hidden');
        }

        function closeAddModal() {
            document.getElementById('modalAddProgram').classList.add('hidden');
        }

        document.addEventListener('click', function (e) {
            if (e.target.id === 'modalAddProgram') {
                closeAddModal();
            }
        });
    </script>


@endsection