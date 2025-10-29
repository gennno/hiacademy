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
                        Admission Process
                    </h2>
                    <p class="text-md text-black font-sans text-base md:text-md leading-relaxed">
                        Explore the essential steps of enrollment for your child to embark on an exciting journey of
                        learning and discovery at h!academy.
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

    <section class="bg-white p-8 rounded-2xl shadow-lg max-w-2xl mx-auto border border-gray-100">
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-2">STEP 1 DOCUMENT PREPARATION</h2>
            <p class="text-gray-700 text-lg">The following documents are required to be submitted with the application form.
            </p>
        </div>

        <div class="space-y-6">
            <div class="flex gap-4">
                <div class="text-lg font-semibold text-gray-900 min-w-8">01</div>
                <div class="text-gray-700">Photocopy of Child's birth certificate</div>
            </div>
            <div class="flex gap-4">
                <div class="text-lg font-semibold text-gray-900 min-w-8">02</div>
                <div class="text-gray-700">Photocopy of Child's passport (photo page only)</div>
            </div>
            <div class="flex gap-4">
                <div class="text-lg font-semibold text-gray-900 min-w-8">03</div>
                <div class="text-gray-700">Photocopy of Parents' passports/Thai identification cards (photo page only)</div>
            </div>
            <div class="flex gap-4">
                <div class="text-lg font-semibold text-gray-900 min-w-8">04</div>
                <div class="text-gray-700">Photocopy of Child's house registration (for Thai applicants only)</div>
            </div>
            <div class="flex gap-4">
                <div class="text-lg font-semibold text-gray-900 min-w-8">05</div>
                <div class="text-gray-700">Photocopy of Child's immunization record</div>
            </div>
            <div class="flex gap-4">
                <div class="text-lg font-semibold text-gray-900 min-w-8">06</div>
                <div class="text-gray-700">Child's passport-size photo</div>
            </div>
            <div class="flex gap-4">
                <div class="text-lg font-semibold text-gray-900 min-w-8">07</div>
                <div class="text-gray-700">Medical certificates regarding medical conditions, allergies, long-term
                    medication, or treatment (if any)</div>
            </div>
        </div>
    </section>


    <section class="bg-white p-8 rounded-2xl shadow-lg max-w-2xl mx-auto border border-gray-100">
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-2">Step 2 Application Form Submission</h2>
            <p class="text-gray-700 text-lg">The complete application form can be submitted via email or in person at the
                school office.
            </p>
        </div>

        <div class="space-y-6">
            <div class="flex gap-4">
                <div class="text-gray-700">Download Application Form</div>
            </div>
        </div>
    </section>

    <section class="bg-white p-8 rounded-2xl shadow-lg max-w-2xl mx-auto border border-gray-100">
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-2">Step 3 Application Review & Class Placement</h2>
            <p class="text-gray-700 text-lg">We accept enrollment at any time during the year. Students from all
                nationalities
                who are eager to engage with and thrive in our programs are welcome.
                <br>
                Class placements adhere to the age norms of the International Preschool Curriculum, and
                exceptions to these ranges are rare and granted only in exceptional cases.
            </p>
        </div>

        <div class="space-y-6">
            <div class="flex gap-4">
                <div class="text-gray-700">To maintain diversity, nationalities, and genders are also taken into consideration when assigning students to classes.</div>
            </div>
        </div>
    </section>

    <section class="bg-white p-8 rounded-2xl shadow-lg max-w-2xl mx-auto border border-gray-100">
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-2">Step 4 Enrollment</h2>
            <p class="text-gray-700 text-lg">Once a place has been offered, an invoice for the registration fee will be sent to you. This non-refundable fee must be paid in
order to hold your child’s place. The invoice for the tuition fee will be sent to you one month before the first day of school.
            </p>
        </div>

        <div class="space-y-6">
            <div class="flex gap-4">
                <div class="text-gray-700">Download Application Form</div>
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
@endsection