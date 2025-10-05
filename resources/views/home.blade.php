@extends('layouts.app')

@section('title', 'Home')

@section('content')
<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center bg-gradient-to-br from-slate-900 via-blue-900 to-slate-800 text-white overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%23ffffff\" fill-opacity=\"0.1\"%3E%3Ccircle cx=\"30\" cy=\"30\" r=\"2\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>
    
    <!-- Floating Elements -->
    <div class="absolute top-20 left-10 w-20 h-20 bg-blue-500 bg-opacity-20 rounded-full blur-xl"></div>
    <div class="absolute top-40 right-20 w-16 h-16 bg-cyan-400 bg-opacity-20 rounded-full blur-xl"></div>
    <div class="absolute bottom-20 left-1/4 w-24 h-24 bg-indigo-500 bg-opacity-20 rounded-full blur-xl"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <div class="max-w-5xl mx-auto">
            <!-- Badge -->
            <div class="mb-8">
                <span class="inline-flex items-center px-6 py-3 rounded-full text-sm font-semibold bg-white bg-opacity-10 backdrop-blur-sm border border-white border-opacity-20 text-white">
                    <i class="fas fa-award mr-2 text-yellow-400"></i>
                    Solusi Teknologi Terpercaya
                </span>
            </div>
            
            <!-- Main Heading -->
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-8 leading-tight">
                <span class="block text-white mb-2">Transformasi Digital</span>
                <span class="block bg-gradient-to-r from-blue-400 to-cyan-400 bg-clip-text text-transparent">
                    {{ $brandSetting->company_name ?? 'BahariStack' }}
                </span>
            </h1>
            
            <!-- Subtitle -->
            <p class="text-xl md:text-2xl mb-12 text-gray-300 max-w-4xl mx-auto leading-relaxed">
                Kami menghadirkan solusi teknologi terdepan untuk mengembangkan website, software, dan aplikasi mobile yang profesional dan berkualitas tinggi
            </p>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-6 justify-center mb-16">
                <a href="{{ route('contact') }}" class="group bg-gradient-to-r from-blue-600 to-blue-700 text-white px-10 py-4 rounded-xl text-lg font-semibold inline-flex items-center justify-center hover:from-blue-700 hover:to-blue-800 transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:-translate-y-1">
                    <i class="fas fa-phone mr-3"></i>
                    Konsultasi Gratis
                </a>
                <a href="{{ route('packages') }}" class="group bg-transparent text-white border-2 border-white px-10 py-4 rounded-xl text-lg font-semibold hover:bg-white hover:text-slate-900 transition-all duration-300 inline-flex items-center justify-center">
                    <i class="fas fa-box mr-3"></i>
                    Lihat Paket
                </a>
            </div>
            
            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-3xl mx-auto">
                <div class="text-center group">
                    <div class="text-4xl md:text-5xl font-bold text-white mb-2 group-hover:text-blue-400 transition-colors duration-300">
                        {{ $stats['projects_completed'] ?? 0 }}+
                    </div>
                    <div class="text-gray-300 font-medium">Proyek Selesai</div>
                </div>
                <div class="text-center group">
                    <div class="text-4xl md:text-5xl font-bold text-white mb-2 group-hover:text-blue-400 transition-colors duration-300">
                        {{ $stats['happy_clients'] ?? 0 }}+
                    </div>
                    <div class="text-gray-300 font-medium">Klien Puas</div>
                </div>
                <div class="text-center group">
                    <div class="text-4xl md:text-5xl font-bold text-white mb-2 group-hover:text-blue-400 transition-colors duration-300">
                        {{ $stats['team_members'] ?? 0 }}+
                    </div>
                    <div class="text-gray-300 font-medium">Tim Ahli</div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <i class="fas fa-chevron-down text-white text-2xl opacity-60"></i>
    </div>
</section>

