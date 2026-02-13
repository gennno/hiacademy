@extends('layouts.layout')

@section('title', 'h!academy')

@section('content')


    {{-- Background Carousel --}}
    <div id="background-carousel" class="carousel-container">
        <img src="{{ asset('img/mandarin.png') }}" class="carousel-slide active" alt="English Program" loading="eager">
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
        <div class="max-w-7xl mx-auto px-6 pb-16 lg:px-12 relative z-10">
            <div class="text-right">
                <h2 class="text-lg md:text-xl font-light tracking-wide mb-4 text-gray-200" data-aos="fade-up">
                    <span class="text-yellow-300 font-medium">h!</span><span class="text-white">academy</span>
                </h2>

                <h1 class="text-4xl md:text-6xl font-bold text-white leading-tight mb-6 tracking-tight" data-aos="fade-up"
                    data-aos-delay="100">
                    Mandarin Program:<br>
                    Bridging Cultures,<span class="text-yellow-300"> Building Futures.</span> 
                </h1>

                <p class="text-base md:text-lg text-gray-300 leading-relaxed font-normal max-w-3xl ml-auto"
                    data-aos="fade-up" data-aos-delay="200">
                    Mastering Chinese for Global Opportunities.
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
                {{-- Maskot --}}
        <div class="absolute left-1/2 bottom-[0rem] md:bottom-[0rem] transform -translate-x-1/2 z-20">
            <img src="{{ asset('img/1.png') }}" alt="Mascot Transition"
                class="w-40 md:w-56 drop-shadow-2xl animate-bounce-slow">
        </div>
    </section>

    {{-- About English Program Section --}}
    <section id="about" class="bg-gray-800/50 pt-36 pb-16 relative backdrop-blur-md rounded-2xl shadow-xl -mt-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl md:text-5xl text-white font-semibold leading-tight tracking-tight mb-6">
                    About <span class="text-yellow-300">HiAcademy Mandarin</span>
                </h2>
                <p class="text-lg text-gray-200 max-w-4xl mx-auto leading-relaxed">
                    At HiAcademy, our mission is to empower futures, one mind at a time. We believe that Mandarin proficiency is not just about learning a language, but about unlocking doors to one of the world's oldest cultures and fastest-growing economies.
                    <br>
                    Our Mandarin Program is designed to transform the way students perceive and engage with Chinese, moving them from curiosity to competence, and from basic phrases to cultural fluency.
                </p>
            </div>
        </div>
        <div class="text-center pt-16 mb-16" data-aos="fade-up">
            <h2 class="text-4xl md:text-5xl text-white font-semibold leading-tight tracking-tight mb-6">
                Our Vision for <span class="text-yellow-300">Mandarin Education</span>
            </h2>
            <p class="text-lg text-gray-200 max-w-4xl mx-auto leading-relaxed">
                We envision a future where every HiAcademy student doesn't just speak Mandarin—they connect with Chinese culture, conduct business with confidence, and build bridges between East and West. We don't just teach Chinese; we nurture global citizens equipped to thrive in a multicultural world.
            </p>
        </div>

    </section>
    {{-- Vision English Program Section --}}
    <section class=" pt-36 pb-16 relative rounded-2xl shadow-xl -mt-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <h3 class="text-2xl md:text-3xl text-white font-semibold leading-tight tracking-tight mb-6">
                    The HiAcademy Difference: <span class="text-yellow-300">Cultivating Practical Chinese Skills</span>
                </h3>
                <p class="text-lg text-gray-200 max-w-4xl mx-auto leading-relaxed">
                   We go beyond textbooks to cultivate a deep and practical command of Mandarin Chinese. At HiAcademy, we focus on building:
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
                            <h3 class="text-2xl font-semibold text-white">Practical Communication Skills</h3>
                        </div>
                        <p class="text-gray-300 leading-relaxed">
                            We teach students to communicate effectively in real-life situations, from daily conversations to professional contexts.
                        </p>
                    </div>
                </div>

                <div class=" hover:scale-105 transition-transform">
                    <div class="bg-white/10 p-8 rounded-2xl backdrop-blur-sm border border-yellow-400/30"
                        data-aos="fade-right">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-14 h-14 bg-yellow-400 rounded-full flex items-center justify-center">
                                <i class="fas fa-brain text-2xl text-blue-900"></i>
                            </div>
                            <h3 class="text-2xl font-semibold text-white">Cultural Intelligence</h3>
                        </div>
                        <p class="text-gray-300 leading-relaxed">
                            Students gain deep insights into Chinese culture, customs, and business etiquette, preparing them for meaningful interactions.
                        </p>
                    </div>
                </div>

                <div class=" hover:scale-105 transition-transform">
                    <div class="bg-white/10 p-8 rounded-2xl  backdrop-blur-sm border border-yellow-400/30"
                        data-aos="fade-right" data-aos-delay="100">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-14 h-14 bg-yellow-400 rounded-full flex items-center justify-center">
                                <i class="fas fa-language text-2xl text-blue-900"></i>
                            </div>
                            <h3 class="text-2xl font-semibold text-white">Character Mastery</h3>
                        </div>
                        <p class="text-gray-300 leading-relaxed">
                            We make Chinese characters accessible and memorable through proven learning techniques and storytelling methods.
                        </p>
                    </div>
                </div>


                <div class=" hover:scale-105 transition-transform">
                    <div class="bg-white/10 p-8 rounded-2xl backdrop-blur-sm border border-yellow-400/30"
                        data-aos="fade-right" data-aos-delay="100">
                        <div class="flex items-center gap-4 mb-4 ">
                            <div class="w-14 h-14 bg-yellow-400 rounded-full flex items-center justify-center">
                                <i class="fas fa-globe text-2xl text-blue-900"></i>
                            </div>
                            <h3 class="text-2xl font-semibold text-white">Four Skills Integration</h3>
                        </div>
                        <p class="text-gray-300 leading-relaxed">
                            Our program systematically develops listening, speaking, reading, and writing skills for comprehensive language mastery.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Proven Curriculum Section --}}
    <section class="bg-gray-800/50 pt-36 pb-16 relative backdrop-blur-md rounded-2xl shadow-xl -mt-16">
        <div class="max-w-7xl mx-auto px-6">
            {{-- CEFR Framework --}}
            <div class="bg-gradient-to-br from-blue-900/50 to-purple-900/50 p-10 rounded-2xl backdrop-blur-sm border-2 border-yellow-400"
                data-aos="fade-up">
                <div class="text-center mb-8">
                    <h3 class="text-3xl font-bold text-white mb-4">Our Proven Curriculum</h3>
                    <p class="text-xl text-yellow-300 font-semibold">The Globally Recognized HSK Framework</p>
                </div>
                <p class="text-gray-200 text-lg leading-relaxed mb-6 max-w-4xl mx-auto">
                    HiAcademy's Mandarin Program is built on the internationally recognized Hanyu Shuiping Kaoshi (HSK) standard, the official Chinese proficiency test used worldwide. This framework ensures systematic progression and measurable results at every stage.
                </p>

                <div class="grid md:grid-cols-3 gap-6 mt-8">
                    <div class="bg-white/10 p-6 rounded-xl hover:scale-105 transition-transform">
                        <div class="text-yellow-400 text-4xl mb-3">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h4 class="text-white font-semibold text-lg mb-2">Structured Progression</h4>
                        <p class="text-gray-300 text-sm">Each level builds systematically on the previous one, with clear learning objectives and measurable outcomes based on vocabulary, grammar, and functional language use.</p>
                    </div>

                    <div class="bg-white/10 p-6 rounded-xl hover:scale-105 transition-transform">
                        <div class="text-yellow-400 text-4xl mb-3">
                            <i class="fas fa-balance-scale"></i>
                        </div>
                        <h4 class="text-white font-semibold text-lg mb-2">Balanced Skill Development</h4>
                        <p class="text-gray-300 text-sm">Our lessons integrate listening, speaking, reading, and writing skills while emphasizing practical communication abilities for real-world situations.
                        </p>
                    </div>

                    <div class="bg-white/10 p-6 rounded-xl hover:scale-105 transition-transform">
                        <div class="text-yellow-400 text-4xl mb-3">
                            <i class="fas fa-users"></i>
                        </div>
                        <h4 class="text-white font-semibold text-lg mb-2">Cultural Immersion</h4>
                        <p class="text-gray-300 text-sm">We incorporate cultural elements into every lesson, helping students understand the context behind the language and develop authentic communication skills.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Programs Section --}}
    <section id="programs" class="py-24 px-6 text-center bg-white/1 text-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold text-yellow-400 mb-4">Our Structured Learning Pathway</h2>
                <p class="text-gray-200 text-lg max-w-3xl mx-auto">
                    Our program is divided into progressive streams and levels, each designed to meet different learning needs and goals.
                </p>
            </div>

            {{-- Young Learners --}}
            <div class="mb-12" data-aos="fade-up">
                <div class="bg-gradient-to-r from-blue-500/20 to-purple-500/20 p-8  rounded-2xl border-2 border-blue-400">

                    {{-- Header --}}
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-16 h-16 bg-blue-400 rounded-full flex items-center justify-center">
                            <i class="fas fa-child text-3xl text-white"></i>
                        </div>
                        <div class="text-left">
                            <h3 class="text-2xl font-bold text-white">Young Learners Mandarin </h3>
                            <p class="text-blue-200">Ages 6-12</p>
                        </div>
                    </div>

                    {{-- Sub Cards --}}
                    <div class="grid sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-6">

                        <div
                            class="bg-white/10 p-6 rounded-2xl border-2 border-green-300 hover:scale-105 transition-transform text-left">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 bg-green-300 rounded-full flex items-center justify-center">
                                    <i class="fas fa-running text-black text-lg"></i>
                                </div>
                                <h4 class="text-lg font-semibold text-white">
                                    Little Panda <span class="text-green-200">(Pre-HSK | Ages 6-8)</span>
                                </h4>
                            </div>
                            <p class="text-blue-100 mt-2">
                                <strong>Focus:</strong> Building interest and basic communication skills through play.
                            </p>
                            <p class="text-blue-100 mt-1">
                                <strong>Description:</strong> Young learners discover Mandarin through songs, games, and stories. They learn basic greetings, numbers, colors, and simple sentences while developing proper pronunciation through fun, interactive activities.
                            </p>
                        </div>

                        <div
                            class="bg-white/10 p-6 rounded-2xl border-2 border-red-300 hover:scale-105 transition-transform text-left">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 bg-red-300 rounded-full flex items-center justify-center">
                                    <i class="fas fa-paper-plane text-black text-lg"></i>
                                </div>
                                <h4 class="text-lg font-semibold text-white">
                                    Smart Panda <span class="text-red-200">(HSK 1-2 | Ages 9-12)</span>
                                </h4>
                            </div>
                            <p class="text-blue-100 mt-2">
                                <strong>Focus:</strong> Establishing foundation in pinyin and basic characters.
                            </p>
                            <p class="text-blue-100 mt-1">
                                <strong>Description:</strong> Students build vocabulary of 300+ words and master pinyin system. They learn to conduct simple conversations about daily topics and recognize 150+ Chinese characters through engaging activities and character games.
                            </p>
                        </div>

                    </div>
                </div>
            </div>


            {{-- Teenagers --}}
            <div class="mb-12" data-aos="fade-up">
                <div class="bg-gradient-to-r from-red-500/20 to-purple-500/20 p-8 rounded-2xl border-2 border-red-400">

                    {{-- Header --}}
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-16 h-16 bg-red-400 rounded-full flex items-center justify-center">
                            <i class="fas fa-user-graduate text-3xl text-white"></i>
                        </div>
                        <div class="text-left">
                            <h3 class="text-2xl font-bold text-white">Teenagers</h3>
                            <p class="text-red-200">Ages 12+</p>
                        </div>
                    </div>

                    {{-- Sub Cards --}}
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6">

                        {{-- A1 Seeker --}}
                        <div
                            class="bg-white/10 p-6 rounded-2xl border-2 border-blue-300 hover:scale-105 transition-transform text-left">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 bg-blue-300 rounded-full flex items-center justify-center">
                                    <i class="fas fa-search text-white text-lg"></i>
                                </div>
                                <h4 class="text-lg font-semibold text-white">Discoverer <span class="text-blue-200">(HSK 1)</span>
                                </h4>
                            </div>
                            <p class="text-red-100 text-sm"><strong>Focus:</strong> Mastering basic daily expressions.</p>
                            <p class="text-red-100 text-sm mt-1"><strong>Description:</strong> Students learn to understand and use simple words and sentences, meet basic needs for communication, and possess the ability to further their Chinese language studies.</p>
                        </div>

                        {{-- A2 Explorer --}}
                        <div
                            class="bg-white/10 p-6 rounded-2xl border-2 border-green-300 hover:scale-105 transition-transform text-left">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 bg-green-300 rounded-full flex items-center justify-center">
                                    <i class="fas fa-compass text-white text-lg"></i>
                                </div>
                                <h4 class="text-lg font-semibold text-white">Explorer <span
                                        class="text-green-200">(HSK 2)</span></h4>
                            </div>
                            <p class="text-red-100 text-sm"><strong>Focus:</strong> Confidence in routine situations.</p>
                            <p class="text-red-100 text-sm mt-1"><strong>Description:</strong> Students learn to communicate
                                in straightforward, routine tasks. They can describe aspects of their background and
                                immediate environment, and write short, simple notes and messages.</p>
                        </div>

                        {{-- B1+ Voyager --}}
                        <div
                            class="bg-white/10 p-6 rounded-2xl border-2 border-yellow-400 hover:scale-105 transition-transform text-left">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 bg-yellow-400 rounded-full flex items-center justify-center">
                                    <i class="fas fa-rocket text-blue-900 text-lg"></i>
                                </div>
                                <h4 class="text-lg font-semibold text-white">Navigator <span
                                        class="text-yellow-200">(HSK 3)</span></h4>
                            </div>
                            <p class="text-red-100 text-sm"><strong>Focus:</strong> Achieving independence in daily communication.</p>
                            <p class="text-red-100 text-sm mt-1"><strong>Description:</strong> Students can complete basic communication tasks in daily, academic, and professional contexts. They can manage most communication in Chinese when traveling in China.</p>
                        </div>

                        {{-- B2 Connector --}}
                        <div
                            class="bg-white/10 p-6 rounded-2xl border-2 border-orange-400 hover:scale-105 transition-transform text-left">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 bg-orange-400 rounded-full flex items-center justify-center">
                                    <i class="fas fa-network-wired text-white text-lg"></i>
                                </div>
                                <h4 class="text-lg font-semibold text-white">Achiever <span
                                        class="text-orange-200">(HSK 4)</span></h4>
                            </div>
                            <p class="text-red-100 text-sm"><strong>Focus:</strong> Discussing a wide range of topics.</p>
                            <p class="text-red-100 text-sm mt-1"><strong>Description:</strong> Students can converse in Chinese on a wide range of topics and are able to communicate fluently with native Chinese speakers.</p>
                        </div>

                        {{-- B2+ Elit --}}
                        <div
                            class="bg-white/10 p-6 rounded-2xl border-2 border-red-400 hover:scale-105 transition-transform text-left">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 bg-red-400 rounded-full flex items-center justify-center">
                                    <i class="fas fa-fire text-white text-lg"></i>
                                </div>
                                <h4 class="text-lg font-semibold text-white">Master <span class="text-red-200">(HSK 5)</span>
                                </h4>
                            </div>
                            <p class="text-red-100 text-sm"><strong>Focus:</strong> Reading Chinese newspapers and watching films.</p>
                            <p class="text-red-100 text-sm mt-1"><strong>Description:</strong> Students can read Chinese newspapers and magazines, enjoy Chinese films and plays, and deliver a complete speech in Chinese.</p>
                        </div>

                        {{-- C1 Legend --}}
                        <div
                            class="bg-white/10 p-6 rounded-2xl border-2 border-purple-400 hover:scale-105 transition-transform text-left">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 bg-purple-400 rounded-full flex items-center justify-center">
                                    <i class="fas fa-crown text-white text-lg"></i>
                                </div>
                                <h4 class="text-lg font-semibold text-white">Elite <span
                                        class="text-purple-200">(HSK 6)</span></h4>
                            </div>
                            <p class="text-red-100 text-sm"><strong>Focus:</strong> Expressing themselves fluently in professional contexts.</p>
                            <p class="text-red-100 text-sm mt-1"><strong>Description:</strong> Students can easily understand written and spoken information in Chinese and can express themselves effectively in both spoken and written forms.</p>
                        </div>

                    </div>

                </div>
            </div>

            <div class="mb-12" data-aos="fade-up">
                <div class="bg-gradient-to-r from-blue-500/20 to-purple-500/20 p-8  rounded-2xl border-2 border-blue-400">

                    {{-- Header --}}
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-16 h-16 bg-blue-400 rounded-full flex items-center justify-center">
                            <i class="fas fa-briefcase text-3xl text-white"></i>
                        </div>
                        <div class="text-left">
                            <h3 class="text-2xl font-bold text-white">Adults and Professionals</h3>
                        </div>
                    </div>

                    {{-- Sub Cards --}}
                    <div class="grid sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-6">

                        <div
                            class="bg-white/10 p-6 rounded-2xl border-2 border-green-300 hover:scale-105 transition-transform text-left">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 bg-green-300 rounded-full flex items-center justify-center">
                                    <i class="fas fa-running text-black text-lg"></i>
                                </div>
                                <h4 class="text-lg font-semibold text-white">
                                <span class="text-green-200">Business Mandarin Foundation</span>
                                </h4>
                            </div>
                            <p class="text-blue-100 mt-2">
                                <strong>Focus:</strong> Essential Chinese for professional settings.
                            </p>
                            <p class="text-blue-100 mt-1">
                                <strong>Description:</strong> Covers business etiquette, meetings, negotiations, and professional correspondence for learners with HSK 3+ foundation.
                            </p>
                        </div>

                        <div
                            class="bg-white/10 p-6 rounded-2xl border-2 border-red-300 hover:scale-105 transition-transform text-left">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 bg-red-300 rounded-full flex items-center justify-center">
                                    <i class="fas fa-paper-plane text-black text-lg"></i>
                                </div>
                                <h4 class="text-lg font-semibold text-white">
                                    Corporate Mandarin <span class="text-red-200">(Level 1-3)</span>
                                </h4>
                            </div>
                            <p class="text-blue-100 mt-2">
                                <strong>Focus:</strong> Industry-specific Chinese proficiency.
                            </p>
                            <p class="text-blue-100 mt-1">
                                <strong>Description:</strong> Tailored programs for professionals in trade, finance, technology, and diplomacy, focusing on industry-specific vocabulary and communication scenarios.
                        </div>

                    </div>
                </div>
            </div>

