@extends('layouts.layout')

@section('title', 'h!academy Login')
@section('hide-footer')
@endsection
@section('content')
{{-- 🔙 Back & Home Buttons --}}
<div class="absolute top-4 left-4 sm:top-6 sm:left-6 flex items-center gap-4 z-50">

    {{-- Back Button --}}
    <a href="{{ url()->previous() }}"
        class="flex items-center gap-2 text-yellow-400 hover:text-white font-semibold text-sm sm:text-base transition">
        <i class="fa-solid fa-arrow-left text-lg sm:text-xl"></i>
        <span class="hidden sm:inline">Back</span>
    </a>

    {{-- Home Button --}}
    <a href="{{ route('home') }}"
        class="flex items-center gap-2 text-yellow-400 hover:text-white font-semibold text-sm sm:text-base transition">
        <i class="fa-solid fa-house text-lg sm:text-xl"></i>
        <span class="hidden sm:inline">Home</span>
    </a>

</div>
    <div id="background-carousel" class="carousel-container">
        <img src="{{ asset('img/carousel1.webp') }}" class="carousel-slide active" alt="Slide 1" loading="eager">
        <img src="{{ asset('img/carousel2.webp') }}" class="carousel-slide" alt="Slide 2" loading="lazy">
        <img src="{{ asset('img/carousel3.webp') }}" class="carousel-slide" alt="Slide 3" loading="lazy">
    </div>

    <div class="carousel-overlay"></div>

    <style>
        /* ===== SOLUSI UTAMA: Gunakan dvh untuk mobile ===== */
        .carousel-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            /* Desktop: gunakan 100vh */
            height: 100vh;
            /* Mobile: gunakan dvh yang tidak berubah saat URL bar muncul/hilang */
            height: 100dvh;
            overflow: hidden;
            z-index: -10;

            /* GPU Acceleration - PENTING! */
            transform: translate3d(0, 0, 0);
            -webkit-transform: translate3d(0, 0, 0);
            backface-visibility: hidden;
            -webkit-backface-visibility: hidden;

            /* Prevent layout shifts */
            contain: layout style paint;
        }

        .carousel-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            height: 100dvh;
            background-color: rgba(0, 0, 0, 0.6);
            z-index: -10;
            pointer-events: none;

            /* GPU Acceleration */
            transform: translate3d(0, 0, 0);
            backface-visibility: hidden;
        }

        /* Optimized carousel slides */
        .carousel-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            opacity: 0;
            transition: opacity 1.2s ease-in-out;

            /* CRITICAL: GPU layer untuk setiap image */
            transform: translate3d(0, 0, 0);
            -webkit-transform: translate3d(0, 0, 0);
            backface-visibility: hidden;
            -webkit-backface-visibility: hidden;

            /* Prevent interactions */
            pointer-events: none;
            user-select: none;
            -webkit-user-select: none;
            -webkit-touch-callout: none;
        }

        .carousel-slide.active {
            opacity: 1;
            z-index: 1;
        }

        /* Mobile optimizations */
        @media (max-width: 768px) {
            .carousel-container {
                /* Force height calculation once */
                height: 100dvh !important;
                /* Prevent repaints */
                will-change: auto;
            }

            .carousel-slide {
                /* Faster transition on mobile */
                transition: opacity 0.8s ease-in-out;
                /* Ensure stays in GPU */
                transform: translate3d(0, 0, 0) scale(1.001);
            }

            /* Optional: Reduce quality on very small screens */
            @media (max-width: 480px) {
                .carousel-slide {
                    image-rendering: -webkit-optimize-contrast;
                }
            }
        }

        /* Prevent flicker during orientation change */
        @media (orientation: portrait) {

            .carousel-container,
            .carousel-overlay {
                height: 100dvh;
            }
        }

        @media (orientation: landscape) {

            .carousel-container,
            .carousel-overlay {
                height: 100dvh;
            }
        }
    </style>

    {{-- 🔸 Main Section --}}
    <div
        class="w-full min-h-screen grid grid-cols-1  items-center justify-center px-4 sm:px-8 md:px-12 lg:px-20 xl:px-32 py-10 gap-10 md:gap-16 overflow-y-auto">

        {{-- 🔹 Right: Login Form --}}
        <div
            class="bg-black backdrop-blur-md w-full max-w-sm sm:max-w-md md:max-w-lg lg:max-w-md xl:max-w-lg p-6 sm:p-8 md:p-10 rounded-2xl shadow-lg mx-auto">
            <div class="flex justify-center mb-5 sm:mb-6">
                <img src="{{ asset('img/logofull.png') }}" alt="Logo h!academy"
                    class="h-12 sm:h-14 md:h-16 lg:h-20 object-contain">
            </div>

            <form action="{{ route('login.perform') }}" method="POST" class="space-y-4 sm:space-y-5">
                @csrf
                <div>
                    <label for="username" class="block text-xs sm:text-sm text-white font-medium mb-1">Username</label>
                    <input type="text" id="username" name="username" placeholder="PR001" required
                        class="w-full px-3 sm:px-4 py-2 sm:py-2.5 border border-gray-400 rounded-lg bg-transparent text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                    @error('username')
                        <p style="color:red">{{ $message }}</p>
                    @enderror
                </div>


                <div>
                    <label for="password" class="block text-xs sm:text-sm text-white font-medium mb-1">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" required
                        class="w-full px-3 sm:px-4 py-2 sm:py-2.5 border border-gray-400 rounded-lg bg-transparent text-white placeholder-gray-300 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                    @error('password')
                        <p style="color:red">{{ $message }}</p>
                    @enderror
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