<!-- About Section -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <div class="mb-6">
                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-blue-100 text-blue-800">
                        <i class="fas fa-info-circle mr-2"></i>
                        Tentang Kami
                    </span>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 leading-tight">
                    Solusi Teknologi Terdepan untuk 
                    <span class="text-blue-600">Bisnis Anda</span>
                </h2>
                <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                    {{ $brandSetting->company_name ?? 'BahariStack' }} adalah perusahaan teknologi yang berfokus pada pengembangan solusi digital berkualitas tinggi. Kami membantu bisnis Anda tumbuh dengan teknologi yang tepat.
                </p>
                <div class="space-y-4">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-check text-green-600 text-sm"></i>
                        </div>
                        <span class="text-gray-700 font-medium">Tim berpengalaman dan bersertifikat</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-check text-green-600 text-sm"></i>
                        </div>
                        <span class="text-gray-700 font-medium">Teknologi terdepan dan terupdate</span>
                    </div>
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-check text-green-600 text-sm"></i>
                        </div>
                        <span class="text-gray-700 font-medium">Support 24/7 dan maintenance berkala</span>
                    </div>
                </div>
            </div>
            <div class="relative">
                <div class="bg-gradient-to-br from-blue-50 to-indigo-100 rounded-2xl p-8">
                    <div class="grid grid-cols-2 gap-6">
                        <div class="text-center">
                            <div class="w-16 h-16 bg-blue-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-code text-white text-2xl"></i>
                            </div>
                            <h3 class="font-bold text-gray-900 mb-2">Development</h3>
                            <p class="text-sm text-gray-600">Website & Software</p>
                        </div>
                        <div class="text-center">
                            <div class="w-16 h-16 bg-green-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-mobile-alt text-white text-2xl"></i>
                            </div>
                            <h3 class="font-bold text-gray-900 mb-2">Mobile App</h3>
                            <p class="text-sm text-gray-600">Android & iOS</p>
                        </div>
                        <div class="text-center">
                            <div class="w-16 h-16 bg-purple-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-paint-brush text-white text-2xl"></i>
                            </div>
                            <h3 class="font-bold text-gray-900 mb-2">UI/UX Design</h3>
                            <p class="text-sm text-gray-600">Modern & Elegant</p>
                        </div>
                        <div class="text-center">
                            <div class="w-16 h-16 bg-orange-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                                <i class="fas fa-cogs text-white text-2xl"></i>
                            </div>
                            <h3 class="font-bold text-gray-900 mb-2">Maintenance</h3>
                            <p class="text-sm text-gray-600">24/7 Support</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-blue-100 text-blue-800 mb-4">
                <i class="fas fa-star mr-2"></i>
                Mengapa Memilih Kami
            </span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Keunggulan <span class="text-blue-600">{{ $brandSetting->company_name ?? 'BahariStack' }}</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Kami berkomitmen memberikan solusi terbaik dengan standar kualitas internasional
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="group text-center">
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 group-hover:-translate-y-2 border border-gray-100">
                    <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-rocket text-white text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Performa Optimal</h3>
                    <p class="text-gray-600 leading-relaxed">Website dan aplikasi yang cepat, responsif, dan dioptimalkan untuk performa terbaik</p>
                </div>
            </div>
            
            <div class="group text-center">
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 group-hover:-translate-y-2 border border-gray-100">
                    <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-shield-alt text-white text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Keamanan Terjamin</h3>
                    <p class="text-gray-600 leading-relaxed">Implementasi keamanan berlapis untuk melindungi data dan sistem Anda</p>
                </div>
            </div>
            
            <div class="group text-center">
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 group-hover:-translate-y-2 border border-gray-100">
                    <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-headset text-white text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Support 24/7</h3>
                    <p class="text-gray-600 leading-relaxed">Tim support profesional siap membantu Anda kapan saja, 24 jam sehari</p>
                </div>
            </div>
            
            <div class="group text-center">
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 group-hover:-translate-y-2 border border-gray-100">
                    <div class="w-20 h-20 bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-search text-white text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">SEO Optimized</h3>
                    <p class="text-gray-600 leading-relaxed">Website dioptimalkan untuk mesin pencari agar mudah ditemukan di Google</p>
                </div>
            </div>
            
            <div class="group text-center">
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 group-hover:-translate-y-2 border border-gray-100">
                    <div class="w-20 h-20 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-mobile-alt text-white text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Responsive Design</h3>
                    <p class="text-gray-600 leading-relaxed">Tampilan sempurna di semua perangkat, desktop, tablet, dan mobile</p>
                </div>
            </div>
            
            <div class="group text-center">
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 group-hover:-translate-y-2 border border-gray-100">
                    <div class="w-20 h-20 bg-gradient-to-br from-pink-500 to-pink-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-palette text-white text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Custom Design</h3>
                    <p class="text-gray-600 leading-relaxed">Desain unik dan menarik yang mencerminkan identitas brand Anda</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-blue-100 text-blue-800 mb-4">
                <i class="fas fa-cogs mr-2"></i>
                Layanan Kami
            </span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Solusi Teknologi <span class="text-blue-600">Lengkap</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                Kami menyediakan berbagai layanan teknologi terdepan untuk membantu transformasi digital bisnis Anda
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $index => $service)
            <div class="group relative">
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 group-hover:-translate-y-3 border border-gray-100 relative overflow-hidden">
                    <!-- Background Gradient -->
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-full -translate-y-16 translate-x-16 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    
                    <div class="relative z-10">
                        <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <i class="{{ $service->icon }} text-white text-3xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-blue-600 transition-colors duration-300">{{ $service->title }}</h3>
                        <p class="text-gray-600 leading-relaxed mb-6">{{ $service->description }}</p>
                        <div class="flex items-center text-blue-600 font-semibold group-hover:text-blue-700 transition-colors duration-300">
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-16">
            <a href="{{ route('services') }}" class="group bg-gradient-to-r from-blue-600 to-blue-700 text-white px-12 py-4 rounded-xl text-lg font-semibold inline-flex items-center hover:from-blue-700 hover:to-blue-800 transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:-translate-y-1">
                <i class="fas fa-eye mr-3"></i>
                Lihat Semua Layanan
                <i class="fas fa-arrow-right ml-3 group-hover:translate-x-1 transition-transform duration-300"></i>
            </a>
        </div>
    </div>
