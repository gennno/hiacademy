@extends('layouts.layout')

@section('title', 'h!academy')

@section('content')
    {{-- 🔄 Background Carousel --}}
    <div id="background-carousel" class="fixed inset-0 w-full h-full overflow-hidden -z-10">
        <img src="{{ asset('img/carousel1.jpg') }}" class="carousel-slide active" alt="Slide 1">
        <img src="{{ asset('img/carousel2.jpg') }}" class="carousel-slide" alt="Slide 2">
        <img src="{{ asset('img/carousel3.jpg') }}" class="carousel-slide" alt="Slide 3">
        <img src="{{ asset('img/carousel4.jpg') }}" class="carousel-slide" alt="Slide 4">
        <img src="{{ asset('img/carousel5.jpg') }}" class="carousel-slide" alt="Slide 5">
        <img src="{{ asset('img/carousel6.jpg') }}" class="carousel-slide" alt="Slide 6">
        <img src="{{ asset('img/carousel7.jpg') }}" class="carousel-slide" alt="Slide 7">
    </div>

    {{-- 🔲 Overlay (agar teks tetap jelas di atas gambar) --}}
    <div class="fixed inset-0 bg-black bg-opacity-60 -z-10"></div>

    <style>
        /* Style dasar untuk tiap slide */
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

        /* Slide aktif akan terlihat */
        #background-carousel img.carousel-slide.active {
            opacity: 1;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const slides = document.querySelectorAll('#background-carousel .carousel-slide');
            let currentIndex = 0;

            function showNextSlide() {
                slides[currentIndex].classList.remove('active');
                currentIndex = (currentIndex + 1) % slides.length;
                slides[currentIndex].classList.add('active');
            }

            // Ganti gambar tiap 6 detik (bisa diubah sesuai kebutuhan)
            setInterval(showNextSlide, 3000);
        });
    </script>


    <header id="main-header" class="fixed top-0 left-0 w-full z-50">
        <!-- Background Layer -->
        <div id="header-bg" class="absolute inset-0 bg-transparent transition-all duration-500"></div>

        <!-- NAV CONTAINER -->
        <div class="relative flex items-center justify-between px-6 lg:px-12 py-4">
            <!-- Logo -->
            <a href="#home" class="flex items-center gap-3 flex-shrink-0 z-40" aria-label="Go to home">
                <img src="{{ asset('img/logofull.png') }}" alt="Logo"
                    class="h-14 lg:h-16 w-auto hover:scale-105 transition-transform duration-300">
            </a>

            <!-- NAV (centered on viewport) - visible on lg+ -->
            <nav id="primary-nav"
                class="hidden lg:flex absolute left-1/2 transform -translate-x-1/2 items-center space-x-10 text-white font-medium tracking-wide z-50"
                role="navigation" aria-label="Primary Navigation">
                <a href="#home" class="nav-link" data-target="home">Home</a>
                <a href="#about" class="nav-link" data-target="about">About Us</a>
                <a href="#programs" class="nav-link" data-target="programs">Programs</a>
                <a href="#contact" class="nav-link" data-target="contact">Contact Us</a>
            </nav>

            <!-- Visual container (desktop only) -->
            <div id="visual-container"
                class="hidden lg:flex items-center justify-end pl-10 pr-6 py-3 bg-white/10 backdrop-blur-md rounded-full ring-1 ring-yellow-400/30 shadow-lg transition-all duration-300 absolute z-30"
                style="right:1rem;">
                <a href="/login"
                    class="inline-flex items-center gap-2 bg-yellow-400 text-black px-5 py-2.5 rounded-full text-sm font-semibold shadow hover:bg-yellow-300 hover:shadow-yellow-400/40 transition-transform transform hover:-translate-y-0.5">
                    <span>Login</span>
                </a>
            </div>

            <!-- Hamburger Button (mobile + tablet) -->
            <button id="menu-btn" class="lg:hidden text-white focus:outline-none z-50" aria-controls="mobile-menu"
                aria-expanded="false" aria-label="Toggle menu">
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

        <!-- Mobile/Tablet Menu -->
        <div id="mobile-menu"
            class="overflow-hidden transition-all duration-500 ease-in-out bg-black/90 shadow-2xl lg:hidden rounded-3xl mt-2 mx-4 ring-1 ring-yellow-400/50 backdrop-blur-xl opacity-0 pointer-events-none"
            style="max-height:0px;" aria-hidden="true">
            <nav class="flex flex-col divide-y divide-yellow-400/30 text-yellow-200 font-medium">
                <a href="#home"
                    class="px-6 py-4 hover:bg-yellow-400/15 hover:text-yellow-400 transition nav-link-mobile rounded-t-3xl"
                    data-target="home">🏠 Home</a>
                <a href="#about" class="px-6 py-4 hover:bg-yellow-400/15 hover:text-yellow-400 transition nav-link-mobile"
                    data-target="about">ℹ️ About</a>
                <a href="#programs"
                    class="px-6 py-4 hover:bg-yellow-400/15 hover:text-yellow-400 transition nav-link-mobile"
                    data-target="programs">🎯 Programs</a>
                <a href="#contact" class="px-6 py-4 hover:bg-yellow-400/15 hover:text-yellow-400 transition nav-link-mobile"
                    data-target="contact">📞 Contact</a>

                <div class="px-6 py-5 bg-yellow-400/10 text-center">
                    <a href="/login"
                        class="inline-flex items-center justify-center gap-2 bg-yellow-400 text-black w-full py-3 rounded-full font-semibold text-sm shadow hover:bg-yellow-300 hover:shadow-yellow-400/40 transition-transform transform hover:-translate-y-0.5">
                        <span>🔐</span><span>Login</span>
                    </a>
                </div>
            </nav>
        </div>
    </header>

    <style>
        html {
            scroll-behavior: smooth;
        }

        /* Nav underline */
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

        /* Mobile menu visible state */
        #mobile-menu.show {
            opacity: 1;
            pointer-events: auto;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const menuBtn = document.getElementById('menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            const menuIcon = document.getElementById('menu-icon');
            const closeIcon = document.getElementById('close-icon');
            const headerBg = document.getElementById('header-bg');
            const visual = document.getElementById('visual-container');
            const nav = document.getElementById('primary-nav');

            /* ---------- Mobile toggle ---------- */
            function openMobileMenu() {
                mobileMenu.classList.add('show');
                mobileMenu.style.maxHeight = mobileMenu.scrollHeight + 'px';
                menuIcon.classList.add('hidden');
                closeIcon.classList.remove('hidden');
                menuBtn.setAttribute('aria-expanded', 'true');
            }
            function closeMobileMenu() {
                mobileMenu.style.maxHeight = '0px';
                setTimeout(() => mobileMenu.classList.remove('show'), 350);
                menuIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
                menuBtn.setAttribute('aria-expanded', 'false');
            }

            menuBtn.addEventListener('click', () => {
                if (mobileMenu.classList.contains('show')) closeMobileMenu();
                else openMobileMenu();
            });

            mobileMenu.addEventListener('click', (e) => {
                const link = e.target.closest('a');
                if (!link) return;
                if (link.getAttribute('href') && link.getAttribute('href').startsWith('#')) {
                    closeMobileMenu();
                }
            });

            /* ---------- Scroll background ---------- */
            function handleScroll() {
                if (window.scrollY > 20) {
                    headerBg.classList.add('bg-black', 'backdrop-blur-md', 'shadow-lg');
                    headerBg.classList.remove('bg-transparent');
                } else {
                    headerBg.classList.add('bg-transparent');
                    headerBg.classList.remove('bg-black', 'backdrop-blur-md', 'shadow-lg');
                }
            }
            handleScroll();
            window.addEventListener('scroll', handleScroll, { passive: true });

            /* ---------- Adjust visual container (lg+) ---------- */
            function adjustVisualContainer() {
                if (!visual || !nav) return;

                if (window.innerWidth < 1024) {
                    visual.style.display = 'none';
                    visual.style.left = '';
                    visual.style.maxWidth = '';
                    visual.style.minWidth = '';
                    return;
                }

                visual.style.display = 'flex';

                const navRect = nav.getBoundingClientRect();
                const navWidth = navRect.width;
                const navCenterX = (navRect.left + navRect.right) / 2;

                const extraLeftPadding = 32;
                const rightSpacing = 16;

                let leftPos = Math.round(navCenterX - navWidth / 2 - extraLeftPadding);
                leftPos = Math.max(8, leftPos);

                visual.style.left = leftPos + 'px';

                const maxWidth = window.innerWidth - leftPos - rightSpacing;
                visual.style.maxWidth = maxWidth + 'px';
                visual.style.minWidth = (navWidth + 180) + 'px';
            }

            // Close mobile menu when resizing to desktop
            window.addEventListener('resize', () => {
                if (window.innerWidth >= 1024 && mobileMenu.classList.contains('show')) {
                    mobileMenu.style.maxHeight = '0px';
                    mobileMenu.classList.remove('show');
                    menuIcon.classList.remove('hidden');
                    closeIcon.classList.add('hidden');
                    menuBtn.setAttribute('aria-expanded', 'false');
                }
                adjustVisualContainer();
            });

            setTimeout(adjustVisualContainer, 50);
            window.addEventListener('load', adjustVisualContainer);
            window.addEventListener('resize', adjustVisualContainer);
        });
    </script>


    {{-- Hero Section --}}
    <section id="home" class="pt-32 pb-56 bg-transparent relative overflow-hidden">

        {{-- Swiper container --}}
        <div class="swiper heroSwiper relative z-10">
            <div class="swiper-wrapper">

                {{-- SLIDE 1 --}}
                <div class="swiper-slide relative min-h-[70vh] flex items-center">
                    <div class="absolute right-0 w-full md:w-3/5 lg:w-3/4 px-6 lg:px-24 text-right">
                        <h2 class="text-lg md:text-xl font-light tracking-wide mb-4 text-gray-200">
                            <span class="text-yellow-300 font-medium">h!</span><span class="text-white">academy</span>
                        </h2>

                        <h1
                            class="text-4xl pb-8 hero-animate hero-title md:text-6xl font-semibold text-white leading-tight mb-6 tracking-tight">
                            Your One-Stop Education Center
                        </h1>

                        <p
                            class="text-base hero-animate hero-text md:text-lg text-gray-300 leading-relaxed font-normal max-w-xl ml-auto">
                            At h!academy, we are committed to nurturing young minds through a comprehensive range of
                            programs
                            tailored for the future,
                            <br>
                            helping every student thrive in a globalized world.
                        </p>

                        <div class="mt-10">
                            <a href="#programs"
                                class="inline-block hero-animate hero-btn bg-yellow-400 text-blue-900 font-medium px-8 py-3 rounded-lg shadow-md hover:bg-yellow-300 hover:shadow-yellow-400/40 transition-transform transform hover:-translate-y-0.5">
                                Explore Our Programs →
                            </a>
                        </div>
                    </div>
                </div>

                {{-- SLIDE 2 --}}
                <div class="swiper-slide relative min-h-[70vh] flex items-center">
                    <div class="absolute right-0 w-full md:w-3/5 lg:w-3/4 px-6 lg:px-24 text-right">
                        <h2 class="text-lg md:text-xl font-light tracking-wide mb-4 text-gray-200">
                            <span class="text-yellow-300  font-medium">h!</span><span class="text-white">academy</span>
                        </h2>

                        <h1
                            class="text-4xl pb-8 hero-animate hero-title md:text-6xl font-semibold text-white leading-tight mb-6 tracking-tight">
                            Nurturing Bright Futures with Hope
                        </h1>

                        <p
                            class="text-base hero-animate hero-text md:text-lg text-gray-300 leading-relaxed font-normal max-w-xl ml-auto">
                            Join our engaging, future-focused programs designed to empower students through personalized,
                            hands-on learning experiences.
                        </p>

                        <div class="mt-10">
                            <a href="{{ route('booktrial') }}"
                                class="inline-block hero-animate hero-btn bg-yellow-400 text-blue-900 font-medium px-8 py-3 rounded-lg shadow-md hover:bg-yellow-300 hover:shadow-yellow-400/40 transition-transform transform hover:-translate-y-0.5">
                                Book Free Trial →
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Navigation arrows --}}
            <div class="hidden lg:flex absolute inset-y-0 left-0 items-center justify-center">
                <div class="swiper-button-prev !text-white !scale-75"></div>
            </div>
            <div class="hidden lg:flex absolute inset-y-0 right-0 items-center justify-center">
                <div class="swiper-button-next !text-white !scale-75"></div>
            </div>

            {{-- Pagination --}}
            <div class="swiper-pagination !bottom-8"></div>
        </div>

        {{-- Maskot --}}
        <div class="absolute left-1/2 bottom-[0rem] md:bottom-[0rem] transform -translate-x-1/2 z-20">
            <img src="{{ asset('img/1.png') }}" alt="Mascot Transition"
                class="w-40 md:w-56 drop-shadow-2xl animate-bounce-slow">
        </div>

    </section>

    {{-- About Section --}}
    <section id="about"
        class="bg-gray-800/50 pt-36 pb-10 relative backdrop-blur-md rounded-2xl shadow-xl text-center -mt-16">
        <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row items-center justify-between gap-10">

            <!-- Kolom Teks -->
            <div class="md:w-1/2 space-y-6 text-left" data-aos="fade-up" data-aos-delay="100">
                <h1 class="text-4xl md:text-5xl text-white font-semibold leading-tight tracking-tight">
                    About <span class="text-yellow-300 font-semibold">h!</span><span
                        class="text-white font-semibold">academy</span>
                </h1>

                <p class="text-lg sm:text-base lg:text-xl leading-relaxed text-gray-100 font-light">
                    HiAcademy is a one-stop center for modern education, dedicated to equipping students with the skills and
                    confidence to thrive in a globalized world.


                </p>

                <p class="mt-3 sm:mt-4 text-lg sm:text-base lg:text-xl leading-relaxed text-gray-100 font-light">
                    We move beyond traditional tutoring with a holistic approach that blends modern teaching methods and
                    hands-on learning to spark curiosity, foster creativity, and build confidence.

                </p>

                <div class="flex flex-col sm:flex-row gap-4 mt-6" data-aos="fade-up" data-aos-delay="200">
                    <a href="#contact"
                        class="border border-yellow-300 text-yellow-300 px-6 py-3 text-base font-medium rounded-md hover:bg-yellow-300 hover:text-black transition duration-300">
                        Talk to Us
                    </a>
                    <a href="{{ route('booktrial') }}"
                        class="bg-yellow-300 text-black px-6 py-3 text-base font-medium rounded-md shadow-md hover:bg-yellow-200 transition duration-300">
                        Free Trial →
                    </a>
                </div>
            </div>

            {{-- Image gallery --}}
{{-- Image gallery --}}
<div class="grid grid-cols-2 gap-4" data-aos="fade-right">
    <!-- Image 1 -->
    <div class="relative rounded-2xl overflow-hidden shadow-md group cursor-pointer">
        <img src="{{ asset('img/preschool.png') }}" alt="Ruang Kelas"
            class="object-cover w-full h-52 md:h-60 lg:h-64 transition-transform duration-500 group-hover:scale-110">
        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/70 transition-all duration-500 flex items-center justify-center">
            <div class="text-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-200 px-4">
                <h3 class="text-lg font-bold mb-2">Early Childhood Education</h3>
                <p class="text-sm">International Preschool, Child Development</p>
            </div>
        </div>
    </div>

    <!-- Image 2 -->
    <div class="relative rounded-2xl overflow-hidden shadow-md group cursor-pointer">
        <img src="{{ asset('img/mandarin.png') }}" alt="Perpustakaan"
            class="object-cover w-full h-52 md:h-60 lg:h-64 transition-transform duration-500 group-hover:scale-110">
        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/70 transition-all duration-500 flex items-center justify-center">
            <div class="text-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-200 px-4">
                <h3 class="text-lg font-bold mb-2">Core Academics</h3>
                <p class="text-sm">Math, English, and Mandarin Programs</p>
            </div>
        </div>
    </div>

    <!-- Image 3 -->
    <div class="relative rounded-2xl overflow-hidden shadow-md group cursor-pointer">
        <img src="{{ asset('img/robotic.png') }}" alt="Pusat Olahraga"
            class="object-cover w-full h-52 md:h-60 lg:h-64 transition-transform duration-500 group-hover:scale-110">
        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/70 transition-all duration-500 flex items-center justify-center">
            <div class="text-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-200 px-4">
                <h3 class="text-lg font-bold mb-2">Future Skills</h3>
                <p class="text-sm">STEM & Coding, Design Program, Creative Arts</p>
            </div>
        </div>
    </div>

    <!-- Image 4 -->
    <div class="relative rounded-2xl overflow-hidden shadow-md group cursor-pointer">
        <img src="{{ asset('img/parenting.jpg') }}" alt="Asrama"
            class="object-cover w-full h-52 md:h-60 lg:h-64 transition-transform duration-500 group-hover:scale-110">
        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/70 transition-all duration-500 flex items-center justify-center">
            <div class="text-center text-white opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-200 px-4">
                <h3 class="text-lg font-bold mb-2">Parent Support</h3>
                <p class="text-sm">Parenting life Indonesia</p>
            </div>
        </div>
    </div>
