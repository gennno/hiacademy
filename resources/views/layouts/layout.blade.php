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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-TQ7iGLW6wMZ1xjF6mU9QK3fZc0D3mFjQFzUObZ7dkXAmIZ0+iL+OKFHZ1PZjZpbIQtHdwZb2FjGdYkPZwY+X2w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://kit.fontawesome.com/your-kit-id.js" crossorigin="anonymous"></script>
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
    </style>

</body>

</html>