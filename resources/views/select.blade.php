@extends('layouts.layout')

@section('title', 'h!academy Login')

@section('content')
    {{-- 🔙 Back Button --}}
    <a href="{{ url()->previous() }}"
       class="absolute top-4 left-4 sm:top-6 sm:left-6 flex items-center gap-2 text-yellow-400 hover:text-white font-semibold text-sm sm:text-base transition z-50">
        <i class="fa-solid fa-arrow-left text-lg sm:text-xl"></i>
        <span class="hidden sm:inline">Back</span>
    </a>

    {{-- 🔄 Background Carousel --}}
    <div id="background-carousel" class="fixed inset-0 w-full h-full overflow-hidden -z-10">
        <img src="{{ asset('img/carousel1.jpg') }}" class="carousel-slide active" alt="Slide 1">
        <img src="{{ asset('img/carousel2.jpg') }}" class="carousel-slide" alt="Slide 2">
        <img src="{{ asset('img/carousel3.jpg') }}" class="carousel-slide" alt="Slide 3">
        <img src="{{ asset('img/carousel4.jpg') }}" class="carousel-slide" alt="Slide 4">
        <img src="{{ asset('img/carousel5.jpg') }}" class="carousel-slide" alt="Slide 5">
    </div>

    {{-- Overlay --}}
    <div class="fixed inset-0 bg-black bg-opacity-60 -z-10"></div>

    <style>
        #background-carousel img.carousel-slide {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0;
            transition: opacity 1.5s ease-in-out;
            transform: scale(1.05);
        }

        #background-carousel img.carousel-slide.active {
            opacity: 1;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const slides = document.querySelectorAll('#background-carousel .carousel-slide');
            let currentIndex = 0;
            setInterval(() => {
                slides[currentIndex].classList.remove('active');
                currentIndex = (currentIndex + 1) % slides.length;
                slides[currentIndex].classList.add('active');
            }, 4000);
        });
    </script>

    {{-- 🔸 Main Section --}}
    <div class="w-full min-h-screen flex flex-col items-center justify-center px-4 sm:px-8 md:px-12 lg:px-20 xl:px-32 py-10 gap-10 md:gap-16 overflow-y-auto">

        {{-- 🟡 Program Selection + Mascot --}}
        <div class="flex flex-col items-center text-center space-y-6 max-w-6xl w-full text-white">
            <div class="flex flex-col md:flex-row items-center gap-4 sm:gap-6">
                <img src="{{ asset('img/masc_3.png') }}" alt="Mascot"
                    class="w-24 sm:w-32 md:w-48 lg:w-56 animate-float drop-shadow-lg">
                <div>
                    <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold text-yellow-400 mb-2">
                        Choose Your Program
                    </h2>
                    <p class="text-gray-300 text-sm sm:text-base md:text-lg leading-relaxed max-w-md mx-auto md:mx-0">
                        Select one of our programs below to access your dedicated h!academy portal.
                    </p>
                </div>
            </div>

            {{-- Grid Layout for Programs --}}
            <div class="mt-4 w-full">
                @php
                    $programs = [
                        ['name' => 'International Preschool', 'icon' => 'fa-seedling', 'color' => 'border-yellow-400 hover:bg-yellow-400'],
                        ['name' => 'Child Development Program', 'icon' => 'fa-child', 'color' => 'border-cyan-400 hover:bg-cyan-400'],
                        ['name' => 'English Program', 'icon' => 'fa-book-open', 'color' => 'border-green-400 hover:bg-green-400'],
                        ['name' => 'Mandarin Program', 'icon' => 'fa-language', 'color' => 'border-red-500 hover:bg-red-500'],
                        ['name' => 'Math Program', 'icon' => 'fa-square-root-variable', 'color' => 'border-purple-400 hover:bg-purple-400'],
                        ['name' => 'STEM & Coding', 'icon' => 'fa-robot', 'color' => 'border-indigo-400 hover:bg-indigo-400'],
                        ['name' => 'Design Program', 'icon' => 'fa-pen-nib', 'color' => 'border-pink-400 hover:bg-pink-400'],
                        ['name' => 'Creative Arts', 'icon' => 'fa-palette', 'color' => 'border-orange-400 hover:bg-orange-400'],
                        ['name' => 'Parenting life Indonesia', 'icon' => 'fa-users', 'color' => 'border-teal-400 hover:bg-teal-400'],
                    ];
                @endphp

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6 gap-4 sm:gap-5 md:gap-6">
                    @foreach ($programs as $program)
                        <a href="{{ $program['url'] ?? '#' }}"
                            class="group bg-white/10 {{ $program['color'] }} border rounded-xl p-4 sm:p-5 flex flex-col items-center justify-center hover:text-black transition-all transform hover:scale-105 duration-300 h-full min-h-[140px]">
                            <i class="fa-solid {{ $program['icon'] }} text-xl sm:text-2xl md:text-3xl mb-2 sm:mb-3 group-hover:animate-bounce"></i>
                            <h4 class="font-semibold text-center text-xs sm:text-sm md:text-base leading-tight">{{ $program['name'] }}</h4>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
@endsection