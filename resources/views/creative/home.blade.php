@extends('layouts.layout')

@section('title', 'h!academy')

@section('content')


    {{-- Background Carousel --}}
    <div id="background-carousel" class="carousel-container">
        <img src="{{ asset('img/design.png') }}" class="carousel-slide active" alt="English Program" loading="eager">
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
                    Design & Creative Arts:<br>
                    Creating Tomorrow's <span class="text-yellow-300">Innovators</span>
                </h1>

                <p class="text-base md:text-lg text-gray-300 leading-relaxed font-normal max-w-3xl ml-auto"
                    data-aos="fade-up" data-aos-delay="200">
                    Building Future-Ready Creators
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
                    About <span class="text-yellow-300">HiAcademy Design & Creative Arts</span>
                </h2>
                <p class="text-lg text-gray-200 max-w-4xl mx-auto leading-relaxed">
                    At HiAcademy Design, our mission is to empower futures, one creative mind at a time. We believe that
                    design thinking and creative skills are not just for aspiring artists, but essential capabilities that
                    unlock innovation, problem-solving abilities, and visual communication skills for every child.
                    <br>
                    Our Design Program is designed to transform the way students perceive and engage with creativity, moving
                    them from consumers to creators, and from ideas to execution.
                </p>
            </div>
        </div>
        <div class="text-center pt-16 mb-16" data-aos="fade-up">
            <h2 class="text-4xl md:text-5xl text-white font-semibold leading-tight tracking-tight mb-6">
                Our Vision for <span class="text-yellow-300">Design Education</span>
            </h2>
            <p class="text-lg text-gray-200 max-w-4xl mx-auto leading-relaxed">
                We envision a future where every HiAcademy student doesn't just create—they innovate, communicate visually,
                and solve real-world problems through design. We don't just teach software; we nurture creative thinkers
                equipped to shape the visual world of tomorrow.
            </p>
        </div>

    </section>


    <section class=" pt-36 pb-16 relative rounded-2xl shadow-xl -mt-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <h3 class="text-2xl md:text-3xl text-white font-semibold leading-tight tracking-tight mb-6">
                    The HiAcademy Difference: <span class="text-yellow-300">Cultivating Essential Creative Skills</span>
                </h3>
                <p class="text-lg text-gray-200 max-w-4xl mx-auto leading-relaxed">
                    We go beyond traditional art education to cultivate a deep and practical understanding of design
                    principles. At HiAcademy Design, we focus on building:
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
                            <h3 class="text-2xl font-semibold text-white">Design Thinking</h3>
                        </div>
                        <p class="text-gray-300 leading-relaxed">
                            We teach students to approach problems creatively, developing empathy, defining challenges, and
                            prototyping solutions.
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
                            <h3 class="text-2xl font-semibold text-white">Visual Communication</h3>
                        </div>
                        <p class="text-gray-300 leading-relaxed">
                            Students learn to convey ideas effectively through typography, color theory, and composition.
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
                            <h3 class="text-2xl font-semibold text-white">Technical Proficiency</h3>
                        </div>
                        <p class="text-gray-300 leading-relaxed">
                            We build confidence with industry-standard tools and software, preparing students for real-world
                            creative careers.
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
                            <h3 class="text-2xl font-semibold text-white">Creative Confidence</h3>
                        </div>
                        <p class="text-gray-300 leading-relaxed">
                            Students develop their unique artistic voice and the courage to bring innovative ideas to life.
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
                    <p class="text-xl text-yellow-300 font-semibold">Industry-Relevant Design Education</p>
                </div>
                <p class="text-gray-200 text-lg leading-relaxed mb-6 max-w-4xl mx-auto">
                    HiAcademy's Design Program is built on a project-based learning methodology, consistently praised for
                    its practical approach and real-world relevance. This approach ensures students don't just learn
                    tools—they understand design principles.
                </p>

                <div class="grid md:grid-cols-2 gap-6 mt-8">

                    <!-- Left (CPA full height) -->
                    <div class="bg-white/10 p-6 rounded-xl hover:scale-105 transition-transform h-full">
                        <div class="text-yellow-400 text-4xl mb-3">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h4 class="text-white font-semibold text-xl mb-2">Foundation -> Application -> Portfolio Progression
                        </h4>
                        <br>
                        <ul class="text-gray-200 text-md space-y-2 list-disc list-inside">
                            <li><strong>Foundation</strong>: Students first learn fundamental principles of design, color
                                theory, and composition through hands-on exercises.</li>
                            <li><strong>Application</strong>: Next, they apply these principles to real-world projects,
                                building practical skills and problem-solving abilities.</li>
                            <li><strong>Portfolio</strong>: Finally, students create professional-quality work that
                                demonstrates their skills and creative thinking.</li>
                        </ul>
                    </div>

                    <!-- Right column (stacked Mastery + Model) -->
                    <div class="flex flex-col gap-6 h-full">

                        <div class="bg-white/10 p-6 rounded-xl hover:scale-105 transition-transform flex-1">
                            <div class="text-yellow-400 text-4xl mb-3">
                                <i class="fas fa-balance-scale"></i>
                            </div>
                            <h4 class="text-white font-semibold text-lg mb-2">Industry-Standard Tools</h4>
                            <p class="text-gray-300 text-sm">
                                We train students on professional software and techniques used in today's creative
                                industries.
                            </p>
                        </div>

                        <div class="bg-white/10 p-6 rounded-xl hover:scale-105 transition-transform flex-1">
                            <div class="text-yellow-400 text-4xl mb-3">
                                <i class="fas fa-users"></i>
                            </div>
                            <h4 class="text-white font-semibold text-lg mb-2">Project-Based Learning</h4>
                            <p class="text-gray-300 text-sm">
                                Every concept is learned through meaningful projects that simulate real client briefs and
                                design challenges.
                            </p>
                        </div>

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
                    Our program is divided into two progressive streams, each designed to meet the developmental and
                    creative needs of your child.
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
                            <h3 class="text-2xl font-bold text-white">KIDS PROGRAM</h3>
                            <p class="text-blue-200">Ages 7-12</p>
                        </div>
                    </div>

                    {{-- Sub Cards --}}
                    <div class="grid sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-6">

                        <div
                            class="bg-white/10 p-6 rounded-2xl border-2 border-blue-300 hover:scale-105 transition-transform text-left">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 bg-yellow-300 rounded-full flex items-center justify-center">
                                    <i class="fas fa-seedling text-black text-lg"></i>
                                </div>
                                <h4 class="text-lg font-semibold text-white">
                                    <span class="text-yellow-200">Animation Basics 32M</span>
                                </h4>
                            </div>
                            <p class="text-blue-100 mt-2">
                                <strong>Focus:</strong> Discovering animation through play and creativity.
                            </p>
                            <p class="text-blue-100 mt-1">
                                <strong>Description:</strong> Young animators embark on their creative journey through fun,
                                hands-on projects that introduce basic animation concepts. They learn to create simple
                                animations while developing spatial awareness and storytelling skills.
                            </p>
                            <p class="text-blue-100 mt-1">
                                <strong>Key Skills:</strong> Basic animation concepts, digital drawing, simple storytelling,
                                creative expression.
                            </p>
                        </div>

                        <div
                            class="bg-white/10 p-6 rounded-2xl border-2 border-green-300 hover:scale-105 transition-transform text-left">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 bg-green-300 rounded-full flex items-center justify-center">
                                    <i class="fas fa-running text-black text-lg"></i>
                                </div>
                                <h4 class="text-lg font-semibold text-white">
                                    <span class="text-yellow-200">Advanced Animation 24M</span>
                                </h4>
                            </div>
                            <p class="text-blue-100 mt-2">
                                <strong>Focus:</strong> Developing sophisticated animation skills and techniques.
                            </p>
                            <p class="text-blue-100 mt-1">
                                <strong>Description:</strong> Budding animators expand their skills with more complex
                                projects, learning advanced techniques while maintaining the joy and wonder of creating
                                moving art.
                            </p>
                            <p class="text-blue-100 mt-1">
                                <strong>Key Skills:</strong> Advanced animation techniques, character design, scene
                                composition.
                            </p>
                        </div>

                        <div
                            class="bg-white/10 p-6 rounded-2xl border-2 border-green-300 hover:scale-105 transition-transform text-left">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 bg-green-300 rounded-full flex items-center justify-center">
                                    <i class="fas fa-running text-black text-lg"></i>
                                </div>
                                <h4 class="text-lg font-semibold text-white">
                                    <span class="text-yellow-200">Branding Kids 24M</span>
                                </h4>
                            </div>
                            <p class="text-blue-100 mt-2">
                                <strong>Focus:</strong> Introduction to visual identity through fun, age-appropriate
                                projects.
                            </p>
                            <p class="text-blue-100 mt-1">
                                <strong>Description:</strong> Children learn basic branding concepts by creating visual
                                identities for their favorite characters, imaginary companies, or school projects,
                                developing early visual literacy.
                            <p class="text-blue-100 mt-1">
                                <strong>Key Skills:</strong> Basic logo design, color psychology, simple brand systems.
                            </p>
                        </div>

                        <div
                            class="bg-white/10 p-6 rounded-2xl border-2 border-red-300 hover:scale-105 transition-transform text-left">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 bg-red-300 rounded-full flex items-center justify-center">
                                    <i class="fas fa-paper-plane text-black text-lg"></i>
                                </div>
                                <h4 class="text-lg font-semibold text-white">
                                    <span class="text-yellow-200">UI/UX Design 24M</span>
                                </h4>
                            </div>
                            <p class="text-blue-100 mt-2">
                                <strong>Focus:</strong> Learning user-centered design through interactive projects.
                            </p>
                            <p class="text-blue-100 mt-1">
                                <strong>Description:</strong> Young designers learn to create friendly, easy-to-use
                                interfaces for games and apps they love, developing empathy and problem-solving skills
                                through design thinking.
                            </p>
                            <p class="text-blue-100 mt-1">
                                <strong>Key Skills:</strong> User-friendly design, basic interface layout, design thinking.
                            </p>
                        </div>

                    </div>
                </div>
            </div>

            <div class="mb-12" data-aos="fade-up">
                <div class="bg-gradient-to-r from-blue-500/20 to-purple-500/20 p-8  rounded-2xl border-2 border-blue-400">

                    {{-- Header --}}
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-16 h-16 bg-blue-400 rounded-full flex items-center justify-center">
                            <i class="fas fa-person text-3xl text-white"></i>
                        </div>
                        <div class="text-left">
                            <h3 class="text-2xl font-bold text-white">TEENS PROGRAM</h3>
                            <p class="text-blue-200">Ages 13-18</p>
                        </div>
                    </div>

                    {{-- Sub Cards --}}
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 gap-6">

                        <div
                            class="bg-white/10 p-6 rounded-2xl border-2 border-blue-300 hover:scale-105 transition-transform text-left">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 bg-yellow-300 rounded-full flex items-center justify-center">
                                    <i class="fas fa-seedling text-black text-lg"></i>
                                </div>
                                <h4 class="text-lg font-semibold text-white">
                                    <span class="text-yellow-200">Design Basics 16M</span>
                                </h4>
                            </div>
                            <p class="text-blue-100 mt-2">
                                <strong>Focus:</strong> Building a strong foundation in design principles and visual thinking.
                            </p>
                            <p class="text-blue-100 mt-1">
                                <strong>Description:</strong> Teen creators begin their design journey learning fundamental concepts of composition, color theory, and typography. Through hands-on projects, they develop an eye for good design and basic proficiency with design tools.
                            </p>
                            <p class="text-blue-100 mt-1">
                                <strong>Key Skills:</strong> Design principles, color theory, basic layout, introduction to design software.
                        </div>

                        <div
                            class="bg-white/10 p-6 rounded-2xl border-2 border-green-300 hover:scale-105 transition-transform text-left">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 bg-green-300 rounded-full flex items-center justify-center">
                                    <i class="fas fa-running text-black text-lg"></i>
                                </div>
                                <h4 class="text-lg font-semibold text-white">
                                    <span class="text-yellow-200">Branding Design 24M</span>
                                </h4>
                            </div>
                            <p class="text-blue-100 mt-2">
                                <strong>Focus:</strong> Mastering visual identity and brand communication.
                            </p>
                            <p class="text-blue-100 mt-1">
                                <strong>Description:</strong> Students dive deep into creating comprehensive brand systems, including logos, color palettes, and brand guidelines. They learn to develop visual identities that communicate brand values effectively.
                            </p>
                            <p class="text-blue-100 mt-1">
                                <strong>Key Skills:</strong> Logo design, brand systems, visual identity, client presentation.
                            </p>
                        </div>

                        <div
                            class="bg-white/10 p-6 rounded-2xl border-2 border-green-300 hover:scale-105 transition-transform text-left">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 bg-green-300 rounded-full flex items-center justify-center">
                                    <i class="fas fa-running text-black text-lg"></i>
                                </div>
                                <h4 class="text-lg font-semibold text-white">
                                    <span class="text-yellow-200">UI/UX Design 24M</span>
                                </h4>
                            </div>
                            <p class="text-blue-100 mt-2">
                                <strong>Focus:</strong> Designing digital experiences and user interfaces.
                            </p>
                            <p class="text-blue-100 mt-1">
                                <strong>Description:</strong> Future digital designers learn to create intuitive, user-friendly interfaces for websites and mobile apps. They master user research, wireframing, prototyping, and usability testing.
                            </p>
                            <p class="text-blue-100 mt-1">
                                <strong>Key Skills:</strong> User research, wireframing, prototyping, interface design.
                            </p>
                        </div>

                        <div
                            class="bg-white/10 p-6 rounded-2xl border-2 border-green-300 hover:scale-105 transition-transform text-left">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 bg-green-300 rounded-full flex items-center justify-center">
                                    <i class="fas fa-running text-black text-lg"></i>
                                </div>
                                <h4 class="text-lg font-semibold text-white">
                                    <span class="text-yellow-200">Animation Basics 24M</span>
                                </h4>
                            </div>
                            <p class="text-blue-100 mt-2">
                                <strong>Focus:</strong> Introduction to motion graphics and animation principles.
                            </p>
                            <p class="text-blue-100 mt-1">
                                <strong>Description:</strong> Students discover the magic of bringing designs to life through animation. They learn fundamental principles of movement, timing, and storytelling through motion.
                            </p>
                            <p class="text-blue-100 mt-1">
                                <strong>Key Skills:</strong> Animation principles, motion graphics, timing, basic 2D animation.
                            </p>
                        </div>


                        <div
                            class="bg-white/10 p-6 rounded-2xl border-2 border-red-300 hover:scale-105 transition-transform text-left">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-12 h-12 bg-red-300 rounded-full flex items-center justify-center">
                                    <i class="fas fa-paper-plane text-black text-lg"></i>
                                </div>
                                <h4 class="text-lg font-semibold text-white">
                                    <span class="text-yellow-200">Advanced Animation 24M</span>
                                </h4>
                            </div>
                            <p class="text-blue-100 mt-2">
                                <strong>Focus:</strong> Mastering complex animation techniques and storytelling.
                            </p>
                            <p class="text-blue-100 mt-1">
                                <strong>Description:</strong> Advanced students push creative boundaries with complex animation projects, character animation, and sophisticated motion graphics for various media platforms.
                            </p>
                            <p class="text-blue-100 mt-1">
                                <strong>Key Skills:</strong> Character animation, advanced motion graphics, 3D basics, visual storytelling.
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
                <h2 class="text-4xl font-bold text-yellow-400 mb-4">Why Choose HiAcademy Design?</h2>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-5 gap-8">
                <div class="hover:scale-105 transition-transform">
                    <div class="bg-white/10 p-6 rounded-2xl backdrop-blur-sm border border-yellow-400/30 hover:scale-105 transition-transform"
                        data-aos="fade-up" data-aos-delay="0">
                        <div class="w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-chalkboard-teacher text-2xl text-blue-900"></i>
                        </div>
                        <h4 class="text-xl font-semibold text-white mb-3 text-center">Industry-Expert Instructors</h4>
                        <p class="text-gray-300 text-sm text-center">Our educators are working professionals who bring real-world experience and current industry practices into the classroom.</p>
                    </div>
                </div>

                <div class="hover:scale-105 transition-transform">
                    <div class="bg-white/10 p-6 rounded-2xl backdrop-blur-sm border border-yellow-400/30 hover:scale-105 transition-transform"
                        data-aos="fade-up" data-aos-delay="0">
                        <div class="w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-palette text-2xl text-blue-900"></i>
                        </div>
                        <h4 class="text-xl font-semibold text-white mb-3 text-center">Project-Based Learning</h4>
                        <p class="text-gray-300 text-sm text-center">Students build impressive portfolios with real projects that demonstrate their skills and creativity.</p>
                    </div>
                </div>

                <div class="hover:scale-105 transition-transform">
                    <div class="bg-white/10 p-6 rounded-2xl backdrop-blur-sm border border-yellow-400/30 hover:scale-105 transition-transform"
                        data-aos="fade-up" data-aos-delay="100">
                        <div class="w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-users text-2xl text-blue-900"></i>
                        </div>
                        <h4 class="text-xl font-semibold text-white mb-3 text-center">Small Class Sizes</h4>
                        <p class="text-gray-300 text-sm text-center">We ensure personalized attention and mentorship for every student, nurturing their unique creative voice.</p>
                    </div>
                </div>

                <div class="hover:scale-105 transition-transform">
                    <div class="bg-white/10 p-6 rounded-2xl backdrop-blur-sm border border-yellow-400/30 hover:scale-105 transition-transform"
                        data-aos="fade-up" data-aos-delay="200">
                        <div class="w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-trophy text-2xl text-blue-900"></i>
                        </div>
                        <h4 class="text-xl font-semibold text-white mb-3 text-center">Proven Results</h4>
                        <p class="text-gray-300 text-sm text-center">Our students create outstanding portfolios, win design competitions, and build confidence in their creative abilities.</p>
                    </div>
                </div>

                <div class="hover:scale-105 transition-transform">
                    <div class="bg-white/10 p-6 rounded-2xl backdrop-blur-sm border border-yellow-400/30 hover:scale-105 transition-transform"
                        data-aos="fade-up" data-aos-delay="300">
                        <div class="w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-rocket text-2xl text-blue-900"></i>
                        </div>
                        <h4 class="text-xl font-semibold text-white mb-3 text-center">Future-Ready Skills</h4>
                        <p class="text-gray-300 text-sm text-center">The design thinking and technical skills learned in our program are exactly what creative industries and tech companies are seeking.</p>
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
                Ready to Unlock Your Child's <span class="text-yellow-300">Creative Potential?</span>
            </h2>
            <p class="text-xl text-gray-200 mb-8 max-w-3xl mx-auto">
                Find the perfect program for your child and transform creativity from a hobby into a future superpower.
            </p>

            <div class="bg-white/10 backdrop-blur-md p-8 rounded-2xl border-2 border-yellow-400 max-w-2xl mx-auto mb-8">
                <h3 class="text-2xl font-bold text-yellow-300 mb-4">Schedule a Free Creative Assessment & Consultation Today!</h3>
                <p class="text-gray-200 mb-6">
                    Our creative assessment will help identify your child's interests and skill level, placing them in the right program. Let us create a personalized learning pathway to unlock their creative confidence and success!
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