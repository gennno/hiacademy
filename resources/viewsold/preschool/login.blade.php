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

        .program-scroll::-webkit-scrollbar {
            height: 6px;
        }

        .program-scroll::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.4);
            border-radius: 10px;
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
    <div class="w-full min-h-screen grid grid-cols-1  items-center justify-center px-4 sm:px-8 md:px-12 lg:px-20 xl:px-32 py-10 gap-10 md:gap-16 overflow-y-auto">

        {{-- 🔹 Right: Login Form --}}
        <div class="bg-[#00809D] backdrop-blur-md w-full max-w-sm sm:max-w-md md:max-w-lg lg:max-w-md xl:max-w-lg p-6 sm:p-8 md:p-10 rounded-2xl shadow-lg mx-auto">
            <div class="flex justify-center mb-5 sm:mb-6">
                <img src="{{ asset('img/logofull.png') }}" alt="Logo h!academy" class="h-12 sm:h-14 md:h-16 lg:h-20 object-contain">
            </div>

            <form action="#" method="POST" class="space-y-4 sm:space-y-5">
                @csrf
                <div>
                    <label for="email" class="block text-xs sm:text-sm text-white font-medium mb-1">Email</label>
                    <input type="email" id="email" name="email" placeholder="you@example.com" required
                        class="w-full px-3 sm:px-4 py-2 sm:py-2.5 border border-gray-400 rounded-lg bg-transparent text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                </div>

                <div>
                    <label for="password" class="block text-xs sm:text-sm text-white font-medium mb-1">Password</label>
                    <input type="password" id="password" name="password" placeholder="********" required
                        class="w-full px-3 sm:px-4 py-2 sm:py-2.5 border border-gray-400 rounded-lg bg-transparent text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                </div>

                <div class="flex flex-wrap items-center justify-between text-xs sm:text-sm gap-2">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="remember" class="form-checkbox text-yellow-400 bg-gray-800">
                        <span class="ml-2 text-white">Remember me</span>
                    </label>
                    <a href="#" class="text-yellow-400 hover:text-yellow-300 transition">Forgot password?</a>
                </div>

                <button type="submit"
                    class="w-full bg-yellow-400 text-black py-2 sm:py-2.5 rounded-lg font-semibold text-sm sm:text-base hover:bg-white transition duration-200">
                    Sign In
                </button>
            </form>
        </div>
    </div>

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
@endsection


