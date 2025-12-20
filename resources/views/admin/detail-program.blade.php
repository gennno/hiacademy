@extends('admin.layoutadmin.layout')

@section('pagetitle', 'Manage Programs')

@section('content')

  <div class="bg-white rounded-xl shadow-md p-4 mb-2">
    <div class="flex flex-col md:flex-row justify-between items-center gap-6 ">

      <!-- LEFT: BACK BUTTON -->
      <a href="{{ route('studentdashboard') }}"
        class="flex items-center gap-2 px-4 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg transition">
        <i class="fa-solid fa-arrow-left"></i>
        <span>Back</span>
      </a>

      <!-- RIGHT: PAGE STRUCTURE -->
      <div class="text-gray-600 text-sm md:text-base font-medium">
        <a href="{{ route('studentmyprogram') }}" class="hover:text-indigo-600 cursor-pointer">Program</a>
        <span class="mx-2">/</span>
        <span class="text-indigo-600 font-semibold">Pre-Nursery</span>
      </div>

    </div>
  </div>


  <div class="bg-white rounded-xl shadow-md p-8 mb-6">
    <div class="flex flex-col md:flex-row gap-8">

      <div class="md:w-1/4">
        <img src="{{ asset('img/math.png') }}" alt="Math Maverick"
          class="h-64 w-auto rounded-lg flex items-center justify-center">
      </div>

      <div class="md:w-3/4">
        <h1 class="text-3xl font-bold mb-4">Math Maverick</h1>
        <p class="text-gray-600 mb-6">
          Master HTML, CSS, and JavaScript to build modern, responsive websites.
          This comprehensive program will take you from beginner to job-ready developer.
        </p>

        <div class="grid grid-cols-2 gap-4 mb-6">
          <div>
            <h3 class="font-bold">Lessons</h3>
            <p>48</p>
          </div>
          <div>
            <h3 class="font-bold">Projects</h3>
            <p>5</p>
          </div>
        </div>
      </div>

    </div>
  </div>


  <div class="bg-white rounded-xl shadow-md p-8">
    <h2 class="text-2xl font-bold mb-6">Course Modules</h2>

    <div class="space-y-4">
      <div class="border rounded-lg p-4 hover:bg-gray-50 transition-colors">
        <div class="flex items-center justify-between">
          <div>
            <h3 class="font-bold">1. HTML Fundamentals</h3>
            <p class="text-sm text-gray-500">8 lessons</p>
          </div>
          <div class="flex items-center">
            <span class="text-green-500 mr-2">✓</span>
            <span>Completed</span>
          </div>
        </div>
      </div>

      <div class="border rounded-lg p-4 hover:bg-gray-50 transition-colors">
        <div class="flex items-center justify-between">
          <div>
            <h3 class="font-bold">2. CSS Styling</h3>
            <p class="text-sm text-gray-500">12 lessons • 6 hours</p>
          </div>
          <div class="flex items-center">
            <span class="text-green-500 mr-2">✓</span>
            <span>Completed</span>
          </div>
        </div>
      </div>

      <div class="border rounded-lg p-4 hover:bg-gray-50 transition-colors bg-blue-50">
        <div class="flex items-center justify-between">
          <div>
            <h3 class="font-bold">3. JavaScript Basics</h3>
            <p class="text-sm text-gray-500">10 lessons • 5 hours</p>
          </div>
          <div class="flex items-center">
            <span class="text-blue-500 mr-2">65%</span>
            <div class="w-20 bg-gray-200 rounded-full h-2">
              <div class="bg-blue-500 h-2 rounded-full" style="width: 65%"></div>
            </div>
          </div>
        </div>
      </div>

      <div class="border rounded-lg p-4 hover:bg-gray-50 transition-colors">
        <div class="flex items-center justify-between">
          <div>
            <h3 class="font-bold">4. Responsive Design</h3>
            <p class="text-sm text-gray-500">6 lessons • 3 hours</p>
          </div>
          <div class="flex items-center">
            <span class="text-gray-400">Locked</span>
          </div>
        </div>
      </div>

      <div class="border rounded-lg p-4 hover:bg-gray-50 transition-colors">
        <div class="flex items-center justify-between">
          <div>
            <h3 class="font-bold">5. Final Project</h3>
            <p class="text-sm text-gray-500">1 project • 8 hours</p>
          </div>
          <div class="flex items-center">
            <span class="text-gray-400">Locked</span>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection