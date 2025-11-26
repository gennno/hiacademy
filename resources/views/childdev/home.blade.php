@extends('layouts.layout')

@section('title', 'h!academy')

@section('content')


    {{-- Background Carousel --}}
    <div id="background-carousel" class="carousel-container">
        <img src="{{ asset('img/child_develop.jpg') }}" class="carousel-slide active" alt="English Program" loading="eager">
    </div>

    <div class="carousel-overlay"></div>

    <style>
        .carousel-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            height: 100dvh;
            overflow: hidden;
            z-index: -10;
            transform: translate3d(0, 0, 0);
            -webkit-transform: translate3d(0, 0, 0);
            backface-visibility: hidden;
            -webkit-backface-visibility: hidden;
            contain: layout style paint;
        }

        .carousel-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            height: 100dvh;
            background-color: rgba(0, 0, 0, 0.65);
            z-index: -10;
            pointer-events: none;
            transform: translate3d(0, 0, 0);
            backface-visibility: hidden;
        }

        .carousel-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            opacity: 1;
            transform: translate3d(0, 0, 0);
            -webkit-transform: translate3d(0, 0, 0);
            backface-visibility: hidden;
            -webkit-backface-visibility: hidden;
            pointer-events: none;
            user-select: none;
            -webkit-user-select: none;
            -webkit-touch-callout: none;
        }
    </style>

    <header id="main-header" class="fixed top-0 left-0 w-full z-50">
        <!-- Background Layer -->
        <div id="header-bg" class="absolute inset-0 bg-transparent transition-all duration-500"></div>

        <!-- NAV CONTAINER -->
        <div class="relative flex items-center justify-between px-6 lg:px-12 py-4">
            {{-- 🔙 Back + Logo --}}
            <div class="flex items-center gap-4">
                <a href="/" class="flex items-center text-yellow-400 hover:text-yellow-300 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                    <span class="hidden sm:inline text-sm font-semibold ml-1">Back</span>
                </a>

                <a href="/english#home" class="flex items-center gap-2">
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

            <!-- Visual container (desktop only) -->
            <div id="visual-container"
                class="hidden lg:flex  gap-3 items-center justify-end pl-10 pr-6 py-3 bg-white/10 backdrop-blur-md rounded-full ring-1 ring-yellow-400/30 shadow-lg transition-all duration-300 absolute z-30"
                style="right:1rem;">
                <a href="/register"
                    class="inline-flex items-center gap-2 bg-white text-black px-5 py-2.5 rounded-full text-sm font-semibold shadow hover:bg-yellow-300 hover:shadow-yellow-400/40 transition-transform transform hover:-translate-y-0.5">
                    <span>Apply Now</span>
                </a>
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
                    data-target="home">Home</a>
                <a href="#about" class="px-6 py-4 hover:bg-yellow-400/15 hover:text-yellow-400 transition nav-link-mobile"
                    data-target="about">About</a>
                <a href="#programs"
                    class="px-6 py-4 hover:bg-yellow-400/15 hover:text-yellow-400 transition nav-link-mobile"
                    data-target="programs">Programs</a>
                <a href="#contact" class="px-6 py-4 hover:bg-yellow-400/15 hover:text-yellow-400 transition nav-link-mobile"
                    data-target="contact">Contact</a>
                <div class="px-6 py-5 bg-yellow-400/10 text-center">
                    <a href="/register"
                        class="inline-flex items-center justify-center gap-2 bg-white text-black w-full py-3 rounded-full font-semibold text-sm shadow hover:bg-yellow-300 hover:shadow-yellow-400/40 transition-transform transform hover:-translate-y-0.5">
                        <span>Apply Now</span>
                    </a>
                </div>
                <div class="px-6 py-5 bg-yellow-400/10 text-center">
                    <a href="/login"
                        class="inline-flex items-center justify-center gap-2 bg-yellow-400 text-black w-full py-3 rounded-full font-semibold text-sm shadow hover:bg-yellow-300 hover:shadow-yellow-400/40 transition-transform transform hover:-translate-y-0.5">
                        <span>Login</span>
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
        #mobile-menu {
            transition: all 0.25s ease-in-out;
        }

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
                setTimeout(() => mobileMenu.classList.remove('show'), 250);
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
        <div class="max-w-7xl mx-auto px-6 lg:px-12 relative z-10">
            <div class="text-right">
                <h2 class="text-lg md:text-xl font-light tracking-wide mb-4 text-gray-200" data-aos="fade-up">
                    <span class="text-yellow-300 font-medium">h!</span><span class="text-white">academy</span>
                </h2>

                <h1 class="text-4xl md:text-6xl font-bold text-white leading-tight mb-6 tracking-tight" data-aos="fade-up"
                    data-aos-delay="100">
                    Child Development Center:<br>
                    <span class="text-yellow-300">Nurturing Tomorrow's Leaders,</span> Today
                </h1>

                <p class="text-base md:text-lg text-gray-300 leading-relaxed font-normal max-w-3xl ml-auto"
                    data-aos="fade-up" data-aos-delay="200">
                    Holistic Child Development Program: Building Foundations for Lifelong Success
                </p>

                <div class="mt-10 flex gap-4 justify-end" data-aos="fade-up" data-aos-delay="300">
                    <a href="#trial"
                        class="inline-block bg-yellow-400 text-blue-900 font-medium px-8 py-3 rounded-lg shadow-md hover:bg-yellow-300 hover:shadow-yellow-400/40 transition-transform transform hover:-translate-y-0.5">
                        Book Free Trial →
                    </a>
                    <a href="#programs"
                        class="inline-block border-2 border-yellow-400 text-yellow-400 font-medium px-8 py-3 rounded-lg hover:bg-yellow-400 hover:text-blue-900 transition-all">
                        Explore Levels
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- About English Program Section --}}
    <section id="about" class="bg-gray-800/50 pt-36 pb-16 relative backdrop-blur-md rounded-2xl shadow-xl -mt-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl md:text-5xl text-white font-semibold leading-tight tracking-tight mb-6">
                    About <span class="text-yellow-300">Child Development Program</span>
                </h2>
                <p class="text-lg text-gray-200 max-w-4xl mx-auto leading-relaxed">
                    At HiAcademy Child Development Center, our mission is to empower futures, one child at a time. We
                    believe that every child deserves a comprehensive foundation that nurtures not just academic abilities,
                    but their complete psychological, physical, and social well-being. Our integrated approach transforms
                    potential into excellence, moving children from uncertainty to confidence, and from capability to
                    mastery.
                </p>
            </div>
        </div>
        <div class="text-center pt-16 mb-16" data-aos="fade-up">
            <h2 class="text-4xl md:text-5xl text-white font-semibold leading-tight tracking-tight mb-6">
                Our Vision for <span class="text-yellow-300">Child Development</span>
            </h2>
            <p class="text-lg text-gray-200 max-w-4xl mx-auto leading-relaxed">
                We envision a future where every HiAcademy child doesn't just succeed academically—they thrive emotionally,
                communicate effectively, and lead confidently. We don't just support development; we cultivate well-rounded
                individuals equipped to navigate life's challenges and opportunities.
            </p>
        </div>
    </section>

    <section id="method" class="py-16 pb-36">
        <div class="container mx-auto px-6 lg:px-16">
            <!-- Title -->
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-white">The <span class="text-yellow-300">HiAcademy</span>
                    Difference: Integrated <span class="text-yellow-300">Development</span> for Whole-Child<span
                        class="text-yellow-300"> Growth</span></h2>
                <p class="mt-4 text-white max-w-3xl mx-auto leading-relaxed">
                    We go beyond traditional education to cultivate complete developmental success. <br>
                    At HiAcademy CDC, we focus on building:
                </p>
            </div>

            <!-- Content -->
            <div class="flex flex-col lg:flex-row items-center gap-8">
                <!-- Left Image -->
                <div class="lg:w-1/2">
                    <img src="{{ asset('img/carousel3.webp') }}" alt="IPC vs Traditional"
                        class="rounded-2xl opacity-80 shadow-md w-full object-cover">
                </div>

                <!-- Right Accordion -->
                <div class="lg:w-1/2 space-y-4">
                    <!-- Curriculum Design -->
                    <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
                        <button onclick="toggleAccordiontraditional('curriculum')"
                            class="w-full flex justify-between items-center px-6 py-4 text-black font-semibold hover:bg-yellow-300 transition">
                            Emotional Resilience
                            <span id="curriculum-icon"
                                class="bg-white text-black w-6 h-6 rounded-full flex items-center justify-center font-bold">+</span>
                        </button>
                        <div id="curriculum-content"
                            class="max-h-0 overflow-hidden opacity-0 transition-all duration-500 ease-in-out">
                            <p class="px-6 pb-4 text-gray-600 leading-relaxed">
                                We help children develop self-awareness, emotional regulation, and positive social
                                relationships.
                            </p>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
                        <button onclick="toggleAccordiontraditional('Confident')"
                            class="w-full flex justify-between items-center px-6 py-4 text-black font-semibold hover:bg-yellow-300 transition">
                            Confident Communication
                            <span id="Confident-id"
                                class="bg-white text-black w-6 h-6 rounded-full flex items-center justify-center font-bold">+</span>
                        </button>
                        <div id="Confident-content"
                            class="max-h-0 overflow-hidden opacity-0 transition-all duration-500 ease-in-out">
                            <p class="px-6 pb-4 text-gray-600 leading-relaxed">
                                Students build strong verbal and non-verbal communication skills for effective
                                self-expression.
                            </p>
                        </div>
                    </div>

                    <!-- Teaching Methods -->
                    <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
                        <button onclick="toggleAccordiontraditional('teaching')"
                            class="w-full flex justify-between items-center px-6 py-4 text-black font-semibold hover:bg-yellow-300 transition">
                            Physical Well-being
                            <span id="teaching-icon"
                                class="bg-white text-black w-6 h-6 rounded-full flex items-center justify-center font-bold">+</span>
                        </button>
                        <div id="teaching-content"
                            class="max-h-0 overflow-hidden opacity-0 transition-all duration-500 ease-in-out">
                            <p class="px-6 pb-4 text-gray-600 leading-relaxed">
                                We support healthy development through proper nutrition and physical coordination.
                            </p>
                        </div>
                    </div>

                    <!-- Role of the Teacher -->
                    <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
                        <button onclick="toggleAccordiontraditional('teacher')"
                            class="w-full flex justify-between items-center px-6 py-4 text-black font-semibold hover:bg-yellow-300 transition">
                            Cognitive Excellence
                            <span id="teacher-icon"
                                class="bg-white text-black w-6 h-6 rounded-full flex items-center justify-center font-bold">+</span>
                        </button>
                        <div id="teacher-content"
                            class="max-h-0 overflow-hidden opacity-0 transition-all duration-500 ease-in-out">
                            <p class="px-6 pb-4 text-gray-600 leading-relaxed">
                                Children develop strong academic foundations and critical thinking skills.
                            </p>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
                        <button onclick="toggleAccordiontraditional('Readiness')"
                            class="w-full flex justify-between items-center px-6 py-4 text-black font-semibold hover:bg-yellow-300 transition">
                            Life Readiness
                            <span id="Readiness-icon"
                                class="bg-white text-black w-6 h-6 rounded-full flex items-center justify-center font-bold">+</span>
                        </button>
                        <div id="Readiness-content"
                            class="max-h-0 overflow-hidden opacity-0 transition-all duration-500 ease-in-out">
                            <p class="px-6 pb-4 text-gray-600 leading-relaxed">
                                We equip children with practical life skills from financial literacy to public speaking.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function toggleIpcAccordion(id) {
                const content = document.getElementById(id + '-content');
                const icon = document.getElementById(id + '-icon');

                const isOpen = content.classList.contains('max-h-[400px]');

                // Tutup semua accordion lain di section ini
                document.querySelectorAll("[id$='-content']").forEach(el => {
                    el.classList.remove('max-h-[400px]', 'opacity-100');
                    el.classList.add('max-h-0', 'opacity-0');
                });
                document.querySelectorAll("[id$='-icon']").forEach(el => el.textContent = '+');

                // Buka accordion yang dipilih
                if (!isOpen) {
                    content.classList.remove('max-h-0', 'opacity-0');
                    content.classList.add('max-h-[400px]', 'opacity-100');
                    icon.textContent = '−';
                }
            }
        </script>

    </section>

    {{-- Proven Curriculum Section --}}
    <section class="bg-gray-800/50 pt-16 pb-16 relative backdrop-blur-md rounded-2xl shadow-xl -mt-16">
        <div class="max-w-7xl mx-auto px-6">
            {{-- CEFR Framework --}}
            <div class="bg-gradient-to-br from-blue-900/50 to-purple-900/50 p-10 rounded-2xl backdrop-blur-sm border-2 border-yellow-400"
                data-aos="fade-up">
                <div class="text-center mb-8">
                    <h3 class="text-3xl font-bold text-white mb-4">Our Proven Framework</h3>
                    <p class="text-xl text-yellow-300 font-semibold">The Whole-Child Development Approach</p>
                </div>
                <p class="text-gray-200 text-lg leading-relaxed mb-6 max-w-4xl mx-auto">
                    HiAcademy's Child Development Program is built on the internationally recognized Whole-Child Development
                    Framework, integrating multiple therapeutic and educational methodologies to ensure comprehensive growth
                    and measurable progress.
                </p>

                <div class="grid md:grid-cols-3 gap-6 mt-8">
                    <div class="bg-white/10 p-6 rounded-xl hover:scale-105 transition-transform">
                        <div class="text-yellow-400 text-4xl mb-3">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h4 class="text-white font-semibold text-lg mb-2">Individualized Assessment</h4>
                        <p class="text-gray-300 text-sm">Each child receives comprehensive evaluation across all
                            developmental domains, allowing us to create personalized growth plans.</p>
                    </div>

                    <div class="bg-white/10 p-6 rounded-xl hover:scale-105 transition-transform">
                        <div class="text-yellow-400 text-4xl mb-3">
                            <i class="fas fa-balance-scale"></i>
                        </div>
                        <h4 class="text-white font-semibold text-lg mb-2">Multidisciplinary Collaboration</h4>
                        <p class="text-gray-300 text-sm">Our specialists work together across disciplines to ensure
                            consistent, coordinated support for every child's unique needs.
                        </p>
                    </div>

                    <div class="bg-white/10 p-6 rounded-xl hover:scale-105 transition-transform">
                        <div class="text-yellow-400 text-4xl mb-3">
                            <i class="fas fa-users"></i>
                        </div>
                        <h4 class="text-white font-semibold text-lg mb-2">Family-Centered Practice</h4>
                        <p class="text-gray-300 text-sm">We partner with parents as essential members of the development
                            team, providing tools and strategies for home support.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Programs Section --}}
    <section id="programs" class="py-24 px-6 text-center bg-white/1 text-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold text-yellow-400 mb-4">Our Comprehensive Program Framework</h2>
                <p class="text-gray-200 text-lg max-w-3xl mx-auto">
                    Our integrated services are designed to address every aspect of your child's development journey.
                </p>
            </div>

            {{-- Teenagers --}}
            <div class="mb-12" data-aos="fade-up">
                {{-- Sub Cards --}}
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

                    {{-- A1 Seeker --}}
                    <div
                        class="bg-white/10 p-6 rounded-2xl border-2 border-blue-300 hover:scale-105 transition-transform text-left">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-12 h-12 bg-blue-300 rounded-full flex items-center justify-center">
                                <i class="fas fa-1 text-white text-lg"></i>
                            </div>
                            <h4 class="text-lg font-semibold text-white"><span class="text-blue-200">Psychology and Behaviour Support</span>
                            </h4>
                        </div>
                        <p class="text-red-100 text-sm"><strong>Focus:</strong> Building emotional intelligence and positive behavior patterns</p>
                        <p class="text-red-100 text-sm mt-1"><strong>Description:</strong> Our child psychologists provide individual and group therapy sessions focusing on emotional regulation, social skills development, anxiety management, and behavior modification. We use evidence-based techniques including CBT, play therapy, and social thinking strategies to help children develop healthy coping mechanisms and positive relationships.</p>
                    </div>

                    {{-- A2 Explorer --}}
                    <div
                        class="bg-white/10 p-6 rounded-2xl border-2 border-green-300 hover:scale-105 transition-transform text-left">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-12 h-12 bg-green-300 rounded-full flex items-center justify-center">
                                <i class="fas fa-2 text-white text-lg"></i>
                            </div>
                            <h4 class="text-lg font-semibold text-white"><span class="text-green-200">Speech and Occupational Therapy</span>
                            </h4>
                        </div>
                        <p class="text-red-100 text-sm"><strong>Focus:</strong> Enhancing communication and daily living skills</p>
                        <p class="text-red-100 text-sm mt-1"><strong>Description:</strong> Our certified therapists address speech delays, articulation issues, language comprehension, and social communication. Occupational therapy focuses on fine motor skills, sensory processing, self-care abilities, and handwriting, ensuring children can fully participate in daily activities and academic tasks.</p>
                    </div>

                    {{-- B1 Adventurer --}}
                    <div
                        class="bg-white/10 p-6 rounded-2xl border-2 border-yellow-300 hover:scale-105 transition-transform text-left">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-12 h-12 bg-yellow-300 rounded-full flex items-center justify-center">
                                <i class="fas fa-3 text-blue-900 text-lg"></i>
                            </div>
                            <h4 class="text-lg font-semibold text-white"> <span
                                    class="text-yellow-200">Health and Nutrition Guidance</span></h4>
                        </div>
                        <p class="text-red-100 text-sm"><strong>Focus:</strong> Optimizing physical health for cognitive and emotional well-being
                        </p>
                        <p class="text-red-100 text-sm mt-1"><strong>Description:</strong> Our nutritionists and health specialists provide personalized dietary plans, nutritional education, and healthy lifestyle strategies. We address feeding issues, food sensitivities, and ensure optimal nutrition to support brain development, energy levels, and overall health.
                        </p>
                    </div>

                    {{-- B1+ Voyager --}}
                    <div
                        class="bg-white/10 p-6 rounded-2xl border-2 border-yellow-400 hover:scale-105 transition-transform text-left">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-12 h-12 bg-yellow-400 rounded-full flex items-center justify-center">
                                <i class="fas fa-4 text-blue-900 text-lg"></i>
                            </div>
                            <h4 class="text-lg font-semibold text-white"> <span class="text-yellow-200">Parenting Consultation and Support</span>
                            </h4>
                        </div>
                        <p class="text-red-100 text-sm"><strong>Focus:</strong> Empowering parents as partners in development/p>
                        <p class="text-red-100 text-sm mt-1"><strong>Description:</strong> We provide regular parent coaching sessions, workshops, and support groups. Our experts help parents understand child development milestones, implement consistent behavior strategies at home, and navigate parenting challenges with confidence and competence.</p>
                    </div>

                    {{-- B2 Connector --}}
                    <div
                        class="bg-white/10 p-6 rounded-2xl border-2 border-orange-400 hover:scale-105 transition-transform text-left">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-12 h-12 bg-orange-400 rounded-full flex items-center justify-center">
                                <i class="fas fa-5 text-white text-lg"></i>
                            </div>
                            <h4 class="text-lg font-semibold text-white"><span class="text-orange-200">Early Financial Literacy</span>
                            </h4>
                        </div>
                        <p class="text-red-100 text-sm"><strong>Focus:</strong> Building money management skills from early childhood</p>
                        <p class="text-red-100 text-sm mt-1"><strong>Description:</strong> Through age-appropriate games and activities, children learn basic money concepts, saving habits, value recognition, and responsible decision-making. Our program makes financial literacy engaging and practical, setting foundations for future financial intelligence.</p>
                    </div>

                    {{-- B2+ Elit --}}
                    <div
                        class="bg-white/10 p-6 rounded-2xl border-2 border-red-400 hover:scale-105 transition-transform text-left">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-12 h-12 bg-red-400 rounded-full flex items-center justify-center">
                                <i class="fas fa-6 text-white text-lg"></i>
                            </div>
                            <h4 class="text-lg font-semibold text-white"> <span class="text-red-200">Sensory and Enrichment Program</span>
                            </h4>
                        </div>
                        <p class="text-red-100 text-sm"><strong>Focus:</strong> Stimulating cognitive development through multi-sensory experiences</p>
                        <p class="text-red-100 text-sm mt-1"><strong>Description:</strong> Our sensory gym and enrichment spaces provide therapeutic sensory integration activities, STEM exploration, art therapy, and music movement. We help children process sensory information effectively while discovering talents and interests.</p>
                    </div>

                    {{-- C1 Legend --}}
                    <div
                        class="bg-white/10 p-6 rounded-2xl border-2 border-purple-400 hover:scale-105 transition-transform text-left">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-12 h-12 bg-purple-400 rounded-full flex items-center justify-center">
                                <i class="fas fa-7 text-white text-lg"></i>
                            </div>
                            <h4 class="text-lg font-semibold text-white"> <span class="text-purple-200">Drama and Public Speaking</span>
                            </h4>
                        </div>
                        <p class="text-red-100 text-sm"><strong>Focus:</strong> Building confidence and communication skills through performance</p>
                        <p class="text-red-100 text-sm mt-1"><strong>Description:</strong> SChildren develop voice projection, body language, storytelling abilities, and stage presence through drama games, role-playing, and public speaking exercises. This program transforms shy speakers into confident communicators./p>
                    </div>

                    <div
                        class="bg-white/10 p-6 rounded-2xl border-2 border-purple-400 hover:scale-105 transition-transform text-left">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-12 h-12 bg-purple-400 rounded-full flex items-center justify-center">
                                <i class="fas fa-8 text-white text-lg"></i>
                            </div>
                            <h4 class="text-lg font-semibold text-white"> <span class="text-purple-200">Academic and Cognitive Support</span>
                            </h4>
                        </div>
                        <p class="text-red-100 text-sm"><strong>Focus:</strong> Personalized academic excellence and learning skill development</p>
                        <p class="text-red-100 text-sm mt-1"><strong>Description:</strong> Our educational specialists create customized learning plans addressing specific academic needs, learning differences, and cognitive skill development. We focus on reading comprehension, mathematical thinking, executive functioning, and study strategies tailored to each child's learning style.</p>
                    </div>

                </div>

            </div>
        </div>
    </section>

    {{-- Why Choose Us Section --}}
    <section class="py-24 bg-gradient-to-b from-gray-900/50 to-black/50 backdrop-blur-sm">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold text-yellow-400 mb-4">Why Parents Choose HiAcademy Child Development Center ?</h2>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="hover:scale-105 transition-transform">
                    <div class="bg-white/10 p-6 rounded-2xl backdrop-blur-sm border border-yellow-400/30 hover:scale-105 transition-transform"
                        data-aos="fade-up" data-aos-delay="0">
                        <div class="w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-chalkboard-teacher text-2xl text-blue-900"></i>
                        </div>
                        <h4 class="text-xl font-semibold text-white mb-3 text-center">Multidisciplinary Expert Team</h4>
                        <p class="text-gray-300 text-sm text-center">Our specialists include clinical psychologists, occupational therapists, speech pathologists, nutritionists, and educational therapists working collaboratively.</p>
                    </div>
                </div>

                <div class="hover:scale-105 transition-transform">
                    <div class="bg-white/10 p-6 rounded-2xl backdrop-blur-sm border border-yellow-400/30 hover:scale-105 transition-transform"
                        data-aos="fade-up" data-aos-delay="100">
                        <div class="w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-users text-2xl text-blue-900"></i>
                        </div>
                        <h4 class="text-xl font-semibold text-white mb-3 text-center">Individualized Approach</h4>
                        <p class="text-gray-300 text-sm text-center">Every child receives a customized development plan based on comprehensive assessment and ongoing progress monitoring.</p>
                    </div>
                </div>

                <div class="hover:scale-105 transition-transform">
                    <div class="bg-white/10 p-6 rounded-2xl backdrop-blur-sm border border-yellow-400/30 hover:scale-105 transition-transform"
                        data-aos="fade-up" data-aos-delay="200">
                        <div class="w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-trophy text-2xl text-blue-900"></i>
                        </div>
                        <h4 class="text-xl font-semibold text-white mb-3 text-center">Integrated Services</h4>
                        <p class="text-gray-300 text-sm text-center">Multiple therapies and supports under one roof ensure consistent, coordinated care.</p>
                    </div>
                </div>

                <div class="hover:scale-105 transition-transform">
                    <div class="bg-white/10 p-6 rounded-2xl backdrop-blur-sm border border-yellow-400/30 hover:scale-105 transition-transform"
                        data-aos="fade-up" data-aos-delay="300">
                        <div class="w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-rocket text-2xl text-blue-900"></i>
                        </div>
                        <h4 class="text-xl font-semibold text-white mb-3 text-center">Family Partnership</h4>
                        <p class="text-gray-300 text-sm text-center">We view parents as essential partners and provide continuous support and training.</p>
                    </div>
                </div>
                <div class="hover:scale-105 transition-transform">
                    <div class="bg-white/10 p-6 rounded-2xl backdrop-blur-sm border border-yellow-400/30 hover:scale-105 transition-transform"
                        data-aos="fade-up" data-aos-delay="300">
                        <div class="w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-rocket text-2xl text-blue-900"></i>
                        </div>
                        <h4 class="text-xl font-semibold text-white mb-3 text-center">Evidence-Based Methods</h4>
                        <p class="text-gray-300 text-sm text-center">We use proven, research-backed interventions across all our programs.</p>
                    </div>
                </div>
                <div class="hover:scale-105 transition-transform">
                    <div class="bg-white/10 p-6 rounded-2xl backdrop-blur-sm border border-yellow-400/30 hover:scale-105 transition-transform"
                        data-aos="fade-up" data-aos-delay="300">
                        <div class="w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-rocket text-2xl text-blue-900"></i>
                        </div>
                        <h4 class="text-xl font-semibold text-white mb-3 text-center">Progress Tracking</h4>
                        <p class="text-gray-300 text-sm text-center">Regular assessments and detailed progress reports ensure measurable outcomes.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class=" pt-36 pb-16 relative rounded-2xl shadow-xl -mt-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <h3 class="text-2xl md:text-3xl text-white font-semibold leading-tight tracking-tight mb-6">
                    The HiAcademy Difference: <span class="text-yellow-300">Proven Results</span>
                </h3>
                <p class="text-lg text-gray-200 max-w-4xl mx-auto leading-relaxed">
                    Our students show significant improvement in:
                </p>
            </div>

            {{-- The HiAcademy Difference --}}
            <div class="grid md:grid-cols-2 gap-8 mb-16">

                <div class=" hover:scale-105 transition-transform">
                    <div class="bg-white/10 p-8 rounded-2xl backdrop-blur-sm border border-yellow-400/30"
                        data-aos="fade-right">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-14 h-14 bg-yellow-400 rounded-full flex items-center justify-center">
                                <i class="fas fa-comments text-2xl text-blue-900"></i>
                            </div>
                            <h3 class="text-2xl font-semibold text-white">Academic performance and learning motivation</h3>
                        </div>
                    </div>
                </div>

                <div class=" hover:scale-105 transition-transform">
                    <div class="bg-white/10 p-8 rounded-2xl backdrop-blur-sm border border-yellow-400/30"
                        data-aos="fade-right">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-14 h-14 bg-yellow-400 rounded-full flex items-center justify-center">
                                <i class="fas fa-comments text-2xl text-blue-900"></i>
                            </div>
                            <h3 class="text-2xl font-semibold text-white">Social skills and peer relationships</h3>
                        </div>
                    </div>
                </div>

                <div class=" hover:scale-105 transition-transform">
                    <div class="bg-white/10 p-8 rounded-2xl backdrop-blur-sm border border-yellow-400/30"
                        data-aos="fade-right">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-14 h-14 bg-yellow-400 rounded-full flex items-center justify-center">
                                <i class="fas fa-brain text-2xl text-blue-900"></i>
                            </div>
                            <h3 class="text-2xl font-semibold text-white">Emotional regulation and self-confidence</h3>
                        </div>
                    </div>
                </div>

                <div class=" hover:scale-105 transition-transform">
                    <div class="bg-white/10 p-8 rounded-2xl  backdrop-blur-sm border border-yellow-400/30"
                        data-aos="fade-right" data-aos-delay="100">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-14 h-14 bg-yellow-400 rounded-full flex items-center justify-center">
                                <i class="fas fa-language text-2xl text-blue-900"></i>
                            </div>
                            <h3 class="text-2xl font-semibold text-white">Communication clarity and effectiveness</h3>
                        </div>
                    </div>
                </div>


                <div class=" hover:scale-105 transition-transform">
                    <div class="bg-white/10 p-8 rounded-2xl backdrop-blur-sm border border-yellow-400/30"
                        data-aos="fade-right" data-aos-delay="100">
                        <div class="flex items-center gap-4 mb-4 ">
                            <div class="w-14 h-14 bg-yellow-400 rounded-full flex items-center justify-center">
                                <i class="fas fa-globe text-2xl text-blue-900"></i>
                            </div>
                            <h3 class="text-2xl font-semibold text-white">Daily living independence and organizational skills</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- CTA Section --}}
    <section id="trial" class="relative py-20 bg-gradient-to-br from-blue-900/70 to-purple-900/70 backdrop-blur-sm">
        <div class="absolute inset-0 bg-black/30"></div>

        <div class="relative z-10 max-w-5xl mx-auto px-6 text-center" data-aos="fade-up">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                Ready to Support Your  <span class="text-yellow-300">Child's Complete Development ?</span>
            </h2>
            <p class="text-xl text-gray-200 mb-8 max-w-3xl mx-auto">
                Discover how our integrated approach can help your child thrive in every aspect of their development.
            </p>

            <div class="bg-white/10 backdrop-blur-md p-8 rounded-2xl border-2 border-yellow-400 max-w-2xl mx-auto mb-8">
                <h3 class="text-2xl font-bold text-yellow-300 mb-4">Schedule a Comprehensive Development Assessment Today!</h3>
                <p class="text-gray-200 mb-6">
                    Our multidisciplinary assessment will identify your child's strengths and needs across all developmental areas. Let us create a personalized plan to unlock your child's full potential and build foundations for lifelong success!
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('booktrial') }}"
                        class="inline-flex items-center justify-center gap-2 bg-yellow-400 text-blue-900 font-bold px-8 py-4 rounded-full shadow-lg hover:bg-yellow-300 hover:scale-105 transition-all">
                        <i class="fas fa-calendar-check"></i> Start Now
                    </a>
                    <a href="/#contact"
                        class="inline-flex items-center justify-center gap-2 bg-white text-blue-900 font-bold px-8 py-4 rounded-full shadow-lg hover:bg-gray-100 hover:scale-105 transition-all">
                        <i class="fas fa-phone"></i> Contact Us
                    </a>
                </div>
            </div>

            <div class="grid md:grid-cols-3 gap-6 text-left">
                <div class="bg-white/10 backdrop-blur-sm p-6 rounded-xl border border-yellow-400/30">
                    <div class="text-yellow-400 text-3xl mb-3">
                        <i class="fas fa-clipboard-check"></i>
                    </div>
                    <h4 class="text-white font-semibold text-lg mb-2">Step 1: Assessment</h4>
                    <p class="text-gray-300 text-sm">Take our free diagnostic test to determine your current level</p>
                </div>

                <div class="bg-white/10 backdrop-blur-sm p-6 rounded-xl border border-yellow-400/30">
                    <div class="text-yellow-400 text-3xl mb-3">
                        <i class="fas fa-map-marked-alt"></i>
                    </div>
                    <h4 class="text-white font-semibold text-lg mb-2">Step 2: Personalized Plan</h4>
                    <p class="text-gray-300 text-sm">Receive a customized learning pathway based on your goals</p>
                </div>

                <div class="bg-white/10 backdrop-blur-sm p-6 rounded-xl border border-yellow-400/30">
                    <div class="text-yellow-400 text-3xl mb-3">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h4 class="text-white font-semibold text-lg mb-2">Step 3: Start Learning</h4>
                    <p class="text-gray-300 text-sm">Begin your journey with expert instructors and proven methods</p>
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
                            <li><a href="{{ route('booktrial') }}"
                                    class="hover:text-yellow-400 transition flex items-center gap-2"><i
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
            animation: fadeInUp 0.5s ease forwards;
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
    {{-- method --}}
    <script>
        function toggleAccordiontraditional(id) {
            const content = document.getElementById(id + '-content');
            const icon = document.getElementById(id + '-icon');

            const isOpen = content.classList.contains('max-h-[400px]');

            // 🔒 Batasi hanya di dalam section "ipc-vs-traditional"
            const accordionSection = document.getElementById('method');

            accordionSection.querySelectorAll("[id$='-content']").forEach(el => {
                el.classList.remove('max-h-[400px]', 'opacity-100');
                el.classList.add('max-h-0', 'opacity-0');
            });

            accordionSection.querySelectorAll("[id$='-icon']").forEach(el => {
                el.textContent = '+';
            });

            // 🔓 Buka yang diklik
            if (!isOpen) {
                content.classList.remove('max-h-0', 'opacity-0');
                content.classList.add('max-h-[400px]', 'opacity-100');
                icon.textContent = '−';
            }
        }
    </script>
@endsection