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
                    <span>🔐</span><span>Login</span>
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
                    <div class="absolute right-0 w-full lg:w-1/2 px-6 lg:px-20 text-right">
                        <h2 class="text-2xl md:text-3xl font-semibold mb-6">
                            <span class="text-yellow-300">h!</span><span class="text-white">academy</span>
                        </h2>

                        <h1 class="text-4xl md:text-5xl font-extrabold text-white leading-tight mb-4">
                            Your One-Stop Education Center
                        </h1>

                        <p class="text-xl md:text-xl text-white mt-4 leading-relaxed">
                            At h!academy, we are committed to nurturing young minds with a comprehensive range of programs
                            tailored to meet the needs of the future. From foundational skills to advanced learning,
                            we offer everything your child needs to thrive in a globalized world.
                        </p>

                        <div class="mt-8">
                            <a href="#programs"
                                class="inline-block bg-yellow-400 text-blue-900 font-bold px-6 py-3 rounded-lg shadow hover:bg-yellow-300 transition transform hover:scale-105">
                                Explore Our Programs →
                            </a>
                        </div>
                    </div>
                </div>

                {{-- SLIDE 2 --}}
                <div class="swiper-slide relative min-h-[70vh] flex items-center">
                    <div class="absolute right-0 w-full lg:w-1/2 px-6 lg:px-20 text-right">
                        <h2 class="text-2xl md:text-3xl font-semibold mb-6">
                            <span class="text-yellow-300">h!</span><span class="text-white">academy</span>
                        </h2>

                        <h1 class="text-4xl md:text-5xl font-extrabold text-white leading-tight mb-4">
                            Nurturing Bright Future with Hope
                        </h1>

                        <p class="text-xl md:text-xl text-white mt-4 leading-relaxed">
                            Join our engaging and future-focused programs designed to help students unlock their full
                            potential
                            through personalized, hands-on learning experiences.
                        </p>

                        <div class="mt-8">
                            <a href="#book"
                                class="inline-block bg-yellow-400 text-blue-900 font-bold px-6 py-3 rounded-lg shadow hover:bg-yellow-300 transition transform hover:scale-105">
                                Book Free Trial →
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Navigation arrows (visible di layar besar) --}}
            <div class="hidden lg:flex absolute inset-y-0 left-0 items-center justify-center">
                <div class="swiper-button-prev !text-white !scale-75"></div>
            </div>
            <div class="hidden lg:flex absolute inset-y-0 right-0 items-center justify-center">
                <div class="swiper-button-next !text-white !scale-75"></div>
            </div>

            {{-- Pagination (untuk mobile swipe indicator) --}}
            <div class="swiper-pagination !bottom-8"></div>
        </div>

        {{-- Maskot tetap di tengah --}}
        <div class="absolute left-1/2 bottom-[-2rem] transform -translate-x-1/2 z-20">
            <img src="{{ asset('img/masc_1.png') }}" alt="Mascot Transition"
                class="w-40 md:w-56 drop-shadow-2xl animate-bounce-slow">
        </div>
    </section>

    {{-- SwiperJS CDN --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            new Swiper(".heroSwiper", {
                loop: true,
                speed: 800,
                spaceBetween: 0,
                grabCursor: true,
                centeredSlides: false, // penting: nonaktifkan agar slide tidak di tengah!
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            new Swiper(".heroSwiper", {
                loop: true,
                speed: 800,
                spaceBetween: 0,
                grabCursor: true,
                centeredSlides: false,
                autoplay: {
                    delay: 3000, // waktu antar slide (3 detik)
                    disableOnInteraction: false, // tetap lanjut meski user swipe manual
                    pauseOnMouseEnter: true, // pause saat di-hover (desktop)
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });
        });
    </script>


    {{-- About Section --}}
    <section id="about"
        class="bg-blue-950/50 pt-36 pb-10 relative backdrop-blur-md rounded-2xl shadow-xl text-center -mt-16">
        <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row items-center justify-between gap-10">

            <!-- Kolom Teks -->
            <div class="md:w-1/2 space-y-6 text-left">
                <h1 class="text-4xl md:text-5xl text-blue-300 font-extrabold leading-tight">
                    About <span class="text-yellow-300">h!</span><span class="text-white">academy</span>
                </h1>

                <p class="text-lg sm:text-base lg:text-2xl leading-relaxed text-white">
                    <span class="font-semibold text-yellow-300">h!academy</span> is one of the educational institutions
                    under the umbrella of
                    <span class="font-bold text-green-400">Harapan Edukasi International</span>.
                    The school was founded with the belief that every child has the right to an education
                    filled with love and hope.
                </p>

                <p class="mt-3 sm:mt-4 text-lg sm:text-base lg:text-2xl leading-relaxed text-white">
                    h!academy emphasizes the holistic development of children, covering
                    <span class="text-blue-400 font-medium">academic</span>,
                    <span class="text-yellow-400 font-medium">social</span>,
                    <span class="text-red-400 font-medium">emotional</span>, and
                    <span class="text-green-400 font-medium">spiritual</span> aspects,
                    to ensure that children grow up with confidence and are ready to face the world.
                </p>

                <!-- Tombol -->
                <div class="flex flex-col sm:flex-row gap-4 mt-6">
                    <a href="#contact"
                        class="border border-white bg-amber-200 text-black px-6 py-3 text-base shadow font-medium rounded-md hover:bg-black hover:text-white transition">
                        Talk to us
                    </a>

                    <a href="#cta"
                        class="bg-white border-black text-black px-6 py-3 text-base font-medium rounded-md shadow hover:bg-gray-100 transition">
                        Free Trial →
                    </a>
                </div>
            </div>

            <!-- Kolom Gambar -->
            <div class="md:w-1/2 flex justify-center md:justify-end">
                <img src="{{ asset('img/masc_2.png') }}" alt="Mascot h!academy"
                    class="w-55 sm:w-67 md:w-75 lg:w-83 xl:w-85 drop-shadow-xl transform hover:scale-105 transition duration-500 animate-bounce-slow">
            </div>
        </div>
    </section>



    <!-- Programs Section -->
    <section id="programs" class="py-24 px-6 text-center bg-white/1 text-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl sm:text-4xl font-bold text-white mt-2">
                    Our Programs
                </h2>
                <p class="mt-4 text-gray-200 max-w-3xl mx-auto">
                    Specially developed for ages 4-15, this unique system is designed by expert academics aiming for
                    children to speak confidently.
                </p>
            </div>

            <!-- Grid -->
            <div class="grid md:grid-cols-4 gap-10">
                <!-- Card Example -->
                <div class="relative w-72 h-80 mx-auto rounded-xl overflow-hidden shadow-lg group cursor-pointer">
                    <img src="{{ asset('img/preschool.png') }}" class="absolute inset-0 w-full h-full object-cover" alt="">
                    <!-- Default Title -->
                    <div
                        class="relative z-10 bg-black/40 p-6 h-full flex flex-col items-center justify-center transition-opacity duration-500 group-hover:opacity-0">
                        <h3 class="text-lg font-semibold text-white">International Preschool</h3>
                    </div>
                    <!-- Hover Content -->
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

                <!-- Repeat Cards -->
                <div class="relative w-72 h-80 mx-auto rounded-xl overflow-hidden shadow-lg group cursor-pointer">
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
                <div class="relative w-72 h-80 mx-auto rounded-xl overflow-hidden shadow-lg group cursor-pointer">
                    <img src="{{ asset('img/coding.png') }}" class="absolute inset-0 w-full h-full object-cover" alt="">
                    <div
                        class="relative z-10 bg-black/40 p-6 h-full flex flex-col items-center justify-center transition-opacity duration-500 group-hover:opacity-0">
                        <h3 class="text-lg font-semibold text-white">Coding Classes</h3>
                    </div>
                    <div
                        class="absolute inset-0 z-20 bg-black/70 p-6 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition duration-500">
                        <h3 class="text-lg font-semibold text-white mb-3">Coding Classes</h3>
                        <p class="text-sm text-gray-200 mb-4">Technology is the future, and our Coding Program introduces
                            students to the exciting.</p>
                        <a href="https://timedooracademy.com/"
                            class="bg-yellow-400 text-blue-900 font-bold px-4 py-2 rounded-lg shadow hover:bg-yellow-300 transition"
                            target="_blank" rel="noopener noreferrer">
                            Explore →
                        </a>

                    </div>
                </div>
                <div class="relative w-72 h-80 mx-auto rounded-xl overflow-hidden shadow-lg group cursor-pointer">
                    <img src="{{ asset('img/english.png') }}" class="absolute inset-0 w-full h-full object-cover" alt="">
                    <div
                        class="relative z-10 bg-black/40 p-6 h-full flex flex-col items-center justify-center transition-opacity duration-500 group-hover:opacity-0">
                        <h3 class="text-lg font-semibold text-white">English Program</h3>
                    </div>
                    <div
                        class="absolute inset-0 z-20 bg-black/70 p-6 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition duration-500">
                        <h3 class="text-lg font-semibold text-white mb-3">English Program</h3>
                        <p class="text-sm text-gray-200 mb-4">Effective communication is key to success, and our English
                            Language Program is designed.</p>
                        <a href="#"
                            class="bg-yellow-400 text-blue-900 font-bold px-4 py-2 rounded-lg shadow hover:bg-yellow-300 transition">
                            Explore →
                        </a>
                    </div>
                </div>
            </div>

            <!-- Last Row (centered 3 cards) -->
            <div class="mt-10 flex flex-wrap justify-center gap-10">
                <!-- Example Card -->
                <div class="relative w-72 h-80 rounded-xl overflow-hidden shadow-lg group cursor-pointer">
                    <img src="{{ asset('img/robotic.png') }}" class="absolute inset-0 w-full h-full object-cover" alt="">
                    <div
                        class="relative z-10 bg-black/40 p-6 h-full flex flex-col items-center justify-center transition-opacity duration-500 group-hover:opacity-0">
                        <h3 class="text-lg font-semibold text-white">Robotics Program</h3>
                    </div>
                    <div
                        class="absolute inset-0 z-20 bg-black/70 p-6 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition duration-500">
                        <h3 class="text-lg font-semibold text-white mb-3">Robotics Program</h3>
                        <p class="text-sm text-gray-200 mb-4">Hands-on robotics classes that combine fun with STEM learning.
                        </p>
                        <a href="https://timedooracademy.com/"
                            class="bg-yellow-400 text-blue-900 font-bold px-4 py-2 rounded-lg shadow hover:bg-yellow-300 transition"
                            target="_blank" rel="noopener noreferrer">
                            Explore →
                        </a>

                    </div>
                </div>
                <div class="relative w-72 h-80 rounded-xl overflow-hidden shadow-lg group cursor-pointer">
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
                <div class="relative w-72 h-80 rounded-xl overflow-hidden shadow-lg group cursor-pointer">
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
            </div>
        </div>
    </section>


    <!-- CTA / How It Works Section -->
    <section id="cta" class="relative py-20 bg-[url('/images/bg_hiacademy01.jpg')] bg-cover bg-center bg-no-repeat">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-blue-950/50 backdrop-blur-sm"></div>

        <!-- Content -->
        <div class="relative z-10 container mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-12 items-center">

                <!-- Left Content -->
                <div class="text-white">
                    <span class="uppercase tracking-wide text-yellow-400 font-semibold">How it works?</span>
                    <h2 class="text-3xl md:text-4xl font-bold mt-3 leading-snug">
                        Learning with <span class="text-yellow-300">h!academy</span> is
                        <span class="text-green-300">Simple</span>,
                        <span class="text-pink-300">Fun</span>,
                        and <span class="text-blue-300">Effective</span>.
                    </h2>

                    <p class="mt-6 text-gray-200 leading-relaxed">
                        h!academy provides an exclusive learning experience tailored to each student’s needs, an
                        extraordinary
                        1-on-1 private tutoring, passionate and experienced teachers, all in one platform.
                    </p>
                    <div class="mt-8">
                        <a href="#contact"
                            class="inline-block bg-yellow-400 text-blue-900 font-bold px-6 py-3 rounded-lg shadow-lg hover:bg-yellow-300 transition transform hover:scale-110 hover:rotate-1">
                            Book Free Trial
                        </a>
                    </div>
                </div>

                <!-- Right Side Steps -->
                <div class="grid md:grid-cols-2 gap-6">
                    <!-- Step 1 -->
                    <div
                        class="bg-white/10 rounded-xl p-6 text-white shadow-lg hover:scale-105 transition transform duration-300 animate-fadeInUp">
                        <div class="flex items-center gap-4">
                            <div
                                class="bg-yellow-400 text-blue-900 w-12 h-12 flex items-center justify-center rounded-full text-xl font-bold">
                                1</div>
                            <h5 class="font-semibold">Inquiry & Consultation</h5>
                        </div>
                        <p class="mt-3 text-sm text-gray-300">Contact us and get a consultation session to design the best
                            tutoring service for you.</p>
                    </div>

                    <!-- Step 2 -->
                    <div
                        class="bg-white/10 rounded-xl p-6 text-white shadow-lg hover:scale-105 transition transform duration-300 animate-fadeInUp delay-100">
                        <div class="flex items-center gap-4">
                            <div
                                class="bg-green-400 text-blue-900 w-12 h-12 flex items-center justify-center rounded-full text-xl font-bold">
                                2</div>
                            <h5 class="font-semibold">Free Trial or Placement Test</h5>
                        </div>
                        <p class="mt-3 text-sm text-gray-300">Experience our class for FREE and take a placement test to
                            measure your skills.</p>
                    </div>

                    <!-- Step 3 -->
                    <div
                        class="bg-white/10 rounded-xl p-6 text-white shadow-lg hover:scale-105 transition transform duration-300 animate-fadeInUp delay-200">
                        <div class="flex items-center gap-4">
                            <div
                                class="bg-pink-400 text-blue-900 w-12 h-12 flex items-center justify-center rounded-full text-xl font-bold">
                                3</div>
                            <h5 class="font-semibold">Join the Class</h5>
                        </div>
                        <p class="mt-3 text-sm text-gray-300">We’ll arrange schedules based on your request and placement
                            results.</p>
                    </div>

                    <!-- Step 4 -->
                    <div
                        class="bg-white/10 rounded-xl p-6 text-white shadow-lg hover:scale-105 transition transform duration-300 animate-fadeInUp delay-300">
                        <div class="flex items-center gap-4">
                            <div
                                class="bg-blue-400 text-blue-900 w-12 h-12 flex items-center justify-center rounded-full text-xl font-bold">
                                4</div>
                            <h5 class="font-semibold">Start Learning</h5>
                        </div>
                        <p class="mt-3 text-sm text-gray-300">Begin your journey and receive regular progress reports to
                            stay on track.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer id="contact" class="relative bg-gradient-to-b from-blue-950 to-blue-900 text-white pt-20 overflow-hidden">

        <!-- Floating Gradient Effect -->
        <div class="absolute inset-0 bg-gradient-to-tr from-blue-800/20 via-transparent to-yellow-400/10 animate-pulse">
        </div>

        <!-- Footer Content -->
        <div class="relative z-10 container mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-12">

                <!-- Logo & Why Us -->
                <div class="space-y-8 animate-fadeInUp">
                    <img src="{{ asset('img/logofull.png') }}" alt="h!academy logo"
                        class="w-56 md:w-72 drop-shadow-xl hover:scale-105 transition duration-500">

                    <h5 class="text-2xl font-extrabold text-yellow-400 tracking-wide">🌟 Why Choose Us?</h5>
                    <h3 class="text-4xl md:text-5xl font-extrabold leading-tight">
                        <span
                            class="bg-gradient-to-r from-yellow-300 to-yellow-500 bg-clip-text text-transparent drop-shadow-md">
                            Nurturing Bright Futures
                        </span><br>
                        with Love & Hope ✨
                    </h3>
                    <p class="text-gray-300 text-lg leading-relaxed max-w-xl">
                        At <span class="text-yellow-400 font-semibold">h!academy</span>, learning is more than just
                        education —
                        it’s a <span class="text-blue-300">joyful journey</span> filled with <span
                            class="text-green-300">growth</span>, <span class="text-red-300">inspiration</span>, and
                        <span class="text-yellow-400 font-bold">care for every learner</span>.
                    </p>
                    <a href="#"
                        class="inline-flex items-center gap-3 bg-yellow-400 text-blue-900 text-lg font-semibold px-8 py-4 rounded-full shadow-lg hover:bg-yellow-300 hover:scale-105 transition">
                        🚀 Join Now
                    </a>
                </div>

                <!-- Quick Links + Consultation Hours -->
                <div class="grid sm:grid-cols-2 gap-6 animate-fadeInUp delay-100">

                    <!-- Quick Links -->
                    <div>
                        <h5 class="text-xl font-bold mb-4">Quick Links</h5>
                        <ul class="grid grid-cols-1 gap-3 text-gray-300 text-base">
                            <li><a href="#" class="hover:text-yellow-400 transition flex items-center gap-2">📘 Book Free
                                    Trial</a></li>
                            <li><a href="#" class="hover:text-yellow-400 transition flex items-center gap-2">📝 Register
                                    Now</a></li>
                            <li><a href="#" class="hover:text-yellow-400 transition flex items-center gap-2">🎓 Student
                                    Login</a></li>
                            <li><a href="#" class="hover:text-yellow-400 transition flex items-center gap-2">📚 English
                                    Programs</a></li>
                            <li><a href="#" class="hover:text-yellow-400 transition flex items-center gap-2">☎ Contact
                                    Us</a></li>
                        </ul>

                        <!-- Social Media -->
                        <div class="mt-8">
                            <h5 class="text-lg font-semibold mb-4">Connect with Us</h5>
                            <div class="flex gap-4">

                                <!-- Facebook -->
                                <a href="#"
                                    class="w-12 h-12 flex items-center justify-center rounded-full bg-white/10 hover:bg-blue-500 transition transform hover:scale-110">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                        class="w-7 h-7 fill-white">
                                        <path
                                            d="M279.14 288l14.22-92.66h-88.91V127.34c0-25.35 12.42-50.06 
                                                                                                                 52.24-50.06H293V6.26S259.5 0 225.36 0c-73.14 
                                                                                                                 0-121.36 44.38-121.36 124.72V195.3H22.89V288h81.11v224h100.17V288z" />
                                    </svg>
                                </a>

                                <!-- Instagram -->
                                <a href="#"
                                    class="w-12 h-12 flex items-center justify-center rounded-full bg-white/10 hover:bg-pink-500 transition transform hover:scale-110">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                        class="w-7 h-7 fill-white">
                                        <path
                                            d="M224,202.66A53.34,53.34,0,1,0,277.34,256,53.38,53.38,0,0,0,224,202.66Zm124.71-41a54,54,0,0,0-30.34-30.34c-21-8.3-70.74-6.4-94.37-6.4s-73.34-1.9-94.37,6.4a54,54,0,0,0-30.34,30.34c-8.3,21-6.4,70.74-6.4,94.37s-1.9,73.34,6.4,94.37a54,54,0,0,0,30.34,30.34c21,8.3,70.74,6.4,94.37,6.4s73.34,1.9,94.37-6.4a54,54,0,0,0,30.34-30.34c8.3-21,6.4-70.74,6.4-94.37S357,182.71,348.71,161.66ZM224,338a82,82,0,1,1,82-82A82,82,0,0,1,224,338Zm85.34-148a19.2,19.2,0,1,1,19.2-19.2A19.2,19.2,0,0,1,309.34,190Z" />
                                    </svg>
                                </a>

                                <!-- YouTube -->
                                <a href="#"
                                    class="w-12 h-12 flex items-center justify-center rounded-full bg-white/10 hover:bg-red-500 transition transform hover:scale-110">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                        class="w-7 h-7 fill-white">
                                        <path
                                            d="M549.65 124.08c-6.28-23.65-24.82-42.2-48.47-48.48C458.4 64 
                                                                                                                 288 64 288 64s-170.4 0-213.18 11.6c-23.65 6.28-42.19 
                                                                                                                 24.83-48.47 48.48C15.76 167.27 15.76 256 15.76 
                                                                                                                 256s0 88.73 10.59 131.92c6.28 23.65 24.82 42.19 
                                                                                                                 48.47 48.47C117.6 448 288 448 288 
                                                                                                                 448s170.4 0 213.18-11.61c23.65-6.28 
                                                                                                                 42.19-24.82 48.47-48.47C560.24 344.73 
                                                                                                                 560.24 256 560.24 256s0-88.73-10.59-131.92zM232 
                                                                                                                 334V178l142 78-142 78z" />
                                    </svg>
                                </a>

                            </div>
                        </div>


                    </div>

                    <!-- Consultation Hours -->
                    <div>
                        <h5 class="text-xl font-bold mb-4">Consultation Hour</h5>
                        <div class="space-y-3 text-sm">

                            <!-- Weekdays -->
                            <div
                                class="flex items-center justify-between p-3 rounded-xl bg-white/10 hover:bg-white/20 transition">
                                <span class="flex items-center gap-2">
                                    <!-- Heroicon: Briefcase -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-300" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M9 6V4.5A1.5 1.5 0 0110.5 3h3A1.5 1.5 0 0115 4.5V6m-6 0h6m-6 0H5.25A2.25 2.25 0 003 8.25v9A2.25 2.25 0 005.25 19.5h13.5A2.25 2.25 0 0021 17.25v-9A2.25 2.25 0 0018.75 6H15" />
                                    </svg>
                                    Weekdays
                                </span>
                                <span class="text-green-400 font-medium">09:00 - 17:00</span>
                            </div>

                            <!-- Saturday -->
                            <div
                                class="flex items-center justify-between p-3 rounded-xl bg-white/10 hover:bg-white/20 transition">
                                <span class="flex items-center gap-2">
                                    <!-- Heroicon: Calendar -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-300" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M6.75 3v2.25M17.25 3v2.25M3 9h18M4.5 21h15a1.5 1.5 0 001.5-1.5v-11.25A1.5 1.5 0 0019.5 7.5h-15A1.5 1.5 0 003 8.25v11.25A1.5 1.5 0 004.5 21z" />
                                    </svg>
                                    Saturday
                                </span>
                                <span class="text-green-400 font-medium">09:00 - 14:00</span>
                            </div>

                            <!-- Sunday -->
                            <div class="flex items-center justify-between p-3 rounded-xl bg-white/10">
                                <span class="flex items-center gap-2">
                                    <!-- Heroicon: XCircle -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-red-400" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M12 9v3.75m0 3.75h.007v.008H12v-.008zM21 12c0 4.97-4.03 9-9 9s-9-4.03-9-9 4.03-9 9-9 9 4.03 9 9z" />
                                    </svg>
                                    Sunday
                                </span>
                                <span class="text-red-400 font-semibold">Closed</span>
                            </div>
                        </div>

                        <!-- Contact Button -->
                        <a href="#"
                            class="inline-flex items-center gap-2 mt-6 bg-yellow-400 text-blue-900 font-semibold px-6 py-3 rounded-full shadow-lg hover:bg-yellow-300 hover:scale-105 transition">
                            <!-- Heroicon: ChatBubble -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M2.25 12a9.75 9.75 0 1119.5 0 9.75 9.75 0 01-9.75 9.75A9.77 9.77 0 018.25 20.25L4.5 21.75l1.5-3.75A9.75 9.75 0 012.25 12z" />
                            </svg>
                            Contact Us
                        </a>
                    </div>

                </div>
            </div>

            <!-- Copyright -->
            <div
                class="mt-16 bg-blue-950/80 py-4 text-center text-gray-400 text-sm relative z-10 border-t rounded-full border-blue-800/40">
                © 2025 h!academy | Powered by <span class="text-yellow-400">DayR</span>
            </div>
        </div>
    </footer>



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

    {{-- Typed.js Script --}}
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    </script>

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