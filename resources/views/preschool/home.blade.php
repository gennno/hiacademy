@extends('layouts.layout')

@section('title', 'h!academy - International Preschool')

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

    {{-- HEADER / NAVBAR --}}
    <header id="navbar" class="fixed top-0 left-0 w-full z-50 transition-all duration-500 bg-transparent backdrop-blur-sm">
        <div class="relative flex items-center shadow-sm justify-between px-6 lg:px-12 py-4">
            <!-- LEFT SIDE: Back Button + Logo -->
            <div class="flex items-center gap-4 z-40">
                <!-- Tombol Back -->
                <a href="/"
                    class="flex items-center justify-center text-yellow-400 hover:text-yellow-300 hover:scale-105 transition-transform duration-300"
                    aria-label="Back to H!Academy Main">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 lg:h-7 lg:w-7" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                    <span class="hidden sm:inline text-sm font-semibold ml-1">Back</span>
                </a>

                <!-- Logo -->
                <a href="#home" class="flex items-center gap-3 flex-shrink-0" aria-label="Go to home">
                    <img src="{{ asset('img/logofull.png') }}" alt="Logo"
                        class="h-14 lg:h-16 w-auto hover:scale-105 transition-transform duration-300">
                </a>
            </div>

            <!-- NAV (centered on viewport) - visible on lg+ -->
            <nav id="primary-nav"
                class="hidden xl:flex absolute left-1/2 transform -translate-x-1/2 items-center space-x-10 text-white font-medium tracking-wide z-50"
                role="navigation" aria-label="Primary Navigation">
                <a href="#home" class="nav-link" data-target="home">Home</a>

                <!-- About Us with Dropdown -->
                <div class="relative group">
                    <a href="/aboutpreschool" class="nav-link flex items-center" data-target="about">
                        About Us
                    </a>
                    <!-- Dropdown Menu -->
                    <div
                        class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform -translate-y-2 group-hover:translate-y-0 z-50">
                        <div class="py-1">
                            <a href="#programs"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#F0A04B] hover:text-white transition-colors duration-200">Programs</a>
                            <a href="#curriculum"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#F0A04B] hover:text-white transition-colors duration-200">Curriculum</a>
                            <a href="#our-centre"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#F0A04B] hover:text-white transition-colors duration-200">Our
                                Centre</a>
                        </div>
                    </div>
                </div>

                <a href="#admission" class="nav-link" data-target="admission">Admission Process</a>
                <a href="https://parentinglife.id/" target="_blank" rel="noopener noreferrer" class="nav-link"
                    data-target="parenting">Parenting</a>
                <a href="#contact" class="nav-link" data-target="contact">Contact Us</a>
            </nav>

            <!-- RIGHT SIDE: Buttons -->
            <div class="flex items-center gap-3">
                <!-- Apply Now Button -->
                <a href="#apply"
                    class="hidden lg:inline-flex items-center gap-2 bg-white text-black px-5 py-2.5 rounded-full text-sm font-semibold shadow hover:bg-gray-100 hover:shadow-white/40 transition-transform transform hover:-translate-y-0.5">
                    <span>Apply Now</span>
                </a>

                <!-- Schedule a Visit Button -->
                <a href="#tour"
                    class="hidden lg:inline-flex items-center gap-2 border bg-yellow-400 border-yellow-400 text-black px-5 py-2.5 rounded-full text-sm font-semibold shadow hover:bg-yellow-400 hover:text-black hover:shadow-yellow-400/40 transition-transform transform hover:-translate-y-0.5">
                    <span>Schedule a Visit</span>
                </a>

                <!-- Login Button -->
                <a href="/preschool-login"
                    class="hidden xl:inline-flex items-center gap-2 bg-yellow-400 text-black px-5 py-2.5 rounded-full text-sm font-semibold shadow hover:bg-yellow-300 hover:shadow-yellow-400/40 transition-transform transform hover:-translate-y-0.5">
                    <span>Login</span>
                </a>

                <!-- Hamburger Button (mobile + tablet) -->
                <button id="menu-btn" class="xl:hidden text-white focus:outline-none z-50" aria-controls="mobile-menu"
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
        </div>
        <!-- Mobile/Tablet Menu -->
        <div id="mobile-menu"
            class="overflow-hidden transition-all duration-500 ease-in-out bg-black/90 shadow-2xl xl:hidden rounded-3xl mt-2 mx-4 ring-1 ring-yellow-400/50 backdrop-blur-xl opacity-0 pointer-events-none"
            style="max-height:0px;" aria-hidden="true">
            <nav class="flex flex-col divide-y divide-yellow-400/30 text-yellow-200 font-medium">
                <a href="#home"
                    class="px-6 py-4 hover:bg-yellow-400/15 hover:text-yellow-400 transition nav-link-mobile rounded-t-3xl"
                    data-target="home">🏠 Home</a>
                <a href="#about" class="px-6 py-4 hover:bg-yellow-400/15 hover:text-yellow-400 transition nav-link-mobile"
                    data-target="about">ℹ️ About Us</a>
                <a href="#programs"
                    class="px-6 py-4 hover:bg-yellow-400/15 hover:text-yellow-400 transition nav-link-mobile"
                    data-target="programs">🎯 Programs</a>
                <a href="#programs"
                    class="px-6 py-4 hover:bg-yellow-400/15 hover:text-yellow-400 transition nav-link-mobile"
                    data-target="programs">🎯 Our Curriculum</a>
                    <a href="#programs"
                    class="px-6 py-4 hover:bg-yellow-400/15 hover:text-yellow-400 transition nav-link-mobile"
                    data-target="programs">🎯 IPC CUrriculum</a>
                    <a href="#programs"
                    class="px-6 py-4 hover:bg-yellow-400/15 hover:text-yellow-400 transition nav-link-mobile"
                    data-target="programs">🎯 Our Centre</a>
                    <a href="#programs"
                    class="px-6 py-4 hover:bg-yellow-400/15 hover:text-yellow-400 transition nav-link-mobile"
                    data-target="programs">🎯 Admission Process</a>
                    <a href="#programs"
                    class="px-6 py-4 hover:bg-yellow-400/15 hover:text-yellow-400 transition nav-link-mobile"
                    data-target="programs">🎯 Parenting</a>
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

    {{-- HERO SECTION --}}
    <section id="home"
        class="relative flex items-center justify-center text-center h-[85vh] sm:h-[90vh] bg-cover bg-center overflow-hidden"
        style="background-image: url('{{ asset('img/hero.jpg') }}');">

        {{-- Content --}}
        <div class="relative z-10 px-6 sm:px-10 md:px-16 lg:px-24 max-w-4xl text-white" data-aos="fade-up"
            data-aos-duration="1200">
            <h1 class="text-4xl font-mono sm:text-5xl md:text-6xl font-extrabold mb-4 leading-tight">
                Nurturing <span class="text-[#FADA7A]">Young </span>Creative Thinker
            </h1>
            <p class="text-base font-sans sm:text-lg md:text-xl text-gray-200 mb-8 leading-relaxed max-w-2xl mx-auto">
                18 months - 6 years
                International Preschool Curriculum (IPC)

            </p>

            <div class="flex justify-center">
                <a href="#vision"
                    class="inline-block bg-[#FADA7A] text-[#4B5563] px-8 py-3 rounded-full font-semibold shadow-lg hover:bg-[#F0A04B] hover:text-white transition-all duration-300 hover:scale-105">
                    Book A School Tour
                </a>
            </div>
        </div>

        {{-- Decorative shapes --}}
        <div class="absolute bottom-10 left-10 w-28 h-28 bg-[#FADA7A]/30 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute top-10 right-10 w-40 h-40 bg-[#B1C29E]/30 rounded-full blur-3xl animate-pulse"></div>
    </section>
    {{-- VISI & MISI SECTION --}}
    <section id="vision" class="relative py-20 bg-white overflow-hidden">
        {{-- Garis transisi untuk menyatu dengan section sebelumnya --}}
        <div class="absolute top-0 left-0 w-full h-20 bg-gradient-to-b from-white/80 to-transparent z-0"></div>

        {{-- Decorative background elements --}}
        <div class="absolute top-0 left-0 w-40 h-40 bg-[#B1C29E]/40 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-56 h-56 bg-[#FADA7A]/40 rounded-full blur-3xl"></div>

        <div class="relative z-10 max-w-6xl mx-auto px-6 md:px-12">
            <div class="flex flex-col lg:flex-row items-start gap-12" data-aos="fade-up">
                {{-- Kolom kiri untuk teks --}}
                <div class="lg:w-1/2 text-left">
                    <h4 class="text-lg md:text-xl font-sans font-extrabold text-[#F0A04B] mb-4 uppercase tracking-wide">
                        Our Vision & Mission
                    </h4>
                    <h2
                        class="text-3xl md:text-3xl font-mono font-extrabold max-w-2xl text-[#B1C29E] mb-4 uppercase tracking-wide">
                        BUILDING BLOCKS TO NURTURE YOUNG CREATIVE THINKERS
                    </h2>
                    <p class="text-md text-black font-sans text-base md:text-md leading-relaxed">
                        At h!aacademy,we are dedicated to nurturing well-rounded development in every child. Our curriculum
                        is designed to enhance physical, emotional, social, and cognitive growth, helping children thrive in
                        a happy, supportive environment. We emphasize a deep understanding of nature and the world around
                        them while also providing a strong foundation in key subjects. With our focus on excellence in
                        English language skills, we prepare students to succeed both academically and socially.
                    </p>
                </div>

                {{-- Kolom kanan untuk gambar --}}
                <div class="lg:w-1/2 flex justify-center lg:justify-end">
                    <img src="{{ asset('img/vision.png') }}" alt="About h!aacademy"
                        class="rounded-lg shadow-lg w-full max-w-md lg:max-w-full object-cover">
                </div>
            </div>
        </div>
    </section>
    {{-- MESSAGE --}}
    <section id="message" class="relative py-16 md:py-20 bg-white overflow-hidden">
        {{-- Decorative background elements --}}
        <div class="absolute top-0 left-0 w-40 h-40 bg-[#B1C29E]/40 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-56 h-56 bg-[#FADA7A]/40 rounded-full blur-3xl"></div>
        <div class="absolute top-1/4 right-10 w-20 h-20 bubble opacity-70"></div>
        <div class="absolute bottom-1/3 left-10 w-16 h-16 bubble opacity-60"></div>

        <div class="relative z-10 max-w-6xl mx-auto px-6 md:px-12">
            <div class="text-center mb-12">
                <h2 class="fun-heading text-xl md:text-2xl font-sans font-bold text-[#F0A04B] mb-4 uppercase tracking-wide">
                    Message from Our Directors
                </h2>
                <div class="w-24 h-2 bg-[#FADA7A] rounded-full mx-auto"></div>
            </div>

            <div class="flex flex-col lg:flex-row items-center gap-10 lg:gap-16">
                <!-- Image Section -->
                <div class="w-full lg:w-2/5 flex justify-center" data-aos="fade-right">
                    <div class="relative">
                        <img src="{{ asset('img/director.png') }}" alt="Director" class="director-image w-full max-w-md">

                        <!-- Decorative elements around image -->
                        <div class="absolute -top-4 -left-4 w-8 h-8 bg-[#F0A04B] rounded-full opacity-70"></div>
                        <div class="absolute -bottom-4 -right-4 w-12 h-12 bg-[#FADA7A] rounded-full opacity-70"></div>

                        <!-- Director names under image -->
                        <div class="mt-6 text-center">
                            <h3 class="text-xl font-bold text-[#B1C29E]">Thomas Tan</h3>
                            <p class="text-gray-600 mt-1">School Directors</p>
                        </div>
                    </div>
                </div>

                <!-- Text Section -->
                <div class="w-full lg:w-3/5" data-aos="fade-left">
                    <div class="bg-white p-6 md:p-8 rounded-2xl shadow-lg border border-[#FADA7A]/30">
                        <div class="message-text text-gray-700 text-base md:text-">
                            <p class="mb-6">
                                At <span class="highlight font-semibold">h!academy Preschool</span>, we are deeply committed
                                to nurturing each child's innate
                                <span class="text-[#F0A04B] font-semibold">curiosity</span> and
                                <span class="text-[#F0A04B] font-semibold">creativity</span>, recognizing these qualities as
                                the cornerstones of meaningful learning.
                            </p>

                            <p class="mb-6">
                                We believe the most effective way for children to develop strong academic, social, and
                                emotional skills is through
                                <span class="text-[#F0A04B] font-semibold">play-based learning</span> and
                                <span class="text-[#F0A04B] font-semibold">hands-on experiences</span>. This approach makes
                                Kids Kingdom an enjoyable and enriching experience.
                            </p>

                            <p class="mb-6">
                                It helps children connect classroom concepts to real-life situations, sparking their sense
                                of wonder, encouraging curiosity, and fostering a
                                <span class="text-[#F0A04B] font-semibold">lifelong love for discovery and learning</span>.
                            </p>

                            <p class="mb-6">
                                Our dedicated team of educators is passionate about creating an environment where every
                                child feels supported and inspired to explore. By fostering independence, encouraging
                                creative expression, and promoting critical thinking, we aim to maintain a lifelong love for
                                learning that extends far beyond the classroom.
                            </p>

                            <p class="mb-6">
                                We firmly believe that when children feel <span class="text-[#F0A04B] font-semibold">happy,
                                    secure, and valued</span>, their potential for growth and achievement is limitless. Our
                                mission is to provide them with the foundation they need to thrive—not just academically but
                                as confident, well-rounded, and kind individuals.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="what-we-offer"
        class="relative py-16 md:py-20 bg-gradient-to-br from-[#FEF9E7] to-[#FDEBD0] overflow-hidden">
        <!-- Decorative elements -->
        <div class="absolute top-10 left-5 w-24 h-24 bubble opacity-40"></div>
        <div class="absolute top-1/3 right-10 w-16 h-16 bubble opacity-50"></div>
        <div class="absolute bottom-20 left-1/4 w-20 h-20 bubble opacity-30"></div>
        <div class="absolute bottom-10 right-20 w-28 h-28 bubble opacity-40"></div>

        <!-- Small decorative shapes -->
        <div class="absolute top-5 right-1/4 w-10 h-10 bg-[#B1C29E] rounded-full opacity-20"></div>
        <div class="absolute bottom-5 left-1/3 w-12 h-12 bg-[#F0A04B] rounded-full opacity-20"></div>

        <div class="relative z-10 max-w-6xl mx-auto px-6 md:px-12">
            <!-- Header Section -->
            <div class="text-center mb-12">
                <p class="text-lg md:text-xl text-gray-700 max-w-4xl mx-auto leading-relaxed">
                    h!academy offers a nurturing and creative world for children from 18 months to 6 years,
                    and we are committed to high-quality early childhood education.
                </p>
            </div>

            <!-- Main Content -->
            <div class="flex flex-col lg:flex-row items-center gap-10 lg:gap-16">
                <!-- Left Side - Visual Element -->
                <div class="w-full lg:w-2/5 flex justify-center" data-aos="fade-right">
                    <div class="relative">
                        <!-- Main Image -->
                        <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                            <img src="{{ asset('img/Rectangle-41134.webp') }}"
                                alt="Happy children at Kids Kingdom Preschool" class="w-full h-auto max-w-md rounded-2xl">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                        </div>

                        <!-- Floating Elements -->
                        <div
                            class="absolute -top-4 -left-4 w-16 h-16 bg-white rounded-2xl shadow-lg flex items-center justify-center">
                            <i class="fas fa-heart text-2xl text-[#F0A04B]"></i>
                        </div>
                        <div
                            class="absolute -bottom-4 -right-4 w-20 h-20 bg-white rounded-2xl shadow-lg flex items-center justify-center">
                            <i class="fas fa-star text-3xl text-[#FADA7A]"></i>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Quality Points -->
                <div class="w-full lg:w-3/5">
                    <div class="text-center mb-8">
                        <h3 class="fun-heading text-xl md:text-2xl text-[#F0A04B] mb-2">
                            At h!academy, We Cultivate:
                        </h3>
                        <div class="w-16 h-1 bg-[#FADA7A] rounded-full mx-auto"></div>
                    </div>

                    <!-- Single Column Quality Points with Enhanced Hover Animations -->
                    <div class="space-y-4">
                        <!-- Quality 1 -->
                        <div
                            class="quality-card group bg-white p-5 rounded-2xl shadow-md border-l-8 border-[#F0A04B] transition-all duration-500 ease-out hover:shadow-2xl hover:-translate-y-1 hover:scale-[1.01] hover:border-l-[12px] hover:bg-gradient-to-r hover:from-white hover:to-[#F0A04B]/5">
                            <div class="flex items-center gap-4">
                                <div
                                    class="bg-[#F0A04B] p-3 rounded-full text-white group-hover:scale-110 group-hover:rotate-12 transition-transform duration-500">
                                    <i class="fas fa-brain text-xl"></i>
                                </div>
                                <h4
                                    class="text-xl font-bold text-gray-800 group-hover:text-[#F0A04B] transition-colors duration-300">
                                    Independent Thinkers & Communicators</h4>
                            </div>
                        </div>

                        <!-- Quality 2 -->
                        <div
                            class="quality-card group bg-white p-5 rounded-2xl shadow-md border-l-8 border-[#FADA7A] transition-all duration-500 ease-out hover:shadow-2xl hover:-translate-y-1 hover:scale-[1.01] hover:border-l-[12px] hover:bg-gradient-to-r hover:from-white hover:to-[#FADA7A]/5">
                            <div class="flex items-center gap-4">
                                <div
                                    class="bg-[#FADA7A] p-3 rounded-full text-white group-hover:scale-110 group-hover:rotate-12 transition-transform duration-500">
                                    <i class="fas fa-lightbulb text-xl"></i>
                                </div>
                                <h4
                                    class="text-xl font-bold text-gray-800 group-hover:text-[#F0A04B] transition-colors duration-300">
                                    Creative Lifelong Learners</h4>
                            </div>
                        </div>

                        <!-- Quality 3 -->
                        <div
                            class="quality-card group bg-white p-5 rounded-2xl shadow-md border-l-8 border-[#B1C29E] transition-all duration-500 ease-out hover:shadow-2xl hover:-translate-y-1 hover:scale-[1.01] hover:border-l-[12px] hover:bg-gradient-to-r hover:from-white hover:to-[#B1C29E]/5">
                            <div class="flex items-center gap-4">
                                <div
                                    class="bg-[#B1C29E] p-3 rounded-full text-white group-hover:scale-110 group-hover:rotate-12 transition-transform duration-500">
                                    <i class="fas fa-hands-helping text-xl"></i>
                                </div>
                                <h4
                                    class="text-xl font-bold text-gray-800 group-hover:text-[#F0A04B] transition-colors duration-300">
                                    Social Contributors</h4>
                            </div>
                        </div>

                        <!-- Quality 4 -->
                        <div
                            class="quality-card group bg-white p-5 rounded-2xl shadow-md border-l-8 border-[#F0A04B] transition-all duration-500 ease-out hover:shadow-2xl hover:-translate-y-1 hover:scale-[1.01] hover:border-l-[12px] hover:bg-gradient-to-r hover:from-white hover:to-[#F0A04B]/5">
                            <div class="flex items-center gap-4">
                                <div
                                    class="bg-[#F0A04B] p-3 rounded-full text-white group-hover:scale-110 group-hover:rotate-12 transition-transform duration-500">
                                    <i class="fas fa-rocket text-xl"></i>
                                </div>
                                <h4
                                    class="text-xl font-bold text-gray-800 group-hover:text-[#F0A04B] transition-colors duration-300">
                                    Risk-Takers</h4>
                            </div>
                        </div>

                        <!-- Quality 5 -->
                        <div
                            class="quality-card group bg-white p-5 rounded-2xl shadow-md border-l-8 border-[#FADA7A] transition-all duration-500 ease-out hover:shadow-2xl hover:-translate-y-1 hover:scale-[1.01] hover:border-l-[12px] hover:bg-gradient-to-r hover:from-white hover:to-[#FADA7A]/5">
                            <div class="flex items-center gap-4">
                                <div
                                    class="bg-[#FADA7A] p-3 rounded-full text-white group-hover:scale-110 group-hover:rotate-12 transition-transform duration-500">
                                    <i class="fas fa-question-circle text-xl"></i>
                                </div>
                                <h4
                                    class="text-xl font-bold text-gray-800 group-hover:text-[#F0A04B] transition-colors duration-300">
                                    Curious Minds</h4>
                            </div>
                        </div>

                        <!-- Quality 6 -->
                        <div
                            class="quality-card group bg-white p-5 rounded-2xl shadow-md border-l-8 border-[#B1C29E] transition-all duration-500 ease-out hover:shadow-2xl hover:-translate-y-1 hover:scale-[1.01] hover:border-l-[12px] hover:bg-gradient-to-r hover:from-white hover:to-[#B1C29E]/5">
                            <div class="flex items-center gap-4">
                                <div
                                    class="bg-[#B1C29E] p-3 rounded-full text-white group-hover:scale-110 group-hover:rotate-12 transition-transform duration-500">
                                    <i class="fas fa-heart text-xl"></i>
                                </div>
                                <h4
                                    class="text-xl font-bold text-gray-800 group-hover:text-[#F0A04B] transition-colors duration-300">
                                    Respectful & Kind Preschoolers</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- IPC Curriculum Section -->
    <section class="py-16 md:py-20 bg-gradient-to-br from-[#FEF9E7] to-[#FDEBD0] relative overflow-hidden">
        <!-- Decorative elements -->
        <div class="absolute top-0 left-0 w-40 h-40 bg-[#B1C29E]/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-56 h-56 bg-[#FADA7A]/20 rounded-full blur-3xl"></div>

        <div class="max-w-6xl mx-auto px-6 md:px-12 relative z-10">
            <!-- Main Content - Image Left, Text Right -->
            <div class="flex flex-col lg:flex-row items-center gap-10 lg:gap-16 mb-16">
                <!-- Image Section -->
                <div class="w-full lg:w-2/5" data-aos="fade-right">
                    <div class="relative">
                        <img src="{{ asset('img/ipc.png') }}" alt="IPC Curriculum"
                            class="w-full max-w-md mx-auto rounded-full shadow-2xl hover:scale-105 transition-transform duration-500">
                        <!-- Decorative elements -->
                        <div class="absolute -top-4 -left-4 w-8 h-8 bg-[#F0A04B] rounded-full opacity-70"></div>
                        <div class="absolute -bottom-4 -right-4 w-12 h-12 bg-[#FADA7A] rounded-full opacity-70"></div>
                    </div>
                </div>

                <!-- Text Section -->
                <div class="w-full lg:w-3/5" data-aos="fade-left">
                    <h2 class="text-3xl md:text-4xl font-bold text-[#F0A04B] mb-6 text-center lg:text-left">IPC CURRICULUM
                    </h2>

                    <div class="space-y-4 text-gray-700 text-base md:text-lg">
                        <p>
                            The International Preschool Curriculum (IPC) is designed to surpass the standards set by major
                            education systems globally, establishing itself as the most widely recognized Early Childhood
                            Education (ECE) curriculum worldwide.
                        </p>

                        <p>
                            Going beyond basic literacy and numeracy, the IPC curriculum lays the groundwork for lifelong
                            learning, spanning numerous subject areas within six content domains, including numeracy,
                            language art, creative arts, sciences, motor skills, and socio-emotional skills.
                        </p>

                        <p>
                            The International Preschool Curriculum (IPC) has established itself as a leading authority in
                            global early childhood education by prioritizing innovation, excellence, and inclusivity in its
                            curriculum and educational practices.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Divider -->
            <div class="flex items-center justify-center mb-12">
                <div class="h-px bg-gradient-to-r from-transparent via-[#F0A04B] to-transparent w-3/4"></div>
            </div>
            <!-- IPC Key Features Section -->
            <div class="mt-16" data-aos="fade-up">
                <h3 class="text-2xl md:text-3xl font-bold text-[#F0A04B] mb-12 text-center">Key Features of IPC</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Feature 1: Parental Engagement -->
                    <div
                        class="bg-white rounded-2xl shadow-lg p-6 md:p-8 border border-[#FADA7A]/30 transition-all duration-500 hover:shadow-xl hover:-translate-y-1 group">
                        <div class="flex items-start gap-4 mb-4">
                            <div
                                class="bg-[#F0A04B] p-3 rounded-full text-white group-hover:scale-110 transition-transform duration-500">
                                <i class="fas fa-users text-xl"></i>
                            </div>
                            <h4 class="text-xl md:text-2xl font-bold text-[#F0A04B]">Parental Engagement</h4>
                        </div>
                        <p class="text-gray-700 leading-relaxed">
                            IPC recognizes the importance of parental involvement in children's education and promotes
                            collaboration between educators and parents. Through workshops, communication tools, and family
                            engagement activities, IPC strengthens the partnership between home and school, fostering a
                            supportive learning environment for children.
                        </p>
                    </div>

                    <!-- Feature 2: Comprehensive Curriculum -->
                    <div
                        class="bg-white rounded-2xl shadow-lg p-6 md:p-8 border border-[#FADA7A]/30 transition-all duration-500 hover:shadow-xl hover:-translate-y-1 group">
                        <div class="flex items-start gap-4 mb-4">
                            <div
                                class="bg-[#FADA7A] p-3 rounded-full text-white group-hover:scale-110 transition-transform duration-500">
                                <i class="fas fa-book text-xl"></i>
                            </div>
                            <h4 class="text-xl md:text-2xl font-bold text-[#F0A04B]">Comprehensive and Research-Based
                                Curriculum</h4>
                        </div>
                        <p class="text-gray-700 leading-relaxed">
                            IPC offers a comprehensive curriculum that integrates best practices from around the world. Its
                            curriculum modules encompass diverse subjects such as language arts, mathematics, science,
                            social studies, creative arts, physical development, and social-emotional learning. This
                            holistic approach ensures that children receive a well-rounded education that prepares them for
                            future academic success and personal growth.
                        </p>
                    </div>

                    <!-- Feature 3: Global Perspective -->
                    <div
                        class="bg-white rounded-2xl shadow-lg p-6 md:p-8 border border-[#FADA7A]/30 transition-all duration-500 hover:shadow-xl hover:-translate-y-1 group">
                        <div class="flex items-start gap-4 mb-4">
                            <div
                                class="bg-[#B1C29E] p-3 rounded-full text-white group-hover:scale-110 transition-transform duration-500">
                                <i class="fas fa-globe-americas text-xl"></i>
                            </div>
                            <h4 class="text-xl md:text-2xl font-bold text-[#F0A04B]">Global Perspective</h4>
                        </div>
                        <p class="text-gray-700 leading-relaxed">
                            IPC incorporates global perspectives into its curriculum, exposing children to diverse cultures,
                            languages, and global issues. This global awareness fosters cultural competence, empathy, and
                            respect for diversity among young learners, preparing them to thrive in an interconnected world.
                        </p>
                    </div>

                    <!-- Feature 4: Professional Development -->
                    <div
                        class="bg-white rounded-2xl shadow-lg p-6 md:p-8 border border-[#FADA7A]/30 transition-all duration-500 hover:shadow-xl hover:-translate-y-1 group">
                        <div class="flex items-start gap-4 mb-4">
                            <div
                                class="bg-[#F0A04B] p-3 rounded-full text-white group-hover:scale-110 transition-transform duration-500">
                                <i class="fas fa-graduation-cap text-xl"></i>
                            </div>
                            <h4 class="text-xl md:text-2xl font-bold text-[#F0A04B]">Professional Development</h4>
                        </div>
                        <p class="text-gray-700 leading-relaxed">
                            IPC prioritizes the professional development of educators through specialized training programs
                            and ongoing support. By equipping educators with the knowledge, skills, and resources needed to
                            effectively implement the curriculum, IPC ensures high-quality educational experiences that meet
                            the needs of diverse learners.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .curriculum-swiper {
            padding: 20px 0 40px;
        }

        .swiper-slide {
            height: auto;
        }

        .swiper-pagination-bullet {
            background-color: #B1C29E;
            opacity: 0.5;
            width: 12px;
            height: 12px;
        }

        .swiper-pagination-bullet-active {
            background-color: #F0A04B;
            opacity: 1;
        }

        .swiper-button-next,
        .swiper-button-prev {
            color: #F0A04B;
            background: rgba(255, 255, 255, 0.8);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .swiper-button-next:after,
        .swiper-button-prev:after {
            font-size: 18px;
            font-weight: bold;
        }
    </style>
    {{-- KURIKULUM SECTION --}}
    <section id="curriculum" class="relative py-20 bg-[#B1C29E] overflow-hidden">
        {{-- Decorative background elements --}}
        <div class="absolute top-0 left-0 w-40 h-40 bg-[#FADA7A]/30 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-56 h-56 bg-[#B1C29E]/30 rounded-full blur-3xl"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 md:px-12">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-extrabold text-[#F0A04B] mb-4 uppercase tracking-wide">
                    Our Curriculum
                </h2>
                <p class="text-gray-700 text-base md:text-lg max-w-3xl mx-auto leading-relaxed">
                    Tailored learning for each age group — nurturing creativity, curiosity, and confidence through play and
                    exploration.
                </p>
            </div>

            {{-- Detailed Curriculum Section with Image Left, Text Right Layout --}}
            <div class="mt-16 space-y-8">
                {{-- Little Sprouts Detailed --}}
                <div class="bg-white rounded-3xl shadow-lg overflow-hidden h-80" data-aos="fade-up">
                    <div class="flex h-full">
                        <div class="w-2/5 h-full flex-shrink-0">
                            <img src="{{ asset('img/sprouts.jpg') }}" alt="Little Sprouts Detailed"
                                class="w-full h-full object-cover">
                        </div>
                        <div class="w-3/5 p-6 flex flex-col justify-center">
                            <h3 class="text-xl font-bold text-[#4B5563] mb-2">Little Sprouts</h3>
                            <p class="text-[#F0A04B] font-semibold mb-3">6 months – 1 year old</p>
                            <p class="text-gray-600 text-sm leading-relaxed line-clamp-5">
                                The curriculum focuses on sensory exploration and foundational development, fostering growth
                                through tummy time, grasping toys, and exploring textures, colors, and sounds. Babies engage
                                in activities that encourage bonding, responding to coos and babbles, and participating in
                                simple songs and rhymes, laying the groundwork for physical, cognitive, and social-emotional
                                development.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Blossom Buds Detailed --}}
                <div class="bg-white rounded-3xl shadow-lg overflow-hidden h-80" data-aos="fade-up">
                    <div class="flex h-full">
                        <div class="w-2/5 h-full flex-shrink-0">
                            <img src="{{ asset('img/buds.jpg') }}" alt="Blossom Buds Detailed"
                                class="w-full h-full object-cover">
                        </div>
                        <div class="w-3/5 p-6 flex flex-col justify-center">
                            <h3 class="text-xl font-bold text-[#4B5563] mb-2">Blossom Buds</h3>
                            <p class="text-[#F0A04B] font-semibold mb-3">1 – 2 years old</p>
                            <p class="text-gray-600 text-sm leading-relaxed line-clamp-5">
                                This stage emphasizes early independence and discovery, with activities designed to enhance
                                walking, climbing, and stacking skills. Children explore shapes, colors, and cause-effect
                                toys while expanding their vocabulary and responding to simple instructions. Parallel play
                                and routines help develop social-emotional skills, promoting confidence and adaptability.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Sunshine Explorer Detailed --}}
                <div class="bg-white rounded-3xl shadow-lg overflow-hidden h-80" data-aos="fade-up">
                    <div class="flex h-full">
                        <div class="w-2/5 h-full flex-shrink-0">
                            <img src="{{ asset('img/sunshine.jpg') }}" alt="Sunshine Explorer Detailed"
                                class="w-full h-full object-cover">
                        </div>
                        <div class="w-3/5 p-6 flex flex-col justify-center">
                            <h3 class="text-xl font-bold text-[#4B5563] mb-2">Sunshine Explorer</h3>
                            <p class="text-[#F0A04B] font-semibold mb-3">3 – 4 years old</p>
                            <p class="text-gray-600 text-sm leading-relaxed line-clamp-5">
                                Focused on creativity, communication, and social skills, this curriculum includes running,
                                jumping, and improving fine motor coordination through art and play. Children engage in
                                imaginative activities, pattern recognition, and early numeracy, while developing language
                                skills through storytelling and asking questions. Cooperative play and emotional
                                understanding are nurtured in group settings.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Morning Glories Detailed --}}
                <div class="bg-white rounded-3xl shadow-lg overflow-hidden h-80" data-aos="fade-up">
                    <div class="flex h-full">
                        <div class="w-2/5 h-full flex-shrink-0">
                            <img src="{{ asset('img/morning.jpg') }}" alt="Morning Glories Detailed"
                                class="w-full h-full object-cover">
                        </div>
                        <div class="w-3/5 p-6 flex flex-col justify-center">
                            <h3 class="text-xl font-bold text-[#4B5563] mb-2">Morning Glories</h3>
                            <p class="text-[#F0A04B] font-semibold mb-3">5 – 6 years old</p>
                            <p class="text-gray-600 text-sm leading-relaxed line-clamp-5">
                                Preparing for kindergarten, this curriculum emphasizes holistic growth through advanced
                                motor skills like skipping and writing readiness. Activities include pre-literacy and
                                numeracy development, storytelling, and problem-solving. Social-emotional skills are
                                strengthened through teamwork, self-regulation, and leadership opportunities, fostering
                                responsibility and independence.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                .line-clamp-5 {
                    display: -webkit-box;
                    -webkit-line-clamp: 5;
                    -webkit-box-orient: vertical;
                    overflow: hidden;
                }
            </style>
        </div>
    </section>
    {{-- PROGRAMS --}}
    <section id="programs" class="py-20 bg-[#CADCAE] relative overflow-hidden">
        <div class="absolute bottom-0 right-0 w-52 h-52 bg-[#FADA7A]/40 rounded-full blur-2xl"></div>
        <div class="max-w-6xl mx-auto px-6">
            <h4 class="text-lg md:text-xl font-sans font-extrabold text-[#F0A04B] mb-4 uppercase tracking-wide">
                Programs
            </h4>

            <!-- Horizontal Scroll Container with Navigation -->
            <div class="relative group">
                <!-- Navigation Buttons -->
                <button
                    class="programs-prev absolute left-0 top-1/2 transform -translate-y-1/2 z-10 bg-white/90 hover:bg-white text-[#F0A04B] p-3 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition-all duration-300 hover:scale-110 -ml-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </button>

                <button
                    class="programs-next absolute right-0 top-1/2 transform -translate-y-1/2 z-10 bg-white/90 hover:bg-white text-[#F0A04B] p-3 rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition-all duration-300 hover:scale-110 -mr-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>

                <!-- Swiper Container -->
                <div class="swiper programs-swiper">
                    <div class="swiper-wrapper">
                        <!-- Playgroup -->
                        <div class="swiper-slide">
                            <div
                                class="rounded-2xl shadow-lg overflow-hidden transform hover:scale-105 transition duration-300 bg-white h-full">
                                <div class="h-48 w-full relative">
                                    <img src="{{ asset('img/playgroup.jpg') }}" alt="Playgroup"
                                        class="h-full w-full object-cover">
                                    <div class="absolute inset-0 bg-[#FADA7A]/30"></div>
                                </div>
                                <div class="p-5 text-center">
                                    <h3 class="text-xl font-bold text-[#F0A04B] mb-1">Playgroup</h3>
                                    <p class="text-gray-600">18 months – 2 years</p>
                                </div>
                            </div>
                        </div>

                        <!-- Pre-Nursery & Nursery -->
                        <div class="swiper-slide">
                            <div
                                class="rounded-2xl shadow-lg overflow-hidden transform hover:scale-105 transition duration-300 bg-white h-full">
                                <div class="h-48 w-full relative">
                                    <img src="{{ asset('img/nursery.jpg') }}" alt="Pre-Nursery & Nursery"
                                        class="h-full w-full object-cover">
                                    <div class="absolute inset-0 bg-[#B1C29E]/30"></div>
                                </div>
                                <div class="p-5 text-center">
                                    <h3 class="text-xl font-bold text-[#F0A04B] mb-1">Pre-Nursery & Nursery</h3>
                                    <p class="text-gray-600">2 – 3 years</p>
                                </div>
                            </div>
                        </div>

                        <!-- Kindergarten 1-3 -->
                        <div class="swiper-slide">
                            <div
                                class="rounded-2xl shadow-lg overflow-hidden transform hover:scale-105 transition duration-300 bg-white h-full">
                                <div class="h-48 w-full relative">
                                    <img src="{{ asset('img/kindergarten.jpg') }}" alt="Kindergarten 1-3"
                                        class="h-full w-full object-cover">
                                    <div class="absolute inset-0 bg-[#FCE7C8]/30"></div>
                                </div>
                                <div class="p-5 text-center">
                                    <h3 class="text-xl font-bold text-[#F0A04B] mb-1">Kindergarten 1-3</h3>
                                    <p class="text-gray-600">3 – 6 years</p>
                                </div>
                            </div>
                        </div>

                        <!-- Specialist Classes -->
                        <div class="swiper-slide">
                            <div
                                class="rounded-2xl shadow-lg overflow-hidden transform hover:scale-105 transition duration-300 bg-white h-full">
                                <div class="h-48 w-full relative">
                                    <img src="{{ asset('img/specialist.jpg') }}" alt="Specialist Classes"
                                        class="h-full w-full object-cover">
                                    <div class="absolute inset-0 bg-[#F0A04B]/30"></div>
                                </div>
                                <div class="p-5 text-center">
                                    <h3 class="text-xl font-bold text-[#F0A04B] mb-1">Specialist Classes</h3>
                                    <p class="text-gray-600">All ages</p>
                                </div>
                            </div>
                        </div>

                        <!-- Music Program -->
                        <div class="swiper-slide">
                            <div
                                class="rounded-2xl shadow-lg overflow-hidden transform hover:scale-105 transition duration-300 bg-white h-full">
                                <div class="h-48 w-full relative">
                                    <img src="{{ asset('img/specialist.jpg') }}" alt="Music Program"
                                        class="h-full w-full object-cover">
                                    <div class="absolute inset-0 bg-[#F0A04B]/30"></div>
                                </div>
                                <div class="p-5 text-center">
                                    <h3 class="text-xl font-bold text-[#F0A04B] mb-1">Music Program</h3>
                                    <p class="text-gray-600">All ages</p>
                                </div>
                            </div>
                        </div>

                        <!-- Art Program -->
                        <div class="swiper-slide">
                            <div
                                class="rounded-2xl shadow-lg overflow-hidden transform hover:scale-105 transition duration-300 bg-white h-full">
                                <div class="h-48 w-full relative">
                                    <img src="{{ asset('img/specialist.jpg') }}" alt="Art Program"
                                        class="h-full w-full object-cover">
                                    <div class="absolute inset-0 bg-[#F0A04B]/30"></div>
                                </div>
                                <div class="p-5 text-center">
                                    <h3 class="text-xl font-bold text-[#F0A04B] mb-1">Art Program</h3>
                                    <p class="text-gray-600">All ages</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination Dots -->
                    <div class="swiper-pagination mt-6"></div>
                </div>
            </div>
        </div>
    </section>
    {{-- GEDUNG & FASILITAS SECTION --}}
    <section id="our-centre" class="relative py-20 bg-[#FADA7A]/20 overflow-hidden">
        {{-- Decorative circles --}}
        <div class="absolute -top-16 right-10 w-48 h-48 bg-[#B1C29E]/30 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-56 h-56 bg-[#F0A04B]/30 rounded-full blur-3xl"></div>

        <div class="relative z-10 max-w-6xl mx-auto px-6 md:px-12">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-extrabold text-[#F0A04B] mb-4 uppercase tracking-wide">
                    School Building & Facilities
                </h2>
                <p class="text-white text-base md:text-lg max-w-3xl mx-auto leading-relaxed">
                    The building is designed to create a conducive, modern,
                    and comfortable learning atmosphere, in line with our
                    slogan "Nurturing Bright Futures with Hope".
                </p>
            </div>

            {{-- Content Grid --}}
            <div class="grid md:grid-cols-2 gap-12 items-center">
                {{-- Image gallery --}}
                <div class="grid grid-cols-2 gap-4" data-aos="fade-right">
                    <div class="rounded-2xl overflow-hidden shadow-md hover:scale-105 transition-transform duration-300">
                        <img src="{{ asset('img/about.png') }}" alt="Ruang Kelas"
                            class="object-cover w-full h-52 md:h-60 lg:h-64">
                    </div>
                    <div class="rounded-2xl overflow-hidden shadow-md hover:scale-105 transition-transform duration-300">
                        <img src="{{ asset('img/about1.png') }}" alt="Perpustakaan"
                            class="object-cover w-full h-52 md:h-60 lg:h-64">
                    </div>
                    <div class="rounded-2xl overflow-hidden shadow-md hover:scale-105 transition-transform duration-300">
                        <img src="{{ asset('img/about1.png') }}" alt="Pusat Olahraga"
                            class="object-cover w-full h-52 md:h-60 lg:h-64">
                    </div>
                    <div class="rounded-2xl overflow-hidden shadow-md hover:scale-105 transition-transform duration-300">
                        <img src="{{ asset('img/about2.png') }}" alt="Asrama"
                            class="object-cover w-full h-52 md:h-60 lg:h-64">
                    </div>
                </div>

                {{-- Text content --}}
                <div data-aos="fade-left" class="text-white space-y-6">
                    <h3 class="text-2xl md:text-3xl font-bold text-[#F0A04B] mb-4">Modern Learning Environment</h3>
                    <ul class="space-y-3 text-base md:text-lg">
                        <li class="flex items-start gap-3">
                            <span class="text-[#F0A04B] text-xl">🏫</span>
                            <p><strong>Classroom:</strong> are equipped with the latest
                                technology.</p>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-[#B1C29E] text-xl">📚</span>
                            <p><strong>Library:</strong> provides extensive access to
                                resources</p>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-[#FADA7A] text-xl">⚽</span>
                            <p><strong>Other facilities:</strong> designed to support sensory and
                                STEAM learning for preschoolers

                            </p>
                        </li>
                    </ul>
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
                    <h3 class="text-3xl md:text-4xl font-bold leading-tight">
                        <span class="bg-gradient-to-r text-yellow-400 bg-clip-text drop-shadow-md">
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
    <!-- Tombol Back to Top -->
    <button id="backToTopBtn"
        class="hidden fixed bottom-6 right-6 bg-yellow-400 text-black font-semibold p-3 rounded-full shadow-lg hover:bg-white transition-colors duration-300 z-50">
        ↑
    </button>
    {{-- SwiperJS CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    {{-- AOS Animation --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
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
    <script>
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('bg-[#00809D]/70', 'shadow-md');
                navbar.classList.remove('bg-transparent');
            } else {
                navbar.classList.remove('bg-[#00809D]/70', 'shadow-md');
                navbar.classList.add('bg-transparent');
            }
        });

        // Toggle mobile menu
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            mobileMenu.classList.toggle('animate-slideDown');
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            AOS.init({
                duration: 1000,
                once: true
            });
        });
    </script>
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
    <style>
        .programs-swiper {
            padding: 10px 5px 30px;
        }

        .swiper-slide {
            height: auto;
        }

        .swiper-pagination-bullet {
            background-color: #B1C29E;
            opacity: 0.5;
            width: 10px;
            height: 10px;
        }

        .swiper-pagination-bullet-active {
            background-color: #F0A04B;
            opacity: 1;
        }

        /* Custom scrollbar styling */
        .programs-swiper::-webkit-scrollbar {
            height: 6px;
        }

        .programs-swiper::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .programs-swiper::-webkit-scrollbar-thumb {
            background: #F0A04B;
            border-radius: 10px;
        }

        .programs-swiper::-webkit-scrollbar-thumb:hover {
            background: #e0903b;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const programsSwiper = new Swiper('.programs-swiper', {
                slidesPerView: 1,
                spaceBetween: 20,
                loop: true,
                centeredSlides: false,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.programs-next',
                    prevEl: '.programs-prev',
                },
                breakpoints: {
                    480: {
                        slidesPerView: 1.5,
                    },
                    640: {
                        slidesPerView: 2,
                    },
                    768: {
                        slidesPerView: 3,
                    },
                    1024: {
                        slidesPerView: 4,
                    },
                },
            });
        });
    </script>
@endsection