@extends('layouts.layout')

@section('title', 'h!academy - International Preschool')

@section('content')

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
                <a href="/preschool#home" class="flex items-center gap-3 flex-shrink-0" aria-label="Go to home">
                    <img src="{{ asset('img/logofull.png') }}" alt="Logo"
                        class="h-14 lg:h-16 w-auto hover:scale-105 transition-transform duration-300">
                </a>
            </div>

            <!-- NAV (centered on viewport) - visible on lg+ -->
            <nav id="primary-nav"
                class="hidden xl:flex absolute left-1/2 transform -translate-x-1/2 items-center space-x-10 text-white font-medium tracking-wide z-50"
                role="navigation" aria-label="Primary Navigation">
                <a href="/preschool#home" class="nav-link" data-target="home">Home</a>

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

                <a href="/admissionpreschool" class="nav-link" data-target="admission">Admission Process</a>
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
                <a href="/admissionpreschool"
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
                        IPC Curriculum
                    </h2>
                    <p class="text-md text-black font-sans text-base md:text-md leading-relaxed">
                        The International Preschool Curriculum (IPC) is a comprehensive early childhood education program
                        designed to provide a balanced approach to learning. It integrates various educational methodologies
                        to cater to diverse learning styles and aims to develop key cognitive, physical, and social skills
                        in young children.
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

    {{-- IPC Curriculum Section --}}
    <section id="ipc-curriculum" class="relative bg-[#E8F3FB] py-20 px-6 md:px-12 lg:px-20 overflow-hidden">
        <div class="max-w-6xl mx-auto text-center space-y-16">

            {{-- SIX CONTENT LEARNING AREAS --}}
            <div class="space-y-10">
                <h3 class="text-3xl font-bold text-[#00809D]">The Six Content Learning Areas</h3>
                <p class="text-gray-700 max-w-3xl mx-auto leading-relaxed">
                    IPC is renowned for its holistic approach to early childhood education, seamlessly integrating six key
                    learning areas to foster comprehensive development in young learners.
                </p>

                <div class="flex justify-center">
                    <img src="{{ asset('img/ipc.png') }}" alt="IPC Learning Areas"
                        class="w-full max-w-md rounded-full shadow-lg">
                </div>

                <p class="text-gray-700 max-w-3xl mx-auto leading-relaxed">
                    Each facet of the IPC curriculum, including language arts, numeracy, socio-emotional skills, creative
                    arts, sciences, and motor skills, is thoughtfully designed to engage children in dynamic and interactive
                    learning experiences.
                </p>
            </div>

            {{-- THE IPC METHOD --}}
            <div class="bg-[#F0FAFF] border border-[#B7E2F3] rounded-2xl shadow-md p-8 md:p-10 text-left max-w-3xl mx-auto">
                <h4 class="text-2xl font-bold text-[#00809D] mb-3">The IPC Method</h4>
                <p class="text-gray-700 leading-relaxed">
                    Leveraging global research and integrating best practices from the world’s leading early childhood
                    educators,
                    the IPC curriculum promotes inquiry-based learning, active exploration, and social collaboration. The
                    IPC method
                    puts the child at the center of their educational journey, thus emphasizing meaningful engagement and
                    socio-emotional
                    development.
                </p>
            </div>

            {{-- KEY FEATURES OF IPC --}}
            <div class="space-y-8">
                <h3 class="text-3xl font-bold text-[#00809D]">Key Features of IPC</h3>
                <p class="text-gray-700 max-w-3xl mx-auto leading-relaxed">
                    The International Preschool Curriculum (IPC) has established itself as a leading curriculum globally by
                    promoting
                    innovation, research, and quality in curriculum and educational practice.
                </p>

                <div class="flex flex-col lg:flex-row items-center gap-12">
                    <div class="lg:w-1/2">
                        <img src="{{ asset('img/ipckids.png') }}" alt="IPC Children"
                            class="rounded-xl shadow-lg w-full object-cover">
                    </div>
                    <div class="lg:w-1/2 space-y-6">
                        {{-- Accordion Feature --}}
                        <div class="bg-white border border-[#CBE8F3] rounded-xl overflow-hidden shadow-sm">
                            <button onclick="toggleDropdown('curriculum')"
                                class="w-full flex justify-between items-center px-6 py-4 font-semibold text-[#00809D] hover:bg-[#E6F6FC] transition">
                                Comprehensive and Research-Based Curriculum
                                <span id="curriculum-icon" class="text-2xl text-[#00809D] font-bold">+</span>
                            </button>
                            <div id="curriculum-dropdown"
                                class="max-h-0 overflow-hidden opacity-0 transition-all duration-500 ease-in-out">
                                <p class="px-6 pb-4 text-gray-700 leading-relaxed">
                                    IPC offers a comprehensive curriculum that integrates best practices from around the
                                    world. Its curriculum modules encompass diverse subjects such as language arts,
                                    mathematics, science, social studies, creative arts, physical development, and
                                    social-emotional learning.
                                    This holistic approach ensures that children receive a well-rounded education that
                                    prepares them for future academic success and personal growth.
                                </p>
                            </div>
                        </div>

                        <div class="bg-white border border-[#CBE8F3] rounded-xl overflow-hidden shadow-sm">
                            <button onclick="toggleDropdown('professional')"
                                class="w-full flex justify-between items-center px-6 py-4 font-semibold text-[#00809D] hover:bg-[#E6F6FC] transition">
                                Global Perspective
                                <span id="professional-icon" class="text-2xl text-[#00809D] font-bold">+</span>
                            </button>
                            <div id="professional-dropdown"
                                class="max-h-0 overflow-hidden opacity-0 transition-all duration-500 ease-in-out">
                                <p class="px-6 pb-4 text-gray-700 leading-relaxed">
                                    IPC incorporates global perspectives into its curriculum, exposing children to diverse
                                    cultures, languages, and global issues. This global awareness fosters cultural
                                    competence, empathy, and respect for diversity among young learners, preparing them to
                                    thrive in an interconnected world.
                                </p>
                            </div>
                        </div>

                        <div class="bg-white border border-[#CBE8F3] rounded-xl overflow-hidden shadow-sm">
                            <button onclick="toggleDropdown('engagement')"
                                class="w-full flex justify-between items-center px-6 py-4 font-semibold text-[#00809D] hover:bg-[#E6F6FC] transition">
                                Professional Development
                                <span id="engagement-icon" class="text-2xl text-[#00809D] font-bold">+</span>
                            </button>
                            <div id="engagement-dropdown"
                                class="max-h-0 overflow-hidden opacity-0 transition-all duration-500 ease-in-out">
                                <p class="px-6 pb-4 text-gray-700 leading-relaxed">
                                    IPC prioritizes educators' professional development through specialized training
                                    programs and ongoing support. By equipping educators with the knowledge, skills, and
                                    resources needed to implement the curriculum effectively, IPC ensures high-quality
                                    educational experiences that meet the needs of diverse learners.
                                </p>
                            </div>
                        </div>
                        <div class="bg-white border border-[#CBE8F3] rounded-xl overflow-hidden shadow-sm">
                            <button onclick="toggleDropdown('engagement')"
                                class="w-full flex justify-between items-center px-6 py-4 font-semibold text-[#00809D] hover:bg-[#E6F6FC] transition">
                                Parental Engagement
                                <span id="engagement-icon" class="text-2xl text-[#00809D] font-bold">+</span>
                            </button>
                            <div id="engagement-dropdown"
                                class="max-h-0 overflow-hidden opacity-0 transition-all duration-500 ease-in-out">
                                <p class="px-6 pb-4 text-gray-700 leading-relaxed">
                                    IPC recognizes the importance of parental involvement in children's education and
                                    promotes collaboration between educators and parents. Through workshops, communication
                                    tools, and family engagement activities, IPC strengthens the partnership between home
                                    and school, fostering a supportive learning environment for children.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- STEAM in IPC Curriculum Section --}}
    <section id="steam-ipc" class="bg-[#E8F3FB] py-20 px-6 md:px-12 lg:px-20">
        <div class="max-w-6xl mx-auto text-center space-y-10">

            {{-- TITLE --}}
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-[#00809D]">STEAM IN IPC CURRICULUM</h2>
                <p class="text-gray-700 max-w-3xl mx-auto mt-4">
                    In today’s rapidly evolving world, the demand for skills in science, technology, engineering, the arts, and mathematics (STEAM) is more crucial than ever. Recognizing this, the International Preschool Curriculum (IPC) has integrated STEAM education into its curriculum to nurture young learners’ natural curiosity and creativity while equipping them with the skills needed for future success.
                </p>
            </div>

            {{-- BUTTON TOGGLES --}}
            <div class="flex justify-center gap-4 flex-wrap">
                <button id="tab1-btn" onclick="setActiveTab('tab1')"
                    class="tab-btn active px-6 py-3 rounded-full bg-[#00809D] text-white font-semibold transition">
                    How IPC Integrates STEAM into the Curriculum
                </button>
                <button id="tab2-btn" onclick="setActiveTab('tab2')"
                    class="tab-btn px-6 py-3 rounded-full bg-transparent border-2 border-[#00809D] text-[#00809D] font-semibold transition">
                    Why STEAM Education is Important in the IPC Curriculum
                </button>
            </div>

            {{-- Example: Customizable Accordion Tabs --}}
@php
    $tabs = [
        'tab1' => [
            'title' => 'STEAM in IPC',
            'image' => 'img/carousel2.jpg',
            'items' => [
                [
                    'title' => 'Interdisciplinary Learning',
                    'content' => 'IPC’s curriculum is designed to be interdisciplinary, meaning that STEAM subjects are not taught in isolation but are integrated into various aspects of the learning experience.
For example, a lesson on building a simple machine might incorporate principles of physics (science), measurements (mathematics), and creative design (arts), allowing children to see the connections between different fields.'
                ],
                [
                    'title' => 'Hands-On Activities and Experiments',
                    'content' => 'IPC emphasizes experiential learning, where children engage in hands-on activities and experiments. These activities are carefully crafted to be age-appropriate and encourage exploration and experimentation.

Whether it’s creating art with a focus on symmetry, building simple structures, or exploring the natural world, these activities help children develop a practical understanding of STEAM concepts.'
                ],
                [
                    'title' => 'Project-Based Learning',
                    'content' => 'IPC incorporates project-based learning (PBL) into its STEAM approach, where children work on projects that require them to apply knowledge from various STEAM disciplines.

For example, a project might involve designing and building a model city, which would require understanding architectural principles (engineering), planning (mathematics), and environmental impact (science). PBL encourages collaboration, creativity, and the application of knowledge in real-world contexts.'
                ],
                [
                    'title' => 'Technology Integration',
                    'content' => 'Technology is seamlessly integrated into the IPC curriculum to enhance learning. Children are introduced to age-appropriate digital tools and resources that support their exploration of STEAM concepts

—for example, using educational software to create digital art or simple coding activities to introduce the basics of computer science. These tools not only make learning more engaging but also help children become comfortable with technology from an early age.'
                ],
                [
                    'title' => 'Creative Arts and Expression',
                    'content' => 'The “A” in STEAM represents the arts, which IPC believes is crucial for fostering creativity and innovation. Artistic expression is woven into the curriculum through activities like drawing, music, dance, and drama.

These activities allow children to express their understanding of scientific concepts creatively, such as using dance to demonstrate the concept of movement or creating art that reflects patterns found in nature.'
                ],
            ],
        ],
        'tab2' => [
            'title' => 'Why STEAM is Important',
            'image' => 'img/carousel4.jpg',
            'items' => [
                [
                    'title' => 'Critical Thinking and Problem Solving',
                    'content' => 'Students are encouraged to ask questions, explore multiple solutions, and think analytically.'
                ],
                [
                    'title' => 'Collaboration and Communication',
                    'content' => 'Working in groups enhances their ability to communicate ideas and work as a team.'
                ],
                [
                    'title' => 'Real-World Application',
                    'content' => 'STEAM connects classroom learning to everyday life, showing students how knowledge is used in real contexts.'
                ],
                [
                    'title' => 'Future Skill Development',
                    'content' => 'Prepares students for emerging industries by fostering adaptability, creativity, and digital literacy.'
                ],
                [
                    'title' => 'Encouraging Creativity and Innovation',
                    'content' => 'Empowers children to design, create, and innovate with confidence and curiosity.'
                ],
            ],
        ],
    ];
@endphp

{{-- Render Tabs --}}
@foreach ($tabs as $tabId => $tab)
    <div id="{{ $tabId }}"
        class="tab-content {{ $loop->first ? '' : 'hidden' }} flex flex-col lg:flex-row items-center gap-8 bg-white rounded-2xl p-6 shadow-md">
        
        {{-- Image --}}
        <div class="lg:w-1/2">
            <img src="{{ asset($tab['image']) }}" alt="{{ $tab['title'] }}"
                class="rounded-xl shadow-lg w-full object-cover">
        </div>

        {{-- Accordion Items --}}
        <div class="lg:w-1/2 w-full space-y-4 text-left">
            @foreach ($tab['items'] as $i => $item)
                <div class="bg-[#F5FBFF] border border-[#BCE3F4] rounded-xl overflow-hidden shadow-sm">
                    <button onclick="toggleAccordion('{{ $tabId }}-{{ $i }}')"
                        class="w-full flex justify-between items-center px-6 py-4 text-[#00809D] font-semibold hover:bg-[#E6F6FC] transition">
                        {{ $loop->iteration }}. {{ $item['title'] }}
                        <span id="{{ $tabId }}-{{ $i }}-icon" class="text-2xl font-bold">+</span>
                    </button>
                    <div id="{{ $tabId }}-{{ $i }}-content"
                        class="max-h-0 overflow-hidden opacity-0 transition-all duration-500 ease-in-out">
                        <p class="px-6 pb-4 text-gray-700">{{ $item['content'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endforeach


            {{-- FOOTER TEXT --}}
            <div class="max-w-4xl mx-auto text-gray-700 text-center mt-10">
                <p>
                    Incorporating STEAM into the curriculum is a cornerstone of IPC's approach to early childhood education.
                    By blending science, technology, engineering, the arts, and mathematics into a cohesive learning
                    experience,
                    IPC not only prepares children for future success but also fosters a lifelong love of learning.
                </p>
            </div>
        </div>
    </section>

    {{-- IPC Student Profile Section --}}
    <section id="ipc-student-profile" class="bg-[#F3F9FE] py-20 px-6 md:px-12 lg:px-20">
        <div class="max-w-6xl mx-auto text-center space-y-10">

            {{-- SECTION HEADER --}}
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-[#00809D]">IPC STUDENT PROFILE</h2>
                <p class="text-gray-700 max-w-3xl mx-auto mt-4">
                    The IPC student is expected to achieve a minimum standard in each of the six content learning areas.
                    The IPC believes that children will develop at varying paces and, therefore, structures its learning
                    objectives into three distinct levels.
                </p>
            </div>

            {{-- PROFILE MENU --}}
            <div class="flex flex-wrap justify-center gap-4">
                @php
                    $profiles = [
                        ['id' => 'thinkers', 'name' => 'INDEPENDENT THINKERS', 'icon' => '🧠'],
                        ['id' => 'team', 'name' => 'TEAM WORKERS', 'icon' => '🤝'],
                        ['id' => 'reflectors', 'name' => 'REFLECTORS', 'icon' => '🔍'],
                        ['id' => 'predictors', 'name' => 'PREDICTORS', 'icon' => '🔮'],
                        ['id' => 'communicators', 'name' => 'COMMUNICATORS', 'icon' => '💬'],
                        ['id' => 'carers', 'name' => 'SOCIAL CARERS', 'icon' => '❤️'],
                    ];
                @endphp

                @foreach ($profiles as $p)
                    <button id="{{ $p['id'] }}-btn" onclick="setActiveProfile('{{ $p['id'] }}')"
                        class="profile-btn w-40 h-32 flex flex-col justify-center items-center bg-white border border-[#D6ECF6] 
                                                   rounded-2xl shadow-sm hover:shadow-md transition duration-300 font-semibold text-[#00809D]">
                        <span class="text-4xl mb-2">{{ $p['icon'] }}</span>
                        <span class="text-sm">{{ $p['name'] }}</span>
                    </button>
                @endforeach
            </div>

            {{-- CONTENT AREA --}}
            <div class="mt-10 flex flex-col lg:flex-row items-center justify-center gap-8">
                <div class="lg:w-1/2 flex justify-center">
                    <img id="profile-image" src="{{ asset('img/brain.webp') }}" alt="Student Profile Diagram"
                        class="max-w-sm w-full">
                </div>
                <div class="lg:w-1/2 text-left bg-white rounded-2xl shadow-md border border-[#D6ECF6] p-6">
                    <h3 id="profile-title" class="text-2xl font-bold text-[#00809D] mb-2">Independent Thinkers</h3>
                    <p id="profile-text" class="text-gray-700 leading-relaxed">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Independent thinkers develop the ability to
                        question, reason, and make thoughtful decisions on their own.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- IPC vs. Traditional Methods Section --}}
    <section id="ipc-vs-traditional" class="bg-[#E8F3FB] py-20 px-6 md:px-12 lg:px-20">
        <div class="max-w-6xl mx-auto text-center space-y-10">

            {{-- HEADER --}}
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-[#00809D]">IPC VS. TRADITIONAL METHODS</h2>
                <p class="text-gray-700 max-w-3xl mx-auto mt-4 leading-relaxed">
                    Unlike conventional models that often rely on rote memorization and structured teacher-led instruction,
                    the IPC embraces thematic, inquiry-based learning that encourages active exploration and critical
                    thinking.
                </p>
            </div>

            {{-- CONTENT --}}
            <div class="flex flex-col lg:flex-row items-center justify-center gap-10 text-left">
                {{-- IMAGE --}}
                <div class="lg:w-1/2 flex justify-center">
                    <img src="{{ asset('img/carousel6.jpg') }}" alt="Child learning through IPC"
                        class="rounded-2xl shadow-lg w-full max-w-sm object-cover">
                </div>

                {{-- ACCORDION --}}
                <div class="lg:w-1/2 w-full bg-white rounded-2xl shadow-md border border-[#BEE2F3] overflow-hidden">
                    {{-- Curriculum Design --}}
                    <div class="border-b border-[#CDE9F7]">
                        <button onclick="toggleAccordion('curriculum')"
                            class="w-full flex justify-between items-center px-6 py-5 font-semibold text-[#00809D] hover:bg-[#E6F6FC] transition">
                            Curriculum Design
                            <span id="curriculum-icon" class="text-2xl font-bold">−</span>
                        </button>
                        <div id="curriculum-content"
                            class="max-h-[400px] opacity-100 transition-all duration-500 ease-in-out">
                            <p class="px-6 pb-5 text-gray-700 leading-relaxed">
                                Traditional learning often follows a rigid, teacher-directed approach,
                                while the IPC emphasizes a dynamic, child-centered curriculum.
                            </p>
                        </div>
                    </div>

                    {{-- Teaching Methods --}}
                    <div class="border-b border-[#CDE9F7]">
                        <button onclick="toggleAccordion('methods')"
                            class="w-full flex justify-between items-center px-6 py-5 font-semibold text-[#00809D] hover:bg-[#E6F6FC] transition">
                            Teaching Methods
                            <span id="methods-icon" class="text-2xl font-bold">+</span>
                        </button>
                        <div id="methods-content"
                            class="max-h-0 overflow-hidden opacity-0 transition-all duration-500 ease-in-out">
                            <p class="px-6 pb-5 text-gray-700 leading-relaxed">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. The IPC integrates hands-on,
                                inquiry-based activities
                                to encourage active participation and discovery.
                            </p>
                        </div>
                    </div>

                    {{-- Role of the Teacher --}}
                    <div class="border-b border-[#CDE9F7]">
                        <button onclick="toggleAccordion('teacher')"
                            class="w-full flex justify-between items-center px-6 py-5 font-semibold text-[#00809D] hover:bg-[#E6F6FC] transition">
                            Role of the Teacher
                            <span id="teacher-icon" class="text-2xl font-bold">+</span>
                        </button>
                        <div id="teacher-content"
                            class="max-h-0 overflow-hidden opacity-0 transition-all duration-500 ease-in-out">
                            <p class="px-6 pb-5 text-gray-700 leading-relaxed">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Teachers act as facilitators who
                                guide
                                exploration rather than dictate information.
                            </p>
                        </div>
                    </div>

                    {{-- Assessment --}}
                    <div>
                        <button onclick="toggleAccordion('assessment')"
                            class="w-full flex justify-between items-center px-6 py-5 font-semibold text-[#00809D] hover:bg-[#E6F6FC] transition">
                            Assessment
                            <span id="assessment-icon" class="text-2xl font-bold">+</span>
                        </button>
                        <div id="assessment-content"
                            class="max-h-0 overflow-hidden opacity-0 transition-all duration-500 ease-in-out">
                            <p class="px-6 pb-5 text-gray-700 leading-relaxed">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. IPC emphasizes progress tracking
                                and holistic evaluation over standardized testing.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- IPC Curriculum Section --}}
    <section id="ipc-curriculum" class="bg-[#0C75A6] text-white py-20 px-6 md:px-12 lg:px-20">
        <div class="max-w-7xl mx-auto">

            {{-- GRID WRAPPER --}}
            <div class="grid md:grid-cols-2 gap-12">

                {{-- INFANT & TODDLER CURRICULUM --}}
                <div class="space-y-6">
                    {{-- ICON --}}
                    <div class="text-5xl text-[#BEE2F3]">
                        <i class="fa-solid fa-puzzle-piece"></i>
                    </div>

                    {{-- TITLE --}}
                    <h3 class="text-2xl md:text-3xl font-semibold">IPC Infant & Toddler Curriculum</h3>

                    {{-- DESCRIPTION --}}
                    <p class="text-[#D5ECF7] leading-relaxed">
                        The IPC Infant and Toddler Curriculum was specifically designed to engage and educate the youngest
                        of children ages 3–36 months.
                    </p>
                    <p class="text-[#D5ECF7] leading-relaxed">
                        Through a variety of daily activities, each of the five senses is engrossed, and young children are
                        introduced to the skills and knowledge necessary for their development.
                        The Infant and Toddler Curriculum is divided into 36 Thematic Units, from <em>The Circus</em> to
                        <em>Dinosaurs</em>.
                        Each of the 36 units’ activities is based on the IPC’s Six Content Learning Areas.
                    </p>

                    {{-- DOWNLOAD BUTTON --}}
                    <a href="#"
                        class="inline-flex items-center gap-2 border border-white rounded-lg px-6 py-3 font-semibold hover:bg-white hover:text-[#0C75A6] transition">
                        <i class="fa-solid fa-download"></i> DOWNLOAD
                    </a>
                </div>

                {{-- PRESCHOOL CURRICULUM --}}
                <div class="space-y-6">
                    {{-- ICON --}}
                    <div class="text-5xl text-[#BEE2F3]">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </div>

                    {{-- TITLE --}}
                    <h3 class="text-2xl md:text-3xl font-semibold">IPC Preschool Curriculum</h3>

                    {{-- DESCRIPTION --}}
                    <p class="text-[#D5ECF7] leading-relaxed">
                        The IPC Preschool Curriculum is an educational framework designed to promote early childhood
                        development
                        through a thematic, play-based approach. It emphasizes hands-on learning experiences, fostering
                        cognitive,
                        social, emotional, and physical growth in children.
                    </p>
                    <p class="text-[#D5ECF7] leading-relaxed">
                        The curriculum integrates a variety of subjects, such as language, math, science, and creative arts,
                        with a strong focus on global awareness and cultural diversity. It encourages exploration, critical
                        thinking,
                        and collaboration among young learners, preparing them for future academic success in a nurturing
                        and engaging environment.
                    </p>
                    <p class="text-[#D5ECF7] leading-relaxed">
                        With over 20 units, the IPC Preschool Curriculum was developed to be fun and engaging.
                    </p>

                    {{-- DOWNLOAD BUTTON --}}
                    <a href="#"
                        class="inline-flex items-center gap-2 border border-white rounded-lg px-6 py-3 font-semibold hover:bg-white hover:text-[#0C75A6] transition">
                        <i class="fa-solid fa-download"></i> DOWNLOAD
                    </a>
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

    {{-- STEAM --}}
    <script>
        function setActiveTab(tab) {
            document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
            document.getElementById(tab).classList.remove('hidden');

            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('bg-[#00809D]', 'text-white');
                btn.classList.add('bg-transparent', 'text-[#00809D]', 'border-2', 'border-[#00809D]');
            });

            const activeBtn = document.getElementById(tab + '-btn');
            activeBtn.classList.add('bg-[#00809D]', 'text-white');
            activeBtn.classList.remove('bg-transparent','text-[#00809D]', 'border-2', 'border-[#00809D]');
        }

        function toggleAccordion(id) {
            const content = document.getElementById(id + '-content');
            const icon = document.getElementById(id + '-icon');

            const isOpen = content.classList.contains('max-h-[500px]');
            document.querySelectorAll(`[id$='-content']`).forEach(el => {
                el.classList.remove('max-h-[500px]', 'opacity-100');
                el.classList.add('max-h-0', 'opacity-0');
            });
            document.querySelectorAll(`[id$='-icon']`).forEach(el => el.textContent = '+');

            if (!isOpen) {
                content.classList.remove('max-h-0', 'opacity-0');
                content.classList.add('max-h-[500px]', 'opacity-100');
                icon.textContent = '−';
            }
        }
    </script>
    {{-- profile --}}
    <script>
        const profiles = {
            thinkers: {
                title: "Independent Thinkers",
                text: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Independent thinkers develop the ability to question, reason, and make thoughtful decisions on their own.",
                image: "{{ asset('img/brain.webp') }}"
            },
            team: {
                title: "Team Workers",
                text: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Team workers collaborate effectively, respect others’ ideas, and achieve goals together.",
                image: "{{ asset('img/brain.webp') }}"
            },
            reflectors: {
                title: "Reflectors",
                text: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Reflectors analyze their experiences, learn from mistakes, and strive for improvement.",
                image: "{{ asset('img/brain.webp') }}"
            },
            predictors: {
                title: "Predictors",
                text: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Predictors can foresee outcomes, connect ideas, and explore creative possibilities.",
                image: "{{ asset('img/brain.webp') }}"
            },
            communicators: {
                title: "Communicators",
                text: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Communicators express themselves clearly and listen actively to others.",
                image: "{{ asset('img/brain.webp') }}"
            },
            carers: {
                title: "Social Carers",
                text: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Social carers show empathy, kindness, and take responsibility for others’ well-being.",
                image: "{{ asset('img/brain.webp') }}"
            }
        };

        function setActiveProfile(id) {
            // Reset buttons
            document.querySelectorAll('.profile-btn').forEach(btn => {
                btn.classList.remove('bg-[#00809D]', 'text-white', 'shadow-md');
                btn.classList.add('bg-white', 'text-[#00809D]');
            });

            // Highlight selected
            const activeBtn = document.getElementById(id + '-btn');
            activeBtn.classList.add('bg-[#00809D]', 'text-white', 'shadow-md');

            // Update content
            document.getElementById('profile-title').textContent = profiles[id].title;
            document.getElementById('profile-text').textContent = profiles[id].text;
            document.getElementById('profile-image').src = profiles[id].image;
        }

        // Default active profile
        setActiveProfile('thinkers');
    </script>

    {{-- traditional --}}
    <script>
        function toggleAccordion(id) {
            const content = document.getElementById(id + '-content');
            const icon = document.getElementById(id + '-icon');

            const isOpen = content.classList.contains('max-h-[400px]');

            // Close all others
            document.querySelectorAll("[id$='-content']").forEach(el => {
                el.classList.remove('max-h-[400px]', 'opacity-100');
                el.classList.add('max-h-0', 'opacity-0');
            });
            document.querySelectorAll("[id$='-icon']").forEach(el => el.textContent = '+');

            // Open selected
            if (!isOpen) {
                content.classList.remove('max-h-0', 'opacity-0');
                content.classList.add('max-h-[400px]', 'opacity-100');
                icon.textContent = '−';
            }
        }
    </script>
@endsection