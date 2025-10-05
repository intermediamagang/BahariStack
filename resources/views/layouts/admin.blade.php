<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin - {{ config('app.name', 'BahariStack') }}</title>

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
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
        }

        .sidebar {
            background: linear-gradient(135deg, #0ea5e9 0%, #0284c7 50%, #0c4a6e 100%);
            min-height: 100vh;
        }

        .sidebar-item {
            transition: all 0.3s ease;
        }

        .sidebar-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .sidebar-item.active {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .card {
            background: white;
            border-radius: 0.75rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
        }

        .btn-primary {
            background: linear-gradient(135deg, #0ea5e9 0%, #0284c7 100%);
            border: none;
            color: white;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(14, 165, 233, 0.3);
            color: white;
        }

        .btn-danger {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            border: none;
            color: white;
        }

        .btn-success {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            border: none;
            color: white;
        }

        .btn-warning {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            border: none;
            color: white;
        }
    </style>
</head>
<body>
    <div class="flex">
        <!-- Sidebar -->
        <div class="sidebar w-64 fixed h-full">
            <div class="p-6">
                <div class="flex items-center space-x-3 mb-8">
                    <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center">
                        <i class="fas fa-anchor text-blue-600 text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-white font-bold text-lg">BahariStack</h1>
                        <p class="text-blue-100 text-sm">Admin Panel</p>
                    </div>
                </div>

                <nav class="space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="sidebar-item flex items-center space-x-3 px-4 py-3 text-white rounded-lg {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>

                    <a href="{{ route('admin.brand-settings.index') }}" class="sidebar-item flex items-center space-x-3 px-4 py-3 text-white rounded-lg {{ request()->routeIs('admin.brand-settings.*') ? 'active' : '' }}">
                        <i class="fas fa-cog"></i>
                        <span>Brand Settings</span>
                    </a>

                    <a href="{{ route('admin.services.index') }}" class="sidebar-item flex items-center space-x-3 px-4 py-3 text-white rounded-lg {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                        <i class="fas fa-briefcase"></i>
                        <span>Layanan</span>
                    </a>

                    <a href="{{ route('admin.packages.index') }}" class="sidebar-item flex items-center space-x-3 px-4 py-3 text-white rounded-lg {{ request()->routeIs('admin.packages.*') ? 'active' : '' }}">
                        <i class="fas fa-box"></i>
                        <span>Paket</span>
                    </a>

                    <a href="{{ route('admin.portfolios.index') }}" class="sidebar-item flex items-center space-x-3 px-4 py-3 text-white rounded-lg {{ request()->routeIs('admin.portfolios.*') ? 'active' : '' }}">
                        <i class="fas fa-folder-open"></i>
                        <span>Portfolio</span>
                    </a>

                    <a href="{{ route('admin.team-members.index') }}" class="sidebar-item flex items-center space-x-3 px-4 py-3 text-white rounded-lg {{ request()->routeIs('admin.team-members.*') ? 'active' : '' }}">
                        <i class="fas fa-users"></i>
                        <span>Tim</span>
                    </a>

                    <a href="{{ route('admin.contact-infos.index') }}" class="sidebar-item flex items-center space-x-3 px-4 py-3 text-white rounded-lg {{ request()->routeIs('admin.contact-infos.*') ? 'active' : '' }}">
                        <i class="fas fa-address-book"></i>
                        <span>Kontak</span>
                    </a>

                    <div class="border-t border-blue-400 my-4"></div>

                    <a href="{{ route('home') }}" target="_blank" class="sidebar-item flex items-center space-x-3 px-4 py-3 text-white rounded-lg">
                        <i class="fas fa-external-link-alt"></i>
                        <span>Lihat Website</span>
                    </a>

                    <form method="POST" action="{{ route('logout') }}" class="mt-4">
                        @csrf
                        <button type="submit" class="sidebar-item flex items-center space-x-3 px-4 py-3 text-white rounded-lg w-full text-left">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 ml-64">
            <!-- Top Bar -->
            <div class="bg-white shadow-sm border-b border-gray-200 px-6 py-4">
                <div class="flex items-center justify-between">
                    <h2 class="text-2xl font-semibold text-gray-900">@yield('page-title', 'Dashboard')</h2>
                    
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-600">Selamat datang, {{ Auth::user()->name }}</span>
                        <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-user text-white text-sm"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page Content -->
            <div class="p-6">
                @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    <i class="fas fa-check-circle mr-2"></i>
                    {{ session('success') }}
                </div>
                @endif

                @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    {{ session('error') }}
                </div>
                @endif

                @yield('content')
                @stack('scripts')
            </div>
        </div>
    </div>

    <script>
        // Auto hide alerts
        setTimeout(function() {
            const alerts = document.querySelectorAll('.bg-green-100, .bg-red-100');
            alerts.forEach(alert => {
                alert.style.transition = 'opacity 0.5s';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            });
        }, 5000);
    </script>
</body>
</html>