<div class="mb-12" data-aos="fade-up">
                <div class="bg-gradient-to-r from-blue-500/20 to-purple-500/20 p-8  rounded-2xl border-2 border-blue-400">

                    {{-- Header --}}
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-16 h-16 bg-blue-400 rounded-full flex items-center justify-center">
                            <i class="fas fa-briefcase text-3xl text-white"></i>
                        </div>
                        <div class="text-left">
                            <h3 class="text-2xl font-bold text-white">Specialized Programs</h3>
                        </div>
                    </div>

                    {{-- Sub Cards --}}
                    <div class="grid sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-6">

                        <div
                            class="bg-white/10 p-6 rounded-2xl border-2 border-green-300 hover:scale-105 transition-transform text-left">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 bg-green-300 rounded-full flex items-center justify-center">
                                    <i class="fas fa-running text-black text-lg"></i>
                                </div>
                                <h4 class="text-lg font-semibold text-white">
                                  <span class="text-green-200">HSK Test Preparation</span>
                                </h4>
                            </div>
                            <p class="text-blue-100 mt-2">
                                <strong>Focus:</strong> Achieving target scores on official HSK exams.
                            </p>
                            <p class="text-blue-100 mt-1">
                                <strong>Description:</strong> Intensive training with mock tests, test-taking strategies, and personalized coaching for all HSK levels.
                            </p>
                        </div>

                        <div
                            class="bg-white/10 p-6 rounded-2xl border-2 border-red-300 hover:scale-105 transition-transform text-left">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 bg-red-300 rounded-full flex items-center justify-center">
                                    <i class="fas fa-paper-plane text-black text-lg"></i>
                                </div>
                                <h4 class="text-lg font-semibold text-white">
                                <span class="text-red-200">Business Chinese Certificate (BCC)</span>
                                </h4>
                            </div>
                            <p class="text-blue-100 mt-2">
                                <strong>Focus:</strong> Mastering Mandarin for business contexts.
                            </p>
                            <p class="text-blue-100 mt-1">
                                <strong>Description:</strong> Comprehensive preparation for the Business Chinese Certificate exam, focusing on business communication, commercial correspondence, and professional presentations.
                            </p>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </section>

    {{-- Why Choose Us Section --}}
    <section class="py-24 bg-gradient-to-b from-gray-900/50 to-black/50 backdrop-blur-sm">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold text-yellow-400 mb-4">Why Choose HiAcademy Mandarin?</h2>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="hover:scale-105 transition-transform">
                    <div class="bg-white/10 p-6 rounded-2xl backdrop-blur-sm border border-yellow-400/30 hover:scale-105 transition-transform"
                        data-aos="fade-up" data-aos-delay="0">
                        <div class="w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-chalkboard-teacher text-2xl text-blue-900"></i>
                        </div>
                        <h4 class="text-xl font-semibold text-white mb-3 text-center">Native-Speaking, Certified Instructors</h4>
                        <p class="text-gray-300 text-sm text-center">Our teachers are not just language experts; they're cultural ambassadors who make learning Mandarin engaging and effective.</p>
                    </div>
                </div>

                <div class="hover:scale-105 transition-transform">
                    <div class="bg-white/10 p-6 rounded-2xl backdrop-blur-sm border border-yellow-400/30 hover:scale-105 transition-transform"
                        data-aos="fade-up" data-aos-delay="100">
                        <div class="w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-users text-2xl text-blue-900"></i>
                        </div>
                        <h4 class="text-xl font-semibold text-white mb-3 text-center">Proven Learning Methods</h4>
                        <p class="text-gray-300 text-sm text-center">We use character-acquisition techniques and spaced repetition systems that make mastering Chinese characters achievable and lasting.</p>
                    </div>
                </div>

                <div class="hover:scale-105 transition-transform">
                    <div class="bg-white/10 p-6 rounded-2xl backdrop-blur-sm border border-yellow-400/30 hover:scale-105 transition-transform"
                        data-aos="fade-up" data-aos-delay="200">
                        <div class="w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-trophy text-2xl text-blue-900"></i>
                        </div>
                        <h4 class="text-xl font-semibold text-white mb-3 text-center">Flexible Learning Options</h4>
                        <p class="text-gray-300 text-sm text-center">Choose from small group classes, private tutoring, or corporate training to fit your schedule and learning style.</p>
                    </div>
                </div>

                <div class="hover:scale-105 transition-transform">
                    <div class="bg-white/10 p-6 rounded-2xl backdrop-blur-sm border border-yellow-400/30 hover:scale-105 transition-transform"
                        data-aos="fade-up" data-aos-delay="300">
                        <div class="w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-rocket text-2xl text-blue-900"></i>
                        </div>
                        <h4 class="text-xl font-semibold text-white mb-3 text-center">Cultural Activities</h4>
                        <p class="text-gray-300 text-sm text-center">We complement language learning with cultural experiences including calligraphy, tea ceremony, and Chinese holiday celebrations.</p>
                    </div>
                </div>
                <div class="hover:scale-105 transition-transform">
                    <div class="bg-white/10 p-6 rounded-2xl backdrop-blur-sm border border-yellow-400/30 hover:scale-105 transition-transform"
                        data-aos="fade-up" data-aos-delay="300">
                        <div class="w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-rocket text-2xl text-blue-900"></i>
                        </div>
                        <h4 class="text-xl font-semibold text-white mb-3 text-center">Practical Results</h4>
                        <p class="text-gray-300 text-sm text-center">Our students successfully pass HSK exams, excel in business negotiations, and build meaningful connections through Mandarin.</p>
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
                Ready to Begin Your <span class="text-yellow-300">Mandarin Journey?</span>
            </h2>
            <p class="text-xl text-gray-200 mb-8 max-w-3xl mx-auto">
               Find the perfect program for you or your child and open doors to Chinese culture and opportunities.
            </p>

            <div class="bg-white/10 backdrop-blur-md p-8 rounded-2xl border-2 border-yellow-400 max-w-2xl mx-auto mb-8">
                <h3 class="text-2xl font-bold text-yellow-300 mb-4">Schedule a Free Level Assessment & Consultation Today!</h3>
                <p class="text-gray-200 mb-6">
                    Our diagnostic test will accurately place you in the right HSK level and identify your learning needs. Let us create a personalized pathway to Mandarin fluency and cultural understanding!
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
<!-- Wrapper Floating Buttons -->
<div class="fixed bottom-6 right-6 flex items-center gap-3 z-50">

    <!-- WhatsApp Button -->
    <a href="https://wa.me/6285373296248?text=Hi%20Hiacademy,%20I%20would%20like%20to%20ask%20about%20trial%20class"
        target="_blank"
        class="w-12 h-12 flex items-center justify-center
               bg-green-500 hover:bg-green-600
               rounded-full shadow-lg
               transition-all duration-300 hover:scale-110">

        <!-- WhatsApp SVG Icon -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="22" height="22" fill="white">
            <path d="M16 .396C7.163.396 0 7.56 0 16.396c0 2.89.755 5.71 2.19 8.188L0 32l7.63-2.146a15.93 15.93 0 008.37 2.36c8.837 0 16-7.163 16-16S24.837.396 16 .396zm0 29.16a13.1 13.1 0 01-6.68-1.82l-.48-.29-4.53 1.27 1.21-4.41-.31-.46A13.11 13.11 0 012.89 16.4c0-7.25 5.9-13.15 13.15-13.15S29.19 9.15 29.19 16.4 23.29 29.56 16.04 29.56zm7.27-9.83c-.4-.2-2.37-1.17-2.73-1.3-.36-.13-.62-.2-.88.2s-1 1.3-1.22 1.56c-.22.26-.44.3-.82.1-.4-.2-1.68-.62-3.2-1.98-1.18-1.05-1.98-2.35-2.2-2.74-.22-.4-.02-.62.17-.82.17-.17.4-.44.6-.66.2-.22.26-.4.4-.66.13-.26.07-.5-.03-.7-.1-.2-.88-2.12-1.2-2.9-.32-.76-.64-.66-.88-.67-.22-.01-.48-.01-.74-.01s-.66.1-1 .48c-.35.4-1.32 1.28-1.32 3.12s1.35 3.62 1.53 3.88c.2.26 2.64 4.03 6.4 5.65.9.4 1.6.63 2.14.8.9.3 1.72.26 2.37.16.72-.1 2.37-.97 2.7-1.9.34-.93.34-1.73.24-1.9-.1-.16-.36-.26-.76-.46z"/>
        </svg>
    </a>

    <!-- Back to Top Button -->
    <button id="backToTopBtn"
        class="hidden w-12 h-12 flex items-center justify-center
               bg-yellow-400 text-black font-semibold
               rounded-full shadow-lg hover:bg-white
               transition-all duration-300 hover:scale-110">
        <span class="text-lg leading-none">↑</span>
    </button>

</div>

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
@endsection