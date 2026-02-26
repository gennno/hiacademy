<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'h!academy')</title>

  {{-- Tailwind CDN --}}
  <script src="https://cdn.tailwindcss.com"></script>

  {{-- Favicon --}}
  <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">
  <script src="https://unpkg.com/@lottiefiles/dotlottie-wc@0.8.1/dist/dotlottie-wc.js" type="module"></script>
  <!-- FontAwesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    integrity="sha512-TQ7iGLW6wMZ1xjF6mU9QK3fZc0D3mFjQFzUObZ7dkXAmIZ0+iL+OKFHZ1PZjZpbIQtHdwZb2FjGdYkPZwY+X2w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://kit.fontawesome.com/your-kit-id.js" crossorigin="anonymous"></script>
  <!-- Import Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Montserrat:wght@600;700;800&display=swap"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Fredoka+One&display=swap"
    rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      AOS.init({
        duration: 300,         // durasi animasi
        easing: 'ease-in-out', // tipe easing
        once: true,           // animasi akan muncul setiap scroll ke section
        mirror: false           // animasi terulang bahkan saat scroll ke atas
      });
    });
  </script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


  <style>
    @import url('https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&display=swap');

    * {
      font-family: 'Fredoka', sans-serif;
    }

    @keyframes bounce {

      0%,
      100% {
        transform: translateY(0);
      }

      50% {
        transform: translateY(-10px);
      }
    }

    .emoji-bounce {
      display: inline-block;
      animation: bounce 2s infinite;
    }
  </style>
</head>

<body class="bg-gray-200 min-h-screen overflow-x-hidden">

  <!-- Sidebar Overlay -->
  <div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-[999] hidden"></div>

  <!-- Sidebar -->
 <div id="sidebar"
  class="fixed left-0 top-0 h-screen w-64 bg-[#FBF9D1]
         transition-transform duration-300 z-[1000] shadow-2xl
         -translate-x-full flex flex-col">
    <div class="p-4 text-center border-b border-white border-opacity-20">

      <!-- LOGO -->
      <img src="{{ asset('img/logogelap.png') }}" alt="HiAcademy Logo" class="mx-auto w-44 h-auto mb-2">

    </div>
<div class="mt-4 flex-1 overflow-y-auto scrollbar-thin scrollbar-thumb-yellow-400 scrollbar-track-transparent">

      <!-- Dashboard -->
      <a href="{{ route('teacherdashboard') }}"
        class="sidebar-item  text-black px-5 py-3 mx-4 my-2 rounded-xl transition-all duration-300 cursor-pointer flex items-center gap-3
  {{ Request::is('teacher-dashboard') ? 'bg-yellow-400 bg-opacity-40' : 'hover:bg-yellow-400 hover:bg-opacity-20 hover:translate-x-1' }}">
        <span class="text-2xl">🏠</span>
        <span class="text-xl">Dashboard</span>
      </a>
      <!-- My Courses -->
      <a href="{{ route('teachermyprogram') }}"
        class="sidebar-item text-black px-5 py-3 mx-4 my-2 rounded-xl transition-all duration-300 cursor-pointer flex items-center gap-3
  {{ Request::is('teacher-my-program') || Request::is('teacher-detail-program*') ? 'bg-yellow-400 bg-opacity-40' : 'hover:bg-yellow-400 hover:bg-opacity-20 hover:translate-x-1' }}">
        <span class="text-2xl">📚</span>
        <span class="text-xl">My Program</span>
      </a>
      <a href="{{ route('teacherreport') }}"
        class="sidebar-item text-black px-5 py-3 mx-4 my-2 rounded-xl transition-all duration-300 cursor-pointer flex items-center gap-3
  {{ Request::is('student-report') || Request::is('student-report*') ? 'bg-yellow-400 bg-opacity-40' : 'hover:bg-yellow-400 hover:bg-opacity-20 hover:translate-x-1' }}">
        <span class="text-2xl">📊</span>
        <span class="text-xl">Report</span>
      </a>
      <div
        class="sidebar-item  text-black px-5 py-3 mx-4 my-2 rounded-xl transition-all duration-300 cursor-pointer flex items-center gap-3 hover:bg-yellow-400 hover:bg-opacity-20 hover:translate-x-1">
        <span class="text-2xl">🏆</span>
        <span class="text-xl">Achievements</span>
      </div>
      <div
        class="sidebar-item text-black px-5 py-3 mx-4 my-2 rounded-xl transition-all duration-300 cursor-pointer flex items-center gap-3 hover:bg-yellow-400 hover:bg-opacity-20 hover:translate-x-1">
        <span class="text-2xl">⚙️</span>
        <span class="text-xl">Settings</span>
      </div>
    </div>

