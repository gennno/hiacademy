@extends('layouts.layout')

@section('title', 'h!academy')

@section('content')


    {{-- Background Carousel --}}
    <div id="background-carousel" class="carousel-container">
        <img src="{{ asset('img/robotic.png') }}" class="carousel-slide active" alt="English Program" loading="eager">
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
                    Coding & Tech Innovation:<br>
                    Creating the<span class="text-yellow-300"> Digital Leaders </span>of Tomorrow
                </h1>

                <p class="text-base md:text-lg text-gray-300 leading-relaxed font-normal max-w-3xl ml-auto"
                    data-aos="fade-up" data-aos-delay="200">
                    Code Your Imagination to Life.
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
                    About <span class="text-yellow-300">HiAcademy Coding Education</span>
                </h2>
                <p class="text-lg text-gray-200 max-w-4xl mx-auto leading-relaxed">
                    HiAcademy Coding & STREAM is an innovation-driven tech learning program designed to develop young digital creators. We empower students to become not just technology users, but future innovators by teaching computational thinking, creative coding, game development, full-stack skills, and AI literacy through age-appropriate and project-based learning pathways.
                    <br>
                    Our programs guide students through structured learning pathways—from Junior Coder to AI Engineer—where they build real projects such as 2D/3D games, websites, mobile apps, and AI models.