</div>
        </div>
    </section>

    <!-- Programs Section -->
    <section id="programs" class="py-24 px-6 text-center bg-white/1 text-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up" data-aos-delay="100">
                <h2 class="text-3xl sm:text-4xl font-bold text-yellow-400 mt-2">
                    Our Programs
                </h2>
                <p class="mt-4 text-gray-200 max-w-3xl mx-auto">
                    We offer a tailored learning pathway for every child:

                    Early Childhood Education: International Preschool, Child Development

                    Core Academics: Math, English, and Mandarin Programs

                    Future Skills: STEM & Coding, Design Program, Creative Arts

                    Parent Support: Parenting life Indonesia.
                    <br>

                    At HiAcademy, we don't just teach for school—we prepare students for life. Discover the difference where
                    a brighter future begins.
                </p>
            </div>

            <!-- Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10 place-items-center">

                <!-- Card Example -->
                <div class="relative w-72 h-80 mx-auto rounded-xl overflow-hidden shadow-lg group cursor-pointer border-2 border-yellow-400"
                    data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset('img/preschool.png') }}" class="absolute inset-0 w-full h-full object-cover" alt="">
                    <div
                        class="relative z-10 bg-black/40 p-6 h-full flex flex-col items-center justify-center transition-opacity duration-500 group-hover:opacity-0">
                        <h3 class="text-lg font-semibold text-white">International Preschool</h3>
                    </div>
                    <div
                        class="absolute inset-0 z-20 bg-black/70 p-6 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition duration-500">
                        <h3 class="text-lg font-semibold text-white mb-3">International Preschool</h3>
                        <p class="text-sm text-gray-200 mb-4">A global learning environment designed to nurture creativity
                            and confidence in young learners.</p>
                        <a href="/preschool"
                            class="bg-yellow-400 text-blue-900 font-bold px-4 py-2 rounded-lg shadow hover:bg-yellow-300 transition">
                            Explore →
                        </a>
                    </div>
                </div>

                <!-- Mandarin Program -->
                <div class="relative w-72 h-80 mx-auto rounded-xl overflow-hidden shadow-lg group cursor-pointer border-2 border-yellow-400"
                    data-aos="fade-up" data-aos-delay="200">
                    <img src="{{ asset('img/child_develop.jpg') }}" class="absolute inset-0 w-full h-full object-cover"
                        alt="">
                    <div
                        class="relative z-10 bg-black/40 p-6 h-full flex flex-col items-center justify-center transition-opacity duration-500 group-hover:opacity-0">
                        <h3 class="text-lg font-semibold text-white">Child Development Program</h3>
                    </div>
                    <div
                        class="absolute inset-0 z-20 bg-black/70 p-6 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition duration-500">
                        <h3 class="text-lg font-semibold text-white mb-3">Child Development Program</h3>
                        <p class="text-sm text-gray-200 mb-4">Child Development Program.</p>
                        <a href="#"
                            class="bg-yellow-400 text-blue-900 font-bold px-4 py-2 rounded-lg shadow hover:bg-yellow-300 transition">
                            Explore →
                        </a>
                    </div>
                </div>

                <!-- English Program -->
                <div class="relative w-72 h-80 mx-auto rounded-xl overflow-hidden shadow-lg group cursor-pointer border-2 border-yellow-400"
                    data-aos="fade-up" data-aos-delay="400">
                    <img src="{{ asset('img/english.png') }}" class="absolute inset-0 w-full h-full object-cover" alt="">
                    <div
                        class="relative z-10 bg-black/40 p-6 h-full flex flex-col items-center justify-center transition-opacity duration-500 group-hover:opacity-0">
                        <h3 class="text-lg font-semibold text-white">English Program</h3>
                    </div>
                    <div
                        class="absolute inset-0 z-20 bg-black/70 p-6 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition duration-500">
                        <h3 class="text-lg font-semibold text-white mb-3">English Program</h3>
                        <p class="text-sm text-gray-200 mb-4">Effective communication is key to success, and our English
                            Language Program is designed to build fluency and confidence.</p>
                        <a href="#"
                            class="bg-yellow-400 text-blue-900 font-bold px-4 py-2 rounded-lg shadow hover:bg-yellow-300 transition">
                            Explore →
                        </a>
                    </div>
                </div>

                <!-- Mandarin Program -->
                <div class="relative w-72 h-80 mx-auto rounded-xl overflow-hidden shadow-lg group cursor-pointer border-2 border-yellow-400"
                    data-aos="fade-up" data-aos-delay="200">
                    <img src="{{ asset('img/mandarin.png') }}" class="absolute inset-0 w-full h-full object-cover" alt="">
                    <div
                        class="relative z-10 bg-black/40 p-6 h-full flex flex-col items-center justify-center transition-opacity duration-500 group-hover:opacity-0">
                        <h3 class="text-lg font-semibold text-white">Mandarin Program</h3>
                    </div>
                    <div
                        class="absolute inset-0 z-20 bg-black/70 p-6 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition duration-500">
                        <h3 class="text-lg font-semibold text-white mb-3">Mandarin Program</h3>
                        <p class="text-sm text-gray-200 mb-4">Immersive learning that helps children master Mandarin
                            naturally and confidently.</p>
                        <a href="#"
                            class="bg-yellow-400 text-blue-900 font-bold px-4 py-2 rounded-lg shadow hover:bg-yellow-300 transition">
                            Explore →
                        </a>
                    </div>
                </div>
                <div class="relative w-72 h-80 mx-auto rounded-xl overflow-hidden shadow-lg group cursor-pointer border-2 border-yellow-400"
                    data-aos="fade-up" data-aos-delay="400">
                    <img src="{{ asset('img/math.png') }}" class="absolute inset-0 w-full h-full object-cover" alt="">
                    <div
                        class="relative z-10 bg-black/40 p-6 h-full flex flex-col items-center justify-center transition-opacity duration-500 group-hover:opacity-0">
                        <h3 class="text-lg font-semibold text-white">Math Program</h3>
                    </div>
                    <div
                        class="absolute inset-0 z-20 bg-black/70 p-6 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition duration-500">
                        <h3 class="text-lg font-semibold text-white mb-3">Math Program</h3>
                        <p class="text-sm text-gray-200 mb-4">Hands-on robotics classes that combine fun with STEM learning.
                        </p>
                        <a href="#"
                            class="bg-yellow-400 text-blue-900 font-bold px-4 py-2 rounded-lg shadow hover:bg-yellow-300 transition">
                            Explore →
                        </a>


                    </div>
                </div>

                <div class="relative w-72 h-80 mx-auto rounded-xl overflow-hidden shadow-lg group cursor-pointer border-2 border-yellow-400"
                    data-aos="fade-up" data-aos-delay="400">
                    <img src="{{ asset('img/robotic.png') }}" class="absolute inset-0 w-full h-full object-cover" alt="">
                    <div
                        class="relative z-10 bg-black/40 p-6 h-full flex flex-col items-center justify-center transition-opacity duration-500 group-hover:opacity-0">
                        <h3 class="text-lg font-semibold text-white">STEM & Coding</h3>
                    </div>
                    <div
                        class="absolute inset-0 z-20 bg-black/70 p-6 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition duration-500">
                        <h3 class="text-lg font-semibold text-white mb-3">STEM & Coding</h3>
                        <p class="text-sm text-gray-200 mb-4">STEM & Coding
                        </p>
                        <a href="https://timedooracademy.com/"
                            class="bg-yellow-400 text-blue-900 font-bold px-4 py-2 rounded-lg shadow hover:bg-yellow-300 transition"
                            target="_blank" rel="noopener noreferrer">
                            Explore →
                        </a>

                    </div>
                </div>

                <div class="relative w-72 h-80 mx-auto rounded-xl overflow-hidden shadow-lg group cursor-pointer border-2 border-yellow-400"
                    data-aos="fade-up" data-aos-delay="400">
                    <img src="{{ asset('img/design.png') }}" class="absolute inset-0 w-full h-full object-cover" alt="">
                    <div
                        class="relative z-10 bg-black/40 p-6 h-full flex flex-col items-center justify-center transition-opacity duration-500 group-hover:opacity-0">
                        <h3 class="text-lg font-semibold text-white">Design Program</h3>
                    </div>
                    <div
                        class="absolute inset-0 z-20 bg-black/70 p-6 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition duration-500">
                        <h3 class="text-lg font-semibold text-white mb-3">Design Program</h3>
                        <p class="text-sm text-gray-200 mb-4">Hands-on robotics classes that combine fun with STEM learning.
                        </p>
                        <a href="https://timedooracademy.com/"
                            class="bg-yellow-400 text-blue-900 font-bold px-4 py-2 rounded-lg shadow hover:bg-yellow-300 transition"
                            target="_blank" rel="noopener noreferrer">
                            Explore →
                        </a>



                    </div>
                </div>
                <!-- Coding Classes -->
                <div class="relative w-72 h-80 mx-auto rounded-xl overflow-hidden shadow-lg group cursor-pointer border-2 border-yellow-400"
                    data-aos="fade-up" data-aos-delay="300">
                    <img src="{{ asset('img/coding.png') }}" class="absolute inset-0 w-full h-full object-cover" alt="">
                    <div
                        class="relative z-10 bg-black/40 p-6 h-full flex flex-col items-center justify-center transition-opacity duration-500 group-hover:opacity-0">
                        <h3 class="text-lg font-semibold text-white">Creative Arts</h3>
                    </div>
                    <div
                        class="absolute inset-0 z-20 bg-black/70 p-6 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition duration-500">
                        <h3 class="text-lg font-semibold text-white mb-3">Creative Arts</h3>
                        <p class="text-sm text-gray-200 mb-4">Creative Arts.</p>
                        <a href="https://timedooracademy.com/"
                            class="bg-yellow-400 text-blue-900 font-bold px-4 py-2 rounded-lg shadow hover:bg-yellow-300 transition"
                            target="_blank" rel="noopener noreferrer">
                            Explore →
                        </a>
                    </div>
                </div>
                <!-- Coding Classes -->
                <div class="relative w-72 h-80 mx-auto rounded-xl overflow-hidden shadow-lg group cursor-pointer border-2 border-yellow-400"
                    data-aos="fade-up" data-aos-delay="300">
                    <img src="{{ asset('img/parenting.jpg') }}" class="absolute inset-0 w-full h-full object-cover" alt="">
                    <div
                        class="relative z-10 bg-black/40 p-6 h-full flex flex-col items-center justify-center transition-opacity duration-500 group-hover:opacity-0">
                        <h3 class="text-lg font-semibold text-white">Parenting life Indonesia</h3>
                    </div>
                    <div
                        class="absolute inset-0 z-20 bg-black/70 p-6 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition duration-500">
                        <h3 class="text-lg font-semibold text-white mb-3">Parenting life Indonesia</h3>
                        <p class="text-sm text-gray-200 mb-4">Parenting life Indonesia.</p>
                        <a href="https://parentinglife.id/"
                            class="bg-yellow-400 text-blue-900 font-bold px-4 py-2 rounded-lg shadow hover:bg-yellow-300 transition"
                            target="_blank" rel="noopener noreferrer">
                            Explore →
                        </a>
                    </div>
                </div>


                <!-- Tambahkan animasi serupa untuk card lainnya -->
            </div>
        </div>
    </section>

    <!-- CTA / How It Works Section -->
    <section id="cta" class="relative py-20 bg-[url('/images/bg_hiacademy01.jpg')] bg-cover bg-center bg-no-repeat">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-gray-900/70 backdrop-blur-sm"></div>

        <!-- Content -->
        <div class="relative z-10 container mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-12 items-center">

                <!-- Left Content -->
                <div class="text-white" data-aos="fade-right" data-aos-duration="1000">
                    <span class="uppercase tracking-wide text-yellow-400 font-semibold">How it works?</span>
                    <h2 class="text-3xl md:text-4xl font-bold mt-3 leading-snug">
                        Learning with <span class="text-yellow-400">h!academy</span> is
                        <span class="text-white/90">Simple</span>,
                        <span class="text-yellow-300">Fun</span>,
                        and <span class="text-white/90">Effective</span>.
                    </h2>

                    <p class="mt-6 text-gray-200 leading-relaxed">
                        HiAcademy delivers exclusive, personalized learning through small-size classes. This approach,
                        combined with our experienced teachers and all-in-one platform, ensures every student receives the
                        dedicated attention they need to excel.
                    </p>
                    <div class="mt-8">
                        <a href="{{ route('booktrial') }}"
                            class="inline-block bg-yellow-400 text-gray-900 font-bold px-6 py-3 rounded-lg shadow-lg hover:bg-yellow-300 transition transform hover:scale-110 hover:rotate-1">
                            Book Free Trial
                        </a>
                    </div>
                </div>

                <!-- Right Side Steps -->
                <div class="grid md:grid-cols-2 gap-6" data-aos="fade-up" data-aos-duration="1000">

                    <!-- Step 1 -->
                    <div class="bg-white/10 border border-yellow-400 rounded-xl p-6 text-white shadow-lg hover:scale-105 transition transform duration-300 group"
                        data-aos="fade-up" data-aos-delay="100">
                        <div class="flex items-center gap-4 mb-3">
                            <div
                                class="relative bg-yellow-400 text-gray-900 w-12 h-12 flex items-center justify-center rounded-full text-xl font-bold overflow-hidden">
                                <!-- Angka -->
                                <span
                                    class="absolute inset-0 flex items-center justify-center transition-opacity duration-300 group-hover:opacity-0">
                                    1
                                </span>
                                <!-- Icon -->
                                <i
                                    class="fa-solid fa-comments absolute inset-0 flex items-center justify-center opacity-0 transition-opacity duration-300 group-hover:opacity-100"></i>
                            </div>
                            <h5 class="font-semibold text-lg group-hover:text-yellow-400 transition">
                                Inquiry & Consultation
                            </h5>
                        </div>
                        <p class="text-sm text-gray-300 group-hover:text-white transition">
                            Contact us and get a consultation session to design the best tutoring service for you.
                        </p>
                    </div>

                    <!-- Step 2 -->
                    <div class="bg-white/10 border border-yellow-400 rounded-xl p-6 text-white shadow-lg hover:scale-105 transition transform duration-300 group"
                        data-aos="fade-up" data-aos-delay="200">
                        <div class="flex items-center gap-4 mb-3">
                            <div
                                class="relative bg-yellow-400 text-gray-900 w-12 h-12 flex items-center justify-center rounded-full text-xl font-bold overflow-hidden">
                                <span
                                    class="absolute inset-0 flex items-center justify-center transition-opacity duration-300 group-hover:opacity-0">
                                    2
                                </span>
                                <i
                                    class="fa-solid fa-user-check absolute inset-0 flex items-center justify-center opacity-0 transition-opacity duration-300 group-hover:opacity-100"></i>
                            </div>
                            <h5 class="font-semibold text-lg group-hover:text-yellow-400 transition">
                                Free Trial or Placement Test
                            </h5>
                        </div>
                        <p class="text-sm text-gray-300 group-hover:text-white transition">
                            Experience our class for FREE and take a placement test to measure your skills.
                        </p>
                    </div>

                    <!-- Step 3 -->
                    <div class="bg-white/10 border border-yellow-400 rounded-xl p-6 text-white shadow-lg hover:scale-105 transition transform duration-300 group"
                        data-aos="fade-up" data-aos-delay="300">
                        <div class="flex items-center gap-4 mb-3">
                            <div
                                class="relative bg-yellow-400 text-gray-900 w-12 h-12 flex items-center justify-center rounded-full text-xl font-bold overflow-hidden">
                                <span
                                    class="absolute inset-0 flex items-center justify-center transition-opacity duration-300 group-hover:opacity-0">
                                    3
                                </span>
                                <i
                                    class="fa-solid fa-calendar-check absolute inset-0 flex items-center justify-center opacity-0 transition-opacity duration-300 group-hover:opacity-100"></i>
                            </div>
                            <h5 class="font-semibold text-lg group-hover:text-yellow-400 transition">
                                Join the Class
                            </h5>
                        </div>
                        <p class="text-sm text-gray-300 group-hover:text-white transition">
                            We’ll arrange schedules based on your request and placement results.
                        </p>
                    </div>

                    <!-- Step 4 -->
                    <div class="bg-white/10 border border-yellow-400 rounded-xl p-6 text-white shadow-lg hover:scale-105 transition transform duration-300 group"
                        data-aos="fade-up" data-aos-delay="400">
                        <div class="flex items-center gap-4 mb-3">
                            <div
                                class="relative bg-yellow-400 text-gray-900 w-12 h-12 flex items-center justify-center rounded-full text-xl font-bold overflow-hidden">
                                <span
                                    class="absolute inset-0 flex items-center justify-center transition-opacity duration-300 group-hover:opacity-0">
                                    4
                                </span>
                                <i
                                    class="fa-solid fa-graduation-cap absolute inset-0 flex items-center justify-center opacity-0 transition-opacity duration-300 group-hover:opacity-100"></i>
                            </div>
                            <h5 class="font-semibold text-lg group-hover:text-yellow-400 transition">
                                Start Learning
                            </h5>
                        </div>
                        <p class="text-sm text-gray-300 group-hover:text-white transition">
                            Begin your journey and receive regular progress reports to stay on track.
                        </p>
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
                <div class="space-y-6 animate-fadeInUp" data-aos="fade-up" data-aos-delay="150" data-aos-duration="800">
                    <h5 class="text-2xl text-white tracking-wide">Why Choose Us?</h5>
                    <h3 class="text-3xl md:text-4xl font-bold leading-tight">
                        <span class="bg-gradient-to-r text-yellow-400 bg-clip-text text-transparent drop-shadow-md">
                            Nurturing Bright Futures
                        </span><br>with Love & Hope
                    </h3>
                    <p class="text-gray-300 text-lg leading-relaxed">
                        At <span class="text-yellow-400 font-semibold">h!academy</span>, learning is more than just
                        education — it’s a joyful journey filled with growth, inspiration, and care for every learner.
                    </p>
                    <a href="#"
                        class="inline-flex items-center gap-3 bg-yellow-400 text-blue-900 text-lg font-semibold px-8 py-4 rounded-full shadow-lg hover:bg-yellow-300 hover:scale-105 transition duration-300">
                        Join Now
                    </a>
                </div>

                <!-- Column 3: Consultation Hours + Quick Links -->
                <div class="space-y-8 animate-fadeInUp" data-aos="fade-up" data-aos-delay="300" data-aos-duration="800">

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
                            <li><a href="{{ route('booktrial') }}" class="hover:text-yellow-400 transition flex items-center gap-2"><i
                                        class="fa-solid fa-book-open"></i> Book Free Trial</a></li>
                            <li><a href="#" class="hover:text-yellow-400 transition flex items-center gap-2"><i
                                        class="fa-solid fa-pen-to-square"></i> Register Now</a></li>
                            <li><a href="{{ route('loginindex') }}" class="hover:text-yellow-400 transition flex items-center gap-2"><i
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
    <!-- Tombol Back to Top -->
    <button id="backToTopBtn"
        class="hidden fixed bottom-6 right-6 bg-yellow-400 text-black font-semibold p-3 rounded-full shadow-lg hover:bg-white transition-colors duration-300 z-50">
        ↑
    </button>


    <script>
        const backToTopBtn = document.getElementById("backToTopBtn");

        window.addEventListener("scroll", () => {
            if (window.scrollY > 100) {
                // Muncul saat user mulai scroll
                backToTopBtn.classList.remove("hidden");
            } else {
                // Hilang saat di atas
                backToTopBtn.classList.add("hidden");
            }
        });

        backToTopBtn.addEventListener("click", () => {
            window.scrollTo({ top: 0, behavior: "smooth" });
        });
    </script>

    <!-- Optional Animations with Tailwind + JS -->
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 1s ease forwards;
        }

        .animate-fadeInUp.delay-100 {
            animation-delay: 0.1s;
        }

        .animate-fadeInUp.delay-200 {
            animation-delay: 0.2s;
        }

        .animate-fadeInUp.delay-300 {
            animation-delay: 0.3s;
        }
    </style>

    {{-- SwiperJS CDN --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const swiper = new Swiper(".heroSwiper", {
                loop: true,
                effect: "fade",
                fadeEffect: { crossFade: true },
                speed: 800,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                    pauseOnMouseEnter: true,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                on: {
                    init: function () {
                        const activeSlide = this.slides[this.activeIndex];
                        activeSlide.querySelectorAll(".hero-animate").forEach((el, i) => {
                            el.classList.add("animate-fade-in-up");
                            el.style.animationDelay = `${i * 0.15}s`;
                        });

                        // 🚀 Hero title masuk pertama kali
                        const heroTitle = activeSlide.querySelector(".hero-title");
                        if (heroTitle) {
                            heroTitle.classList.add("block-animate");
                            setTimeout(() => {
                                heroTitle.classList.add("revealed");
                            }, 700);
                        }
                    },

                    slideChangeTransitionStart: function () {
                        const prevSlide = this.slides[this.previousIndex];
                        const activeSlide = this.slides[this.activeIndex];

                        // Hapus animasi dari slide aktif baru dulu
                        activeSlide.querySelectorAll(".hero-animate").forEach(el => {
                            el.classList.remove("animate-fade-in-up", "animate-fade-out-down");
                            el.style.opacity = 0;
                        });

                        // 🎬 Fade out slide lama
                        prevSlide?.querySelectorAll(".hero-animate").forEach(el => {
                            el.classList.remove("animate-fade-in-up");
                            el.classList.add("animate-fade-out-down");
                        });

                        // 🎞️ Hero title fade-out → block dari kanan ke kiri
                        const prevTitle = prevSlide?.querySelector(".hero-title");
                        if (prevTitle) {
                            prevTitle.classList.remove("block-animate", "revealed");
                            prevTitle.classList.add("block-animate-out");
                            setTimeout(() => {
                                prevTitle.classList.remove("block-animate-out");
                            }, 600); // durasi block keluar
                        }

                        // Delay sebelum fade-in slide baru
                        setTimeout(() => {
                            activeSlide.querySelectorAll(".hero-animate").forEach((el, i) => {
                                el.classList.remove("animate-fade-out-down");
                                el.classList.add("animate-fade-in-up");
                                el.style.animationDelay = `${i * 0.15}s`;
                            });

                            // 🚀 Animasi block masuk untuk slide baru
                            const heroTitle = activeSlide.querySelector(".hero-title");
                            if (heroTitle) {
                                heroTitle.classList.add("block-animate");
                                setTimeout(() => {
                                    heroTitle.classList.add("revealed");
                                }, 700);
                            }

                        }, 600); // sesuai dengan durasi fade-out
                    },
                },
            });
        });
    </script>

    {{-- Typed.js Script --}}
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>

    {{-- Extra CSS for custom bounce animation --}}
    <style>
        @keyframes bounce-slow {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-12px);
            }
        }

        .animate-bounce-slow {
            animation: bounce-slow 4s infinite;
        }
    </style>
    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.js"></script>
@endsection