<!-- Mascot -->
<div class="flex justify-center mt-4 shrink-0">
  <img src="{{ asset('img/5.png') }}"
       alt="Mascot"
       class="w-24 drop-shadow-xl animate-bounce">
</div>

<!-- Footer -->
<div class="p-4 text-center shrink-0">
  <div class="bg-yellow-400 bg-opacity-20 rounded-lg p-3">
    <p class="text-black text-sm">© 2025 h!academy</p>
    <hr>
    <p class="text-black text-sm">Powered by DayR</p>
  </div>
</div>
  </div>

  <!-- Main Content -->
  <div id="mainContent" class="lg:ml-64 transition-all duration-300 p-5">
    <!-- Topbar -->
    <div class="bg-yellow-400 rounded-3xl shadow-lg p-4 mb-6">
      <div class="flex justify-between items-center flex-wrap gap-4">
        <div class="flex items-center gap-3">
          <button id="toggleSidebar"
            class="bg-gray-100 hover:bg-gray-200 rounded-full p-2 w-11 h-11 flex items-center justify-center transition-colors">
            <span class="text-xl">☰</span>
          </button>
          <div>
            <h4 class="text-2xl font-bold text-indigo-600 mb-0 hidden md:block">
              @yield('pagetitle', 'Dashboard')
            </h4>

          </div>
        </div>

        <div class="flex items-center gap-3">
          <button
            class="bg-gray-100 hover:bg-gray-200 rounded-full p-2 w-11 h-11 flex items-center justify-center relative transition-colors">
            <span class="text-xl">🔔</span>
            <span
              class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
          </button>

          <div class="relative">
            <button id="profileBtn"
              class="bg-gray-100 hover:bg-gray-200 rounded-full flex items-center gap-2 px-3 py-2 transition-colors">
              <div
                class="w-9 h-9 bg-gradient-to-br from-indigo-600 to-purple-600 rounded-full flex items-center justify-center text-white font-bold">
                A
              </div>
              <span class="font-semibold hidden md:inline">Teacher</span>
              <span class="text-xs">▼</span>
            </button>

            <div id="profileDropdown"
              class="hidden absolute top-full right-0 mt-2 bg-white rounded-xl shadow-2xl p-2 min-w-[200px] z-[1001]">
              <div class="px-4 py-2 hover:bg-gray-100 rounded-lg cursor-pointer transition-colors">
                <span class="mr-2">👤</span> My Profile
              </div>
              <div class="px-4 py-2 hover:bg-gray-100 rounded-lg cursor-pointer transition-colors">
                <span class="mr-2">⚙️</span> Settings
              </div>
              <div class="px-4 py-2 hover:bg-gray-100 rounded-lg cursor-pointer transition-colors">
                <span class="mr-2">❓</span> Help
              </div>
              <hr class="my-2 border-gray-200">
              <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="button" onclick="confirmLogout()"
                  class="w-full text-left px-4 py-2 hover:bg-gray-100 rounded-lg cursor-pointer text-red-500 transition-colors">
                  <span class="mr-2">🚪</span> Logout
                </button>
              </form>


            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Content --}}
    @yield('content')
    <!-- Tombol Back to Top -->
    <button id="backToTopBtn"
        class="hidden fixed bottom-6 right-6 w-12 h-12 flex items-center justify-center
            bg-yellow-400 text-black font-semibold
            rounded-full shadow-lg hover:bg-white
            transition-colors duration-300 z-50">
        <span class="text-lg leading-none">↑</span>
    </button>
  </div>
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
  <script>
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('mainContent');
    const toggleBtn = document.getElementById('toggleSidebar');
    const overlay = document.getElementById('sidebarOverlay');
    const profileBtn = document.getElementById('profileBtn');
    const profileDropdown = document.getElementById('profileDropdown');

    // Helper: returns true if sidebar is currently hidden (translated out)
    const isSidebarHidden = () => sidebar.classList.contains('-translate-x-full');

    // Toggle Sidebar (keeps mainContent in sync)
    toggleBtn.addEventListener('click', () => {
      const hidden = isSidebarHidden();

      if (window.innerWidth < 1024) {
        // Mobile: slide over content + overlay
        if (hidden) {
          sidebar.classList.remove('-translate-x-full'); // show
          overlay.classList.remove('hidden');
        } else {
          sidebar.classList.add('-translate-x-full'); // hide
          overlay.classList.add('hidden');
        }
      } else {
        // Desktop: shift layout and show/hide sidebar together
        if (hidden) {
          sidebar.classList.remove('-translate-x-full'); // show sidebar
          mainContent.classList.add('lg:ml-64');         // push content
        } else {
          sidebar.classList.add('-translate-x-full');    // hide sidebar
          mainContent.classList.remove('lg:ml-64');      // pull content back
        }
      }
    });

    // Close sidebar on overlay click (mobile)
    overlay.addEventListener('click', () => {
      sidebar.classList.add('-translate-x-full');
      overlay.classList.add('hidden');
    });

    // Profile dropdown toggle
    profileBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      profileDropdown.classList.toggle('hidden');
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', (e) => {
      if (!profileBtn.contains(e.target) && !profileDropdown.contains(e.target)) {
        profileDropdown.classList.add('hidden');
      }
    });

    // Sidebar items
    const sidebarItems = document.querySelectorAll('.sidebar-item');
    sidebarItems.forEach(item => {
      item.addEventListener('click', () => {
        sidebarItems.forEach(i => i.classList.remove('bg-white', 'bg-opacity-20'));
        item.classList.add('bg-white', 'bg-opacity-20');

        // Auto-close on mobile after selection
        if (window.innerWidth < 1024) {
          sidebar.classList.add('-translate-x-full');
          overlay.classList.add('hidden');
        }
      });
    });

    // Ensure correct layout when resizing or on first load
    function applyResponsiveState() {
      if (window.innerWidth >= 1024) {
        // Desktop default: show sidebar and shift content
        overlay.classList.add('hidden');
        sidebar.classList.remove('-translate-x-full');
        mainContent.classList.add('lg:ml-64');
      } else {
        // Mobile default: hide sidebar and don't shift content
        overlay.classList.add('hidden');
        sidebar.classList.add('-translate-x-full');
        mainContent.classList.remove('lg:ml-64');
      }
    }

    // Run on resize and on initial load
    window.addEventListener('resize', applyResponsiveState);
    // initial invocation
    applyResponsiveState();
  </script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    function confirmLogout() {
      Swal.fire({
        title: "Logout?",
        text: "Apakah kamu yakin ingin logout?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Ya, logout!"
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById('logout-form').submit();
        }
      });
    }
  </script>
  @if(session('login_success'))
<script>
    Swal.fire({
        title: "Login Berhasil!",
        text: "Selamat datang kembali 👋",
        icon: "success",
        timer: 1800,
        showConfirmButton: false
    });
</script>
@endif
<style>
  /* ===== FIX SWEETALERT + TAILWIND + FLOWBITE ===== */

  .swal2-container {
    z-index: 99999 !important;
  }

  .swal2-popup button {
    background-image: none !important;
    box-shadow: none !important;
  }

  .swal2-confirm {
    background-color: #dc2626 !important; /* red-600 */
    color: #fff !important;
    border-radius: 9999px !important;
    padding: 0.6rem 1.5rem !important;
    font-weight: 600;
  }

  .swal2-cancel {
    background-color: #2563eb !important; /* blue-600 */
    color: #fff !important;
    border-radius: 9999px !important;
    padding: 0.6rem 1.5rem !important;
    font-weight: 600;
  }

  .swal2-confirm:hover {
    background-color: #b91c1c !important;
  }

  .swal2-cancel:hover {
    background-color: #1d4ed8 !important;
  }
</style>
</body>

</html>