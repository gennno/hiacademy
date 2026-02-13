@extends('layouts.layout')

@section('title', 'h!academy - Registration')
@section('hide-footer')
@endsection
@section('content')
    {{-- 🔙 Back Button --}}
    <a href="{{ url()->previous() }}"
        class="absolute top-4 left-4 sm:top-6 sm:left-6 flex items-center gap-2 text-yellow-400 hover:text-white font-semibold text-sm sm:text-base transition z-50">
        <i class="fa-solid fa-arrow-left text-lg sm:text-xl"></i>
        <span class="hidden sm:inline">Back</span>
    </a>

    {{-- 🔄 Background Carousel --}}
    <div id="background-carousel" class="fixed inset-0 w-full h-full overflow-hidden -z-10">
        <img src="{{ asset('img/carousel1.webp') }}" class="carousel-slide active" alt="Slide 1">
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

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        /* Custom scrollbar for modal */
        .modal-scroll::-webkit-scrollbar {
            width: 6px;
        }

        .modal-scroll::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .modal-scroll::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
        }

        .modal-scroll::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>

    {{-- 🔸 Main Section --}}
    <div
        class="w-full min-h-screen flex flex-col items-center justify-center px-4 sm:px-8 md:px-12 lg:px-20 xl:px-32 py-10 gap-10 md:gap-16 overflow-y-auto">

        {{-- 🟡 Program Selection + Mascot --}}
        <div class="flex flex-col items-center text-center space-y-6 max-w-6xl w-full text-white">
            <div class="flex flex-col md:flex-row items-center gap-4 sm:gap-6">
                <img src="{{ asset('img/9.png') }}" alt="Mascot"
                    class="w-24 sm:w-32 md:w-48 lg:w-56 animate-float drop-shadow-lg">
                <div>
                    <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold text-yellow-400 mb-2">
                        Select Program To Registrasi
                    </h2>
                    <p class="text-gray-300 text-sm sm:text-base md:text-lg leading-relaxed max-w-md mx-auto md:mx-0">
                        Select a program below to register class. Experience our teaching methods firsthand!
                    </p>
                </div>
            </div>

            {{-- Grid Layout for Programs --}}
            <div class="mt-4 w-full">
                @php
                    $programs = [
                        ['name' => 'International Preschool', 'slug' => 'preschool', 'icon' => 'fa-seedling', 'color' => 'border-yellow-400 hover:bg-yellow-400', 'type' => 'preschool', 'url' => '/admissionpreschool'],

                        ['name' => 'Child Development Program', 'slug' => 'child-development', 'icon' => 'fa-child', 'color' => 'border-cyan-400 hover:bg-cyan-400', 'type' => 'register'],

                        ['name' => 'English Program', 'slug' => 'english', 'icon' => 'fa-book-open', 'color' => 'border-green-400 hover:bg-green-400', 'type' => 'register'],

                        ['name' => 'Mandarin Program', 'slug' => 'mandarin', 'icon' => 'fa-language', 'color' => 'border-red-500 hover:bg-red-500', 'type' => 'register'],

                        ['name' => 'Math Program', 'slug' => 'math', 'icon' => 'fa-square-root-variable', 'color' => 'border-purple-400 hover:bg-purple-400', 'type' => 'register'],

                        ['name' => 'STEM & Coding', 'slug' => 'stem-coding', 'icon' => 'fa-robot', 'color' => 'border-indigo-400 hover:bg-indigo-400', 'type' => 'register'],

                        ['name' => 'Design & Digital Creative Arts', 'slug' => 'design-creative-arts', 'icon' => 'fa-pen-nib', 'color' => 'border-pink-400 hover:bg-pink-400', 'type' => 'register'],

                        ['name' => 'Life SkillLab', 'slug' => 'life-skilllab', 'icon' => 'fa-computer', 'color' => 'border-cyan-400 hover:bg-cyan-400', 'type' => 'register'],

                        ['name' => 'Architecture & Design', 'slug' => 'architecture-design', 'icon' => 'fa-palette', 'color' => 'border-orange-400 hover:bg-orange-400', 'type' => 'register'],

                        ['name' => 'Parenting life Indonesia', 'slug' => 'parenting', 'icon' => 'fa-users', 'color' => 'border-teal-400 hover:bg-teal-400', 'type' => 'consultation', 'url' => 'https://parentinglife.id/'],
                    ];

                @endphp

                <div
                    class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-5 gap-4 sm:gap-5 md:gap-6">
                    @foreach ($programs as $program)
                        @if($program['type'] === 'register')
                            <div class="program-card group bg-white/10 {{ $program['color'] }} border rounded-xl p-4 sm:p-5 flex flex-col items-center justify-center hover:text-black transition-all transform hover:scale-105 duration-300 h-full min-h-[140px] cursor-pointer"
                                data-program="{{ $program['name'] }}" data-program-slug="{{ $program['slug'] }}">
                                <i
                                    class="fa-solid {{ $program['icon'] }} text-xl sm:text-2xl md:text-3xl mb-2 sm:mb-3 group-hover:animate-bounce"></i>
                                <h4 class="font-semibold text-center text-xs sm:text-sm md:text-base leading-tight">
                                    {{ $program['name'] }}
                                </h4>
                                <span class="text-xs text-gray-300 mt-2 group-hover:text-black">Click to book free register</span>
                            </div>
                        @else
                            <a href="{{ $program['url'] ?? '#' }}" target="_blank"
                                class="group bg-white/10 {{ $program['color'] }} border rounded-xl p-4 sm:p-5 flex flex-col items-center justify-center hover:text-black transition-all transform hover:scale-105 duration-300 h-full min-h-[140px]">
                                <i
                                    class="fa-solid {{ $program['icon'] }} text-xl sm:text-2xl md:text-3xl mb-2 sm:mb-3 group-hover:animate-bounce"></i>
                                <h4 class="font-semibold text-center text-xs sm:text-sm md:text-base leading-tight">
                                    {{ $program['name'] }}
                                </h4>
                                <span class="text-xs text-gray-300 mt-2 group-hover:text-black">Book Consultation</span>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <!-- UNIVERSAL MODAL WRAPPER -->
    <div id="programModal" class="fixed inset-0 bg-black/70 backdrop-blur-sm hidden items-center justify-center p-4 z-50">
        <div class="bg-white rounded-2xl w-full max-w-2xl max-h-[90vh] overflow-hidden relative animate-fadeIn shadow-2xl">

            <!-- Close Button -->
            <button id="closeModal"
                class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 text-2xl z-10 w-8 h-8 flex items-center justify-center rounded-full hover:bg-gray-100 transition">
                <i class="fa-solid fa-xmark"></i>
            </button>

            <!-- DYNAMIC CONTENT -->
            <div id="modalContent" class="modal-scroll overflow-y-auto max-h-[90vh]"></div>

        </div>
    </div>

    <!-- TEMPLATES FOR EACH PROGRAM (hidden) -->
    <div id="modalTemplates" class="hidden">

        <!-- Child Development Program -->
        <div id="child-development" data-program-name="Child Development Program">
            <div class="bg-gradient-to-br from-cyan-500 to-cyan-600 p-6 text-white">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                        <i class="fa-solid fa-child text-2xl"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold">Child Development Program</h2>
                        <p class="text-cyan-100 text-sm">Register for our comprehensive child development program</p>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('registrations.store') }}" class="p-6 space-y-4">
                @csrf
                <!-- Full Name -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="name" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition"
                        placeholder="Enter student's full name">
                </div>

                <!-- Gender -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Gender <span
                            class="text-red-500">*</span></label>
                    <div class="grid grid-cols-2 gap-3">
                        <label
                            class="flex items-center justify-center px-4 py-3 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-cyan-500 transition">
                            <input type="radio" name="gender" value="male" class="mr-2">
                            <i class="fa-solid fa-mars text-blue-500 mr-2"></i>
                            <span class="font-medium">Male</span>
                        </label>
                        <label
                            class="flex items-center justify-center px-4 py-3 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-cyan-500 transition">
                            <input type="radio" name="gender" value="female" class="mr-2">
                            <i class="fa-solid fa-venus text-pink-500 mr-2"></i>
                            <span class="font-medium">Female</span>
                        </label>
                    </div>
                </div>

                <!-- Date of Birth -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Date of Birth <span
                            class="text-red-500">*</span></label>
                    <input type="date" name="birth_date" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition">
                </div>

                <!-- Address -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Residential Address <span
                            class="text-red-500">*</span></label>
                    <textarea name="address" required rows="3"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition"
                        placeholder="Enter complete address"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number/WhatsApp <span
                            class="text-red-500">*</span></label>
                    <input type="number" name="phone" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition"
                        placeholder="+62 XXX XXXX XXXX">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Active Email <span
                            class="text-red-500">*</span></label>
                    <input type="email" name="email" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition"
                        placeholder="example@email.com">
                </div>

                <input type="hidden" name="program_name" value="Child Development">
                
                <input type="hidden" name="status" value="regular">

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Course Level <span
                            class="text-red-500">*</span></label>
                    <select name="level" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition">
                        <option value="">Select Level</option>
                        <option value="beginner">Beginner (HSK 1)</option>
                        <option value="elementary">Elementary (HSK 2)</option>
                        <option value="intermediate">Intermediate (HSK 3-4)</option>
                        <option value="advanced">Advanced (HSK 5-6)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Class <span
                            class="text-red-500">*</span></label>
                    <select name="class_type" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition">
                        <option value="">Select Class</option>
                        <option value="weekday-evening">Weekday Evening (18:00 - 20:00)</option>
                        <option value="saturday-morning">Saturday Morning (09:00 - 12:00)</option>
                        <option value="sunday-afternoon">Sunday Afternoon (14:00 - 17:00)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Learning Mode Preference <span
                            class="text-red-500">*</span></label>
                    <div class="grid grid-cols-2 gap-3">
                        <label
                            class="flex items-center justify-center px-4 py-3 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-cyan-500 transition">
                            <input type="radio" name="learning_mode" value="online" class="mr-2">
                            <i class="fa-solid fa-laptop text-cyan-500 mr-2"></i>
                            <span class="font-medium">Online</span>
                        </label>
                        <label
                            class="flex items-center justify-center px-4 py-3 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-cyan-500 transition">
                            <input type="radio" name="learning_mode" value="offline" class="mr-2">
                            <i class="fa-solid fa-building text-cyan-500 mr-2"></i>
                            <span class="font-medium">Offline</span>
                        </label>
                    </div>
                </div>

                <button type="submit"
                    class="w-full bg-gradient-to-r from-cyan-500 to-cyan-600 text-white font-bold py-4 rounded-lg hover:from-cyan-600 hover:to-cyan-700 transition transform hover:scale-105 shadow-lg">
                    <i class="fa-solid fa-paper-plane mr-2"></i>
                    Submit Registration
                </button>
            </form>
        </div>

        <!-- English Program -->
        <div id="english" data-program-name="English Program">
            <div class="bg-gradient-to-br from-green-500 to-green-600 p-6 text-white">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                        <i class="fa-solid fa-book-open text-2xl"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold">English Program</h2>
                        <p class="text-green-100 text-sm">Master English with our comprehensive program</p>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('registrations.store') }}" class="p-6 space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="name" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition"
                        placeholder="Enter student's full name">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Gender <span
                            class="text-red-500">*</span></label>
                    <div class="grid grid-cols-2 gap-3">
                        <label
                            class="flex items-center justify-center px-4 py-3 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-green-500 transition">
                            <input type="radio" name="gender" value="male" class="mr-2">
                            <i class="fa-solid fa-mars text-blue-500 mr-2"></i>
                            <span class="font-medium">Male</span>
                        </label>
                        <label
                            class="flex items-center justify-center px-4 py-3 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-green-500 transition">
                            <input type="radio" name="gender" value="female" class="mr-2">
                            <i class="fa-solid fa-venus text-pink-500 mr-2"></i>
                            <span class="font-medium">Female</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Date of Birth <span
                            class="text-red-500">*</span></label>
                    <input type="date" name="birth_date" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Residential Address <span
                            class="text-red-500">*</span></label>
                    <textarea name="address" required rows="3"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition"
                        placeholder="Enter complete address"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number/WhatsApp <span
                            class="text-red-500">*</span></label>
                    <input type="tel" name="phone" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition"
                        placeholder="+62 XXX XXXX XXXX">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Active Email <span
                            class="text-red-500">*</span></label>
                    <input type="email" name="email" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition"
                        placeholder="example@email.com">
                </div>

                <input type="hidden" name="program_name" value="English Program">

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Course Level <span
                            class="text-red-500">*</span></label>
                    <select name="level" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition">
                        <option value="">Select Level</option>
                        <option value="very-young-learners">Very Young Learners English (Ages 6 | Pre-A1)</option>
                        <option value="younglearners">Young Learners English (Ages 6-12)</option>
                        <option value="teenagers">Teenagers (Ages 12+)</option>
                        <option value="adults-and-young-adults">Adults and Young Adults</option>
                        <option value="exam-preparation">Exam Preparation</option>
                        <option value="international-business">International Business</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Class <span
                            class="text-red-500">*</span></label>
                    <select name="class_type" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition">
                        <option value="">Select Class</option>
                        <option value="weekday-morning">Weekday Morning (08:00 - 10:00)</option>
                        <option value="weekday-afternoon">Weekday Afternoon (15:00 - 17:00)</option>
                        <option value="weekend-morning">Weekend Morning (09:00 - 12:00)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Learning Mode Preference <span
                            class="text-red-500">*</span></label>
                    <div class="grid grid-cols-2 gap-3">
                        <label
                            class="flex items-center justify-center px-4 py-3 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-green-500 transition">
                            <input type="radio" name="learning_mode" value="online" class="mr-2">
                            <i class="fa-solid fa-laptop text-green-500 mr-2"></i>
                            <span class="font-medium">Online</span>
                        </label>
                        <label
                            class="flex items-center justify-center px-4 py-3 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-green-500 transition">
                            <input type="radio" name="learning_mode" value="offline" class="mr-2">
                            <i class="fa-solid fa-building text-green-500 mr-2"></i>
                            <span class="font-medium">Offline</span>
                        </label>
                    </div>
                </div>

                <button type="submit"
                    class="w-full bg-gradient-to-r from-green-500 to-green-600 text-white font-bold py-4 rounded-lg hover:from-green-600 hover:to-green-700 transition transform hover:scale-105 shadow-lg">
                    <i class="fa-solid fa-paper-plane mr-2"></i>
                    Submit Registration
                </button>
            </form>
        </div>

        <!-- Mandarin Program -->
        <div id="mandarin" data-program-name="Mandarin Program">
            <div class="bg-gradient-to-br from-red-500 to-red-600 p-6 text-white">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                        <i class="fa-solid fa-language text-2xl"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold">Mandarin Program</h2>
                        <p class="text-green-100 text-sm">Master Mandarin with our comprehensive program</p>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('registrations.store') }}" class="p-6 space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="name" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition"
                        placeholder="Enter student's full name">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Gender <span
                            class="text-red-500">*</span></label>
                    <div class="grid grid-cols-2 gap-3">
                        <label
                            class="flex items-center justify-center px-4 py-3 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-red-500 transition">
                            <input type="radio" name="gender" value="male" class="mr-2">
                            <i class="fa-solid fa-mars text-blue-500 mr-2"></i>
                            <span class="font-medium">Male</span>
                        </label>
                        <label
                            class="flex items-center justify-center px-4 py-3 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-red-500 transition">
                            <input type="radio" name="gender" value="female" class="mr-2">
                            <i class="fa-solid fa-venus text-pink-500 mr-2"></i>
                            <span class="font-medium">Female</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Date of Birth <span
                            class="text-red-500">*</span></label>
                    <input type="date" name="birth_date" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Residential Address <span
                            class="text-red-500">*</span></label>
                    <textarea name="address" required rows="3"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent transition"
                        placeholder="Enter complete address"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number/WhatsApp <span
                            class="text-red-500">*</span></label>
                    <input type="tel" name="phone" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition"
                        placeholder="+62 XXX XXXX XXXX">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Active Email <span
                            class="text-red-500">*</span></label>
                    <input type="email" name="email" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition"
                        placeholder="example@email.com">
                </div>

                <input type="hidden" name="program_name" value="English Program">

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Course Level <span
                            class="text-red-500">*</span></label>
                    <select name="level" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition">
                        <option value="">Select Level</option>
                        <option value="starter">Starter (A1)</option>
                        <option value="elementary">Elementary (A2)</option>
                        <option value="intermediate">Intermediate (B1)</option>
                        <option value="upper-intermediate">Upper Intermediate (B2)</option>
                        <option value="advanced">Advanced (C1)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Class <span
                            class="text-red-500">*</span></label>
                    <select name="class_type" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition">
                        <option value="">Select Class</option>
                        <option value="weekday-morning">Weekday Morning (08:00 - 10:00)</option>
                        <option value="weekday-afternoon">Weekday Afternoon (15:00 - 17:00)</option>
                        <option value="weekend-morning">Weekend Morning (09:00 - 12:00)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Learning Mode Preference <span
                            class="text-red-500">*</span></label>
                    <div class="grid grid-cols-2 gap-3">
                        <label
                            class="flex items-center justify-center px-4 py-3 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-red-500 transition">
                            <input type="radio" name="learning_mode" value="online" class="mr-2">
                            <i class="fa-solid fa-laptop text-red-500 mr-2"></i>
                            <span class="font-medium">Online</span>
                        </label>
                        <label
                            class="flex items-center justify-center px-4 py-3 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-red-500 transition">
                            <input type="radio" name="learning_mode" value="offline" class="mr-2">
                            <i class="fa-solid fa-building text-red-500 mr-2"></i>
                            <span class="font-medium">Offline</span>
                        </label>
                    </div>
                </div>

                <button type="submit"
                    class="w-full bg-gradient-to-r from-red-500 to-red-600 text-white font-bold py-4 rounded-lg hover:from-red-600 hover:to-red-700 transition transform hover:scale-105 shadow-lg">
                    <i class="fa-solid fa-paper-plane mr-2"></i>
                    Submit Registration
                </button>
            </form>
        </div>


        <!-- Math Program -->
        <div id="math" data-program-name="Math Program">
            <div class="bg-gradient-to-br from-purple-500 to-purple-600 p-6 text-white">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                        <i class="fa-solid fa-square-root-variable text-2xl"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold">Math Program</h2>
                        <p class="text-purple-100 text-sm">Excel in mathematics with expert guidance</p>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('registrations.store') }}" class="p-6 space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="name" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                        placeholder="Enter student's full name">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Gender <span
                            class="text-red-500">*</span></label>
                    <div class="grid grid-cols-2 gap-3">
                        <label
                            class="flex items-center justify-center px-4 py-3 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-purple-500 transition">
                            <input type="radio" name="gender" value="male" class="mr-2">
                            <i class="fa-solid fa-mars text-blue-500 mr-2"></i>
                            <span class="font-medium">Male</span>
                        </label>
                        <label
                            class="flex items-center justify-center px-4 py-3 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-purple-500 transition">
                            <input type="radio" name="gender" value="female" class="mr-2">
                            <i class="fa-solid fa-venus text-pink-500 mr-2"></i>
                            <span class="font-medium">Female</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Date of Birth <span
                            class="text-red-500">*</span></label>
                    <input type="date" name="birth_date" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Residential Address <span
                            class="text-red-500">*</span></label>
                    <textarea name="address" required rows="3"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                        placeholder="Enter complete address"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number/WhatsApp <span
                            class="text-red-500">*</span></label>
                    <input type="tel" name="phone" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                        placeholder="+62 XXX XXXX XXXX">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Active Email <span
                            class="text-red-500">*</span></label>
                    <input type="email" name="email" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                        placeholder="example@email.com">
                </div>

                <input type="hidden" name="program_name" value="Math Program">

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Course Level <span
                            class="text-red-500">*</span></label>
                    <select name="level" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
                        <option value="">Select Level</option>
                        <option value="elementary">Elementary Math (Grades 1-3)</option>
                        <option value="primary">Primary Math (Grades 4-6)</option>
                        <option value="junior">Junior High Math (Grades 7-9)</option>
                        <option value="senior">Senior High Math (Grades 10-12)</option>
                        <option value="olympiad">Olympiad Preparation</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Class <span
                            class="text-red-500">*</span></label>
                    <select name="class_type" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition">
                        <option value="">Select Class</option>
                        <option value="regular">Regular Class (2x week)</option>
                        <option value="intensive">Intensive Class (3x week)</option>
                        <option value="private">Private Tutoring (Flexible)</option>
                    </select>
                </div>


                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Learning Mode Preference <span
                            class="text-red-500">*</span></label>
                    <div class="grid grid-cols-2 gap-3">
                        <label
                            class="flex items-center justify-center px-4 py-3 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-purple-500 transition">
                            <input type="radio" name="learning_mode" value="online" class="mr-2">
                            <i class="fa-solid fa-laptop text-purple-500 mr-2"></i>
                            <span class="font-medium">Online</span>
                        </label>
                        <label
                            class="flex items-center justify-center px-4 py-3 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-purple-500 transition">
                            <input type="radio" name="learning_mode" value="offline" class="mr-2">
                            <i class="fa-solid fa-building text-purple-500 mr-2"></i>
                            <span class="font-medium">Offline</span>
                        </label>
                    </div>
                </div>

                <button type="submit"
                    class="w-full bg-gradient-to-r from-purple-500 to-purple-600 text-white font-bold py-4 rounded-lg hover:from-purple-600 hover:to-purple-700 transition transform hover:scale-105 shadow-lg">
                    <i class="fa-solid fa-paper-plane mr-2"></i>
                    Submit Registration
                </button>
            </form>
        </div>

        <!-- STEM & Coding -->
        <div id="stem-coding" data-program-name="STEM & Coding">
            <div class="bg-gradient-to-br from-indigo-500 to-indigo-600 p-6 text-white">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                        <i class="fa-solid fa-robot text-2xl"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold">STEM & Coding</h2>
                        <p class="text-indigo-100 text-sm">Build the future with technology and innovation</p>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('registrations.store') }}" class="p-6 space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="name" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                        placeholder="Enter student's full name">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Gender <span
                            class="text-red-500">*</span></label>
                    <div class="grid grid-cols-2 gap-3">
                        <label
                            class="flex items-center justify-center px-4 py-3 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-indigo-500 transition">
                            <input type="radio" name="gender" value="male" class="mr-2">
                            <i class="fa-solid fa-mars text-blue-500 mr-2"></i>
                            <span class="font-medium">Male</span>
                        </label>
                        <label
                            class="flex items-center justify-center px-4 py-3 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-indigo-500 transition">
                            <input type="radio" name="gender" value="female" class="mr-2">
                            <i class="fa-solid fa-venus text-pink-500 mr-2"></i>
                            <span class="font-medium">Female</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Date of Birth <span
                            class="text-red-500">*</span></label>
                    <input type="date" name="birth_date" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Residential Address <span
                            class="text-red-500">*</span></label>
                    <textarea name="address" required rows="3"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                        placeholder="Enter complete address"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number/WhatsApp <span
                            class="text-red-500">*</span></label>
                    <input type="tel" name="phone" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                        placeholder="+62 XXX XXXX XXXX">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Active Email <span
                            class="text-red-500">*</span></label>
                    <input type="email" name="email" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                        placeholder="example@email.com">
                </div>

                <input type="hidden" name="program_name" value="STEM & Coding">

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Course Level <span
                            class="text-red-500">*</span></label>
                    <select name="level" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                        <option value="">Select Level</option>
                        <option value="junior">Junior Coder (Ages 7-9)</option>
                        <option value="intermediate">Intermediate Coder (Ages 10-12)</option>
                        <option value="advanced">Advanced Coder (Ages 13-15)</option>
                        <option value="expert">Expert Developer (Ages 16+)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Class <span
                            class="text-red-500">*</span></label>
                    <select name="class_type" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                        <option value="">Select Class</option>
                        <option value="scratch">Scratch Programming</option>
                        <option value="python">Python for Kids</option>
                        <option value="web">Web Development</option>
                        <option value="mobile">Mobile App Development</option>
                        <option value="robotics">Robotics & Arduino</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Learning Mode Preference <span
                            class="text-red-500">*</span></label>
                    <div class="grid grid-cols-2 gap-3">
                        <label
                            class="flex items-center justify-center px-4 py-3 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-indigo-500 transition">
                            <input type="radio" name="learning_mode" value="online" class="mr-2">
                            <i class="fa-solid fa-laptop text-indigo-500 mr-2"></i>
                            <span class="font-medium">Online</span>
                        </label>
                        <label
                            class="flex items-center justify-center px-4 py-3 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-indigo-500 transition">
                            <input type="radio" name="learning_mode" value="offline" class="mr-2">
                            <i class="fa-solid fa-building text-indigo-500 mr-2"></i>
                            <span class="font-medium">Offline</span>
                        </label>
                    </div>
                </div>

                <button type="submit"
                    class="w-full bg-gradient-to-r from-indigo-500 to-indigo-600 text-white font-bold py-4 rounded-lg hover:from-indigo-600 hover:to-indigo-700 transition transform hover:scale-105 shadow-lg">
                    <i class="fa-solid fa-paper-plane mr-2"></i>
                    Submit Registration
                </button>
            </form>
        </div>

        <!-- Design & Digital Creative Arts -->
        <div id="design-creative-arts" data-program-name="Design & Digital Creative Arts">
            <div class="bg-gradient-to-br from-pink-500 to-pink-600 p-6 text-white">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                        <i class="fa-solid fa-pen-nib text-2xl"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold">Design & Creative Arts</h2>
                        <p class="text-pink-100 text-sm">Unleash your creativity through digital design</p>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('registrations.store') }}" class="p-6 space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="name" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                        placeholder="Enter student's full name">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Gender <span
                            class="text-red-500">*</span></label>
                    <div class="grid grid-cols-2 gap-3">
                        <label
                            class="flex items-center justify-center px-4 py-3 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-indigo-500 transition">
                            <input type="radio" name="gender" value="male" class="mr-2">
                            <i class="fa-solid fa-mars text-blue-500 mr-2"></i>
                            <span class="font-medium">Male</span>
                        </label>
                        <label
                            class="flex items-center justify-center px-4 py-3 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-indigo-500 transition">
                            <input type="radio" name="gender" value="female" class="mr-2">
                            <i class="fa-solid fa-venus text-pink-500 mr-2"></i>
                            <span class="font-medium">Female</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Date of Birth <span
                            class="text-red-500">*</span></label>
                    <input type="date" name="birth_date" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Residential Address <span
                            class="text-red-500">*</span></label>
                    <textarea name="address" required rows="3"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                        placeholder="Enter complete address"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number/WhatsApp <span
                            class="text-red-500">*</span></label>
                    <input type="tel" name="phone" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                        placeholder="+62 XXX XXXX XXXX">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Active Email <span
                            class="text-red-500">*</span></label>
                    <input type="email" name="email" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                        placeholder="example@email.com">
                </div>

                <input type="hidden" name="program_name" value="STEM & Coding">

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Course Level <span
                            class="text-red-500">*</span></label>
                    <select name="level" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                        <option value="">Select Level</option>
                        <option value="junior">Junior Coder (Ages 7-9)</option>
                        <option value="intermediate">Intermediate Coder (Ages 10-12)</option>
                        <option value="advanced">Advanced Coder (Ages 13-15)</option>
                        <option value="expert">Expert Developer (Ages 16+)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Class <span
                            class="text-red-500">*</span></label>
                    <select name="class_type" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                        <option value="">Select Class</option>
                        <option value="scratch">Scratch Programming</option>
                        <option value="python">Python for Kids</option>
                        <option value="web">Web Development</option>
                        <option value="mobile">Mobile App Development</option>
                        <option value="robotics">Robotics & Arduino</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Learning Mode Preference <span
                            class="text-red-500">*</span></label>
                    <div class="grid grid-cols-2 gap-3">
                        <label
                            class="flex items-center justify-center px-4 py-3 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-pink-500 transition">
                            <input type="radio" name="learning_mode" value="online" class="mr-2">
                            <i class="fa-solid fa-laptop text-pink-500 mr-2"></i>
                            <span class="font-medium">Online</span>
                        </label>
                        <label
                            class="flex items-center justify-center px-4 py-3 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-pink-500 transition">
                            <input type="radio" name="learning_mode" value="offline" class="mr-2">
                            <i class="fa-solid fa-building text-pink-500 mr-2"></i>
                            <span class="font-medium">Offline</span>
                        </label>
                    </div>
                </div>

                <button type="submit"
                    class="w-full bg-gradient-to-r from-pink-500 to-pink-600 text-white font-bold py-4 rounded-lg hover:from-pink-600 hover:to-pink-700 transition transform hover:scale-105 shadow-lg">
                    <i class="fa-solid fa-paper-plane mr-2"></i>
                    Submit Registration
                </button>
            </form>
        </div>

        <!-- Life SkillLab -->
        <div id="life-skilllab" data-program-name="Life SkillLab">
            <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-6 text-white">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                        <i class="fa-solid fa-computer text-2xl"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold">Life SkillLab</h2>
                        <p class="text-blue-100 text-sm">Life SKillLab</p>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('registrations.store') }}" class="p-6 space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="name" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                        placeholder="Enter student's full name">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Gender <span
                            class="text-red-500">*</span></label>
                    <div class="grid grid-cols-2 gap-3">
                        <label
                            class="flex items-center justify-center px-4 py-3 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-indigo-500 transition">
                            <input type="radio" name="gender" value="male" class="mr-2">
                            <i class="fa-solid fa-mars text-blue-500 mr-2"></i>
                            <span class="font-medium">Male</span>
                        </label>
                        <label
                            class="flex items-center justify-center px-4 py-3 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-indigo-500 transition">
                            <input type="radio" name="gender" value="female" class="mr-2">
                            <i class="fa-solid fa-venus text-blue-500 mr-2"></i>
                            <span class="font-medium">Female</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Date of Birth <span
                            class="text-red-500">*</span></label>
                    <input type="date" name="birth_date" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Residential Address <span
                            class="text-red-500">*</span></label>
                    <textarea name="address" required rows="3"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                        placeholder="Enter complete address"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number/WhatsApp <span
                            class="text-red-500">*</span></label>
                    <input type="tel" name="phone" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                        placeholder="+62 XXX XXXX XXXX">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Active Email <span
                            class="text-red-500">*</span></label>
                    <input type="email" name="email" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                        placeholder="example@email.com">
                </div>

                <input type="hidden" name="program_name" value="STEM & Coding">

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Course Level <span
                            class="text-red-500">*</span></label>
                    <select name="level" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                        <option value="">Select Level</option>
                        <option value="junior">Junior Coder (Ages 7-9)</option>
                        <option value="intermediate">Intermediate Coder (Ages 10-12)</option>
                        <option value="advanced">Advanced Coder (Ages 13-15)</option>
                        <option value="expert">Expert Developer (Ages 16+)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Class <span
                            class="text-red-500">*</span></label>
                    <select name="class_type" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                        <option value="">Select Class</option>
                        <option value="scratch">Scratch Programming</option>
                        <option value="python">Python for Kids</option>
                        <option value="web">Web Development</option>
                        <option value="mobile">Mobile App Development</option>
                        <option value="robotics">Robotics & Arduino</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Learning Mode Preference <span
                            class="text-red-500">*</span></label>
                    <div class="grid grid-cols-2 gap-3">
                        <label
                            class="flex items-center justify-center px-4 py-3 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-blue-500 transition">
                            <input type="radio" name="learning_mode" value="online" class="mr-2">
                            <i class="fa-solid fa-laptop text-blue-500 mr-2"></i>
                            <span class="font-medium">Online</span>
                        </label>
                        <label
                            class="flex items-center justify-center px-4 py-3 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-blue-500 transition">
                            <input type="radio" name="learning_mode" value="offline" class="mr-2">
                            <i class="fa-solid fa-building text-blue-500 mr-2"></i>
                            <span class="font-medium">Offline</span>
                        </label>
                    </div>
                </div>

                <button type="submit"
                    class="w-full bg-gradient-to-r from-blue-500 to-blue-600 text-white font-bold py-4 rounded-lg hover:from-blue-600 hover:to-blue-700 transition transform hover:scale-105 shadow-lg">
                    <i class="fa-solid fa-paper-plane mr-2"></i>
                    Submit Registration
                </button>
            </form>
        </div>

        <!-- Architecture & Design -->
        <div id="architecture-design" data-program-name="Architecture & Design">
            <div class="bg-gradient-to-br from-orange-500 to-orange-600 p-6 text-white">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                        <i class="fa-solid fa-palette text-2xl"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold">Architecture & Design</h2>
                        <p class="text-blue-100 text-sm">Architecture & Design</p>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('registrations.store') }}" class="p-6 space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name <span
                            class="text-red-500">*</span></label>
                    <input type="text" name="name" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                        placeholder="Enter student's full name">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Gender <span
                            class="text-red-500">*</span></label>
                    <div class="grid grid-cols-2 gap-3">
                        <label
                            class="flex items-center justify-center px-4 py-3 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-indigo-500 transition">
                            <input type="radio" name="gender" value="male" class="mr-2">
                            <i class="fa-solid fa-mars text-blue-500 mr-2"></i>
                            <span class="font-medium">Male</span>
                        </label>
                        <label
                            class="flex items-center justify-center px-4 py-3 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-indigo-500 transition">
                            <input type="radio" name="gender" value="female" class="mr-2">
                            <i class="fa-solid fa-venus text-blue-500 mr-2"></i>
                            <span class="font-medium">Female</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Date of Birth <span
                            class="text-red-500">*</span></label>
                    <input type="date" name="birth_date" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Residential Address <span
                            class="text-red-500">*</span></label>
                    <textarea name="address" required rows="3"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                        placeholder="Enter complete address"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number/WhatsApp <span
                            class="text-red-500">*</span></label>
                    <input type="tel" name="phone" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                        placeholder="+62 XXX XXXX XXXX">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Active Email <span
                            class="text-red-500">*</span></label>
                    <input type="email" name="email" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"
                        placeholder="example@email.com">
                </div>

                <input type="hidden" name="program_name" value="STEM & Coding">

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Course Level <span
                            class="text-red-500">*</span></label>
                    <select name="level" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                        <option value="">Select Level</option>
                        <option value="junior">Junior Coder (Ages 7-9)</option>
                        <option value="intermediate">Intermediate Coder (Ages 10-12)</option>
                        <option value="advanced">Advanced Coder (Ages 13-15)</option>
                        <option value="expert">Expert Developer (Ages 16+)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Class <span
                            class="text-red-500">*</span></label>
                    <select name="class_type" required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition">
                        <option value="">Select Class</option>
                        <option value="scratch">Scratch Programming</option>
                        <option value="python">Python for Kids</option>
                        <option value="web">Web Development</option>
                        <option value="mobile">Mobile App Development</option>
                        <option value="robotics">Robotics & Arduino</option>
                    </select>
                </div>


                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Learning Mode Preference <span
                            class="text-red-500">*</span></label>
                    <div class="grid grid-cols-2 gap-3">
                        <label
                            class="flex items-center justify-center px-4 py-3 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-orange-500 transition">
                            <input type="radio" name="learning_mode" value="online" class="mr-2">
                            <i class="fa-solid fa-laptop text-orange-500 mr-2"></i>
                            <span class="font-medium">Online</span>
                        </label>
                        <label
                            class="flex items-center justify-center px-4 py-3 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-orange-500 transition">
                            <input type="radio" name="learning_mode" value="offline" class="mr-2">
                            <i class="fa-solid fa-building text-orange-500 mr-2"></i>
                            <span class="font-medium">Offline</span>
                        </label>
                    </div>
                </div>

                <button type="submit"
                    class="w-full bg-gradient-to-r from-orange-500 to-orange-600 text-white font-bold py-4 rounded-lg hover:from-orange-600 hover:to-orange-700 transition transform hover:scale-105 shadow-lg">
                    <i class="fa-solid fa-paper-plane mr-2"></i>
                    Submit Registration
                </button>
            </form>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('registration_success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Registration Successful!',
                html: `
                    <p class="text-lg">
                        Thank you for registering.<br>
                        Please wait for <b>WhatsApp</b> and <b>Email</b> confirmation from our admin.
                    </p>
                `,
                confirmButtonText: 'OK',
                confirmButtonColor: '#facc15',
            });
        </script>
    @endif
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const modal = document.getElementById("programModal");
            const modalContent = document.getElementById("modalContent");
            const closeModal = document.getElementById("closeModal");

            document.querySelectorAll(".program-card").forEach(card => {
                card.addEventListener("click", function () {

                    let slug = this.dataset.programSlug;

                    // Load template by program slug
                    let template = document.querySelector(`#modalTemplates #${slug}`);

                    if (template) {
                        modalContent.innerHTML = template.innerHTML;
                        modal.classList.remove("hidden");
                        modal.classList.add("flex");
                    }
                });
            });

            closeModal.addEventListener("click", () => {
                modal.classList.add("hidden");
            });

            modal.addEventListener("click", (e) => {
                if (e.target === modal) modal.classList.add("hidden");
            });
        });
    </script>

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">


@endsection