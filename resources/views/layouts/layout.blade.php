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
  <script src="https://kit.fontawesome.com/your-kit-id.js" crossorigin="anonymous"></script><!-- Import Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Montserrat:wght@600;700;800&display=swap"
    rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Fredoka+One&display=swap" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      AOS.init({
        duration: 800,         // durasi animasi
        easing: 'ease-in-out', // tipe easing
        once: false,           // animasi akan muncul setiap scroll ke section
        mirror: true           // animasi terulang bahkan saat scroll ke atas
      });
    });
  </script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(40px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes fadeOutDown {
      from {
        opacity: 1;
        transform: translateY(0);
      }

      to {
        opacity: 0;
        transform: translateY(40px);
      }
    }

    /* Durasi disamakan: fade-in 0.8s, fade-out 0.6s */
    .animate-fade-in-up {
      opacity: 0;
      animation: fadeInUp 0.8s ease forwards;
    }

    .animate-fade-out-down {
      opacity: 1;
      animation: fadeOutDown 0.6s ease forwards;
    }

    /* --- BLOCK REVEAL MASUK --- */
    @keyframes blockRevealIn {
      0% {
        width: 0;
        left: 0;
      }

      50% {
        width: 100%;
        left: 0;
      }

      100% {
        width: 0;
        left: 100%;
      }
    }

    /* --- BLOCK REVEAL KELUAR --- */
    @keyframes blockRevealOut {
      0% {
        width: 0;
        right: 0;
      }

      50% {
        width: 100%;
        right: 0;
      }

      100% {
        width: 0;
        right: 100%;
      }
    }

    .hero-title {
      position: relative;
      display: inline-block;
      overflow: hidden;
    }

    .hero-title::before {
      content: "";
      position: absolute;
      top: 0;
      width: 0%;
      height: 100%;
      background: white;
      /* ubah ke warna lain jika ingin efek brand */
      z-index: 2;
    }

    /* Masuk: kiri → kanan */
    .hero-title.block-animate::before {
      left: 0;
      animation: blockRevealIn 1s ease forwards;
    }

    /* Keluar: kanan → kiri */
    .hero-title.block-animate-out::before {
      right: 0;
      animation: blockRevealOut 0.6s ease forwards;
    }

    /* Sembunyikan teks selama block aktif */
    .hero-title.block-animate,
    .hero-title.block-animate-out {
      color: transparent;
    }

    /* Setelah block selesai masuk */
    .hero-title.revealed {
      color: white;
    }
  </style>

</head>

<body class="font-sans text-gray-800">

  {{-- Content --}}
  @yield('content')

  <style>
    @keyframes slideDown {
      from {
        opacity: 0;
        transform: translateY(-10px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .animate-slideDown {
      animation: slideDown 0.3s ease-out forwards;
    }

    @keyframes pulseSlow {

      0%,
      100% {
        box-shadow: 0 0 0 0 rgba(250, 218, 122, 0.5);
      }

      50% {
        box-shadow: 0 0 15px 5px rgba(250, 218, 122, 0.3);
      }
    }

    .animate-pulse-slow {
      animation: pulseSlow 2s infinite;
    }
  </style>

</body>

</html>