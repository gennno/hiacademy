@extends('layouts.layout')

@section('title', 'h!academy - Registration')

@section('content')
    {{-- 🔙 Back Button --}}
    <a href="{{ route('home') }}"
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
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        /* Modal Styles 
        #register-modal {
            opacity: 0;
            transform: scale(0.9);
            transition: all 0.3s ease;
            pointer-events: none;
        }

        #register-modal.active {
            opacity: 1;
            transform: scale(1);
            pointer-events: all;
        }*/
    </style>

    {{-- <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Background carousel
            const slides = document.querySelectorAll('#background-carousel .carousel-slide');
            let currentIndex = 0;
            setInterval(() => {
                slides[currentIndex].classList.remove('active');
                currentIndex = (currentIndex + 1) % slides.length;
                slides[currentIndex].classList.add('active');
            }, 4000);

            // register modal functionality
            const registerModal = document.getElementById('register-modal');
            const closeregisterBtn = document.getElementById('close-register');
            const programNameElement = document.getElementById('selected-program-name');
            const programInput = document.getElementById('selected-program');

            // Open register modal when program card is clicked
            document.querySelectorAll('.program-card').forEach(card => {
                card.addEventListener('click', (e) => {
                    e.preventDefault();
                    const programName = card.getAttribute('data-program');
                    const programSlug = card.getAttribute('data-program-slug');
                    
                    programNameElement.textContent = programName;
                    programInput.value = programSlug;
                    
                    registerModal.classList.add('active');
                    document.body.style.overflow = 'hidden';
                });
            });

            // Close register modal
            closeregisterBtn.addEventListener('click', () => {
                registerModal.classList.remove('active');
                document.body.style.overflow = 'auto';
            });

            // Close modal when clicking outside
            registerModal.addEventListener('click', (e) => {
                if (e.target === registerModal) {
                    registerModal.classList.remove('active');
                    document.body.style.overflow = 'auto';
                }
            });

            // Form submission
            const registerForm = document.getElementById('register-form');
            registerForm.addEventListener('submit', function(e) {
                e.preventDefault();
                // Here you would typically submit the form via AJAX or let it submit normally
                // For demo purposes, we'll just show an alert and close the modal
                alert('Thank you for registering for a free register! We will contact you soon.');
                registerModal.classList.remove('active');
                document.body.style.overflow = 'auto';
                // Uncomment the line below to actually submit the form
                // this.submit();
            });
        });
    </script> --}}

    {{-- 🔸 Main Section --}}
    <div class="w-full min-h-screen flex flex-col items-center justify-center px-4 sm:px-8 md:px-12 lg:px-20 xl:px-32 py-10 gap-10 md:gap-16 overflow-y-auto">

        {{-- 🟡 Program Selection + Mascot --}}
        <div class="flex flex-col items-center text-center space-y-6 max-w-6xl w-full text-white">
            <div class="flex flex-col md:flex-row items-center gap-4 sm:gap-6">
                <img src="{{ asset('img/9.png') }}" alt="Mascot"
                    class="w-24 sm:w-32 md:w-48 lg:w-56 animate-float drop-shadow-lg">
                <div>
                    <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold text-yellow-400 mb-2">
                        Select Program
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

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-5 gap-4 sm:gap-5 md:gap-6">
                    @foreach ($programs as $program)
                        @if($program['type'] === 'register')
                            <div class="program-card group bg-white/10 {{ $program['color'] }} border rounded-xl p-4 sm:p-5 flex flex-col items-center justify-center hover:text-black transition-all transform hover:scale-105 duration-300 h-full min-h-[140px] cursor-pointer"
                                 data-program="{{ $program['name'] }}" 
                                 data-program-slug="{{ $program['slug'] }}">
                                <i class="fa-solid {{ $program['icon'] }} text-xl sm:text-2xl md:text-3xl mb-2 sm:mb-3 group-hover:animate-bounce"></i>
                                <h4 class="font-semibold text-center text-xs sm:text-sm md:text-base leading-tight">{{ $program['name'] }}</h4>
                                <span class="text-xs text-gray-300 mt-2 group-hover:text-black">Click to book free register</span>
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


    <!-- UNIVERSAL MODAL WRAPPER -->
<div id="programModal" 
     class="fixed inset-0 bg-black/50 hidden items-center justify-center p-4 z-50">

    <div class="bg-white rounded-xl w-full max-w-lg p-6 relative animate-fadeIn">
        
        <!-- Close Button -->
        <button id="closeModal" 
                class="absolute top-3 right-3 text-gray-500 hover:text-black text-xl">
            &times;
        </button>

        <!-- DYNAMIC CONTENT -->
        <div id="modalContent"></div>

    </div>
</div>

<!-- TEMPLATES FOR EACH PROGRAM (hidden) -->
<div id="modalTemplates" class="hidden">


    <div id="child-development">
        <h2 class="text-xl font-bold mb-3">Child Development Program Registration</h2>
        <p>Please fill in the form below:</p>
        <input type="text" placeholder="Student Name" class="border p-2 w-full rounded mt-3">
        <input type="text" placeholder="Age" class="border p-2 w-full rounded mt-3">
        <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
    </div>

    <div id="english">
        <h2 class="text-xl font-bold mb-3">English Program Registration</h2>
        <p>Please fill in the form below:</p>
        <input type="text" placeholder="Student Name" class="border p-2 w-full rounded mt-3">
        <input type="text" placeholder="Age" class="border p-2 w-full rounded mt-3">
        <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
    </div>

    <div id="mandarin">
        <h2 class="text-xl font-bold mb-3">Mandarin Program Registration</h2>
        <p>Please fill in the form below:</p>
        <input type="text" placeholder="Student Name" class="border p-2 w-full rounded mt-3">
        <input type="text" placeholder="Age" class="border p-2 w-full rounded mt-3">
        <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
    </div>

    <div id="math">
        <h2 class="text-xl font-bold mb-3">Math Program Registration</h2>
        <p>Register now for our Math program!</p>
        <input type="text" placeholder="Student Name" class="border p-2 w-full rounded mt-3">
        <button class="mt-4 bg-purple-500 text-white px-4 py-2 rounded">Submit</button>
    </div>

    <div id="stem-coding">
        <h2 class="text-xl font-bold mb-3">STEM & Coding Registration</h2>
        <p>Enter your details to join STEM & Coding:</p>
        <input type="text" placeholder="Student Name" class="border p-2 w-full rounded mt-3">
        <button class="mt-4 bg-indigo-500 text-white px-4 py-2 rounded">Submit</button>
    </div>

    <div id="design-creative-arts">
        <h2 class="text-xl font-bold mb-3">Creative Arts Registration</h2>
        <p>Register for our Creative Arts program:</p>
        <input type="text" placeholder="Student Name" class="border p-2 w-full rounded mt-3">
        <button class="mt-4 bg-pink-500 text-white px-4 py-2 rounded">Submit</button>
    </div>

    <div id="life-skilllab">
        <h2 class="text-xl font-bold mb-3">Life SkillLab Registration</h2>
        <p>Fill the form to register:</p>
        <input type="text" placeholder="Student Name" class="border p-2 w-full rounded mt-3">
        <button class="mt-4 bg-cyan-500 text-white px-4 py-2 rounded">Submit</button>
    </div>

</div>
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