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
                    Welcome back, <span class="text-blue-600">Teacher</span>
                </h2>

                <p class="text-gray-700 text-xl">
                    Continue your Teaching journey and complete your activities.
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


    <!-- My Programs Section -->
    <div class="mb-6">
        <!-- MAIN CARD WRAPPER -->
        <div class="bg-[#FBFBFB] border-4 border-transparent rounded-3xl shadow-xl p-6">

            <!-- HEADER -->
            <h3 class="text-3xl font-bold text-yellow-500 mb-6">📚 My Programs</h3>

            <!-- GRID ITEMS INSIDE -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">

@foreach ($programs as $program)
<a href="{{ route('teacherdetailprogram', $program->slug) }}"
   class="block">

    <div
        class="bg-[#FBFBFB] rounded-3xl shadow-lg overflow-hidden
               hover:shadow-2xl transition-all duration-300
               hover:-translate-y-2 border-2 hover:border-4
               border-indigo-400 hover:border-yellow-400 max-w-sm
               cursor-pointer">

        <!-- IMAGE -->
        <div class="relative h-48 w-full overflow-hidden">
            <img src="{{ $program->image
                ? asset($program->image)
                : asset('img/default-program.png') }}"
                class="w-full h-full object-cover">

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

            <span
                class="absolute top-3 left-3 text-xs font-semibold
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

            <!-- PROGRESS BAR (placeholder) -->
            <div class="space-y-2">

                <div class="flex justify-between text-sm">
                    <span class="text-gray-500">3 Student Enrolled</span>
                    <span class="font-semibold text-green-600">20 Lessons</span>
                </div>
            </div>
        </div>
    </div>

</a>
@endforeach



            </div>
        </div>
    </div>

@endsection