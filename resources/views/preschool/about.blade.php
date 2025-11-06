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

        /* Philosophy Section Styles */
        .philosophy-section {
            padding: 120px 20px 80px;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            min-height: 100vh;
        }

        .philosophy-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-title {
            font-size: 3rem;
            font-weight: 800;
            color: #64a1c2;
            text-align: center;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .section-subtitle {
            font-size: 1.5rem;
            font-weight: 600;
            color: #f59e0b;
            text-align: center;
            margin-bottom: 3rem;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.4;
        }

        .philosophy-content {
            background: white;
            padding: 3rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin-bottom: 4rem;
            border-left: 5px solid #f59e0b;
        }

        .philosophy-text {
            font-size: 1.125rem;
            line-height: 1.8;
            color: #475569;
            text-align: center;
            margin: 0;
        }

        .info-cards-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .info-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border-top: 4px solid #f59e0b;
            position: relative;
            overflow: hidden;
        }

        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .info-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #f59e0b, #fbbf24);
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 1.5rem;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .card-content {
            color: #475569;
            line-height: 1.6;
        }

        .short-content {
            font-size: 1.1rem;
            font-weight: 500;
            color: #334155;
            margin-bottom: 1rem;
            text-align: center;
        }

        .full-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s ease-out;
            color: #64748b;
        }

        .full-content.expanded {
            max-height: 1000px;
            transition: max-height 0.8s ease-in;
        }

        .full-content p {
            margin-bottom: 1rem;
            text-align: justify;
        }

        .full-content ul {
            list-style-type: none;
            padding-left: 0;
        }

        .full-content li {
            margin-bottom: 0.75rem;
            padding-left: 1.5rem;
            position: relative;
        }

        .full-content li::before {
            content: '▸';
            position: absolute;
            left: 0;
            color: #f59e0b;
            font-weight: bold;
        }

        .toggle-btn {
            background: linear-gradient(135deg, #f59e0b, #fbbf24);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: block;
            margin: 1.5rem auto 0;
            min-width: 120px;
        }

        .toggle-btn:hover {
            background: linear-gradient(135deg, #d97706, #f59e0b);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(245, 158, 11, 0.4);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .philosophy-section {
                padding: 100px 15px 50px;
            }

            .section-title {
                font-size: 2rem;
            }

            .section-subtitle {
                font-size: 1.25rem;
                margin-bottom: 2rem;
            }

            .philosophy-content {
                padding: 2rem 1.5rem;
                margin-bottom: 2rem;
            }

            .philosophy-text {
                font-size: 1rem;
            }

            .info-cards-container {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .info-card {
                padding: 1.5rem;
            }

            .card-title {
                font-size: 1.25rem;
            }
        }

        @media (max-width: 480px) {
            .section-title {
                font-size: 1.75rem;
            }

            .section-subtitle {
                font-size: 1.1rem;
            }

            .philosophy-content {
                padding: 1.5rem 1rem;
            }
        }
    </style>

    <script>
        function toggleContent(contentId, button) {
            const content = document.getElementById(contentId);
            const isExpanded = content.classList.contains('expanded');

            if (isExpanded) {
                content.classList.remove('expanded');
                button.textContent = 'Read more';
            } else {
                content.classList.add('expanded');
                button.textContent = 'Read less';
            }
        }
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
                        About Us
                    </h2>
                    <p class="text-md text-black font-sans text-base md:text-md leading-relaxed">
                        At h!academy, we embrace play-based learning, cultivating a joyful environment where children
                        thrive. Through purposeful play, young learners develop essential skills, nurturing their curiosity
                        and creativity.
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

    {{-- Philosophy Section --}}
    <section class="philosophy-section">
        <div class="philosophy-container">
            <h4 class="section-title">PHILOSOPHY</h4>
            <h3 class="section-subtitle">BUILDING BLOCKS TO NURTURE YOUNG CREATIVE THINKERS</h3>

            <div class="philosophy-content">
                <p class="philosophy-text">
                    At h!academy, where learning through play is at the heart of everything we do, we focus on providing
                    hands-on experiences that inspire curiosity, foster imagination, and develop problem-solving skills. By
                    encouraging exploration and self-expression, we create a foundation for children to grow into confident,
                    innovative thinkers.
                </p>
            </div>

            <div class="info-cards-container">
                <!-- Vision Section -->
                <div class="info-card">
                    <h3 class="card-title">VISION</h3>
                    <div class="card-content">
                        <div class="short-content">
                            h!academy is dedicated to nurturing well-rounded development in every child.
                        </div>
                        <div class="full-content" id="vision-content">
                            <p>"To build a generation of children filled with hope,
                                confidence, and enthusiasm for learning, by fostering
                                an environment that supports the holistic growth of
                                every child."
                                <br>
                                <br>
                                With the slogan "Nurturing Bright Futures with
                                Hope," h!Academy.
                            </p>
                        </div>
                        <button class="toggle-btn" onclick="toggleContent('vision-content', this)">Read more</button>
                    </div>
                </div>

                <!-- Mission Section -->
                <div class="info-card">
                    <h3 class="card-title">MISSION</h3>
                    <div class="card-content">
                        <div class="short-content">
                            Our mission is to create a nurturing environment where children can explore, learn, and grow.
                        </div>
                        <div class="full-content" id="mission-content">
                            <p>To provide a safe, inclusive,
                                and loving learning
                                environment where every child
                                feels valued, accepted, and
                                encouraged to explore their
                                potential.</p>
                            <p>To support the social,
                                emotional, and academic
                                development of each child
                                through a fun and
                                exploration-based learning
                                approach.</p>
                            <p>To build strong partnerships
                                with parents and the
                                community, ensuring a child's
                                education is supported by
                                close collaboration between
                                home and school.</p>
                        </div>
                        <button class="toggle-btn" onclick="toggleContent('mission-content', this)">Read more</button>
                    </div>
                </div>

                <!-- Goals Section -->
                <div class="info-card">
                    <h3 class="card-title">GOALS</h3>
                    <div class="card-content">
                        <div class="short-content">
                            Our goals focus on holistic development and preparing children for future success.
                        </div>
                        <div class="full-content" id="goals-content">
                            <ul>
                                <li>Develop strong foundational skills in literacy and numeracy</li>
                                <li>Promote creativity and critical thinking through play-based learning</li>
                                <li>Build social skills and emotional intelligence</li>
                                <li>Encourage physical development and healthy habits</li>
                                <li>Foster curiosity and a love for learning about the world</li>
                                <li>Prepare children for a smooth transition to primary education</li>
                            </ul>
                        </div>
                        <button class="toggle-btn" onclick="toggleContent('goals-content', this)">Read more</button>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Learning Approaches Section -->
    <section class="relative py-20 bg-gradient-to-br from-white to-blue-50 overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute top-0 left-0 w-40 h-40 bg-blue-200/30 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-56 h-56 bg-amber-200/30 rounded-full blur-3xl"></div>

        <div class="relative z-10 max-w-6xl mx-auto px-6 md:px-12">
            <!-- Header -->
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6 uppercase tracking-wide">
                    LEARNING APPROACHES
                </h2>
                <div class="w-24 h-1 bg-amber-500 rounded-full mx-auto mb-8"></div>
            </div>

            <!-- Main Content -->
            <div class="space-y-12">
                <!-- Introduction Paragraph -->
                <div data-aos="fade-up" data-aos-delay="100">
                    <p class="text-lg md:text-xl text-gray-700 leading-relaxed text-center">
                        Our learning approaches are based on our philosophy of play, with a strong emphasis on
                        <span class="font-bold text-amber-600">objective play and inquiry-based learning</span>.
                        We believe that play is the foundation of all meaningful learning experiences. Through play,
                        children not only explore and discover but also develop essential social and cognitive skills,
                        mature emotionally, and build the self-confidence needed to thrive in new experiences and
                        environments.
                        By integrating inquiry-based approaches, we encourage curiosity and critical thinking,
                        empowering children to actively engage with the world around them.
                    </p>
                </div>

                <!-- Divider -->
                <div class="relative flex items-center justify-center" data-aos="fade-up" data-aos-delay="150">
                    <div class="h-px bg-gradient-to-r from-transparent via-amber-400 to-transparent w-3/4"></div>
                </div>

                <!-- Two Column Content - Card & Dropdown -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-12" data-aos="fade-up" data-aos-delay="200">
                    <!-- Left Column - Card -->
                    <div class="bg-white rounded-2xl shadow-lg p-8 md:p-10 border-l-4 border-amber-500">
                        <div class="space-y-6">
                            <p class="text-gray-700 leading-relaxed">
                                <span class="font-semibold text-amber-600">Play is the foundation of early childhood
                                    learning</span>,
                                offering endless opportunities for growth and development. Different types of play engage
                                children
                                in unique ways, nurturing their physical, cognitive, emotional, and social abilities. By
                                exploring
                                various approaches to play, children can develop problem-solving skills, creativity, and
                                self-expression
                                while building meaningful connections with others.
                            </p>

                            <p class="text-gray-700 leading-relaxed">
                                <span class="font-semibold text-amber-600">Play-based learning fosters a child-centered
                                    environment</span>
                                where curiosity drives discovery. Each type of play has a distinct focus, encouraging
                                children to explore
                                the world through hands-on experiences. From imaginative scenarios to hands-on manipulation,
                                the diversity
                                of play allows children to develop essential skills in a natural, engaging way.
                            </p>

                            <p class="text-gray-700 leading-relaxed">
                                Incorporating a variety of play types into learning environments helps educators and parents
                                cater to
                                children's individual interests and needs. By balancing different play opportunities,
                                children gain a
                                comprehensive toolkit of skills that support their growth and prepare them for future
                                learning.
                            </p>
                        </div>
                    </div>

                    <!-- Right Column - Play Types Dropdown -->
                    <div class="space-y-4 h-fit">
                        <!-- Dramatic / Role Play -->
                        <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300">
                            <button
                                class="flex justify-between items-center w-full p-4 text-left bg-blue-50 hover:bg-blue-100 transition-colors"
                                onclick="toggleDropdown('dramatic')">
                                <div class="flex items-center">
                                    <span class="text-2xl mr-3">🎭</span>
                                    <span class="font-semibold text-blue-800">Dramatic / Role Play</span>
                                </div>
                                <span class="text-xl font-bold text-blue-600 transition-transform duration-300"
                                    id="dramatic-icon">+</span>
                            </button>
                            <div id="dramatic-dropdown"
                                class="dropdown-content max-h-0 opacity-0 overflow-hidden transition-all duration-300">
                                <div class="p-4 border-t border-blue-200">
                                    <p class="text-gray-700">
                                        Allows children to explore their imagination by pretending to be different
                                        characters or
                                        enacting
                                        real-life scenarios. Through role-play, children practice social skills,
                                        problem-solving, and
                                        language development as they create and act out their own stories.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Manipulative Play -->
                        <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300">
                            <button
                                class="flex justify-between items-center w-full p-4 text-left bg-green-50 hover:bg-green-100 transition-colors"
                                onclick="toggleDropdown('manipulative')">
                                <div class="flex items-center">
                                    <span class="text-2xl mr-3">🧩</span>
                                    <span class="font-semibold text-green-800">Manipulative Play</span>
                                </div>
                                <span class="text-xl font-bold text-green-600 transition-transform duration-300"
                                    id="manipulative-icon">+</span>
                            </button>
                            <div id="manipulative-dropdown"
                                class="dropdown-content max-h-0 opacity-0 overflow-hidden transition-all duration-300">
                                <div class="p-4 border-t border-green-200">
                                    <p class="text-gray-700">
                                        Involves handling and manipulating objects to develop fine motor skills, hand-eye
                                        coordination,
                                        and problem-solving abilities. This type of play includes activities like building
                                        with
                                        blocks,
                                        puzzles, and using tools that help children understand concepts of size, shape, and
                                        spatial relationships.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Physical Play -->
                        <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300">
                            <button
                                class="flex justify-between items-center w-full p-4 text-left bg-purple-50 hover:bg-purple-100 transition-colors"
                                onclick="toggleDropdown('physical')">
                                <div class="flex items-center">
                                    <span class="text-2xl mr-3">🏃‍♂️</span>
                                    <span class="font-semibold text-purple-800">Physical Play</span>
                                </div>
                                <span class="text-xl font-bold text-purple-600 transition-transform duration-300"
                                    id="physical-icon">+</span>
                            </button>
                            <div id="physical-dropdown"
                                class="dropdown-content max-h-0 opacity-0 overflow-hidden transition-all duration-300">
                                <div class="p-4 border-t border-purple-200">
                                    <p class="text-gray-700">
                                        Focuses on developing gross motor skills, coordination, strength, and overall
                                        physical
                                        health.
                                        Activities like running, jumping, climbing, and balancing help children understand
                                        their
                                        bodies'
                                        capabilities while promoting an active lifestyle and spatial awareness.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Creative Play -->
                        <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300">
                            <button
                                class="flex justify-between items-center w-full p-4 text-left bg-amber-50 hover:bg-amber-100 transition-colors"
                                onclick="toggleDropdown('creative')">
                                <div class="flex items-center">
                                    <span class="text-2xl mr-3">🎨</span>
                                    <span class="font-semibold text-amber-800">Creative Play</span>
                                </div>
                                <span class="text-xl font-bold text-amber-600 transition-transform duration-300"
                                    id="creative-icon">+</span>
                            </button>
                            <div id="creative-dropdown"
                                class="dropdown-content max-h-0 opacity-0 overflow-hidden transition-all duration-300">
                                <div class="p-4 border-t border-amber-200">
                                    <p class="text-gray-700">
                                        Encourages self-expression, imagination, and innovation through various art forms
                                        and
                                        creative activities.
                                        Drawing, painting, music, dance, and storytelling allow children to explore their
                                        feelings, ideas,
                                        and perspectives while developing their unique voice and aesthetic sensibilities.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Sensory Play -->
                        <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300">
                            <button
                                class="flex justify-between items-center w-full p-4 text-left bg-pink-50 hover:bg-pink-100 transition-colors"
                                onclick="toggleDropdown('sensory')">
                                <div class="flex items-center">
                                    <span class="text-2xl mr-3">👃</span>
                                    <span class="font-semibold text-pink-800">Sensory Play</span>
                                </div>
                                <span class="text-xl font-bold text-pink-600 transition-transform duration-300"
                                    id="sensory-icon">+</span>
                            </button>
                            <div id="sensory-dropdown"
                                class="dropdown-content max-h-0 opacity-0 overflow-hidden transition-all duration-300">
                                <div class="p-4 border-t border-pink-200">
                                    <p class="text-gray-700">
                                        Engages children's senses—touch, smell, taste, sight, and hearing—to help them
                                        understand
                                        and make sense of the world. Activities like playing with sand, water, playdough, or
                                        sensory
                                        bins stimulate neural pathways and support cognitive growth, language development,
                                        and
                                        scientific thinking.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="relative py-20 bg-gradient-to-br from-white to-blue-50 overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute top-0 left-0 w-40 h-40 bg-blue-200/30 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-56 h-56 bg-amber-200/30 rounded-full blur-3xl"></div>

        <div class="relative z-10 max-w-6xl mx-auto px-6 md:px-12">
            <!-- Header -->
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6 uppercase tracking-wide">
                    Child Safeguarding
                </h2>
                <div class="w-24 h-1 bg-amber-500 rounded-full mx-auto mb-8"></div>
            </div>

            <!-- Main Content -->
            <div class="space-y-12">
                <!-- Introduction Paragraph -->
                <div data-aos="fade-up" data-aos-delay="100">
                    <p class="text-lg md:text-xl text-gray-700 leading-relaxed text-center">
                        At h!academy, we are greatly concerned about child safeguarding. The school has a designated
                        safeguarding lead who ensures that all staff members are trained on child safeguarding as we believe
                        that every adult at school has a role to play in preventing all forms of child abuse (i.e.,
                        emotional abuse, physical abuse, sexual abuse, child neglect, and bullying).

                        We are trained on types of danger at school, ways students can be hurt, what to look for when
                        protecting our students at school, appropriate ways for all adults at school to behave around
                        children, what to do to protect our students from all harm, and lastly, whom to report to when we
                        witness any child safeguarding issues. In a nutshell, we firmly believe that all children should
                        grow up healthy and safe, and the school plays an important role in providing a safe environment for
                        them.
                    </p>
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
                        education — it's a joyful journey filled with growth, inspiration, and care for every learner.
                    </p>
                    <a href="/admissionpreschool#admission"
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
                duration: 800,
                once: true
            });
        });
    </script>
@endsection