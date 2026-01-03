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
                <img src="{{ asset('img/2.webp') }}" alt="h!academy logo"
                    class="w-56 md:w-72 drop-shadow-xl hover:scale-105 transition duration-500 mx-auto sm:mx-0">

                <!-- Connect with Us -->
                <div>
                    <h5 class="text-lg font-semibold mb-4 text-yellow-400">Connect with Us</h5>
                    <div class="flex gap-4 justify-center sm:justify-start">

                        <!-- Facebook -->
                        <a href="https://www.facebook.com/share/1BZY6i1Wqs/" target="_blank"
                            class="w-12 h-12 flex items-center justify-center rounded-full bg-white/10 hover:bg-blue-500 hover:scale-110 transition transform duration-300">
                            <i class="fab fa-facebook-f text-xl"></i>
                        </a>

                        <!-- Instagram -->
                        <a href="https://www.instagram.com/hiacademyofficial/" target="_blank"
                            class="w-12 h-12 flex items-center justify-center rounded-full bg-white/10 hover:bg-pink-500 hover:scale-110 transition transform duration-300">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>

                        <!-- YouTube -->
                        <a href="https://www.youtube.com/@h.academyofficial" target="_blank"
                            class="w-12 h-12 flex items-center justify-center rounded-full bg-white/10 hover:bg-red-500 hover:scale-110 transition transform duration-300">
                            <i class="fab fa-youtube text-xl"></i>
                        </a>

                    </div>

                    <!-- Contact Button -->
                    <a href="https://wa.me/6281334350127" target="_blank"
                        class="inline-flex items-center gap-2 mt-6 bg-yellow-400 text-blue-900 font-semibold px-6 py-3 rounded-full shadow-lg hover:bg-white hover:scale-105 transition duration-300">
                        <i class="fa-solid fa-message"></i> Whatsapp Us
                    </a>
                    <a href="mailto:info@hiacademy.id" target="_blank"
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
                        <li><a href="{{ route('login') }}"
                                class="hover:text-yellow-400 transition flex items-center gap-2"><i
                                    class="fa-solid fa-user-graduate"></i> Student Login</a></li>
                        <li><a href="https://wa.me/6281334350127" target="_blank"
                                class="hover:text-yellow-400 transition flex items-center gap-2"><i
                                    class="fa-solid fa-phone"></i> Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Partner Logos -->
    <div class="mt-20 mb-12 bg-gray-400 py-10 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 relative">
            <!-- Slider Wrapper -->
            <div id="partner-slider-wrapper" class="overflow-hidden">
                <!-- Slider Track -->
                <div id="partner-slider" class="flex transition-transform duration-700 ease-in-out
                       xl:justify-center xl:translate-x-0">

                    <!-- Logo Item -->
                    <div class="partner-item">
                        <img src="{{ asset('img/franchise.png') }}" class="logo-img h-28 object-contain shrink-0">
                    </div>

                    <div class="partner-item">
                        <img src="{{ asset('img/timedoor.webp') }}" class="logo-img h-16 object-contain shrink-0">
                    </div>

                    <div class="partner-item">
                        <img src="{{ asset('img/Iblaeducation.png') }}" class="logo-img h-16 object-contain shrink-0">
                    </div>

                    <div class="partner-item">
                        <img src="{{ asset('img/pearson.png') }}" class="logo-img h-16 object-contain shrink-0">
                    </div>

                    <div class="partner-item">
                        <img src="{{ asset('img/stem.png') }}" class="logo-img h-16 object-contain shrink-0">
                    </div>
                </div>
            </div>

        </div>
    </div>



    <!-- Copyright -->
    <div
        class="mt-16 bg-yellow-400/80 py-4 text-center text-black text-sm relative z-10 border-t rounded-full border-blue-800/40">
        © 2025 h!academy | Powered by <span class="text-white font-semibold">DayR</span>
    </div>
</footer>