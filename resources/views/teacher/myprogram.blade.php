@extends('teacher.layoutlms.layout')

@section('pagetitle', 'My Program')

@section('content')

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