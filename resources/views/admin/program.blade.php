@extends('admin.layoutadmin.layout')

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
            <form method="GET" action="{{ route('adminprogram') }}" class="mb-6">
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

                        <a href="{{ route('adminprogram') }}" class="px-5 py-2 bg-gray-300 hover:bg-gray-400 rounded-xl">
                            Reset
                        </a>
                    </div>
                </div>
            </form>

            <!-- STATIC GRID ITEMS -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">

                @foreach ($programs as $program)
                        <div onclick="window.location='{{ route('admindetailprogram', $program->slug) }}'"
                            class="bg-[#FBFBFB] rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border-2 hover:border-4 border-indigo-400 hover:border-yellow-400 max-w-sm cursor-pointer">

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
                                        onclick="event.stopPropagation(); window.location='{{ route('admindetailprogram', $program->slug) }}'"
                                        class="w-full sm:w-auto px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white font-semibold rounded-lg transition">
                                        🔍 Open
                                    </button>

                                    <!-- Edit -->
                                    <button onclick="event.stopPropagation(); openEditModal({{ $program->id }})"
                                        class="w-full sm:w-auto px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-black font-semibold rounded-lg transition">
                                        ✏️ Edit
                                    </button>

                                    <!-- Delete -->
                                    <form action="" method="POST"
                                        onsubmit="event.stopPropagation(); return confirm('Delete this program?')">
                                        @csrf
                                        @method('DELETE')

                                        <button
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

<div id="modalAddProgram"
    class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50 px-4">

    <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg p-6 overflow-y-auto max-h-[90vh]">

        <!-- Header -->
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-bold text-blue-500">➕ Add New Program</h3>
            <button onclick="closeAddModal()" class="text-gray-500 hover:text-gray-700 text-xl">
                ✖
            </button>
        </div>

        <!-- FORM -->
        <form method="POST" action="{{ route('admin.programs.store') }}" enctype="multipart/form-data"
            class="space-y-4">
            @csrf

            <div>
                <label class="text-sm font-semibold">Program Name</label>
                <input type="text" name="name" required
                    class="w-full p-2 border rounded-lg focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label class="text-sm font-semibold">Level</label>
                <input type="text" name="level"
                    class="w-full p-2 border rounded-lg focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label class="text-sm font-semibold">Category</label>
                <select name="category" required
                    class="w-full p-2 border rounded-lg focus:ring focus:ring-blue-200">
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
                <input type="text" name="slogan"
                    class="w-full p-2 border rounded-lg focus:ring focus:ring-blue-200">
            </div>

            <div>
                <label class="text-sm font-semibold">Description</label>
                <textarea name="description" rows="3"
                    class="w-full p-2 border rounded-lg focus:ring focus:ring-blue-200"></textarea>
            </div>

            <div>
                <label class="text-sm font-semibold">Image</label>
                <input type="file" name="image"
                    class="w-full p-2 border rounded-lg">
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


    <div id="modalEditProgram" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">

        <div class="bg-white rounded-2xl shadow-xl p-6 w-[90%] md:w-[40%]">

            <h3 class="text-xl font-bold mb-4 text-yellow-400">✏️ Edit Program</h3>

            <div class="space-y-3">

                <div>
                    <label class="text-sm font-semibold">Program Name</label>
                    <input type="text" class="w-full p-2 border rounded-lg">
                </div>

                <div>
                    <label class="text-sm font-semibold">Category</label>
                    <input type="text" class="w-full p-2 border rounded-lg">
                </div>

                <div>
                    <label class="text-sm font-semibold">Description</label>
                    <textarea class="w-full p-2 border rounded-lg"></textarea>
                </div>

                <div>
                    <label class="text-sm font-semibold">Image</label>
                    <input type="file" class="w-full p-2 border rounded-lg">
                </div>
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <button class="bg-gray-300 hover:bg-gray-400 px-4 py-2 rounded-lg"
                    onclick="document.getElementById('modalEditProgram').classList.add('hidden')">
                    Cancel
                </button>

                <button class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg font-semibold">
                    <span class="text-white">Save (UI Only)</span>
                </button>
            </div>

        </div>
    </div>
    <script>
        function openEditModal() {
            document.getElementById('modalEditProgram').classList.remove('hidden');
        }

        function closeEditModal() {
            document.getElementById('modalEditProgram').classList.add('hidden');
        }

        // OPTIONAL: Klik area gelap untuk close
        document.addEventListener("click", function (e) {
            if (e.target.id === "modalEditProgram") {
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