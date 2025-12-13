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
                <button
                    class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-5 py-2 rounded-xl shadow-md transition-all"
                    onclick="document.getElementById('modalAddProgram').classList.remove('hidden')">
                    ➕ Add Program
                </button>
            </div>

            <!-- STATIC GRID ITEMS -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">

                                <div onclick="window.location='{{ route('staffdetailprogram') }}'"
                    class="bg-[#FBFBFB] rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border-2 hover:border-4 border-indigo-400 hover:border-yellow-400 max-w-sm cursor-pointer">

                    <!-- IMAGE -->
                    <div class="relative h-48 w-full overflow-hidden">
                        <img src="{{ asset('img/math.png') }}" class="w-full h-full object-cover">
                        <span
                            class="absolute top-3 left-3 text-xs font-semibold text-white bg-indigo-600/90 px-3 py-1 rounded-full shadow-md">
                            Math
                        </span>
                    </div>

                    <!-- CONTENT -->
                    <div class="p-5 pt-2 space-y-3">

                        <div>
                            <h5 class="text-lg font-bold mt-2">Math - Explorer</h5>
                            <p class="text-sm text-gray-500">Joyful and solid numerical foundation.</p>
                        </div>

                        <!-- ACTIONS -->
                        <div class="flex flex-col sm:flex-row justify-between gap-3 pt-3">

                            <!-- Open Button (same link as card click) -->
                            <button onclick="event.stopPropagation(); window.location='{{ route('staffdetailprogram') }}'"
                                class="w-full sm:w-auto px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white font-semibold rounded-lg transition">
                                🔍 Open
                            </button>

                            <!-- Edit -->
                            <button onclick="event.stopPropagation(); openEditModal()"
                                class="w-full sm:w-auto px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-black font-semibold rounded-lg transition">
                                ✏️ Edit
                            </button>

                            <!-- Delete -->
                            <button onclick="event.stopPropagation(); alert('Delete action (UI only)')"
                                class="w-full sm:w-auto px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-semibold rounded-lg transition">
                                🗑 Delete
                            </button>
                        </div>
                    </div>

                </div>

                                <div onclick="window.location='{{ route('staffdetailprogram') }}'"
                    class="bg-[#FBFBFB] rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border-2 hover:border-4 border-indigo-400 hover:border-yellow-400 max-w-sm cursor-pointer">

                    <!-- IMAGE -->
                    <div class="relative h-48 w-full overflow-hidden">
                        <img src="{{ asset('img/english.png') }}" class="w-full h-full object-cover">
                        <span
                            class="absolute top-3 left-3 text-xs font-semibold text-black bg-yellow-400/90 px-3 py-1 rounded-full shadow-md">
                            English
                        </span>
                    </div>

                    <!-- CONTENT -->
                    <div class="p-5 pt-2 space-y-3">

                        <div>
                            <h5 class="text-lg font-bold mt-2">English - Movers</h5>
                            <p class="text-sm text-gray-500">Improving communication skills.</p>
                        </div>

                        <!-- ACTIONS -->
                        <div class="flex flex-col sm:flex-row justify-between gap-3 pt-3">

                            <!-- Open Button (same link as card click) -->
                            <button onclick="event.stopPropagation(); window.location='{{ route('staffdetailprogram') }}'"
                                class="w-full sm:w-auto px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white font-semibold rounded-lg transition">
                                🔍 Open
                            </button>

                            <!-- Edit -->
                            <button onclick="event.stopPropagation(); openEditModal()"
                                class="w-full sm:w-auto px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-black font-semibold rounded-lg transition">
                                ✏️ Edit
                            </button>

                            <!-- Delete -->
                            <button onclick="event.stopPropagation(); alert('Delete action (UI only)')"
                                class="w-full sm:w-auto px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-semibold rounded-lg transition">
                                🗑 Delete
                            </button>
                        </div>
                    </div>

                </div>

                                <div onclick="window.location='{{ route('staffdetailprogram') }}'"
                    class="bg-[#FBFBFB] rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border-2 hover:border-4 border-indigo-400 hover:border-yellow-400 max-w-sm cursor-pointer">

                    <!-- IMAGE -->
                    <div class="relative h-48 w-full overflow-hidden">
                        <img src="{{ asset('img/english.png') }}" class="w-full h-full object-cover">
                        <span
                            class="absolute top-3 left-3 text-xs font-semibold text-black bg-yellow-400/90 px-3 py-1 rounded-full shadow-md">
                            English
                        </span>
                    </div>

                    <!-- CONTENT -->
                    <div class="p-5 pt-2 space-y-3">

                        <div>
                            <h5 class="text-lg font-bold mt-2">English - Movers</h5>
                            <p class="text-sm text-gray-500">Improving communication skills.</p>
                        </div>

                        <!-- ACTIONS -->
                        <div class="flex flex-col sm:flex-row justify-between gap-3 pt-3">

                            <!-- Open Button (same link as card click) -->
                            <button onclick="event.stopPropagation(); window.location='{{ route('staffdetailprogram') }}'"
                                class="w-full sm:w-auto px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white font-semibold rounded-lg transition">
                                🔍 Open
                            </button>

                            <!-- Edit -->
                            <button onclick="event.stopPropagation(); openEditModal()"
                                class="w-full sm:w-auto px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-black font-semibold rounded-lg transition">
                                ✏️ Edit
                            </button>

                            <!-- Delete -->
                            <button onclick="event.stopPropagation(); alert('Delete action (UI only)')"
                                class="w-full sm:w-auto px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-semibold rounded-lg transition">
                                🗑 Delete
                            </button>
                        </div>
                    </div>

                </div>

                <div onclick="window.location='{{ route('staffdetailprogram') }}'"
                    class="bg-[#FBFBFB] rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border-2 hover:border-4 border-indigo-400 hover:border-yellow-400 max-w-sm cursor-pointer">

                    <!-- IMAGE -->
                    <div class="relative h-48 w-full overflow-hidden">
                        <img src="{{ asset('img/english.png') }}" class="w-full h-full object-cover">
                        <span
                            class="absolute top-3 left-3 text-xs font-semibold text-black bg-yellow-400/90 px-3 py-1 rounded-full shadow-md">
                            English
                        </span>
                    </div>

                    <!-- CONTENT -->
                    <div class="p-5 pt-2 space-y-3">

                        <div>
                            <h5 class="text-lg font-bold mt-2">English - Movers</h5>
                            <p class="text-sm text-gray-500">Improving communication skills.</p>
                        </div>

                        <!-- ACTIONS -->
                        <div class="flex flex-col sm:flex-row justify-between gap-3 pt-3">

                            <!-- Open Button (same link as card click) -->
                            <button onclick="event.stopPropagation(); window.location='{{ route('staffdetailprogram') }}'"
                                class="w-full sm:w-auto px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white font-semibold rounded-lg transition">
                                🔍 Open
                            </button>

                            <!-- Edit -->
                            <button onclick="event.stopPropagation(); openEditModal()"
                                class="w-full sm:w-auto px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-black font-semibold rounded-lg transition">
                                ✏️ Edit
                            </button>

                            <!-- Delete -->
                            <button onclick="event.stopPropagation(); alert('Delete action (UI only)')"
                                class="w-full sm:w-auto px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-semibold rounded-lg transition">
                                🗑 Delete
                            </button>
                        </div>
                    </div>

                </div>


            </div>

        </div>
    </div>



    <!-- ==========================
                STATIC MODAL ADD PROGRAM
            =========================== -->

    <div id="modalAddProgram" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">

        <div class="bg-white rounded-2xl shadow-xl p-6 w-[90%] md:w-[40%]">

            <h3 class="text-xl font-bold mb-4 text-blue-500">➕ Add New Program</h3>

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
                    onclick="document.getElementById('modalAddProgram').classList.add('hidden')">
                    Cancel
                </button>

                <button class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg font-semibold">
                    <span class="text-white">Save (UI Only)</span>
                </button>
            </div>

        </div>
    </div>


    <!-- ==========================
                STATIC MODAL EDIT PROGRAM
            =========================== -->

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

@endsection