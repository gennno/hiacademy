@extends('teacher.layoutlms.layout')

@section('pagetitle', 'My Program')

@section('content')

    <!-- My Programs Section -->
    <div class="mb-6">
        <!-- MAIN CARD WRAPPER -->
        <div class="bg-[#FBFBFB] border-4 border-transparent rounded-3xl shadow-xl p-6">

            <!-- HEADER -->
            <h3 class="text-3xl font-bold text-yellow-500 mb-6">📚 My Programs</h3>

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
                <div class="h-2.5 bg-indigo-100 rounded-full overflow-hidden">
                    <div class="h-full bg-gradient-to-r from-yellow-400 to-green-600 rounded-full"
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
@endforeach

            </div>
        </div>
    </div>

@endsection