Our approach focuses on hands-on learning, industry-relevant skills, creative problem-solving, and personalized progression, enabling every learner to unlock their potential as a future-ready digital creator.
                </p>
            </div>
        </div>
        <div class="text-center pt-16 mb-16" data-aos="fade-up">
            <h2 class="text-4xl md:text-5xl text-white font-semibold leading-tight tracking-tight mb-6">
                Our Vision for <span class="text-yellow-300">Coding Education</span>
            </h2>
            <p class="text-lg text-gray-200 max-w-4xl mx-auto leading-relaxed">
                We envision a future where every HiAcademy student is not just a consumer of technology, but an innovator
                and creator. We don't just teach coding; we nurture a maker mindset, equipping students with the technical
                skills and creative confidence to build solutions for the world of tomorrow.
            </p>
        </div>

    </section>
    {{-- Vision English Program Section --}}
    <section class=" pt-36 pb-16 relative rounded-2xl shadow-xl -mt-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <h3 class="text-2xl md:text-3xl text-white font-semibold leading-tight tracking-tight mb-6">
                    The HiAcademy Advantage:<span class="text-yellow-300"> Skills for a Digital Future</span>
                </h3>
                <p class="text-lg text-gray-200 max-w-4xl mx-auto leading-relaxed">
                    Our program develops exceptional digital creators through:
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
                            <h3 class="text-2xl font-semibold text-white">Computational Thinking</h3>
                        </div>
                        <p class="text-gray-300 leading-relaxed">
                            Breaking down complex problems into manageable steps and creating algorithmic solutions.
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
                            <h3 class="text-2xl font-semibold text-white">Creative Technical Design</h3>
                        </div>
                        <p class="text-gray-300 leading-relaxed">
                            Merging artistry with technology to build engaging games, apps, and interactive experiences.
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
                            <h3 class="text-2xl font-semibold text-white">Full-Stack Development Skills</h3>
                        </div>
                        <p class="text-gray-300 leading-relaxed">
                            Progressing from visual programming to industry-standard languages like Python and JavaScript.
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
                            <h3 class="text-2xl font-semibold text-white">AI & Future Tech Literacy</h3>
                        </div>
                        <p class="text-gray-300 leading-relaxed">
                            Gaining hands-on experience with artificial intelligence, data science, and the Internet of
                            Things (IoT).
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="programs" class="py-24 px-6 text-center bg-white/1 text-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl font-bold text-yellow-400 mb-4">Our Structured Innovation Pathway</h2>
                <p class="text-gray-200 text-lg max-w-3xl mx-auto">
                    Our program is divided into five specialized career pathways, allowing students to dive deep into their
                    areas of passion and build a portfolio of real-world projects.
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                {{-- Level 1: Math Explorer --}}
                <div class="bg-gradient-to-br from-green-500/20 to-emerald-500/20 p-8 rounded-2xl border-2 border-green-400 hover:scale-105 transition-transform"
                    data-aos="fade-up">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-20 h-20 bg-green-400 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-compass text-4xl text-white"></i>
                        </div>
                        <div class="text-left">
                            <h3 class="text-3xl font-bold text-white">Pathway 1</h3>
                            <p class="text-green-200 text-lg">Junior Coder (Ages 5-7)</p>
                        </div>
                    </div>

                    <div class="text-left space-y-4">
                        <div class="bg-white/10 p-4 rounded-lg">
                            <p class="text-yellow-300 font-semibold mb-2">Focus:</p>
                            <p class="text-gray-200">Igniting digital creativity through playful, visual programming.</p>
                        </div>

                        <div class="bg-white/10 p-4 rounded-lg">
                            <p class="text-yellow-300 font-semibold mb-2">Description:</p>
                            <p class="text-gray-200 text-sm">Our youngest innovators learn fundamental logic through
                                drag-and-drop coding, designing their first 3D animations, simple websites, and virtual
                                worlds. This pathway establishes a positive and exciting first contact with technology.</p>
                        </div>

                        <div class="bg-white/10 p-4 rounded-lg">
                            <p class="text-yellow-300 font-semibold mb-2">Levels & Key Concepts:</p>
                            <ul class="text-gray-200 text-sm  list-disc list-outside">
                                <li><strong>3D Animator</strong>: Creating simple 3D characters and stories.</li>
                                <li><strong>Website Designer</strong>: Building a first web page with colors, images, and
                                    text.</li>
                                <li><strong>Virtual World Maker</strong>: Designing interactive environments and exploring
                                    STEM concepts.</li>
                                <li><strong>Little Programmer</strong>: Mastering sequence and loops to solve puzzles and
                                    create mini-games.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Level 2: Operation Heroes --}}
                <div class="bg-gradient-to-br from-yellow-500/20 to-emerald-500/20 p-8 rounded-2xl border-2 border-yellow-400 hover:scale-105 transition-transform"
                    data-aos="fade-up">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-20 h-20 bg-yellow-400 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-shield text-4xl text-white"></i>
                        </div>
                        <div class="text-left">
                            <h3 class="text-3xl font-bold text-white">Pathway 2</h3>
                            <p class="text-yellow-200 text-lg">Code Adventure (Ages 8-14)</p>
                        </div>
                    </div>

                    <div class="text-left space-y-4">
                        <div class="bg-white/10 p-4 rounded-lg">
                            <p class="text-yellow-300 font-semibold mb-2">Focus:</p>
                            <p class="text-gray-200">Building a strong foundation in game development and interactive media.
                            </p>
                        </div>

                        <div class="bg-white/10 p-4 rounded-lg">
                            <p class="text-yellow-300 font-semibold mb-2">Description:</p>
                            <p class="text-gray-200 text-sm">Students embark on an adventure through different platforms,
                                starting with 2D game development and progressing to master the popular Roblox platform,
                                learning to code, design, and publish their own professional-grade games.</p>
                        </div>

                        <div class="bg-white/10 p-4 rounded-lg">
                            <p class="text-yellow-300 font-semibold mb-2">Levels & Key Concepts:</p>
                            <ul class="text-gray-200 text-sm  list-disc list-outside">
                                <li><strong>Coding Xplorer</strong>: Discovering core programming concepts with block-based
                                    languages.</li>
                                <li><strong>Game Dev with Construct</strong>: Creating 2D games and understanding game
                                    design principles.</li>
                                <li><strong>Code & Designer with Roblox</strong>: Introduction to Roblox Studio and Lua
                                    scripting.</li>
                                <li><strong>Interactive Mechanics on Roblox</strong>: Building advanced game mechanics,
                                    tools, and GUIs.</li>
                                <li><strong>Full Stack Programming for Roblox</strong>: Developing complex, multi-feature
                                    games.</li>
                                <li><strong>Advanced Lua Coding with Roblox</strong>: Mastering optimization, data
                                    management, and publishing.</li>

                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Level 3: Challenge Champions --}}
                <div class="bg-gradient-to-br from-red-500/20 to-amber-500/20 p-8 rounded-2xl border-2 border-red-400 hover:scale-105 transition-transform"
                    data-aos="fade-up">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-20 h-20 bg-red-400 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-crown text-4xl text-white"></i>
                        </div>
                        <div class="text-left">
                            <h3 class="text-3xl font-bold text-white">Pathway 3</h3>
                            <p class="text-red-200 text-lg">Python Developer (Ages 10-14)</p>
                        </div>
                    </div>

                    <div class="text-left space-y-4">
                        <div class="bg-white/10 p-4 rounded-lg">
                            <p class="text-yellow-300 font-semibold mb-2">Focus:</p>
                            <p class="text-gray-200">Mastering the world's most versatile programming language.</p>
                        </div>

                        <div class="bg-white/10 p-4 rounded-lg">
                            <p class="text-yellow-300 font-semibold mb-2">Description:</p>
                            <p class="text-gray-200 text-sm">This pathway transitions students from visual coding to
                                powerful text-based programming with Python, taking them from basic syntax to developing
                                games and even diving into the fundamentals of artificial intelligence.</p>
                        </div>

                        <div class="bg-white/10 p-4 rounded-lg">
                            <p class="text-yellow-300 font-semibold mb-2">Levels & Key Concepts:</p>
                            <ul class="text-gray-200 text-sm  list-disc list-outside">
                                <li><strong>Python Coder</strong>: Mastering Python syntax, data structures, and logic.</li>
                                <li><strong>Python Game Dev</strong>: Building graphical games using libraries like Pygame.
                                </li>
                                <li><strong>Python for AI</strong>: Introduction to AI concepts, data science, and machine
                                    learning models.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- Level 4: Math Mavericks --}}
                <div class="bg-gradient-to-br from-blue-500/20 to-cyan-500/20 p-8 rounded-2xl border-2 border-blue-400 hover:scale-105 transition-transform"
                    data-aos="fade-up">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-20 h-20 bg-blue-400 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-flag text-4xl text-white"></i>
                        </div>
                        <div class="text-left">
                            <h3 class="text-3xl font-bold text-white">Pathway 4</h3>
                            <p class="text-blue-200 text-lg">Software Developer (Ages 15-18)</p>
                        </div>
                    </div>

                    <div class="text-left space-y-4">
                        <div class="bg-white/10 p-4 rounded-lg">
                            <p class="text-yellow-300 font-semibold mb-2">Focus:</p>
                            <p class="text-gray-200">Becoming a professional-grade application developer.
                            </p>
                        </div>

                        <div class="bg-white/10 p-4 rounded-lg">
                            <p class="text-yellow-300 font-semibold mb-2">Description:</p>
                            <p class="text-gray-200 text-sm">Students learn the essential tech stack for modern web and
                                mobile development, using industry-standard tools to build dynamic, responsive websites and
                                fully functional mobile applications.</p>
                        </div>

                        <div class="bg-white/10 p-4 rounded-lg">
                            <p class="text-yellow-300 font-semibold mb-2">Levels & Key Concepts:</p>
                            <ul class="text-gray-200 text-sm  list-disc list-outside">
                                <li><strong>JavaScript Programmer</strong>: Gaining proficiency in JavaScript, the language
                                    of the web.</li>
                                <li><strong>Website Developer</strong>: Building full-stack websites with HTML, CSS, and
                                    JavaScript frameworks.</li>
                                <li><strong>Android Apps Developer</strong>: Creating, testing, and publishing native mobile
                                    applications.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="bg-gradient-to-br from-purple-500/20 to-cyan-500/20 p-8 rounded-2xl border-2 border-purple-400 hover:scale-105 transition-transform"
                    data-aos="fade-up">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-20 h-20 bg-purple-400 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-brain text-4xl text-white"></i>
                        </div>
                        <div class="text-left">
                            <h3 class="text-3xl font-bold text-white">Pathway 5</h3>
                            <p class="text-purple-200 text-lg">AI Engineer (Ages 15-18)</p>
                        </div>
                    </div>

                    <div class="text-left space-y-4">
                        <div class="bg-white/10 p-4 rounded-lg">
                            <p class="text-yellow-300 font-semibold mb-2">Focus:</p>
                            <p class="text-gray-200">Leading the next technological revolution with Artificial Intelligence.
                            </p>
                        </div>

                        <div class="bg-white/10 p-4 rounded-lg">
                            <p class="text-yellow-300 font-semibold mb-2">Description:</p>
                            <p class="text-gray-200 text-sm">This advanced pathway prepares students for the forefront of
                                technology, providing a practical foundation in data science, machine learning, and computer
                                vision—the core disciplines of modern AI.</p>
                        </div>

                        <div class="bg-white/10 p-4 rounded-lg">
                            <p class="text-yellow-300 font-semibold mb-2">Levels & Key Concepts:</p>
                            <ul class="text-gray-200 text-sm  list-disc list-outside">
                                <li><strong>Python for Data Science</strong>: Analyzing and visualizing data with Pandas and
                                    NumPy.</li>
                                <li><strong>AI Machine Learning</strong>: Building, training, and deploying predictive
                                    machine learning models.</li>
                                <li><strong>AI Computer Vision</strong>: Creating AI systems that can interpret and
                                    understand visual information from the world.</li>
                            </ul>
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
                <h2 class="text-4xl font-bold text-yellow-400 mb-4">Why HiAcademy Coders Stand Out?</h2>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="hover:scale-105 transition-transform">
                    <div class="bg-white/10 p-6 rounded-2xl backdrop-blur-sm border border-yellow-400/30 hover:scale-105 transition-transform"
                        data-aos="fade-up" data-aos-delay="0">
                        <div class="w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-chalkboard-teacher text-2xl text-blue-900"></i>
                        </div>
                        <h4 class="text-xl font-semibold text-white mb-3 text-center">Industry-Relevant Curriculum</h4>
                        <p class="text-gray-300 text-sm text-center">We teach the tools and languages used by tech
                            professionals today, from Roblox Lua to Python and JavaScript.</p>
                    </div>
                </div>

                <div class="hover:scale-105 transition-transform">
                    <div class="bg-white/10 p-6 rounded-2xl backdrop-blur-sm border border-yellow-400/30 hover:scale-105 transition-transform"
                        data-aos="fade-up" data-aos-delay="100">
                        <div class="w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-users text-2xl text-blue-900"></i>
                        </div>
                        <h4 class="text-xl font-semibold text-white mb-3 text-center">Project-Based Learning</h4>
                        <p class="text-gray-300 text-sm text-center">Students learn by doing, building a impressive
                            portfolio of games, apps, and AI projects.</p>
                    </div>
                </div>

                <div class="hover:scale-105 transition-transform">
                    <div class="bg-white/10 p-6 rounded-2xl backdrop-blur-sm border border-yellow-400/30 hover:scale-105 transition-transform"
                        data-aos="fade-up" data-aos-delay="200">
                        <div class="w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-trophy text-2xl text-blue-900"></i>
                        </div>
                        <h4 class="text-xl font-semibold text-white mb-3 text-center">Adaptive Learning Pathways</h4>
                        <p class="text-gray-300 text-sm text-center">Courses are tailored to a student's age, skill, and
                            interests, ensuring an engaging and personalized journey.</p>
                    </div>
                </div>

                <div class="hover:scale-105 transition-transform">
                    <div class="bg-white/10 p-6 rounded-2xl backdrop-blur-sm border border-yellow-400/30 hover:scale-105 transition-transform"
                        data-aos="fade-up" data-aos-delay="300">
                        <div class="w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-rocket text-2xl text-blue-900"></i>
                        </div>
                        <h4 class="text-xl font-semibold text-white mb-3 text-center">Future-Ready Specialization</h4>
                        <p class="text-gray-300 text-sm text-center">Early exposure to high-demand fields like AI, Data
                            Science, and Full-Stack Development.</p>
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
                Ready to Unleash Your Child's<span class="text-yellow-300"> Creative Potential?</span>
            </h2>
            <p class="text-xl text-gray-200 mb-8 max-w-3xl mx-auto">
                Let's build an incredible future together, one line of code at a time.
            </p>

            <div class="bg-white/10 backdrop-blur-md p-8 rounded-2xl border-2 border-yellow-400 max-w-2xl mx-auto mb-8">
                <h3 class="text-2xl font-bold text-yellow-300 mb-4">Schedule a Free Level Assessment!</h3>
                <p class="text-gray-200 mb-6">
                    Experience our engaging learning platform firsthand. Our assessment will help identify your child's
                    ideal starting pathway and unlock their potential as a digital creator.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('booktrial') }}"
                        class="inline-flex items-center justify-center gap-2 bg-yellow-400 text-blue-900 font-bold px-8 py-4 rounded-full shadow-lg hover:bg-yellow-300 hover:scale-105 transition-all">
                        <i class="fas fa-calendar-check"></i> Book a Free Trial Class & Tech Assessment!
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
@endsection