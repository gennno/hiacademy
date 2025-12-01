@extends('lms.layoutlms.layout')

@section('title', 'detail-program')

@section('content')

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

@endsection