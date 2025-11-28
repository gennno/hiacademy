@extends('layouts.layout')

@section('title', 'h!academy - Book Free Trial')

@section('content')
    {{-- 🔙 Back Button --}}
    <a href="{{ route('home') }}"
       class="absolute top-4 left-4 sm:top-6 sm:left-6 flex items-center gap-2 text-yellow-400 hover:text-white font-semibold text-sm sm:text-base transition z-50">
        <i class="fa-solid fa-arrow-left text-lg sm:text-xl"></i>
        <span class="hidden sm:inline">Back</span>
    </a>

    {{-- 🔄 Background Carousel --}}
    <div id="background-carousel" class="fixed inset-0 w-full h-full overflow-hidden -z-10">
        <img src="{{ asset('img/carousel1.jpg') }}" class="carousel-slide active" alt="Slide 1">
        <img src="{{ asset('img/carousel2.jpg') }}" class="carousel-slide" alt="Slide 2">
        <img src="{{ asset('img/carousel3.jpg') }}" class="carousel-slide" alt="Slide 3">
        <img src="{{ asset('img/carousel4.jpg') }}" class="carousel-slide" alt="Slide 4">
        <img src="{{ asset('img/carousel5.jpg') }}" class="carousel-slide" alt="Slide 5">
    </div>

    {{-- Overlay --}}
    <div class="fixed inset-0 bg-black bg-opacity-60 -z-10"></div>

    <style>
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

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        /* Modal Styles */
        #trial-modal {
            opacity: 0;
            transform: scale(0.9);
            transition: all 0.3s ease;
            pointer-events: none;
        }

        #trial-modal.active {
            opacity: 1;
            transform: scale(1);
            pointer-events: all;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Background carousel
            const slides = document.querySelectorAll('#background-carousel .carousel-slide');
            let currentIndex = 0;
            setInterval(() => {
                slides[currentIndex].classList.remove('active');
                currentIndex = (currentIndex + 1) % slides.length;
                slides[currentIndex].classList.add('active');
            }, 4000);

            // Trial modal functionality
            const trialModal = document.getElementById('trial-modal');
            const closeTrialBtn = document.getElementById('close-trial');
            const programNameElement = document.getElementById('selected-program-name');
            const programInput = document.getElementById('selected-program');

            // Open trial modal when program card is clicked
            document.querySelectorAll('.program-card').forEach(card => {
                card.addEventListener('click', (e) => {
                    e.preventDefault();
                    const programName = card.getAttribute('data-program');
                    const programSlug = card.getAttribute('data-program-slug');
                    
                    programNameElement.textContent = programName;
                    programInput.value = programSlug;
                    
                    trialModal.classList.add('active');
                    document.body.style.overflow = 'hidden';
                });
            });

            // Close trial modal
            closeTrialBtn.addEventListener('click', () => {
                trialModal.classList.remove('active');
                document.body.style.overflow = 'auto';
            });

            // Close modal when clicking outside
            trialModal.addEventListener('click', (e) => {
                if (e.target === trialModal) {
                    trialModal.classList.remove('active');
                    document.body.style.overflow = 'auto';
                }
            });

            // Form submission
            const trialForm = document.getElementById('trial-form');
            trialForm.addEventListener('submit', function(e) {
                e.preventDefault();
                // Here you would typically submit the form via AJAX or let it submit normally
                // For demo purposes, we'll just show an alert and close the modal
                alert('Thank you for registering for a free trial! We will contact you soon.');
                trialModal.classList.remove('active');
                document.body.style.overflow = 'auto';
                // Uncomment the line below to actually submit the form
                // this.submit();
            });
        });
    </script>

    {{-- 🔸 Main Section --}}
    <div class="w-full min-h-screen flex flex-col items-center justify-center px-4 sm:px-8 md:px-12 lg:px-20 xl:px-32 py-10 gap-10 md:gap-16 overflow-y-auto">

        {{-- 🟡 Program Selection + Mascot --}}
        <div class="flex flex-col items-center text-center space-y-6 max-w-6xl w-full text-white">
            <div class="flex flex-col md:flex-row items-center gap-4 sm:gap-6">
                <img src="{{ asset('img/9.png') }}" alt="Mascot"
                    class="w-24 sm:w-32 md:w-48 lg:w-56 animate-float drop-shadow-lg">
                <div>
                    <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold text-yellow-400 mb-2">
                        Book Your Free Trial
                    </h2>
                    <p class="text-gray-300 text-sm sm:text-base md:text-lg leading-relaxed max-w-md mx-auto md:mx-0">
                        Select a program below to book your free trial class. Experience our teaching methods firsthand!
                    </p>
                </div>
            </div>

            {{-- Grid Layout for Programs --}}
            <div class="mt-4 w-full">
                @php
                    $programs = [
                        ['name' => 'International Preschool', 'slug' => 'preschool', 'icon' => 'fa-seedling', 'color' => 'border-yellow-400 hover:bg-yellow-400', 'type' => 'trial'],
                        ['name' => 'Child Development Program', 'slug' => 'child-development', 'icon' => 'fa-child', 'color' => 'border-cyan-400 hover:bg-cyan-400', 'type' => 'trial'],
                        ['name' => 'English Program', 'slug' => 'english', 'icon' => 'fa-book-open', 'color' => 'border-green-400 hover:bg-green-400', 'type' => 'trial'],
                        ['name' => 'Mandarin Program', 'slug' => 'mandarin', 'icon' => 'fa-language', 'color' => 'border-red-500 hover:bg-red-500', 'type' => 'trial'],
                        ['name' => 'Math Program', 'slug' => 'math', 'icon' => 'fa-square-root-variable', 'color' => 'border-purple-400 hover:bg-purple-400', 'type' => 'trial'],
                        ['name' => 'STEM & Coding', 'slug' => 'stem-coding', 'icon' => 'fa-robot', 'color' => 'border-indigo-400 hover:bg-indigo-400', 'type' => 'trial'],
                        ['name' => 'Design Program', 'slug' => 'design', 'icon' => 'fa-pen-nib', 'color' => 'border-pink-400 hover:bg-pink-400', 'type' => 'trial'],
                        ['name' => 'Creative Arts', 'slug' => 'creative-arts', 'icon' => 'fa-palette', 'color' => 'border-orange-400 hover:bg-orange-400', 'type' => 'trial'],
                        ['name' => 'Parenting life Indonesia', 'slug' => 'parenting', 'icon' => 'fa-users', 'color' => 'border-teal-400 hover:bg-teal-400', 'type' => 'consultation', 'url' => 'https://parentinglife.id/'],
                    ];
                @endphp

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6 gap-4 sm:gap-5 md:gap-6">
                    @foreach ($programs as $program)
                        @if($program['type'] === 'trial')
                            <div class="program-card group bg-white/10 {{ $program['color'] }} border rounded-xl p-4 sm:p-5 flex flex-col items-center justify-center hover:text-black transition-all transform hover:scale-105 duration-300 h-full min-h-[140px] cursor-pointer"
                                 data-program="{{ $program['name'] }}" 
                                 data-program-slug="{{ $program['slug'] }}">
                                <i class="fa-solid {{ $program['icon'] }} text-xl sm:text-2xl md:text-3xl mb-2 sm:mb-3 group-hover:animate-bounce"></i>
                                <h4 class="font-semibold text-center text-xs sm:text-sm md:text-base leading-tight">{{ $program['name'] }}</h4>
                                <span class="text-xs text-gray-300 mt-2 group-hover:text-black">Click to book free trial</span>
                            </div>
                        @else
                            <a href="{{ $program['url'] ?? '#' }}" 
                               target="_blank"
                               class="group bg-white/10 {{ $program['color'] }} border rounded-xl p-4 sm:p-5 flex flex-col items-center justify-center hover:text-black transition-all transform hover:scale-105 duration-300 h-full min-h-[140px]">
                                <i class="fa-solid {{ $program['icon'] }} text-xl sm:text-2xl md:text-3xl mb-2 sm:mb-3 group-hover:animate-bounce"></i>
                                <h4 class="font-semibold text-center text-xs sm:text-sm md:text-base leading-tight">{{ $program['name'] }}</h4>
                                <span class="text-xs text-gray-300 mt-2 group-hover:text-black">Book Consultation</span>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- Free Trial Registration Modal --}}
    <div id="trial-modal" class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50 p-4">
        <div class="bg-gray-900 rounded-2xl p-6 sm:p-8 max-w-md w-full border-2 border-yellow-500 relative max-h-[90vh] overflow-y-auto">
            {{-- Close Button --}}
            <button id="close-trial" class="absolute top-4 right-4 text-gray-400 hover:text-white transition">
                <i class="fa-solid fa-xmark text-xl"></i>
            </button>

            {{-- Trial Registration Form --}}
            <div class="text-center mb-6">
                <i class="fa-solid fa-calendar-check text-yellow-500 text-4xl mb-4"></i>
                <h2 class="text-2xl font-bold text-white">Book Free Trial</h2>
                <p class="text-gray-400 mt-2">You're booking a free trial for: <span id="selected-program-name" class="text-yellow-400 font-semibold"></span></p>
            </div>

            <form id="trial-form" action="" method="POST" class="space-y-4">
                @csrf
                <input type="hidden" id="selected-program" name="program">
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="parent-name" class="block text-sm font-medium text-gray-300 mb-1">Parent's Name *</label>
                        <input type="text" id="parent-name" name="parent_name" 
                               class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent"
                               placeholder="Your full name" required>
                    </div>
                    
                    <div>
                        <label for="child-name" class="block text-sm font-medium text-gray-300 mb-1">Child's Name *</label>
                        <input type="text" id="child-name" name="child_name" 
                               class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent"
                               placeholder="Child's full name" required>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="child-age" class="block text-sm font-medium text-gray-300 mb-1">Child's Age *</label>
                        <input type="number" id="child-age" name="child_age" min="2" max="18"
                               class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent"
                               placeholder="Age" required>
                    </div>
                    
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-300 mb-1">Phone Number *</label>
                        <input type="tel" id="phone" name="phone" 
                               class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent"
                               placeholder="Your phone number" required>
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-1">Email Address *</label>
                    <input type="email" id="email" name="email" 
                           class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent"
                           placeholder="Your email address" required>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="preferred-date" class="block text-sm font-medium text-gray-300 mb-1">Preferred Date</label>
                        <input type="date" id="preferred-date" name="preferred_date" 
                               class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent"
                               min="{{ date('Y-m-d', strtotime('+1 day')) }}">
                    </div>
                    
                    <div>
                        <label for="preferred-time" class="block text-sm font-medium text-gray-300 mb-1">Preferred Time</label>
                        <select id="preferred-time" name="preferred_time" 
                                class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
                            <option value="">Select time</option>
                            <option value="09:00">09:00 AM</option>
                            <option value="10:00">10:00 AM</option>
                            <option value="11:00">11:00 AM</option>
                            <option value="13:00">01:00 PM</option>
                            <option value="14:00">02:00 PM</option>
                            <option value="15:00">03:00 PM</option>
                            <option value="16:00">04:00 PM</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label for="message" class="block text-sm font-medium text-gray-300 mb-1">Additional Notes (Optional)</label>
                    <textarea id="message" name="message" rows="3"
                              class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:border-transparent"
                              placeholder="Any specific requests or questions..."></textarea>
                </div>

                <div class="flex items-center">
                    <input type="checkbox" id="consent" name="consent" class="h-4 w-4 text-yellow-600 focus:ring-yellow-500 border-gray-700 rounded bg-gray-800" required>
                    <label for="consent" class="ml-2 block text-sm text-gray-300">I agree to receive information about the trial class and other updates from h!academy</label>
                </div>

                <button type="submit" 
                        class="w-full bg-yellow-600 hover:bg-yellow-700 text-white font-semibold py-3 px-4 rounded-lg transition duration-300 transform hover:scale-105">
                    Book Free Trial
                </button>
            </form>

            <div class="mt-4 text-center">
                <p class="text-xs text-gray-500">We'll contact you within 24 hours to confirm your trial session</p>
            </div>
        </div>
    </div>
    
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
@endsection