</section>

<!-- Packages Section -->
<section class="py-24 bg-gradient-to-br from-slate-50 to-blue-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-blue-100 text-blue-800 mb-4">
                <i class="fas fa-box mr-2"></i>
                Paket Layanan
            </span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Pilih Paket <span class="text-blue-600">Terbaik</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                Solusi lengkap dengan harga yang kompetitif untuk transformasi digital bisnis Anda
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($packages->take(3) as $package)
            <div class="group relative">
                <div class="bg-white rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-300 group-hover:-translate-y-4 border border-gray-100 relative overflow-hidden {{ $package->is_popular ? 'ring-4 ring-blue-500 scale-105' : '' }}">
                    @if($package->is_popular)
                    <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 z-10">
                        <div class="bg-gradient-to-r from-yellow-400 to-yellow-500 text-gray-900 text-sm font-bold px-8 py-3 rounded-full shadow-lg">
                            <i class="fas fa-crown mr-2"></i>
                            Terlaris
                        </div>
                    </div>
                    @endif
                    
                    <!-- Background Pattern -->
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-full -translate-y-16 translate-x-16 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    
                    <div class="relative z-10">
                        <div class="text-center mb-8">
                            <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ $package->name }}</h3>
                            <p class="text-gray-600 mb-6 leading-relaxed">{{ $package->description }}</p>
                            
                            <div class="mb-6">
                                <span class="text-5xl font-bold text-blue-600">{{ $package->formatted_price }}</span>
                                <span class="text-gray-500 text-sm block mt-2">Mulai dari</span>
                            </div>
                        </div>
                        
                        <ul class="space-y-4 mb-8">
                            @foreach($package->features as $feature)
                            <li class="flex items-start text-gray-600">
                                <div class="flex-shrink-0 w-6 h-6 bg-green-500 rounded-full flex items-center justify-center mr-3 mt-0.5">
                                    <i class="fas fa-check text-white text-xs"></i>
                                </div>
                                <span class="text-sm">{{ $feature }}</span>
                            </li>
                            @endforeach
                        </ul>
                        
                        <a href="{{ route('contact') }}" class="w-full py-4 rounded-xl font-bold text-center block transition-all duration-300 {{ $package->is_popular ? 'bg-gradient-to-r from-blue-600 to-blue-700 text-white hover:from-blue-700 hover:to-blue-800 shadow-lg' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                            <i class="fas fa-arrow-right mr-2"></i>
                            {{ $package->is_popular ? 'Pilih Paket Ini' : 'Pilih Paket' }}
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-16">
            <div class="bg-white rounded-3xl p-8 shadow-xl max-w-2xl mx-auto border border-gray-100 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-full -translate-y-16 translate-x-16"></div>
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-lightbulb text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Butuh Solusi Kustom?</h3>
                    <p class="text-gray-600 mb-6">Kami siap membuatkan paket khusus sesuai kebutuhan bisnis Anda</p>
                    <a href="{{ route('contact') }}" class="group bg-gradient-to-r from-blue-600 to-blue-700 text-white px-10 py-4 rounded-xl text-lg font-bold inline-flex items-center hover:from-blue-700 hover:to-blue-800 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        <i class="fas fa-phone mr-3"></i>
                        Konsultasi Gratis
                        <i class="fas fa-arrow-right ml-3 group-hover:translate-x-1 transition-transform duration-300"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Portfolio Section -->
