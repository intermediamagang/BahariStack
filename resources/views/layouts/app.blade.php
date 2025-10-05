<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $brandSetting->company_name ?? 'BahariStack' }} - @yield('title', 'Jasa Pembuatan Website, Software & Aplikasi Android')</title>
    <meta name="description" content="{{ $brandSetting->description ?? 'Jasa pembuatan website, software, dan aplikasi android profesional dengan kualitas terbaik.' }}">

    <!-- Favicon -->
    @if($brandSetting->favicon_path ?? false)
        <link rel="icon" type="image/x-icon" href="{{ asset($brandSetting->favicon_path) }}">
    @endif

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --ocean-primary: #0ea5e9;
            --ocean-secondary: #0284c7;
            --ocean-dark: #0c4a6e;
            --ocean-light: #e0f2fe;
            --ocean-accent: #06b6d4;
            --ocean-gradient: linear-gradient(135deg, #0ea5e9 0%, #0284c7 50%, #0c4a6e 100%);
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #e0f2fe 100%);
            min-height: 100vh;
        }

        .ocean-gradient {
            background: var(--ocean-gradient);
        }

        .ocean-text {
            color: var(--ocean-primary);
        }

        .ocean-bg {
            background-color: var(--ocean-light);
        }

        .wave-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%230ea5e9' fill-opacity='0.1'%3E%3Cpath d='M30 30c0-11.046-8.954-20-20-20s-20 8.954-20 20 8.954 20 20 20 20-8.954 20-20zm0 0c0 11.046 8.954 20 20 20s20-8.954 20-20-8.954-20-20-20-20 8.954-20 20z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .card-ocean {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(14, 165, 233, 0.1);
            box-shadow: 0 8px 32px rgba(14, 165, 233, 0.1);
        }

        .btn-ocean {
            background: var(--ocean-gradient);
            border: none;
            color: white;
            transition: all 0.3s ease;
        }

        .btn-ocean:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(14, 165, 233, 0.3);
            color: white;
        }

        .navbar-ocean {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(14, 165, 233, 0.1);
        }

        .hero-section {
            background: var(--ocean-gradient);
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0 0h100v100H0z' fill='%23ffffff' fill-opacity='0.1'/%3E%3Cpath d='M0 0L50 50L100 0z' fill='%23ffffff' fill-opacity='0.05'/%3E%3C/svg%3E");
            animation: wave 20s ease-in-out infinite;
        }

        @keyframes wave {
            0%, 100% { transform: translateX(0) translateY(0); }
            25% { transform: translateX(-5px) translateY(-5px); }
            50% { transform: translateX(5px) translateY(-10px); }
            75% { transform: translateX(-5px) translateY(-5px); }
        }

        .floating {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .section-ocean {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            position: relative;
        }

        .section-ocean::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--ocean-primary), transparent);
        }
    </style>
