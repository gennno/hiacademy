@extends('layouts.layout')

@section('title', 'h!academy Login')

@section('content')
    {{-- 🔙 Back Button --}}
    <a href="{{ route('home') }}"
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

        /* Admin Panel Styles */
        #admin-panel {
            opacity: 0;
            transform: scale(0.9);
            transition: all 0.3s ease;
            pointer-events: none;
        }

        #admin-panel.active {
            opacity: 1;
            transform: scale(1);
            pointer-events: all;
        }

        .secret-spot {
            position: absolute;
            width: 40px;
            height: 40px;
            cursor: pointer;
            z-index: 40;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Background carousel
            const slides = document.querySelectorAll('#background-carousel .carousel-slide');
            let currentIndex = 0;
            setInterval(() => {
                slides[currentIndex].classList.remove('active');
                currentIndex = (currentIndex + 1) % slides.length;
                slides[currentIndex].classList.add('active');
            }, 4000);

            // Admin panel functionality
            const adminPanel = document.getElementById('admin-panel');
            const closeAdminBtn = document.getElementById('close-admin');
            const secretSpot = document.getElementById('secret-spot');

            // Toggle admin panel when secret spot is clicked
            secretSpot.addEventListener('click', () => {
                adminPanel.classList.add('active');
            });

            // Close admin panel
            closeAdminBtn.addEventListener('click', () => {
                adminPanel.classList.remove('active');
            });

            // Close admin panel when clicking outside
            adminPanel.addEventListener('click', (e) => {
                if (e.target === adminPanel) {
                    adminPanel.classList.remove('active');
                }
            });
        });
    </script>

    {{-- Secret Admin Spot (hidden in mascot) --}}
    <div id="secret-spot" class="secret-spot" style="top: 50%; left: 50%; transform: translate(-50%, -50%);"></div>

    {{-- 🔸 Main Section --}}
    <div class="w-full min-h-screen flex flex-col items-center justify-center px-4 sm:px-8 md:px-12 lg:px-20 xl:px-32 py-10 gap-10 md:gap-16 overflow-y-auto">

        {{-- 🟡 Program Selection + Mascot --}}
        <div class="flex flex-col items-center text-center space-y-6 max-w-6xl w-full text-white">
            <div class="flex flex-col md:flex-row items-center gap-4 sm:gap-6 relative">
                <img src="{{ asset('img/8.png') }}" alt="Mascot"
                    class="w-24 sm:w-32 md:w-48 lg:w-56 animate-float drop-shadow-lg cursor-pointer" 
                    onclick="document.getElementById('admin-panel').classList.add('active')">
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
                        ['name' => 'International Preschool', 'icon' => 'fa-seedling', 'color' => 'border-yellow-400 hover:bg-yellow-400', 'url' => '/preschool-login'],
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

    {{-- Hidden Admin Login Panel --}}
    <div id="admin-panel" class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50 p-4">
        <div class="bg-gray-900 rounded-2xl p-6 sm:p-8 max-w-md w-full border-2 border-yellow-500 relative">
            {{-- Close Button --}}
            <button id="close-admin" class="absolute top-4 right-4 text-gray-400 hover:text-white transition">
                <i class="fa-solid fa-xmark text-xl"></i>
            </button>

            {{-- Admin Login Form --}}
            <div class="text-center mb-6">
                <i class="fa-solid fa-user-shield text-yellow-500 text-4xl mb-4"></i>
                <h2 class="text-2xl font-bold text-white">Admin Access</h2>
                <p class="text-gray-400 mt-2">Restricted area - authorized personnel only</p>
            </div>

            <form action="" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="admin-email" class="block text-sm font-medium text-gray-300 mb-1">Admin ID</label>
                    <input type="text" id="admin-email" name="email" 
                           class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent"
                           placeholder="Enter admin ID" required>
                </div>
                
                <div>
                    <label for="admin-password" class="block text-sm font-medium text-gray-300 mb-1">Password</label>
                    <input type="password" id="admin-password" name="password" 
                           class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent"
                           placeholder="Enter password" required>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-yellow-600 focus:ring-yellow-500 border-gray-700 rounded bg-gray-800">
                        <label for="remember" class="ml-2 block text-sm text-gray-300">Remember me</label>
                    </div>
                    <a href="#" class="text-sm text-yellow-500 hover:text-yellow-400">Forgot password?</a>
                </div>

                <button type="submit" 
                        class="w-full bg-yellow-600 hover:bg-yellow-700 text-white font-semibold py-3 px-4 rounded-lg transition duration-300 transform hover:scale-105">
                    Access Admin Panel
                </button>
            </form>

            <div class="mt-6 text-center">
                <p class="text-xs text-gray-500">For security reasons, all access attempts are logged</p>
            </div>
        </div>
    </div>
    
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
@endsection