@if($portfolios->count() > 0)
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-blue-100 text-blue-800 mb-4">
                <i class="fas fa-briefcase mr-2"></i>
                Portfolio Kami
            </span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Proyek <span class="text-blue-600">Terpilih</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                Beberapa proyek terbaik yang telah kami selesaikan untuk klien kami
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($portfolios->take(6) as $portfolio)
            <div class="group relative">
                <div class="bg-white rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 group-hover:-translate-y-3 border border-gray-100 relative">
                    @if($portfolio->image_path)
                    <div class="aspect-w-16 aspect-h-9 relative overflow-hidden">
                        <img src="{{ Storage::url($portfolio->image_path) }}" alt="{{ $portfolio->title }}" class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="absolute bottom-4 left-4 right-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            @if($portfolio->project_url)
                            <a href="{{ $portfolio->project_url }}" target="_blank" class="bg-white text-gray-900 px-4 py-2 rounded-lg text-sm font-semibold inline-flex items-center">
                                <i class="fas fa-external-link-alt mr-2"></i>
                                Lihat Proyek
                            </a>
                            @endif
                        </div>
                    </div>
                    @endif
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-3 py-1 rounded-full">
                                {{ ucfirst($portfolio->category) }}
                            </span>
                            @if($portfolio->is_featured)
                            <span class="bg-yellow-100 text-yellow-800 text-xs font-bold px-3 py-1 rounded-full">
                                <i class="fas fa-star mr-1"></i>
                                Featured
                            </span>
                            @endif
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors duration-300">
                            {{ $portfolio->title }}
                        </h3>
                        <p class="text-gray-600 text-sm leading-relaxed mb-4">
                            {{ Str::limit($portfolio->description, 100) }}
                        </p>
                        @if($portfolio->technologies && count($portfolio->technologies) > 0)
                        <div class="flex flex-wrap gap-2 mb-4">
                            @foreach(array_slice($portfolio->technologies, 0, 3) as $tech)
                            <span class="bg-gray-100 text-gray-700 text-xs px-3 py-1 rounded-full">
                                {{ $tech }}
                            </span>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-16">
            <a href="{{ route('portfolio') }}" class="group bg-gradient-to-r from-blue-600 to-blue-700 text-white px-12 py-4 rounded-xl text-lg font-semibold inline-flex items-center hover:from-blue-700 hover:to-blue-800 transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:-translate-y-1">
                <i class="fas fa-eye mr-3"></i>
                Lihat Semua Portfolio
                <i class="fas fa-arrow-right ml-3 group-hover:translate-x-1 transition-transform duration-300"></i>
            </a>
        </div>
    </div>
</section>
@endif

