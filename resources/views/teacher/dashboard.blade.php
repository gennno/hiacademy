@extends('teacher.layoutlms.layout')

@section('pagetitle', 'Dashboard')

@section('content')

  @if(session('login_success'))
<script>
    Swal.fire({
        title: "Login Berhasil!",
        text: "Selamat datang kembali 👋",
        icon: "success",
        timer: 1800,
        showConfirmButton: false
    });
</script>
@endif
    <div class="grid grid-cols-1 gap-3 mb-6">
        <div
            class="bg-[#FBF9D1] border-4 border-yellow-400 rounded-2xl p-6 shadow-md flex items-center md:justify-start lg:justify-between gap-5">

            <!-- LEFT TEXT -->
            <div class="space-y-2 lg:ml-10">
                <h2 class="text-2xl md:text-5xl font-bold text-gray-800">
                    Welcome back, <span class="text-blue-600">Alex !</span>
                </h2>

                <p class="text-gray-700 text-xl">
                    Continue your learning journey and complete your activities.
                </p>

                <p class="text-gray-700 text-xl font-semibold">
                    Stay consistent — progress comes step by step!
                </p>
            </div>

            <!-- RIGHT IMAGE (locked size + centered shift) -->
            <div class="hidden md:flex flex-shrink-0">
                <img src="{{ asset('img/3.png') }}" class="w-32 md:w-40 lg:w-48" alt="Student Illustration">
            </div>
        </div>
    </div>



    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 mb-6">
        <div
            class="bg-[#FBFBFB] border-2 hover:border-4 border-cyan-400 rounded-2xl hover:shadow-2xl hover:-translate-y-2 duration-300 hover:border-yellow-400 p-5 shadow-md">
            <div class="flex justify-between items-center mb-2">
                <span class="text-3xl">📚</span>
                <span class="bg-blue-500 text-white text-xs px-3 py-1 rounded-full">Active</span>
            </div>
            <h3 class="text-3xl font-bold text-indigo-600 mb-0">5</h3>
            <p class="text-sm text-gray-500 mb-0">Enrolled Programs</p>
        </div>

        <div
            class="bg-[#FBFBFB] border-2 hover:border-4 border-cyan-400 rounded-2xl p-5 hover:shadow-2xl hover:-translate-y-2 duration-300 hover:border-yellow-400 shadow-md">
            <div class="flex justify-between items-center mb-2">
                <span class="text-3xl">✅</span>
                <span class="bg-green-500 text-white text-xs px-3 py-1 rounded-full">Done</span>
            </div>
            <h3 class="text-3xl font-bold text-green-600 mb-0">12</h3>
            <p class="text-sm text-gray-500 mb-0">Completed Tasks</p>
        </div>

        <div
            class="bg-[#FBFBFB] border-2 hover:border-4 border-cyan-400 rounded-2xl p-5 hover:shadow-2xl hover:-translate-y-2 duration-300 hover:border-yellow-400 col-span-2 shadow-md">
            <h5 class="text-lg font-bold mb-4">🏆 My Badges</h5>
            <div class="flex flex-wrap gap-3 justify-center">
                <div class="w-16 h-16 rounded-full flex items-center justify-center text-3xl bg-gradient-to-br from-yellow-400 to-yellow-600 shadow-lg hover:scale-110 hover:rotate-6 transition-transform cursor-pointer"
                    title="Math Master">🧮</div>
                <div class="w-16 h-16 rounded-full flex items-center justify-center text-3xl bg-gradient-to-br from-yellow-400 to-yellow-600 shadow-lg hover:scale-110 hover:rotate-6 transition-transform cursor-pointer"
                    title="Science Star">⭐</div>
                <div class="w-16 h-16 rounded-full flex items-center justify-center text-3xl bg-gradient-to-br from-yellow-400 to-yellow-600 shadow-lg hover:scale-110 hover:rotate-6 transition-transform cursor-pointer"
                    title="Reading Pro">📚</div>
                <div class="w-16 h-16 rounded-full flex items-center justify-center text-3xl bg-gradient-to-br from-yellow-400 to-yellow-600 shadow-lg hover:scale-110 hover:rotate-6 transition-transform cursor-pointer"
                    title="Creative Mind">🎨</div>
                <div class="w-16 h-16 rounded-full flex items-center justify-center text-3xl bg-gradient-to-br from-yellow-400 to-yellow-600 shadow-lg hover:scale-110 hover:rotate-6 transition-transform cursor-pointer"
                    title="Perfect Week">🔥</div>
                <div class="w-16 h-16 rounded-full flex items-center justify-center text-3xl bg-gradient-to-br from-yellow-400 to-yellow-600 shadow-lg hover:scale-110 hover:rotate-6 transition-transform cursor-pointer"
                    title="Quick Learner">⚡</div>
            </div>
        </div>
    </div>

    <!-- My Programs Section -->
    <div class="mb-6">
        <!-- MAIN CARD WRAPPER -->
        <div class="bg-[#FBFBFB] border-4 border-transparent rounded-3xl shadow-xl p-6">

            <!-- HEADER -->
            <h3 class="text-3xl font-bold text-yellow-500 mb-6">📚 My Programs</h3>

            <!-- GRID ITEMS INSIDE -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">

                {{-- Card 1 --}}
                <a href="{{ route('teacherdetailprogram') }}" class="block">
                <div
                    class="bg-[#FBFBFB] rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 cursor-pointer border-2 hover:border-4 border-indigo-400 hover:border-yellow-400 max-w-sm">

                    <!-- IMAGE TOP -->
                    <div class="relative h-48 w-full overflow-hidden">
                        <img src="{{ asset('img/math.png') }}" class="w-full h-full object-cover " alt="Math Image">

                        <!-- CATEGORY TAG ON IMAGE -->
                        <span
                            class="absolute top-3 left-3 text-xs font-semibold text-white bg-indigo-600/90 backdrop-blur-sm px-3 py-1 rounded-full shadow-md">
                            Math
                        </span>
                    </div>

                    <!-- CONTENT -->
                    <div class="p-5 pt-2 flex flex-col gap-4">
                        <div>
                            <h5 class="text-lg font-bold mt-2">Math - Explorer</h5>
                            <p class="text-sm text-gray-500">Joyful and solid numerical foundation.</p>
                        </div>

                        <!-- PROGRESS BAR -->
                        <div class="space-y-2">
                            <div class="h-2.5 bg-indigo-100 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-yellow-400 to-green-600 rounded-full transition-all duration-500"
                                    style="width: 75%"></div>
                            </div>

                            <div class="flex justify-between text-sm">
                                <span class="text-gray-500">75% Complete</span>
                                <span class="font-semibold text-green-600">15/20 Lessons</span>
                            </div>
                        </div>

                    </div>

                </div>
            </a>

                {{-- Card 2 --}}
                <div
                    class="bg-[#FBFBFB] rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 cursor-pointer border-2 hover:border-4 border-indigo-400 hover:border-yellow-400 max-w-sm">

                    <!-- IMAGE TOP -->
                    <div class="relative h-48 w-full overflow-hidden">
                        <img src="{{ asset('img/math.png') }}" class="w-full h-full object-cover " alt="Math Image">

                        <!-- CATEGORY TAG ON IMAGE -->
                        <span
                            class="absolute top-3 left-3 text-xs font-semibold text-white bg-indigo-600/90 backdrop-blur-sm px-3 py-1 rounded-full shadow-md">
                            Math
                        </span>
                    </div>

                    <!-- CONTENT -->
                    <div class="p-5 pt-2 flex flex-col gap-4">
                        <div>
                            <h5 class="text-lg font-bold mt-2">Math - Mavericks</h5>
                            <p class="text-sm text-gray-500">Mastering advanced mathematics.</p>
                        </div>

                        <!-- PROGRESS BAR -->
                        <div class="space-y-2">
                            <div class="h-2.5 bg-indigo-100 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-yellow-400 to-green-600 rounded-full transition-all duration-500"
                                    style="width: 75%"></div>
                            </div>

                            <div class="flex justify-between text-sm">
                                <span class="text-gray-500">75% Complete</span>
                                <span class="font-semibold text-green-600">15/20 Lessons</span>
                            </div>
                        </div>

                    </div>

                </div>

                {{-- Card 3 --}}
                <div
                    class="bg-[#FBFBFB] rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 cursor-pointer border-2 hover:border-4 border-indigo-400 hover:border-yellow-400 max-w-sm">

                    <!-- IMAGE TOP -->
                    <div class="relative h-48 w-full overflow-hidden">
                        <img src="{{ asset('img/english.png') }}" class="w-full h-full object-cover " alt="Math Image">

                        <!-- CATEGORY TAG ON IMAGE -->
                        <span
                            class="absolute top-3 left-3 text-xs font-semibold text-black bg-yellow-400/90 backdrop-blur-sm px-3 py-1 rounded-full shadow-md">
                            English
                        </span>
                    </div>

                    <!-- CONTENT -->
                    <div class="p-5 pt-2 flex flex-col gap-4">
                        <div>
                            <h5 class="text-lg font-bold mt-2">English - Super Movers</h5>
                            <p class="text-sm text-gray-500">Gaining independence in everyday communication.</p>
                        </div>

                        <!-- PROGRESS BAR -->
                        <div class="space-y-2">
                            <div class="h-2.5 bg-indigo-100 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-yellow-400 to-green-600 rounded-full transition-all duration-500"
                                    style="width: 75%"></div>
                            </div>

                            <div class="flex justify-between text-sm">
                                <span class="text-gray-500">75% Complete</span>
                                <span class="font-semibold text-green-600">15/20 Lessons</span>
                            </div>
                        </div>

                    </div>

                </div>

                {{-- Card 4 --}}
                <div
                    class="bg-[#FBFBFB] rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 cursor-pointer border-2 hover:border-4 border-indigo-400 hover:border-yellow-400 max-w-sm">

                    <!-- IMAGE TOP -->
                    <div class="relative h-48 w-full overflow-hidden">
                        <img src="{{ asset('img/mandarin.png') }}" class="w-full h-full object-cover " alt="Math Image">

                        <!-- CATEGORY TAG ON IMAGE -->
                        <span
                            class="absolute top-3 left-3 text-xs font-semibold text-white bg-red-600/90 backdrop-blur-sm px-3 py-1 rounded-full shadow-md">
                            Mandarin
                        </span>
                    </div>

                    <!-- CONTENT -->
                    <div class="p-5 pt-2 flex flex-col gap-4">
                        <div>
                            <h5 class="text-lg font-bold mt-2">Mandarin - Navigator</h5>
                            <p class="text-sm text-gray-500">Achieving independence in daily communication.</p>
                        </div>

                        <!-- PROGRESS BAR -->
                        <div class="space-y-2">
                            <div class="h-2.5 bg-indigo-100 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-yellow-400 to-green-600 rounded-full transition-all duration-500"
                                    style="width: 75%"></div>
                            </div>

                            <div class="flex justify-between text-sm">
                                <span class="text-gray-500">75% Complete</span>
                                <span class="font-semibold text-green-600">15/20 Lessons</span>
                            </div>
                        </div>

                    </div>

                </div>

                {{-- Card 5 --}}
                <div
                    class="bg-[#FBFBFB] rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 cursor-pointer border-2 hover:border-4 border-indigo-400 hover:border-yellow-400 max-w-sm">

                    <!-- IMAGE TOP -->
                    <div class="relative h-48 w-full overflow-hidden">
                        <img src="{{ asset('img/robotic.png') }}" class="w-full h-full object-cover " alt="Math Image">

                        <!-- CATEGORY TAG ON IMAGE -->
                        <span
                            class="absolute top-3 left-3 text-xs font-semibold text-white bg-green-600/90 backdrop-blur-sm px-3 py-1 rounded-full shadow-md">
                            Coding
                        </span>
                    </div>

                    <!-- CONTENT -->
                    <div class="p-5 pt-2 flex flex-col gap-4">
                        <div>
                            <h5 class="text-lg font-bold mt-2">STEM - Python Developer</h5>
                            <p class="text-sm text-gray-500">Mastering the world's most versatile programming language.</p>
                        </div>

                        <!-- PROGRESS BAR -->
                        <div class="space-y-2">
                            <div class="h-2.5 bg-indigo-100 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-yellow-400 to-green-600 rounded-full transition-all duration-500"
                                    style="width: 75%"></div>
                            </div>

                            <div class="flex justify-between text-sm">
                                <span class="text-gray-500">75% Complete</span>
                                <span class="font-semibold text-green-600">15/20 Lessons</span>
                            </div>
                        </div>

                    </div>

                </div>


            </div>
        </div>
    </div>

@endsection