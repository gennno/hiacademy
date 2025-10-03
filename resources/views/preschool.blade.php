@extends('layouts.app')

@section('content')
  <!-- HERO: Preschool Focus -->
  <section class="relative bg-[#FFEAEA] overflow-hidden">
    <!-- floating circles -->
    <div class="absolute top-10 left-10 w-20 h-20 bg-[#F5CBCB] rounded-full animate-bounce-slow"></div>
    <div class="absolute bottom-10 right-10 w-16 h-16 bg-[#9ECAD6] rounded-full animate-bounce-slow delay-300"></div>

    <div class="max-w-6xl mx-auto px-6 py-20 grid grid-cols-1 md:grid-cols-2 items-center gap-12 relative z-10">
      <div>
        <h1 class="text-4xl md:text-5xl font-extrabold text-[#748DAE] leading-tight">
          Welcome to <span class="text-[#9ECAD6]">HiAcademy Preschool</span>
        </h1>
        <p class="mt-6 text-lg text-slate-700">
          Where learning is fun, creative, and engaging! Our preschool program helps children build strong foundations in
          communication, creativity, and critical thinking.
        </p>
        <div class="mt-8 flex gap-4">
          <a href="#preschool" class="px-6 py-3 rounded-xl bg-[#9ECAD6] text-white font-semibold hover:scale-105 transition">
            Learn More
          </a>
          <a href="#book" class="px-6 py-3 rounded-xl bg-[#F5CBCB] text-[#748DAE] font-semibold hover:scale-105 transition">
            Book Free Trial
          </a>
        </div>
      </div>
      <div class="flex justify-center">
        <img src="https://media.giphy.com/media/3oEduSbSGpGaRX2Vri/giphy.gif"
             alt="Happy kids" class="rounded-2xl shadow-lg w-full max-w-md">
      </div>
    </div>
  </section>

  <!-- Preschool Highlight -->
  <section id="preschool" class="py-20 bg-[#F5CBCB]/20">
    <div class="max-w-6xl mx-auto px-6">
      <h2 class="text-3xl font-bold text-center text-[#748DAE]">Our Preschool Program</h2>
      <p class="text-center mt-4 text-slate-700 max-w-2xl mx-auto">
        Specially designed for children ages 4–6, our preschool curriculum blends play and learning to develop
        confidence, communication, and creativity.
      </p>

      <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="card bg-white rounded-2xl shadow-md p-6 hover:scale-105 transition">
          <img src="https://source.unsplash.com/400x300/?kids,classroom" class="rounded-xl w-full h-40 object-cover mb-4">
          <h3 class="font-bold text-lg text-[#748DAE]">Creative Learning</h3>
          <p class="mt-2 text-sm text-slate-600">Hands-on projects and art activities make every class fun and engaging.</p>
        </div>
        <div class="card bg-white rounded-2xl shadow-md p-6 hover:scale-105 transition">
          <img src="https://source.unsplash.com/400x300/?kids,play" class="rounded-xl w-full h-40 object-cover mb-4">
          <h3 class="font-bold text-lg text-[#748DAE]">Play-based Method</h3>
          <p class="mt-2 text-sm text-slate-600">Children learn naturally through guided play, games, and exploration.</p>
        </div>
        <div class="card bg-white rounded-2xl shadow-md p-6 hover:scale-105 transition">
          <img src="https://source.unsplash.com/400x300/?kids,teacher" class="rounded-xl w-full h-40 object-cover mb-4">
          <h3 class="font-bold text-lg text-[#748DAE]">Caring Teachers</h3>
          <p class="mt-2 text-sm text-slate-600">Our trained preschool teachers nurture curiosity and confidence.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ (Interactive) -->
  <section id="faq" class="py-20 bg-[#FFEAEA]">
    <div class="max-w-4xl mx-auto px-6">
      <h2 class="text-2xl font-bold text-center text-[#748DAE]">Frequently Asked Questions</h2>
      <div class="mt-10 space-y-4">
        @foreach([
          ['q' => 'What age is best for the preschool program?', 'a' => 'The program is designed for children aged 4–6 years.'],
          ['q' => 'Do you offer trial classes?', 'a' => 'Yes, we provide a free trial session so your child can experience the class.'],
          ['q' => 'Are lessons conducted online or offline?', 'a' => 'We provide both options depending on the needs of parents and children.'],
        ] as $faq)
          <div class="border rounded-xl bg-white overflow-hidden">
            <button class="w-full p-4 text-left flex justify-between items-center faq-toggle">
              <span class="font-semibold text-[#748DAE]">{{ $faq['q'] }}</span>
              <span class="text-slate-500">+</span>
            </button>
            <div class="faq-content hidden p-4 text-slate-600">{{ $faq['a'] }}</div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section id="book" class="py-20 bg-[#9ECAD6] text-center text-white">
    <h2 class="text-3xl font-bold">Ready to Join Our Preschool?</h2>
    <p class="mt-4">Book your free trial today and see how much fun learning can be!</p>
    <div class="mt-6">
      <a href="mailto:info@hiacademy.id" class="px-8 py-4 bg-[#748DAE] rounded-xl font-semibold hover:scale-105 transition">
        Contact Us
      </a>
    </div>
  </section>
@endsection

@push('scripts')
<script>
  // Smooth scroll
  document.querySelectorAll('a[href^="#"]').forEach(link => {
    link.addEventListener('click', e => {
      const target = document.querySelector(link.getAttribute('href'));
      if (target) {
        e.preventDefault();
        window.scrollTo({ top: target.offsetTop - 60, behavior: 'smooth' });
      }
    });
  });

  // FAQ toggle
  document.querySelectorAll('.faq-toggle').forEach(btn => {
    btn.addEventListener('click', () => {
      const content = btn.nextElementSibling;
      const plus = btn.querySelector('span:last-child');
      content.classList.toggle('hidden');
      plus.textContent = plus.textContent === '+' ? '−' : '+';
    });
  });

  // Fun floating animation
  document.querySelectorAll('.card').forEach(card => {
    card.addEventListener('mouseenter', () => card.classList.add('shadow-xl'));
    card.addEventListener('mouseleave', () => card.classList.remove('shadow-xl'));
  });
</script>

<style>
  /* Custom bounce animation */
  @keyframes bounce-slow {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-15px); }
  }
  .animate-bounce-slow { animation: bounce-slow 5s infinite; }
  .delay-300 { animation-delay: 2.5s; }
</style>
@endpush