<!-- Team Section -->
@if($teamMembers->count() > 0)
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Tim Kami</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Tim profesional yang siap membantu mewujudkan visi digital bisnis Anda
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($teamMembers as $member)
            <div class="card-ocean rounded-xl p-6 text-center hover:transform hover:scale-105 transition-all duration-300">
                @if($member->photo_path)
                <img src="{{ Storage::url($member->photo_path) }}" alt="{{ $member->name }}" class="w-32 h-32 rounded-full mx-auto mb-6 object-cover border-4 border-blue-100 group-hover:border-blue-500 transition-colors duration-300">
                @else
                <div class="w-24 h-24 rounded-full mx-auto mb-4 bg-blue-100 flex items-center justify-center">
                    <i class="fas fa-user text-2xl text-blue-600"></i>
                </div>
                @endif
                
                <h3 class="text-xl font-semibold text-gray-900 mb-1">{{ $member->name }}</h3>
                <p class="text-blue-600 font-medium mb-3">{{ $member->position }}</p>
                @if($member->bio)
                <p class="text-gray-600 text-sm">{{ Str::limit($member->bio, 80) }}</p>
                @endif
                
                @if($member->social_links)
                <div class="flex justify-center space-x-3 mt-4">
                    @foreach($member->social_links as $platform => $url)
                    <a href="{{ $url }}" target="_blank" class="text-gray-400 hover:text-blue-600 transition-colors duration-200">
                        <i class="fab fa-{{ $platform }}"></i>
                    </a>
                    @endforeach
                </div>
                @endif
            </div>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('team') }}" class="btn-ocean px-8 py-4 rounded-lg text-lg font-semibold inline-block">
                Lihat Semua Tim
            </a>
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="relative py-24 bg-gradient-to-br from-slate-900 via-blue-900 to-slate-800 text-white overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%23ffffff\" fill-opacity=\"0.1\"%3E%3Ccircle cx=\"30\" cy=\"30\" r=\"2\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>
    
    <!-- Floating Elements -->
    <div class="absolute top-20 left-10 w-20 h-20 bg-blue-500 bg-opacity-20 rounded-full blur-xl"></div>
    <div class="absolute top-40 right-20 w-16 h-16 bg-cyan-400 bg-opacity-20 rounded-full blur-xl"></div>
    <div class="absolute bottom-20 left-1/4 w-24 h-24 bg-indigo-500 bg-opacity-20 rounded-full blur-xl"></div>
    
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16">
            <div class="mb-6">
                <span class="inline-flex items-center px-6 py-3 rounded-full text-sm font-semibold bg-white bg-opacity-10 backdrop-blur-sm border border-white border-opacity-20 text-white">
                    <i class="fas fa-rocket mr-2 text-yellow-400"></i>
                    Siap Memulai Proyek?
                </span>
            </div>
            <h2 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                Mari Wujudkan Ide Bisnis Anda
                <span class="block bg-gradient-to-r from-blue-400 to-cyan-400 bg-clip-text text-transparent">
                    Bersama {{ $brandSetting->company_name ?? 'BahariStack' }}
                </span>
            </h2>
            <p class="text-xl md:text-2xl text-gray-300 mb-12 max-w-4xl mx-auto leading-relaxed">
                Dapatkan konsultasi gratis dan wujudkan ide bisnis Anda menjadi solusi digital yang powerful
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
            <div class="text-center group">
                <div class="w-20 h-20 bg-white bg-opacity-10 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300 border border-white border-opacity-20">
                    <i class="fas fa-comments text-white text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">Konsultasi Gratis</h3>
                <p class="text-gray-300">Diskusikan kebutuhan proyek Anda dengan tim ahli kami</p>
            </div>
            <div class="text-center group">
                <div class="w-20 h-20 bg-white bg-opacity-10 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300 border border-white border-opacity-20">
                    <i class="fas fa-lightbulb text-white text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">Solusi Kustom</h3>
                <p class="text-gray-300">Dapatkan solusi yang disesuaikan dengan kebutuhan bisnis</p>
            </div>
            <div class="text-center group">
                <div class="w-20 h-20 bg-white bg-opacity-10 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300 border border-white border-opacity-20">
                    <i class="fas fa-handshake text-white text-3xl"></i>
                </div>
                <h3 class="text-xl font-bold mb-2">Support 24/7</h3>
                <p class="text-gray-300">Tim support siap membantu Anda kapan saja</p>
            </div>
        </div>
        
        <div class="flex flex-col sm:flex-row gap-6 justify-center">
            <a href="{{ route('contact') }}" class="group bg-gradient-to-r from-blue-600 to-blue-700 text-white px-12 py-5 rounded-xl text-xl font-bold hover:from-blue-700 hover:to-blue-800 transition-all duration-300 inline-flex items-center justify-center shadow-xl hover:shadow-2xl transform hover:-translate-y-1">
                <i class="fas fa-phone mr-3"></i>
                Hubungi Sekarang
                <i class="fas fa-arrow-right ml-3 group-hover:translate-x-1 transition-transform duration-300"></i>
            </a>
            <a href="{{ route('packages') }}" class="group bg-transparent text-white border-2 border-white px-12 py-5 rounded-xl text-xl font-semibold hover:bg-white hover:text-slate-900 transition-all duration-300 inline-flex items-center justify-center">
                <i class="fas fa-box mr-3"></i>
                Lihat Paket
            </a>
        </div>
    </div>
</section>
@endsection
