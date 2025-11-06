@extends('layouts.layout')

@section('title', 'h!academy - International Preschool')

@section('content')

    {{-- ✅ HEADER / NAVBAR --}}
    <header id="navbar" class="fixed top-0 left-0 w-full z-50 transition-all duration-500 bg-transparent backdrop-blur-sm">
        <div class="flex items-center justify-between px-6 lg:px-12 py-4 relative z-50">
            {{-- 🔙 Back + Logo --}}
            <div class="flex items-center gap-4">
                <a href="/" class="flex items-center text-yellow-400 hover:text-yellow-300 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                    <span class="hidden sm:inline text-sm font-semibold ml-1">Back</span>
                </a>

                <a href="/preschool#home" class="flex items-center gap-2">
                    <img src="{{ asset('img/logofull.png') }}" alt="Logo"
                        class="h-14 lg:h-16 w-auto hover:scale-105 transition-transform duration-300">
                </a>
            </div>

            {{-- 🌐 Desktop Nav --}}
            <nav id="primary-nav"
                class="hidden xl:flex absolute left-1/2 transform -translate-x-1/2 space-x-8 text-white font-medium tracking-wide">
                <a href="/preschool#home" class="nav-link">Home</a>
                <div class="relative group">
                    <a href="/aboutpreschool" class="nav-link flex items-center">About Us</a>
                    <div
                        class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform -translate-y-2 group-hover:translate-y-0">
                        <div class="py-1">
                            <a href="/preschool#programs"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#F0A04B] hover:text-white">Programs</a>
                            <a href="/preschool#our-centre"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#F0A04B] hover:text-white">Our
                                Centre</a>
                        </div>
                    </div>
                </div>
                <div class="relative group">
                    <a href="/ipc" class="nav-link flex items-center">Curriculum</a>
                    <div
                        class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform -translate-y-2 group-hover:translate-y-0">
                        <div class="py-1">
                            <a href="/preschool#curriculum"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#F0A04B] hover:text-white">Our
                                Curriculum</a>
                            <a href="/ipc"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#F0A04B] hover:text-white">IPC
                                Curriculum</a>
                        </div>
                    </div>
                </div>
                <a href="/admissionpreschool" class="nav-link">Admission Process</a>
                <a href="https://parentinglife.id/" target="_blank" class="nav-link">Parenting</a>
                <a href="#contact" class="nav-link">Contact</a>
            </nav>

            {{-- 📱 Right side --}}
            <div class="flex items-center gap-3">
                <a href="/admissionpreschool#admission"
                    class="hidden lg:inline-flex bg-white text-black px-5 py-2.5 rounded-full text-sm font-semibold shadow hover:bg-gray-100">Apply
                    Now</a>
                <a href="https://calendar.app.google/MvSTNUGe89gkwmAYA"
                    class="hidden lg:inline-flex bg-yellow-400 text-black px-5 py-2.5 rounded-full text-sm font-semibold shadow hover:bg-yellow-300"
                    target="_blank">Schedule
                    Visit</a>
                <a href="/preschool-login"
                    class="hidden xl:inline-flex bg-yellow-400 text-black px-5 py-2.5 rounded-full text-sm font-semibold shadow hover:bg-yellow-300">Login</a>

                {{-- Hamburger --}}
                <button id="menu-btn" class="xl:hidden text-white focus:outline-none" aria-label="Toggle menu">
                    <svg id="menu-icon" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg id="close-icon" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 hidden" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        {{-- 📱 Mobile Menu --}}
        <div id="mobile-menu"
            class="bg-[#00809D]/90 shadow-2xl xl:hidden rounded-3xl mx-4 mt-2 ring-1 ring-yellow-400/50 backdrop-blur-xl overflow-hidden opacity-0 pointer-events-none max-h-0 transition-all duration-300">
            <nav class="flex flex-col divide-y divide-yellow-400/30 text-yellow-200 font-medium">
                <a href="/preschool#home" class="px-6 py-4 hover:bg-yellow-400/15 hover:text-yellow-400 nav-link-mobile">🏠
                    Home</a>
                <a href="/aboutpreschool" class="px-6 py-4 hover:bg-yellow-400/15 hover:text-yellow-400 nav-link-mobile">ℹ️
                    About Us</a>
                <a href="/preschool#programs"
                    class="px-6 py-4 hover:bg-yellow-400/15 hover:text-yellow-400 nav-link-mobile">🎯
                    Programs</a>
                <a href="/preschool#our-centre"
                    class="px-6 py-4 hover:bg-yellow-400/15 hover:text-yellow-400 nav-link-mobile">🏫 Our
                    Centre</a>
                <a href="/preschool#curriculum"
                    class="px-6 py-4 hover:bg-yellow-400/15 hover:text-yellow-400 nav-link-mobile">📘 Our
                    Curriculum</a>
                <a href="/ipc" class="px-6 py-4 hover:bg-yellow-400/15 hover:text-yellow-400 nav-link-mobile">🌍
                    IPC Curriculum</a>
                <a href="/admissionpreschool"
                    class="px-6 py-4 hover:bg-yellow-400/15 hover:text-yellow-400 nav-link-mobile">📚 Admission Process</a>
                <a href="https://parentinglife.id/" target="_blank"
                    class="px-6 py-4 hover:bg-yellow-400/15 hover:text-yellow-400 nav-link-mobile">👨‍👩‍👧 Parenting</a>
                <a href="#contact" class="px-6 py-4 hover:bg-yellow-400/15 hover:text-yellow-400 nav-link-mobile">📞
                    Contact</a>

                {{-- 🔘 Tombol Apply & Schedule Visit (Side by Side) --}}
                <div class="px-6 py-5 bg-yellow-400/10 flex items-center justify-center gap-3">
                    <a href="/admissionpreschool#admission"
                        class="flex-1 inline-flex items-center justify-center bg-yellow-400 text-black py-3 rounded-full font-semibold text-sm shadow hover:bg-yellow-300 transition">
                        🚀 Apply Now
                    </a>
                    <a href="https://calendar.app.google/MvSTNUGe89gkwmAYA" target="_blank"
                        class="flex-1 inline-flex items-center justify-center bg-yellow-400 text-black py-3 rounded-full font-semibold text-sm shadow hover:bg-yellow-300 transition">
                        📅 Schedule Visit
                    </a>
                </div>

                {{-- 🔐 Tombol Login --}}
                <div class="px-6 py-5 bg-yellow-400/10 text-center">
                    <a href="/preschool-login"
                        class="inline-flex items-center justify-center bg-yellow-400 text-black w-full py-3 rounded-full font-semibold text-sm shadow hover:bg-yellow-300 transition">
                        🔐 Login
                    </a>
                </div>
            </nav>
        </div>

    </header>
    {{-- ✅ STYLES --}}
    <style>
        html {
            scroll-behavior: smooth;
        }

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

        .nav-link,
        .nav-link-mobile {
            position: relative;
            display: inline-block;
            padding-bottom: .25rem;
        }

        .nav-link::after,
        .nav-link-mobile::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -0.12rem;
            height: 2px;
            width: 0%;
            background: rgba(251, 191, 36, 1);
            border-radius: 999px;
            transition: width .22s ease;
        }

        .nav-link:hover::after,
        .nav-link-mobile:hover::after {
            width: 100%;
        }

        .nav-link:hover {
            color: #facc15;
            text-shadow: 0 0 10px rgba(250, 204, 21, 0.6);
        }

        #mobile-menu {
            transition: all 0.4s ease-in-out;
        }

        #mobile-menu.show {
            opacity: 1;
            pointer-events: auto;
        }
    </style>

    {{-- ✅ SINGLE NAVBAR SCRIPT (NO DUPLICATES!) --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const menuBtn = document.getElementById('menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            const menuIcon = document.getElementById('menu-icon');
            const closeIcon = document.getElementById('close-icon');
            const navbar = document.getElementById('navbar');

            let isMenuOpen = false;

            /* ---------- Mobile Menu Toggle ---------- */
            function openMobileMenu() {
                isMenuOpen = true;
                mobileMenu.classList.add('show');
                mobileMenu.style.maxHeight = mobileMenu.scrollHeight + 'px';
                menuIcon.classList.add('hidden');
                closeIcon.classList.remove('hidden');
                menuBtn.setAttribute('aria-expanded', 'true');
            }

            function closeMobileMenu() {
                isMenuOpen = false;
                mobileMenu.style.maxHeight = '0px';
                setTimeout(() => mobileMenu.classList.remove('show'), 400);
                menuIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
                menuBtn.setAttribute('aria-expanded', 'false');
            }

            // Toggle on button click
            menuBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                if (isMenuOpen) {
                    closeMobileMenu();
                } else {
                    openMobileMenu();
                }
            });

            // Close when clicking a link in mobile menu
            mobileMenu.addEventListener('click', (e) => {
                const link = e.target.closest('a');
                if (!link) return;

                if (link.getAttribute('href') && link.getAttribute('href').startsWith('#')) {
                    closeMobileMenu();
                }
            });

            // Close menu when resizing to desktop
            window.addEventListener('resize', () => {
                if (window.innerWidth >= 1280 && isMenuOpen) {
                    closeMobileMenu();
                }
            });

            /* ---------- Navbar Scroll Background ---------- */
            function handleScroll() {
                if (window.scrollY > 50) {
                    navbar.classList.add('bg-[#00809D]/70', 'backdrop-blur-md', 'shadow-lg');
                    navbar.classList.remove('bg-transparent');
                } else {
                    navbar.classList.add('bg-transparent');
                    navbar.classList.remove('bg-[#00809D]/70', 'backdrop-blur-md', 'shadow-lg');
                }
            }

            handleScroll();
            window.addEventListener('scroll', handleScroll, { passive: true });
        });
    </script>

    {{-- About --}}
    <section id="about" class="relative py-20 pt-36 bg-[#C0D6E8] overflow-hidden">
        {{-- Decorative background elements --}}
        <div class="absolute top-0 left-0 w-40 h-40 bg-[#B1C29E]/40 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-56 h-56 bg-[#FADA7A]/40 rounded-full blur-3xl"></div>

        <div class="relative z-10 max-w-6xl mx-auto px-6 md:px-12">
            <div class="flex flex-col lg:flex-row items-start gap-12" data-aos="fade-up">
                {{-- Kolom kiri untuk teks --}}
                <div class="lg:w-1/2 pt-12 text-left">
                    <h2
                        class="text-4xl md:text-5xl font-mono font-extrabold max-w-2xl text-white mb-4 uppercase tracking-wide">
                        Admission Process
                    </h2>
                    <p class="text-md text-black font-sans text-base md:text-md leading-relaxed">
                        Explore the essential steps of enrollment for your child to embark on an exciting journey of
                        learning and discovery at h!academy.
                    </p>
                </div>

                {{-- Kolom kanan untuk gambar --}}
                <div class="lg:w-1/2 flex justify-center lg:justify-end">
                    <img src="{{ asset('img/carousel7.jpg') }}" alt="About h!aacademy"
                        class="rounded-lg shadow-lg w-full max-w-md lg:max-w-full object-cover">
                </div>
            </div>
        </div>
    </section>
    <style>
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        @keyframes float-delayed {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-30px);
            }
        }

        @keyframes bounce-slow {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-15px);
            }
        }

        @keyframes spin-slow {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        .animate-float-delayed {
            animation: float-delayed 8s ease-in-out infinite;
        }

        .animate-bounce-slow {
            animation: bounce-slow 3s ease-in-out infinite;
        }

        .animate-spin-slow {
            animation: spin-slow 20s linear infinite;
        }
    </style>

    <section id="admission"
        class="relative py-20 pt-36 bg-gradient-to-br from-[#C0D6E8] via-[#B1C29E]/20 to-[#FADA7A]/30 overflow-hidden">
        {{-- Playful floating elements --}}
        <div class="absolute top-10 left-10 w-20 h-20 bg-[#F0A04B]/30 rounded-full blur-2xl animate-float"></div>
        <div class="absolute top-40 right-20 w-32 h-32 bg-[#B1C29E]/40 rounded-full blur-3xl animate-float-delayed"></div>
        <div class="absolute bottom-20 left-1/4 w-24 h-24 bg-[#FADA7A]/40 rounded-full blur-2xl animate-float"></div>

        {{-- Decorative shapes --}}
        <div class="absolute top-20 right-10 text-[#F0A04B]/20 text-6xl animate-bounce-slow">★</div>
        <div class="absolute bottom-40 left-20 text-[#B1C29E]/20 text-5xl animate-spin-slow">✦</div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 md:px-12">

            {{-- Step Cards with fun animations --}}
            <div class="space-y-8">

                {{-- STEP 1 --}}
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden" data-aos="fade-up">
                    {{-- Header --}}
                    <div class="bg-gradient-to-r from-[#3AAEDB] to-[#5BC0DE] p-8 text-center">
                        <h3 class="text-3xl md:text-4xl font-bold text-white uppercase tracking-wide mb-2">
                            STEP 1 DOCUMENT PREPARATION
                        </h3>
                        <p class="text-white/90 text-lg">
                            The following documents are required to be submitted with the application form.
                        </p>
                    </div>

                    {{-- Icon Grid --}}
                    <div class="p-8 md:p-12 bg-white">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
                            {{-- Item 01 --}}
                            <div
                                class="flex flex-col items-center text-center group hover:transform hover:scale-105 transition-all duration-300">
                                <div
                                    class="w-28 h-28 bg-[#E8F4F8] rounded-full flex items-center justify-center mb-4 group-hover:bg-[#3AAEDB]/20 transition-colors duration-300">
                                    <svg class="w-14 h-14 text-[#3AAEDB]" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <div class="text-4xl font-bold text-[#3AAEDB] mb-2">01</div>
                                <p class="text-gray-700 text-sm leading-relaxed">
                                    Photocopy of Child's birth certificate
                                </p>
                            </div>

                            {{-- Item 02 --}}
                            <div
                                class="flex flex-col items-center text-center group hover:transform hover:scale-105 transition-all duration-300">
                                <div
                                    class="w-28 h-28 bg-[#E8F4F8] rounded-full flex items-center justify-center mb-4 group-hover:bg-[#3AAEDB]/20 transition-colors duration-300">
                                    <svg class="w-14 h-14 text-[#3AAEDB]" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="text-4xl font-bold text-[#3AAEDB] mb-2">02</div>
                                <p class="text-gray-700 text-sm leading-relaxed">
                                    Photocopy of Child's passport (photo page only)
                                </p>
                            </div>

                            {{-- Item 03 --}}
                            <div
                                class="flex flex-col items-center text-center group hover:transform hover:scale-105 transition-all duration-300">
                                <div
                                    class="w-28 h-28 bg-[#E8F4F8] rounded-full flex items-center justify-center mb-4 group-hover:bg-[#3AAEDB]/20 transition-colors duration-300">
                                    <svg class="w-14 h-14 text-[#3AAEDB]" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                                <div class="text-4xl font-bold text-[#3AAEDB] mb-2">03</div>
                                <p class="text-gray-700 text-sm leading-relaxed">
                                    Photocopy of Parents' passports/Thai identification cards (photo page only)
                                </p>
                            </div>

                            {{-- Item 04 --}}
                            <div
                                class="flex flex-col items-center text-center group hover:transform hover:scale-105 transition-all duration-300">
                                <div
                                    class="w-28 h-28 bg-[#E8F4F8] rounded-full flex items-center justify-center mb-4 group-hover:bg-[#3AAEDB]/20 transition-colors duration-300">
                                    <svg class="w-14 h-14 text-[#3AAEDB]" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                </div>
                                <div class="text-4xl font-bold text-[#3AAEDB] mb-2">04</div>
                                <p class="text-gray-700 text-sm leading-relaxed">
                                    Photocopy of Child's house registration (for Thai applicants only)
                                </p>
                            </div>
                        </div>

                        {{-- Second Row --}}
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-4xl mx-auto">
                            {{-- Item 05 --}}
                            <div
                                class="flex flex-col items-center text-center group hover:transform hover:scale-105 transition-all duration-300">
                                <div
                                    class="w-28 h-28 bg-[#E8F4F8] rounded-full flex items-center justify-center mb-4 group-hover:bg-[#3AAEDB]/20 transition-colors duration-300">
                                    <svg class="w-14 h-14 text-[#3AAEDB]" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                    </svg>
                                </div>
                                <div class="text-4xl font-bold text-[#3AAEDB] mb-2">05</div>
                                <p class="text-gray-700 text-sm leading-relaxed">
                                    Photocopy of Child's immunization record
                                </p>
                            </div>

                            {{-- Item 06 --}}
                            <div
                                class="flex flex-col items-center text-center group hover:transform hover:scale-105 transition-all duration-300">
                                <div
                                    class="w-28 h-28 bg-[#E8F4F8] rounded-full flex items-center justify-center mb-4 group-hover:bg-[#3AAEDB]/20 transition-colors duration-300">
                                    <svg class="w-14 h-14 text-[#3AAEDB]" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div class="text-4xl font-bold text-[#3AAEDB] mb-2">06</div>
                                <p class="text-gray-700 text-sm leading-relaxed">
                                    Child's passport-size photo
                                </p>
                            </div>

                            {{-- Item 07 --}}
                            <div
                                class="flex flex-col items-center text-center group hover:transform hover:scale-105 transition-all duration-300">
                                <div
                                    class="w-28 h-28 bg-[#E8F4F8] rounded-full flex items-center justify-center mb-4 group-hover:bg-[#3AAEDB]/20 transition-colors duration-300">
                                    <svg class="w-14 h-14 text-[#3AAEDB]" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v4m0 4v8" />
                                    </svg>
                                </div>
                                <div class="text-4xl font-bold text-[#3AAEDB] mb-2">07</div>
                                <p class="text-gray-700 text-sm leading-relaxed">
                                    Medical certificates regarding medical conditions, allergies, long-term medication, or
                                    treatment (if any)
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- STEP 2 --}}
                <div class="group bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 overflow-hidden border-4 border-[#FADA7A]/20 hover:border-[#FADA7A] hover:-translate-y-2"
                    data-aos="fade-left">
                    <div class="bg-gradient-to-r from-[#FADA7A] to-[#F0A04B] p-6 relative overflow-hidden">
                        <div class="absolute -right-10 -top-10 text-white/10 text-9xl font-bold">2</div>
                        <div class="relative flex items-center gap-4">
                            <div
                                class="w-16 h-16 bg-white rounded-full flex items-center justify-center shadow-lg group-hover:rotate-12 transition-transform duration-500">
                                <span class="text-3xl">📝</span>
                            </div>
                            <div>
                                <h3 class="text-2xl md:text-3xl font-bold text-gray-800 uppercase tracking-wide">STEP 2
                                    Application
                                    Form Submission</h3>
                                <p class="text-gray-700 mt-1">Submit your completed form</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-8 bg-gradient-to-br from-white to-[#FFFBEA]">
                        <p class="text-gray-700 text-lg mb-6 leading-relaxed">
                            Complete the application form and submit it to us via email or visit our school office in
                            person. Our friendly admissions team is ready to assist you!
                        </p>

                        <div class="flex flex-wrap gap-4">
                            <a href="{{ asset('file/3.2-Application-Form-hiacademy.pdf') }}" target="_blank"
                                rel="noopener noreferrer">
                                <button
                                    class="flex items-center gap-3 bg-gradient-to-r from-[#F0A04B] to-[#FADA7A] text-white px-8 py-4 rounded-full font-bold shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300">
                                    <span class="text-2xl">⬇️</span>
                                    <span>Application Form</span>
                                </button>
                            </a>

                            <a href="mailto:info@hiacademy.id"
                                class="flex items-center gap-3 bg-white border-2 border-[#F0A04B] text-[#F0A04B] px-8 py-4 rounded-full font-bold shadow-lg hover:bg-[#F0A04B] hover:text-white hover:scale-105 transition-all duration-300">
                                <span class="text-2xl">✉️</span>
                                <span>Email Form</span>
                            </a>

                        </div>
                    </div>
                </div>

                {{-- STEP 3 (Slider Version) --}}
                <div class="group bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 overflow-hidden border-4 border-[#B1C29E]/20 hover:border-[#B1C29E] hover:-translate-y-2"
                    data-aos="fade-right">
                    <div class="bg-gradient-to-r from-[#B1C29E] to-[#7FB069] p-6 relative overflow-hidden">
                        <div class="absolute -right-10 -top-10 text-white/10 text-9xl font-bold">3</div>
                        <div class="relative flex items-center gap-4">
                            <div
                                class="w-16 h-16 bg-white rounded-full flex items-center justify-center shadow-lg group-hover:rotate-12 transition-transform duration-500">
                                <span class="text-3xl">🎓</span>
                            </div>
                            <div>
                                <h3 class="text-2xl md:text-3xl font-bold text-white uppercase tracking-wide">
                                    Step 3 Review & Placement
                                </h3>
                                <p class="text-white/90 mt-1">We'll find the perfect fit for your child</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-8 bg-gradient-to-br from-white to-[#F0FDF4]">
                        <!-- Swiper Container -->
                        <div class="relative group">
                            <!-- Navigation Buttons -->
                            <button
                                class="review-prev absolute left-0 top-1/2 transform -translate-y-1/2 z-10 bg-white/90 hover:bg-white text-[#7FB069] p-3 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition-all duration-300 hover:scale-110 -ml-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </button>

                            <button
                                class="review-next absolute right-0 top-1/2 transform -translate-y-1/2 z-10 bg-white/90 hover:bg-white text-[#7FB069] p-3 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition-all duration-300 hover:scale-110 -mr-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                    </path>
                                </svg>
                            </button>

                            <!-- Swiper Wrapper -->
                            <div class="swiper review-swiper">
                                <div class="swiper-wrapper">

                                    <!-- Slide 1 -->
                                    <div class="swiper-slide">
                                        <div class="bg-white rounded-2xl overflow-hidden shadow-lg">
                                            <img src="{{ asset('img/13.webp') }}" alt="Pre-Nursery"
                                                class="w-full h-56 object-cover">
                                            <div class="p-6 text-center">
                                                <h4 class="text-xl font-bold text-[#2C7DA0] mb-1">PRE-NURSERY</h4>
                                                <p class="text-gray-600">18–24 months</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Slide 2 -->
                                    <div class="swiper-slide">
                                        <div class="bg-white rounded-2xl overflow-hidden shadow-lg">
                                            <img src="{{ asset('img/18.webp') }}" alt="Nursery"
                                                class="w-full h-56 object-cover">
                                            <div class="p-6 text-center">
                                                <h4 class="text-xl font-bold text-[#2C7DA0] mb-1">NURSERY</h4>
                                                <p class="text-gray-600">2+ years</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Slide 3 -->
                                    <div class="swiper-slide">
                                        <div class="bg-white rounded-2xl overflow-hidden shadow-lg">
                                            <img src="{{ asset('img/15.webp') }}" alt="Kindergarten 1"
                                                class="w-full h-56 object-cover">
                                            <div class="p-6 text-center">
                                                <h4 class="text-xl font-bold text-[#2C7DA0] mb-1">KINDERGARTEN 1</h4>
                                                <p class="text-gray-600">3+ years</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Slide 4 -->
                                    <div class="swiper-slide">
                                        <div class="bg-white rounded-2xl overflow-hidden shadow-lg">
                                            <img src="{{ asset('img/16.webp') }}" alt="Kindergarten 2"
                                                class="w-full h-56 object-cover">
                                            <div class="p-6 text-center">
                                                <h4 class="text-xl font-bold text-[#2C7DA0] mb-1">KINDERGARTEN 2</h4>
                                                <p class="text-gray-600">4+ years</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="bg-white rounded-2xl overflow-hidden shadow-lg">
                                            <img src="{{ asset('img/17.webp') }}" alt="Kindergarten 2"
                                                class="w-full h-56 object-cover">
                                            <div class="p-6 text-center">
                                                <h4 class="text-xl font-bold text-[#2C7DA0] mb-1">KINDERGARTEN 3</h4>
                                                <p class="text-gray-600">5+ years</p>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <!-- Pagination -->
                                <div class="swiper-pagination mt-6"></div>
                            </div>
                        </div>

                        <!-- Note -->
                        <p class="mt-8 text-center text-gray-600 text-sm md:text-base">
                            To maintain diversity, nationalities, and genders are also taken into consideration when
                            assigning students to classes.
                        </p>
                    </div>
                </div>



                {{-- STEP 4 --}}
                <div class="group bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 overflow-hidden border-4 border-[#00809D]/20 hover:border-[#00809D] hover:-translate-y-2"
                    data-aos="fade-left">
                    <div class="bg-gradient-to-r from-[#00809D] to-[#0EA5E9] p-6 relative overflow-hidden">
                        <div class="absolute -right-10 -top-10 text-white/10 text-9xl font-bold">4</div>
                        <div class="relative flex items-center gap-4">
                            <div
                                class="w-16 h-16 bg-white rounded-full flex items-center justify-center shadow-lg group-hover:rotate-12 transition-transform duration-500">
                                <span class="text-3xl">🎉</span>
                            </div>
                            <div>
                                <h3 class="text-2xl md:text-3xl font-bold text-white uppercase tracking-wide">step 4
                                    Enrollment &
                                    Welcome!</h3>
                                <p class="text-white/90 mt-1">Secure your child's place</p>
                            </div>
                        </div>
                    </div>

                    <div class="p-8 bg-gradient-to-br from-white to-[#F0F9FF]">
                        <p class="text-gray-700 text-lg leading-relaxed mb-6">
                            Once your child receives an offer, we'll send you an invoice for the <strong>registration
                                fee</strong>. This non-refundable fee secures your child's place in our learning family.
                        </p>

                        <div
                            class="bg-gradient-to-r from-[#F0A04B]/10 to-[#FADA7A]/10 p-6 rounded-2xl border-2 border-dashed border-[#F0A04B]">
                            <div class="flex items-start gap-4">
                                <span class="text-3xl">💡</span>
                                <div>
                                    <h4 class="font-bold text-gray-800 mb-2 text-lg">What Happens Next?</h4>
                                    <p class="text-gray-700">The tuition fee invoice will be sent one month before your
                                        child's first day. Get ready for an amazing learning adventure!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="why-choose-us" class="relative py-16 md:py-20 bg-gradient-to-br from-white to-[#FEF9E7] overflow-hidden">
        <!-- Decorative background elements -->
        <div class="absolute top-0 left-0 w-40 h-40 bg-[#B1C29E]/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-56 h-56 bg-[#FADA7A]/20 rounded-full blur-3xl"></div>
        <div class="absolute top-1/4 right-10 w-20 h-20 bubble opacity-30"></div>
        <div class="absolute bottom-1/3 left-10 w-16 h-16 bubble opacity-40"></div>

        <div class="relative z-10 max-w-6xl mx-auto px-6 md:px-12">
            <!-- Header Section -->
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-xl md:text-2xl font-bold text-[#F0A04B] mb-6 uppercase tracking-wide">
                    WHY CHOOSE h!academy?
                </h2>
                <div class="w-24 h-2 bg-[#FADA7A] rounded-full mx-auto mb-8"></div>

                <div class="max-w-4xl mx-auto">
                    <p class="text-md md:text-lg text-gray-700 mb-6 leading-relaxed">
                        At h!academy, we believe the right foundation sets the stage for a successful academic journey.
                        Choosing the perfect school for your child is a crucial decision, and we understand the challenges
                        that come with it.
                    </p>

                    <p class="text-md md:text-lg text-gray-700 leading-relaxed">
                        In the vibrant educational landscape of Indonesia, h!academy aims to nurture each child's
                        development by promoting a sense of self-esteem, accomplishment, confidence, and independence using
                        objective play and inquiry-based learning approaches.
                    </p>
                </div>
            </div>

            <!-- Divider -->
            <div class="flex items-center justify-center my-12">
                <div class="h-px bg-gradient-to-r from-transparent via-[#F0A04B] to-transparent w-3/4"></div>
            </div>

            <!-- Reasons Section -->
            <div class="mb-16" data-aos="fade-up">
                <h3 class="text-lg md:text-xl font-bold text-[#F0A04B] mb-8 text-center">HERE ARE 6 REASONS WHY:</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Reason 1 -->
                    <div
                        class="flex items-start gap-4 p-4 transition-all duration-300 hover:bg-[#FEF9E7] hover:rounded-lg group">
                        <div
                            class="bg-[#F0A04B] p-3 rounded-full text-white group-hover:scale-110 transition-transform duration-500 flex-shrink-0">
                            <i class="fas fa-brain text-lg"></i>
                        </div>
                        <div>
                            <h4 class="text-base font-bold text-gray-800">Fostering the 3Qs: IQ, EQ, and CQ</h4>
                        </div>
                    </div>

                    <!-- Reason 2 -->
                    <div
                        class="flex items-start gap-4 p-4 transition-all duration-300 hover:bg-[#FEF9E7] hover:rounded-lg group">
                        <div
                            class="bg-[#FADA7A] p-3 rounded-full text-white group-hover:scale-110 transition-transform duration-500 flex-shrink-0">
                            <i class="fas fa-user-graduate text-lg"></i>
                        </div>
                        <div>
                            <h4 class="text-base font-bold text-gray-800">Highly-qualified, passionate, and well-trained
                                staff</h4>
                        </div>
                    </div>

                    <!-- Reason 3 -->
                    <div
                        class="flex items-start gap-4 p-4 transition-all duration-300 hover:bg-[#FEF9E7] hover:rounded-lg group">
                        <div
                            class="bg-[#B1C29E] p-3 rounded-full text-white group-hover:scale-110 transition-transform duration-500 flex-shrink-0">
                            <i class="fas fa-school text-lg"></i>
                        </div>
                        <div>
                            <h4 class="text-base font-bold text-gray-800">Nurturing and equipped environment that is
                                conducive to learning and teaching</h4>
                        </div>
                    </div>

                    <!-- Reason 4 -->
                    <div
                        class="flex items-start gap-4 p-4 transition-all duration-300 hover:bg-[#FEF9E7] hover:rounded-lg group">
                        <div
                            class="bg-[#F0A04B] p-3 rounded-full text-white group-hover:scale-110 transition-transform duration-500 flex-shrink-0">
                            <i class="fas fa-handshake text-lg"></i>
                        </div>
                        <div>
                            <h4 class="text-base font-bold text-gray-800">Close and effective partnership with parents</h4>
                        </div>
                    </div>

                    <!-- Reason 5 -->
                    <div
                        class="flex items-start gap-4 p-4 transition-all duration-300 hover:bg-[#FEF9E7] hover:rounded-lg group">
                        <div
                            class="bg-[#FADA7A] p-3 rounded-full text-white group-hover:scale-110 transition-transform duration-500 flex-shrink-0">
                            <i class="fas fa-map-marker-alt text-lg"></i>
                        </div>
                        <div>
                            <h4 class="text-base font-bold text-gray-800">Convenient locations</h4>
                        </div>
                    </div>

                    <!-- Reason 6 -->
                    <div
                        class="flex items-start gap-4 p-4 transition-all duration-300 hover:bg-[#FEF9E7] hover:rounded-lg group">
                        <div
                            class="bg-[#B1C29E] p-3 rounded-full text-white group-hover:scale-110 transition-transform duration-500 flex-shrink-0">
                            <i class="fas fa-award text-lg"></i>
                        </div>
                        <div>
                            <h4 class="text-base font-bold text-gray-800">Excellent and well-accepted early childhood
                                curriculum: IPC</h4>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Call to Action --}}
            <div class="mt-16 text-center" data-aos="zoom-in">
                <div class="bg-gradient-to-r from-[#F0A04B] via-[#FADA7A] to-[#B1C29E] p-12 rounded-3xl shadow-2xl">
                    <h3 class="text-3xl md:text-4xl font-bold text-white mb-4">Ready to Begin?</h3>
                    <p class="text-white/90 text-lg mb-8 max-w-2xl mx-auto">Join our vibrant community and give your child
                        the foundation for lifelong learning!</p>

                    <div class="flex flex-wrap justify-center gap-4">
                        <a href="https://calendar.app.google/MvSTNUGe89gkwmAYA" target="_blank"
                            class="bg-white text-[#F0A04B] px-10 py-4 rounded-full font-bold text-lg shadow-lg hover:scale-105 hover:shadow-xl transition-all duration-300">
                            📞 Schedule Visit
                        </a>
                        <a href="/admissionpreschool#admission"
                            class="bg-[#00809D] text-white px-10 py-4 rounded-full font-bold text-lg shadow-lg hover:scale-105 hover:shadow-xl transition-all duration-300">
                            ✍️ Apply Now
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact" class="relative bg-gradient-to-b from-gray-800 to-black text-white pt-20 overflow-hidden">

        <!-- Floating Gradient Effect -->
        <div class="absolute inset-0 bg-gradient-to-tr from-blue-800/20 via-transparent to-yellow-400/10 animate-pulse">
        </div>

        <!-- Footer Content -->
        <div class="relative z-10 container mx-auto px-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12">

                <!-- Column 1: Mascot + Connect + Contact -->
                <div class="space-y-10 animate-fadeInUp" data-aos="fade-up" data-aos-duration="800">
                    <img src="{{ asset('img/2.png') }}" alt="h!academy logo"
                        class="w-56 md:w-72 drop-shadow-xl hover:scale-105 transition duration-500 mx-auto sm:mx-0">

                    <!-- Connect with Us -->
                    <div>
                        <h5 class="text-lg font-semibold mb-4 text-yellow-400">Connect with Us</h5>
                        <div class="flex gap-4 justify-center sm:justify-start">

                            <!-- Facebook -->
                            <a href="#"
                                class="w-12 h-12 flex items-center justify-center rounded-full bg-white/10 hover:bg-blue-500 hover:scale-110 transition transform duration-300">
                                <i class="fab fa-facebook-f text-xl"></i>
                            </a>

                            <!-- Instagram -->
                            <a href="#"
                                class="w-12 h-12 flex items-center justify-center rounded-full bg-white/10 hover:bg-pink-500 hover:scale-110 transition transform duration-300">
                                <i class="fab fa-instagram text-xl"></i>
                            </a>

                            <!-- YouTube -->
                            <a href="#"
                                class="w-12 h-12 flex items-center justify-center rounded-full bg-white/10 hover:bg-red-500 hover:scale-110 transition transform duration-300">
                                <i class="fab fa-youtube text-xl"></i>
                            </a>

                        </div>

                        <!-- Contact Button -->
                        <a href="#"
                            class="inline-flex items-center gap-2 mt-6 bg-yellow-400 text-blue-900 font-semibold px-6 py-3 rounded-full shadow-lg hover:bg-white hover:scale-105 transition duration-300">
                            <i class="fa-solid fa-message"></i> Whatsapp Us
                        </a>
                        <a href="#"
                            class="inline-flex items-center gap-2 mt-6 bg-white text-blue-900 font-semibold px-6 py-3 rounded-full shadow-lg hover:bg-yellow-300 hover:scale-105 transition duration-300">
                            <i class="fa-solid fa-message"></i> Email Us
                        </a>
                    </div>

                </div>

                <!-- Column 2: Why Choose Us -->
                <div class="space-y-6 animate-fadeInUp" data-aos="fade-up" data-aos-delay="50" data-aos-duration="800">
                    <h3 class="text-3xl md:text-4xl font-bold leading-tight">
                        <span class="bg-gradient-to-r text-yellow-400 bg-clip-text drop-shadow-md">
                            Nurturing Bright Futures
                        </span><br>with Love & Hope
                    </h3>
                    <p class="text-gray-300 text-lg leading-relaxed">
                        At <span class="text-yellow-400 font-semibold">h!academy</span>, learning is more than just
                        education — it's a joyful journey filled with growth, inspiration, and care for every learner.
                    </p>
                    <a href="/admissionpreschool#admission"
                        class="inline-flex items-center gap-3 bg-yellow-400 text-blue-900 text-lg font-semibold px-8 py-4 rounded-full shadow-lg hover:bg-yellow-300 hover:scale-105 transition duration-300">
                        Join Now
                    </a>
                </div>

                <!-- Column 3: Consultation Hours + Quick Links -->
                <div class="space-y-8 animate-fadeInUp" data-aos="fade-up" data-aos-delay="50" data-aos-duration="800">

                    <!-- Consultation Hours -->
                    <div class="hover:scale-[1.02] transition duration-300">
                        <h5 class="text-xl font-bold mb-4 text-yellow-400">Consultation Hour</h5>
                        <div class="space-y-3 text-sm">
                            <!-- Weekdays -->
                            <div
                                class="flex items-center justify-between p-3 rounded-xl bg-white/10 hover:bg-white/20 transition duration-300">
                                <span class="flex items-center gap-2"><i class="fa-solid fa-briefcase text-yellow-300"></i>
                                    Weekdays</span>
                                <span class="text-green-400 font-medium">08:00 - 16:00</span>
                            </div>
                            <!-- Saturday -->
                            <div
                                class="flex items-center justify-between p-3 rounded-xl bg-white/10 hover:bg-white/20 transition duration-300">
                                <span class="flex items-center gap-2"><i
                                        class="fa-solid fa-calendar-days text-yellow-400"></i> Saturday</span>
                                <span class="text-green-400 font-medium">08:00 - 14:00</span>
                            </div>
                            <!-- Sunday -->
                            <div class="flex items-center justify-between p-3 rounded-xl bg-white/10">
                                <span class="flex items-center gap-2"><i
                                        class="fa-solid fa-xmark-circle text-yellow-400"></i>
                                    Sunday</span>
                                <span class="text-red-400 font-semibold">Closed</span>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="hover:scale-[1.02] transition duration-300">
                        <h5 class="text-xl font-bold mb-4 text-yellow-400">Quick Links</h5>
                        <ul class="grid grid-cols-1 gap-3 text-gray-300 text-base">
                            <li><a href="#" class="hover:text-yellow-400 transition flex items-center gap-2"><i
                                        class="fa-solid fa-book-open"></i> Book Free Trial</a></li>
                            <li><a href="#" class="hover:text-yellow-400 transition flex items-center gap-2"><i
                                        class="fa-solid fa-pen-to-square"></i> Register Now</a></li>
                            <li><a href="{{ route('loginindex') }}"
                                    class="hover:text-yellow-400 transition flex items-center gap-2"><i
                                        class="fa-solid fa-user-graduate"></i> Student Login</a></li>
                            <li><a href="#" class="hover:text-yellow-400 transition flex items-center gap-2"><i
                                        class="fa-solid fa-phone"></i> Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Copyright -->
            <div
                class="mt-16 bg-yellow-400/80 py-4 text-center text-black text-sm relative z-10 border-t rounded-full border-blue-800/40">
                © 2025 h!academy | Powered by <span class="text-white font-semibold">DayR</span>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button id="backToTopBtn"
        class="hidden fixed bottom-6 right-6 bg-yellow-400 text-black font-semibold p-3 rounded-full shadow-lg hover:bg-white transition-colors duration-300 z-50">
        ↑
    </button>
    <script>
        let currentlyOpen = null;

        function toggleDropdown(type) {
            const dropdown = document.getElementById(`${type}-dropdown`);
            const icon = document.getElementById(`${type}-icon`);

            // Jika dropdown yang sama diklik lagi, tutup
            if (currentlyOpen === type) {
                dropdown.classList.remove('max-h-96', 'opacity-100');
                dropdown.classList.add('max-h-0', 'opacity-0');
                icon.textContent = '+';
                icon.classList.remove('rotate-45');
                currentlyOpen = null;
                return;
            }

            // Tutup dropdown yang sebelumnya terbuka
            if (currentlyOpen) {
                const prevDropdown = document.getElementById(`${currentlyOpen}-dropdown`);
                const prevIcon = document.getElementById(`${currentlyOpen}-icon`);

                if (prevDropdown && prevIcon) {
                    prevDropdown.classList.remove('max-h-96', 'opacity-100');
                    prevDropdown.classList.add('max-h-0', 'opacity-0');
                    prevIcon.textContent = '+';
                    prevIcon.classList.remove('rotate-45');
                }
            }

            // Buka dropdown yang baru
            dropdown.classList.remove('max-h-0', 'opacity-0');
            dropdown.classList.add('max-h-96', 'opacity-100');
            icon.textContent = '×';
            icon.classList.add('rotate-45');

            currentlyOpen = type;
        }
    </script>
    <script>
        const backToTopBtn = document.getElementById("backToTopBtn");

        window.addEventListener("scroll", () => {
            if (window.scrollY > 100) {
                backToTopBtn.classList.remove("hidden");
            } else {
                backToTopBtn.classList.add("hidden");
            }
        });

        backToTopBtn.addEventListener("click", () => {
            window.scrollTo({ top: 0, behavior: "smooth" });
        });
    </script>

    {{-- AOS Animation --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            AOS.init({
                duration: 1000,
                once: true
            });
        });
    </script>
    <!-- Swiper JS & CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            new Swiper(".review-swiper", {
                slidesPerView: 1,
                spaceBetween: 24,
                loop: true,
                navigation: {
                    nextEl: ".review-next",
                    prevEl: ".review-prev",
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                breakpoints: {
                    768: {
                        slidesPerView: 2,
                    },
                    1024: {
                        slidesPerView: 3,
                    },
                },
            });
        });
    </script>

@endsection