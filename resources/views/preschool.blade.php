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
    <header id="navbar" class="fixed top-0 left-0 w-full  z-50 transition-all duration-500 bg-transparent backdrop-blur-sm">
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
                class="hidden lg:flex absolute left-1/2 transform -translate-x-1/2 items-center space-x-10 text-white font-medium tracking-wide z-50"
                role="navigation" aria-label="Primary Navigation">
                <a href="#home" class="nav-link" data-target="home">Home</a>
                <a href="#about" class="nav-link" data-target="about">About Us</a>
                <a href="#programs" class="nav-link" data-target="programs">Programs</a>
                <a href="#contact" class="nav-link" data-target="contact">Contact Us</a>
            </nav>

            <!-- Login Button -->
            <a href="/login"
                class="inline-flex items-center gap-2 bg-yellow-400 text-black px-5 py-2.5 rounded-full text-sm font-semibold shadow hover:bg-yellow-300 hover:shadow-yellow-400/40 transition-transform transform hover:-translate-y-0.5">
                <span>Login</span>
            </a>

            <!-- Hamburger Button (mobile + tablet) -->
            <button id="menu-btn" class="lg:hidden text-black focus:outline-none z-50" aria-controls="mobile-menu"
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

    {{-- HERO SECTION --}}
    <section id="hero"
        class="relative flex items-center justify-center text-center h-[85vh] sm:h-[90vh] bg-cover bg-center overflow-hidden"
        style="background-image: url('{{ asset('img/hero.jpg') }}');">

        {{-- Content --}}
        <div class="relative z-10 px-6 sm:px-10 md:px-16 lg:px-24 max-w-4xl text-white" data-aos="fade-up"
            data-aos-duration="1200">
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold mb-4 leading-tight">
                Nurturing <span class="text-[#FADA7A]">Bright Futures</span><br class="hidden sm:block"> with Hope 🌱
            </h1>
            <p class="text-base sm:text-lg md:text-xl text-gray-200 mb-8 leading-relaxed max-w-2xl mx-auto">
                A joyful place for children to explore, imagine, and grow — nurturing confidence and creativity through love
                and discovery.
            </p>

            <div class="flex justify-center">
                <a href="#vision"
                    class="inline-block bg-[#FADA7A] text-[#4B5563] px-8 py-3 rounded-full font-semibold shadow-lg hover:bg-[#F0A04B] hover:text-white transition-all duration-300 hover:scale-105">
                    Learn More
                </a>
            </div>
        </div>

        {{-- Decorative shapes --}}
        <div class="absolute bottom-10 left-10 w-28 h-28 bg-[#FADA7A]/30 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute top-10 right-10 w-40 h-40 bg-[#B1C29E]/30 rounded-full blur-3xl animate-pulse"></div>
    </section>

    {{-- VISI & MISI SECTION --}}
    <section id="vision" class="relative py-20 bg-white overflow-hidden">
        {{-- Decorative background elements --}}
        <div class="absolute top-0 left-0 w-40 h-40 bg-[#B1C29E]/40 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-56 h-56 bg-[#FADA7A]/40 rounded-full blur-3xl"></div>

        <div class="relative z-10 max-w-6xl mx-auto px-6 md:px-12">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-extrabold text-[#F0A04B] mb-4 uppercase tracking-wide">
                    Our Vision & Mission
                </h2>
                <p class="text-black text-base md:text-lg max-w-3xl mx-auto leading-relaxed">
                    “At h!aacademy, we are dedicated to nurturing well-rounded development in every child. Our curriculum is designed to enhance physical, emotional, social, and cognitive growth, helping children thrive in a happy, supportive environment. We emphasize a deep understanding of nature and the world around them while also providing a strong foundation in key subjects. With our focus on excellence in English language skills, we prepare students to succeed both academically and socially.”
                </p>
            </div>

            {{-- 3 Mission Cards --}}
            <div class="grid md:grid-cols-3 gap-8 mt-10">
                {{-- Misi 1 --}}
                <div class="bg-white rounded-3xl shadow-lg p-8 hover:scale-105 transition-transform duration-300"
                    data-aos="fade-up" data-aos-delay="100">
                    <div class="text-[#F0A04B] text-3xl mb-4">🌈</div>
                    <h3 class="text-xl font-bold text-[#4B5563] mb-2">Misi 1</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Menyediakan lingkungan pembelajaran yang aman, inklusif, dan penuh kasih, di mana setiap anak merasa
                        dihargai, diterima, dan didorong untuk mengeksplorasi potensi mereka.
                    </p>
                </div>

                {{-- Misi 2 --}}
                <div class="bg-white rounded-3xl shadow-lg p-8 hover:scale-105 transition-transform duration-300"
                    data-aos="fade-up" data-aos-delay="200">
                    <div class="text-[#F0A04B] text-3xl mb-4">🎨</div>
                    <h3 class="text-xl font-bold text-[#4B5563] mb-2">Misi 2</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Mendukung perkembangan sosial, emosional, dan akademik setiap anak melalui pendekatan pembelajaran
                        yang
                        menyenangkan dan berbasis eksplorasi.
                    </p>
                </div>

                {{-- Misi 3 --}}
                <div class="bg-white rounded-3xl shadow-lg p-8 hover:scale-105 transition-transform duration-300"
                    data-aos="fade-up" data-aos-delay="300">
                    <div class="text-[#F0A04B] text-3xl mb-4">🤝</div>
                    <h3 class="text-xl font-bold text-[#4B5563] mb-2">Misi 3</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Membangun kemitraan yang kuat dengan orang tua dan komunitas, memastikan bahwa pendidikan anak
                        didukung
                        oleh kerja sama yang erat antara rumah dan sekolah.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- GEDUNG & FASILITAS SECTION --}}
    <section id="facilities" class="relative py-20 bg-[#FADA7A]/20 overflow-hidden">
        {{-- Decorative circles --}}
        <div class="absolute -top-16 right-10 w-48 h-48 bg-[#B1C29E]/30 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-56 h-56 bg-[#F0A04B]/30 rounded-full blur-3xl"></div>

        <div class="relative z-10 max-w-6xl mx-auto px-6 md:px-12">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-extrabold text-[#F0A04B] mb-4 uppercase tracking-wide">
                    Our Campus & Facilities
                </h2>
                <p class="text-white text-base md:text-lg max-w-3xl mx-auto leading-relaxed">
                    Gedung h!academy dirancang untuk menciptakan suasana belajar yang kondusif, modern, dan nyaman —
                    mendukung pertumbuhan anak secara holistik di lingkungan yang penuh inspirasi.
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
                        <img src="{{ asset('img/playground.jpg') }}" alt="Pusat Olahraga"
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
                            <p><strong>Ruang Kelas:</strong> Dilengkapi teknologi terbaru untuk mendukung pembelajaran
                                interaktif dan kreatif.</p>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-[#B1C29E] text-xl">📚</span>
                            <p><strong>Perpustakaan:</strong> Menyediakan akses luas terhadap berbagai bahan bacaan dan
                                media pembelajaran digital.</p>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="text-[#FADA7A] text-xl">⚽</span>
                            <p><strong>Fasilitas Pendukung:</strong> Pusat olahraga, area bermain, dan asrama yang nyaman
                                untuk siswa.</p>
                        </li>
                    </ul>

                    <p class="mt-6 text-yellow-400 italic">
                        “Nurturing Bright Futures with Hope” — setiap sudut h!academy dirancang untuk menumbuhkan semangat
                        belajar dan rasa ingin tahu anak.
                    </p>
                </div>
            </div>
        </div>
    </section>
    {{-- KURIKULUM SECTION --}}
    <section id="curriculum" class="relative py-20 bg-[#FADA7A]/70 overflow-hidden">
        {{-- Decorative background elements --}}
        <div class="absolute top-0 left-0 w-40 h-40 bg-[#FADA7A]/30 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-56 h-56 bg-[#B1C29E]/30 rounded-full blur-3xl"></div>

        <div class="relative z-10 max-w-6xl mx-auto px-6 md:px-12">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl md:text-4xl font-extrabold text-[#F0A04B] mb-4 uppercase tracking-wide">
                    Our Curriculum
                </h2>
                <p class="text-gray-700 text-base md:text-lg max-w-3xl mx-auto leading-relaxed">
                    Tailored learning for each age group — nurturing creativity, curiosity, and confidence through play and
                    exploration.
                </p>
            </div>

            {{-- 4 Curriculum Cards --}}
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
                {{-- 1. Little Sprouts --}}
                <div class="bg-white rounded-3xl shadow-lg overflow-hidden transform hover:scale-105 transition-all duration-300"
                    data-aos="zoom-in" data-aos-delay="100">
                    <div class="h-44 bg-[#B1C29E]/30 flex items-center justify-center text-5xl">🌱</div>
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-bold text-[#4B5563] mb-1">Little Sprouts</h3>
                        <p class="text-[#F0A04B] font-semibold mb-3">6 months – 1 year old</p>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Fokus pada eksplorasi sensorik dan perkembangan dasar melalui aktivitas seperti tummy time,
                            permainan warna, dan suara — membangun dasar fisik dan emosional.
                        </p>
                    </div>
                </div>

                {{-- 2. Blossom Buds --}}
                <div class="bg-white rounded-3xl shadow-lg overflow-hidden transform hover:scale-105 transition-all duration-300"
                    data-aos="zoom-in" data-aos-delay="200">
                    <div class="h-44 bg-[#FADA7A]/40 flex items-center justify-center text-5xl">🌸</div>
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-bold text-[#4B5563] mb-1">Blossom Buds</h3>
                        <p class="text-[#F0A04B] font-semibold mb-3">1 – 2 years old</p>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Tahap kemandirian awal dan eksplorasi. Anak belajar berjalan, mengenal bentuk, warna, dan bahasa
                            sederhana
                            melalui permainan interaktif yang menyenangkan.
                        </p>
                    </div>
                </div>

                {{-- 3. Sunshine Explorer --}}
                <div class="bg-white rounded-3xl shadow-lg overflow-hidden transform hover:scale-105 transition-all duration-300"
                    data-aos="zoom-in" data-aos-delay="300">
                    <div class="h-44 bg-[#F0A04B]/40 flex items-center justify-center text-5xl">☀️</div>
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-bold text-[#4B5563] mb-1">Sunshine Explorer</h3>
                        <p class="text-[#F0A04B] font-semibold mb-3">3 – 4 years old</p>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Menumbuhkan kreativitas, komunikasi, dan kemampuan sosial. Anak belajar bercerita, mengenali
                            pola,
                            serta mengembangkan koordinasi motorik melalui seni dan permainan.
                        </p>
                    </div>
                </div>

                {{-- 4. Morning Glories --}}
                <div class="bg-white rounded-3xl shadow-lg overflow-hidden transform hover:scale-105 transition-all duration-300"
                    data-aos="zoom-in" data-aos-delay="400">
                    <div class="h-44 bg-[#B1C29E]/30 flex items-center justify-center text-5xl">🌼</div>
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-bold text-[#4B5563] mb-1">Morning Glories</h3>
                        <p class="text-[#F0A04B] font-semibold mb-3">5 – 6 years old</p>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Persiapan menuju sekolah dasar. Fokus pada literasi awal, numerasi, dan keterampilan sosial,
                            sambil menumbuhkan tanggung jawab dan kepemimpinan melalui kegiatan kolaboratif.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CURRICULUM --}}
    <section class="py-20 bg-[#FADA7A]/20 text-center relative">
        <div class="absolute top-0 left-0 w-32 h-32 bg-[#B1C29E]/30 rounded-full blur-xl"></div>
        <div class="max-w-4xl mx-auto px-6 relative z-10">
            <h2 class="text-3xl font-bold text-[#F0A04B] mb-6" data-aos="fade-up">IPC Curriculum</h2>
            <p class="text-white leading-relaxed mb-10" data-aos="fade-up" data-aos-delay="150">
                Our International Preschool Curriculum (IPC) combines play-based learning with inquiry-driven projects,
                designed to inspire curiosity and help children develop communication, collaboration, and creativity.
            </p>
            <img src="{{ asset('img/ipc.png') }}" alt="IPC Curriculum"
                class="mx-auto w-72 hover:scale-105 transition-transform duration-500" data-aos="zoom-in">
        </div>
    </section>

    {{-- PROGRAMS --}}
    <section id="programs" class="py-20 bg-[#FCE7C8]/70 relative overflow-hidden">
        <div class="absolute bottom-0 right-0 w-52 h-52 bg-[#FADA7A]/40 rounded-full blur-2xl"></div>
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-[#F0A04B] mb-10" data-aos="fade-up">Programs</h2>

            <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-6">
                <!-- Playgroup -->
                <div class="rounded-2xl shadow-lg overflow-hidden transform hover:scale-105 transition duration-300 bg-white"
                    data-aos="zoom-in">
                    <div class="h-48 w-full relative">
                        <img src="{{ asset('img/playgroup.jpg') }}" alt="Playgroup" class="h-full w-full object-cover">
                        <div class="absolute inset-0 bg-[#FADA7A]/30"></div>
                    </div>
                    <div class="p-5 text-center">
                        <h3 class="text-xl font-bold text-[#F0A04B] mb-1">Playgroup</h3>
                        <p class="text-gray-600">18 months – 2 years</p>
                    </div>
                </div>

                <!-- Pre-Nursery & Nursery -->
                <div class="rounded-2xl shadow-lg overflow-hidden transform hover:scale-105 transition duration-300 bg-white"
                    data-aos="zoom-in">
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

                <!-- Kindergarten 1-3 -->
                <div class="rounded-2xl shadow-lg overflow-hidden transform hover:scale-105 transition duration-300 bg-white"
                    data-aos="zoom-in">
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

                <!-- Specialist Classes -->
                <div class="rounded-2xl shadow-lg overflow-hidden transform hover:scale-105 transition duration-300 bg-white"
                    data-aos="zoom-in">
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
        </div>
    </section>


    {{-- FOOTER --}}
    <footer class="bg-[#F0A04B] text-white py-10 text-center relative overflow-hidden">
        <div class="absolute top-0 left-0 w-40 h-40 bg-[#FADA7A]/30 rounded-full blur-2xl"></div>
        <div class="relative z-10">
            <h3 class="text-2xl font-bold mb-2">Kids Kingdom International Kindergarten</h3>
            <p class="text-sm opacity-90 mb-4">Learning through play, with love and imagination 🌈</p>
            <p class="text-xs">© {{ date('Y') }} Kids Kingdom International Kindergarten. All rights reserved.</p>
        </div>
    </footer>
    <script>
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('bg-[#B1C29E]/40', 'shadow-md');
                navbar.classList.remove('bg-transparent');
            } else {
                navbar.classList.remove('bg-[#B1C29E]/40', 'shadow-md');
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
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
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
@endsection