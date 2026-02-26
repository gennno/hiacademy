@extends('teacher.layoutlms.layout')

@section('pagetitle', 'Program')

@section('content')

  <div class="bg-white rounded-xl shadow-md p-4 mb-2">
    <div class="flex flex-col md:flex-row justify-between items-center gap-6 ">

      <!-- LEFT: BACK BUTTON -->
      <a href="{{ route('teacherdashboard') }}"
        class="flex items-center gap-2 px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg transition">
        <i class="fa-solid fa-arrow-left"></i>
        <span>Back</span>
      </a>

      <!-- RIGHT: PAGE STRUCTURE -->
      <div class="text-gray-600 text-sm md:text-base font-medium">
        <a href="{{ route('teachermyprogram') }}" class="hover:text-indigo-600 cursor-pointer">Program</a>
        <span class="mx-2">/</span>
        <span class="text-indigo-600 font-semibold">
          {{ $program->name }}
        </span>

      </div>

    </div>
  </div>


  <div class="bg-white rounded-xl shadow-md p-8 mb-6">
    <div class="flex flex-col md:flex-row gap-8">

      <div class="md:w-1/4">
        <img src="{{ $program->image
    ? asset($program->image)
    : asset('img/default-program.png') }}" class="h-64 w-auto rounded-lg">
      </div>

      <div class="md:w-3/4">
        <h1 class="text-3xl font-bold mb-4">
          {{ $program->name }}
        </h1>
        <p class="text-gray-600 mb-6">
          {{ $program->description }}
        </p>

        <div class="mb-6">
          <div class="flex justify-between text-sm mb-1">
            <span>Your Progress</span>
            <span>{{ $progressPercent }}%</span>
          </div>

          <div class="w-full bg-gray-200 rounded-full h-3">
            <div class="bg-blue-500 h-3 rounded-full" style="width: {{ $progressPercent }}%"></div>
          </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-6">
          <div>
            <h3 class="font-bold">Lessons</h3>
            <p>{{ $lessons->count() }}</p>
          </div>
        </div>
      </div>

    </div>
  </div>


  <div class="bg-white rounded-xl shadow-md p-8">
    <h2 class="text-2xl font-bold mb-6">Lessons</h2>

    <div class="space-y-4">
      @foreach ($lessons as $index => $lesson)
        <a href="{{ route('teacherlessondetail', [$program->slug, $lesson->id]) }}" class="block border rounded-lg p-4 transition-all
                      hover:bg-blue-50 hover:shadow-md
                      {{ $index === 0 ? 'bg-gray-50' : '' }}">

          <div class="flex items-center justify-between">
            <div>
              <h3 class="font-bold">
                {{ $index + 1 }}. {{ $lesson->title }}
              </h3>

              <p class="text-sm text-gray-500">
               5 Materials
              </p>
            </div>

            {{-- STATUS --}}
            <div class="flex items-center">
              @if ($lesson->is_completed ?? false)
                <span class="text-green-500 mr-2">✓</span>
                <span>Completed</span>

              @elseif (($lesson->progress ?? 0) > 0)
                <span class="text-blue-500 mr-2">
                  {{ $lesson->progress }}%
                </span>
                <div class="w-20 bg-gray-200 rounded-full h-2">
                  <div class="bg-blue-500 h-2 rounded-full" style="width: {{ $lesson->progress }}%"></div>
                </div>

              @else
                <span class="text-sm text-gray-400">✅Completed</span>
              @endif
            </div>
          </div>
        </a>
      @endforeach


    </div>
  </div>

@endsection