</head>
<body class="font-sans antialiased">
    <!-- Navigation -->
    <nav class="navbar-ocean fixed w-full top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3">
                        @if($brandSetting->logo_path ?? false)
                            <img src="{{ asset($brandSetting->logo_path) }}" alt="{{ $brandSetting->company_name }}" class="h-10 w-auto">
                        @endif
                        <span class="text-xl font-bold ocean-text">{{ $brandSetting->company_name ?? 'BahariStack' }}</span>
                    </a>
                </div>

                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600 transition-colors duration-200 {{ request()->routeIs('home') ? 'text-blue-600 font-semibold' : '' }}">Home</a>
                    <a href="{{ route('services') }}" class="text-gray-700 hover:text-blue-600 transition-colors duration-200 {{ request()->routeIs('services') ? 'text-blue-600 font-semibold' : '' }}">Layanan</a>
                    <a href="{{ route('packages') }}" class="text-gray-700 hover:text-blue-600 transition-colors duration-200 {{ request()->routeIs('packages') ? 'text-blue-600 font-semibold' : '' }}">Paket</a>
                    <a href="{{ route('portfolio') }}" class="text-gray-700 hover:text-blue-600 transition-colors duration-200 {{ request()->routeIs('portfolio') ? 'text-blue-600 font-semibold' : '' }}">Portfolio</a>
                    <a href="{{ route('team') }}" class="text-gray-700 hover:text-blue-600 transition-colors duration-200 {{ request()->routeIs('team') ? 'text-blue-600 font-semibold' : '' }}">Tim</a>
                    <a href="{{ route('contact') }}" class="text-gray-700 hover:text-blue-600 transition-colors duration-200 {{ request()->routeIs('contact') ? 'text-blue-600 font-semibold' : '' }}">Kontak</a>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button type="button" class="text-gray-700 hover:text-blue-600 focus:outline-none focus:text-blue-600" onclick="toggleMobileMenu()">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="md:hidden hidden bg-white border-t border-gray-200">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="{{ route('home') }}" class="block px-3 py-2 text-gray-700 hover:text-blue-600 {{ request()->routeIs('home') ? 'text-blue-600 font-semibold' : '' }}">Home</a>
                <a href="{{ route('services') }}" class="block px-3 py-2 text-gray-700 hover:text-blue-600 {{ request()->routeIs('services') ? 'text-blue-600 font-semibold' : '' }}">Layanan</a>
                <a href="{{ route('packages') }}" class="block px-3 py-2 text-gray-700 hover:text-blue-600 {{ request()->routeIs('packages') ? 'text-blue-600 font-semibold' : '' }}">Paket</a>
                <a href="{{ route('portfolio') }}" class="block px-3 py-2 text-gray-700 hover:text-blue-600 {{ request()->routeIs('portfolio') ? 'text-blue-600 font-semibold' : '' }}">Portfolio</a>
                <a href="{{ route('team') }}" class="block px-3 py-2 text-gray-700 hover:text-blue-600 {{ request()->routeIs('team') ? 'text-blue-600 font-semibold' : '' }}">Tim</a>
                <a href="{{ route('contact') }}" class="block px-3 py-2 text-gray-700 hover:text-blue-600 {{ request()->routeIs('contact') ? 'text-blue-600 font-semibold' : '' }}">Kontak</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-16">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center space-x-3 mb-4">
                        @if($brandSetting->logo_path ?? false)
                            <img src="{{ asset($brandSetting->logo_path) }}" alt="{{ $brandSetting->company_name }}" class="h-10 w-auto">
                        @endif
                        <span class="text-xl font-bold">{{ $brandSetting->company_name ?? 'BahariStack' }}</span>
                    </div>
                    <p class="text-gray-300 mb-4">{{ $brandSetting->description ?? 'Jasa pembuatan website, software, dan aplikasi android profesional dengan kualitas terbaik.' }}</p>
                    <div class="flex space-x-4">
                        @if($brandSetting->social_media ?? false)
                            @foreach($brandSetting->social_media as $platform => $url)
                                <a href="{{ $url }}" target="_blank" class="text-gray-400 hover:text-white transition-colors duration-200">
                                    <i class="fab fa-{{ $platform }} text-xl"></i>
                                </a>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Layanan</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('services') }}" class="text-gray-300 hover:text-white transition-colors duration-200">Website Development</a></li>
                        <li><a href="{{ route('services') }}" class="text-gray-300 hover:text-white transition-colors duration-200">Software Development</a></li>
                        <li><a href="{{ route('services') }}" class="text-gray-300 hover:text-white transition-colors duration-200">Mobile App Development</a></li>
                        <li><a href="{{ route('services') }}" class="text-gray-300 hover:text-white transition-colors duration-200">UI/UX Design</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Kontak</h3>
                    <div class="space-y-2">
                        @if($brandSetting->email ?? false)
                            <p class="text-gray-300"><i class="fas fa-envelope mr-2"></i>{{ $brandSetting->email }}</p>
                        @endif
                        @if($brandSetting->phone ?? false)
                            <p class="text-gray-300"><i class="fas fa-phone mr-2"></i>{{ $brandSetting->phone }}</p>
                        @endif
                        @if($brandSetting->address ?? false)
                            <p class="text-gray-300"><i class="fas fa-map-marker-alt mr-2"></i>{{ $brandSetting->address }}</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-8 pt-8 text-center">
                <p class="text-gray-400">&copy; {{ date('Y') }} {{ $brandSetting->company_name ?? 'BahariStack' }}. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }
    </script>
</body>
</html>