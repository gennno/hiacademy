@extends('layouts.layout')

@section('title', 'h!academy')

@section('content')
    {{-- Background Video --}}
    <video autoplay muted loop playsinline class="fixed inset-0 w-full h-full object-cover scale-110 -z-10">
        <source src="{{ asset('video/ipc.mp4') }}" type="video/mp4">
    </video>

    {{-- Overlay optional (gelapin biar teks lebih jelas) --}}
    <div class="fixed inset-0 bg-black bg-opacity-55 -z-10"></div>


    {{-- Navbar --}}
    <header class="fixed top-4 left-1/2 transform -translate-x-1/2 w-[90%] z-50">
        {{-- Top Bar (rounded full) --}}
        <div class="bg-blue-500 bg-opacity-95 shadow-lg rounded-full">
            <div class="container mx-auto px-6 py-3 flex items-center justify-between">

                {{-- Left: Logo --}}
                <div class="flex-shrink-0">
                    <img src="{{ asset('img/logofull.png') }}" alt="H!Academy Logo" class="h-10 md:h-12 w-auto">
                </div>

                {{-- Middle: Menu --}}
                <nav class="hidden md:flex space-x-8 text-white font-medium">
                    <a href="#home" class="hover:text-yellow-300 transition">Home</a>
                    <a href="#about" class="hover:text-yellow-300 transition">About</a>
                    <a href="#programs" class="hover:text-yellow-300 transition">Programs</a>
                    <a href="#contact" class="hover:text-yellow-300 transition">Contact</a>
                </nav>

                {{-- Right: Login + Mobile Menu Button --}}
                <div class="flex-shrink-0 flex items-center space-x-3">
                    <a href="/login"
                        class="bg-white text-blue-600 px-4 py-2 rounded-full text-sm font-semibold shadow hover:bg-yellow-300 transition">
                        Login
                    </a>
                    {{-- Mobile Menu Button --}}
                    <button id="menu-btn" class="md:hidden text-white focus:outline-none ">
                        <!-- Hamburger Icon -->
                        <svg id="menu-icon" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <!-- Close Icon -->
                        <svg id="close-icon" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 hidden" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- Mobile Menu (collapsed by default) --}}
        <div id="mobile-menu"
            class="max-h-0 overflow-hidden transition-all duration-300 flex-col bg-white shadow-md md:hidden rounded-b-2xl mt-2">
            <a href="#home" class="block px-6 py-3 border-b hover:bg-yellow-300 transition">Home</a>
            <a href="#about" class="block px-6 py-3 border-b hover:bg-yellow-300 transition">About</a>
            <a href="#programs" class="block px-6 py-3 border-b hover:bg-yellow-300 transition">Programs</a>
            <a href="#contact" class="block px-6 py-3 hover:bg-yellow-300 transition">Contact</a>
        </div>
    </header>

    <script>
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        const closeIcon = document.getElementById('close-icon');

        menuBtn.addEventListener('click', () => {
            const isClosed = mobileMenu.classList.contains('max-h-0');

            if (isClosed) {
                mobileMenu.classList.remove('max-h-0');
                mobileMenu.classList.add('max-h-[500px]');
            } else {
                mobileMenu.classList.add('max-h-0');
                mobileMenu.classList.remove('max-h-[500px]');
            }

            menuIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');
        });
    </script>

    {{-- Hero Section --}}
    <section id="home" class="pt-32 bg-transparent relative text-center">

        <div class="container mx-auto px-6 relative z-10 max-w-3xl">

            {{-- Welcome Text --}}
            <h2 class="text-2xl md:text-3xl font-semibold text-blue-300 mb-6">
                Welcome to <span class="text-yellow-300">h!</span><span class="text-white">academy</span>
            </h2>

            {{-- Typing Effect Text --}}
            <h1 class="text-4xl md:text-5xl font-extrabold text-white leading-tight h-24">
                <span id="typing-text"></span>
            </h1>

            {{-- Description --}}
            <p class="text-xl md:text-xl text-gray-300 mt-6 leading-relaxed">
                At h!academy, we are committed to nurturing young minds with a comprehensive range of programs
                tailored to meet the needs of the future. From foundational skills to advanced learning,
                we offer everything your child needs to thrive in a globalized world.
            </p>

            {{-- Button --}}
            <div class="mt-8">
                <a href="#programs"
                    class="inline-block bg-yellow-400 text-blue-900 font-bold px-6 py-3 rounded-lg shadow hover:bg-yellow-300 transition transform hover:scale-105">
                    Explore Our Programs →
                </a>
            </div>

        </div>

        {{-- Lottie Animation as Section Divider --}}
        <div class="mt-16 flex justify-center">
            <dotlottie-player src="https://lottie.host/e98d02fb-eb45-4159-9315-d84886cdf062/gdUtfV5REH.lottie"
                background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay>
            </dotlottie-player>

            <dotlottie-player src="https://lottie.host/796783e3-1ee6-4b24-a321-f9772e2b14ba/3BFNrpShG9.lottie"
                background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay>
            </dotlottie-player>

            <dotlottie-player src="https://lottie.host/8462be9d-fce4-4859-a020-bedfb7740c86/VlNln7exep.lottie"
                background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay>
            </dotlottie-player>

        </div>

    </section>

    <!-- About Section -->

    <section id="about" class="bg-blue-950/50 pt-20 pb-10 relative backdrop-blur-md  rounded-2xl shadow-xl text-center">
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
                        <a href="#"
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
                        <a href="#"
                            class="bg-yellow-400 text-blue-900 font-bold px-4 py-2 rounded-lg shadow hover:bg-yellow-300 transition">
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

                <!-- contoh lainnya tinggal copy struktur di atas -->
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
                        <a href="#"
                            class="bg-yellow-400 text-blue-900 font-bold px-4 py-2 rounded-lg shadow hover:bg-yellow-300 transition">
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
                        <a href="#"
                            class="bg-yellow-400 text-blue-900 font-bold px-4 py-2 rounded-lg shadow hover:bg-yellow-300 transition">
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

                        <!-- Social Media (moved here) -->
                        <div class="mt-8">
                            <h5 class="text-lg font-semibold mb-4">Connect with Us</h5>
                            <div class="flex gap-4">
                                <a href="#"
                                    class="w-10 h-10 flex items-center justify-center rounded-full bg-white/10 hover:bg-blue-500 transition transform hover:scale-110">
                                    <i class="fa-brands fa-facebook-f text-lg"></i>
                                </a>
                                <a href="#"
                                    class="w-10 h-10 flex items-center justify-center rounded-full bg-white/10 hover:bg-pink-500 transition transform hover:scale-110">
                                    <i class="fa-brands fa-instagram text-lg"></i>
                                </a>
                                <a href="#"
                                    class="w-10 h-10 flex items-center justify-center rounded-full bg-white/10 hover:bg-red-500 transition transform hover:scale-110">
                                    <i class="fa-brands fa-youtube text-lg"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Consultation Hours -->
                    <div>
                        <h5 class="text-xl font-bold mb-4">Consultation Hour</h5>
                        <div class="space-y-3 text-sm">
                            <div
                                class="flex items-center justify-between p-3 rounded-xl bg-white/10 hover:bg-white/20 transition">
                                <span>Weekdays</span>
                                <span class="text-green-400 font-medium">🟢 09:00 - 17:00</span>
                            </div>
                            <div
                                class="flex items-center justify-between p-3 rounded-xl bg-white/10 hover:bg-white/20 transition">
                                <span>Saturday</span>
                                <span class="text-green-400 font-medium">🟢 09:00 - 14:00</span>
                            </div>
                            <div class="flex items-center justify-between p-3 rounded-xl bg-white/10">
                                <span>Sunday</span>
                                <span class="text-red-400 font-semibold">🔴 Closed</span>
                            </div>
                        </div>
                        <a href="#"
                            class="inline-flex items-center gap-2 mt-6 bg-yellow-400 text-blue-900 font-semibold px-6 py-3 rounded-full shadow-lg hover:bg-yellow-300 hover:scale-105 transition">
                            💬 Contact Us
                        </a>
                    </div>
                </div>
            </div>

            <!-- Copyright -->
            <div
                class="mt-16 bg-blue-950/80 py-4 text-center text-gray-400 text-sm relative z-10 border-t border-blue-800/40">
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
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            new Typed("#typing-text", {
                strings: [
                    "Your One-Stop Education Center",
                    "Nurturing Bright Future with Hope"
                ],
                typeSpeed: 30,
                backSpeed: 30,
                backDelay: 2000,
                loop: true
            });
        });
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