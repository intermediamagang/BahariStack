@extends('layouts.app')

@section('title', 'Paket Harga')

@section('content')
<!-- Hero Section -->
<section class="relative py-24 bg-gradient-to-br from-slate-900 via-blue-900 to-slate-800 text-white overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%23ffffff\" fill-opacity=\"0.1\"%3E%3Ccircle cx=\"30\" cy=\"30\" r=\"2\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>
    
    <!-- Floating Elements -->
    <div class="absolute top-20 left-10 w-20 h-20 bg-blue-500 bg-opacity-20 rounded-full blur-xl"></div>
    <div class="absolute top-40 right-20 w-16 h-16 bg-cyan-400 bg-opacity-20 rounded-full blur-xl"></div>
    <div class="absolute bottom-20 left-1/4 w-24 h-24 bg-indigo-500 bg-opacity-20 rounded-full blur-xl"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <div class="max-w-4xl mx-auto">
            <div class="mb-6">
                <span class="inline-flex items-center px-6 py-3 rounded-full text-sm font-semibold bg-white bg-opacity-10 backdrop-blur-sm border border-white border-opacity-20 text-white">
                    <i class="fas fa-box mr-2 text-yellow-400"></i>
                    Paket Harga
                </span>
            </div>
            <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                Pilih Paket <span class="bg-gradient-to-r from-blue-400 to-cyan-400 bg-clip-text text-transparent">Terbaik</span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-300 max-w-3xl mx-auto leading-relaxed">
                Pilih paket yang sesuai dengan kebutuhan dan budget bisnis Anda
            </p>
        </div>
    </div>
</section>

<!-- Website Packages -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-blue-100 text-blue-800 mb-4">
                <i class="fas fa-globe mr-2"></i>
                Paket Website
            </span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Solusi Website <span class="text-blue-600">Profesional</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                Solusi website profesional untuk berbagai kebutuhan bisnis dengan harga yang kompetitif
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($websitePackages as $package)
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
                            Pilih Paket
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Software Packages -->
<section class="py-24 bg-gradient-to-br from-slate-50 to-blue-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-green-100 text-green-800 mb-4">
                <i class="fas fa-desktop mr-2"></i>
                Paket Software
            </span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Aplikasi <span class="text-green-600">Desktop & Web</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                Pengembangan aplikasi desktop dan web-based untuk meningkatkan efisiensi bisnis
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($softwarePackages as $package)
            <div class="group relative">
                <div class="bg-white rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-300 group-hover:-translate-y-4 border border-gray-100 relative overflow-hidden {{ $package->is_popular ? 'ring-4 ring-green-500 scale-105' : '' }}">
                    @if($package->is_popular)
                    <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 z-10">
                        <div class="bg-gradient-to-r from-green-400 to-green-500 text-white text-sm font-bold px-8 py-3 rounded-full shadow-lg">
                            <i class="fas fa-crown mr-2"></i>
                            Terlaris
                        </div>
                    </div>
                    @endif
                    
                    <!-- Background Pattern -->
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-green-50 to-emerald-50 rounded-full -translate-y-16 translate-x-16 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    
                    <div class="relative z-10">
                        <div class="text-center mb-8">
                            <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ $package->name }}</h3>
                            <p class="text-gray-600 mb-6 leading-relaxed">{{ $package->description }}</p>
                            
                            <div class="mb-6">
                                <span class="text-5xl font-bold text-green-600">{{ $package->formatted_price }}</span>
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
                        
                        <a href="{{ route('contact') }}" class="w-full py-4 rounded-xl font-bold text-center block transition-all duration-300 {{ $package->is_popular ? 'bg-gradient-to-r from-green-600 to-green-700 text-white hover:from-green-700 hover:to-green-800 shadow-lg' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                            <i class="fas fa-arrow-right mr-2"></i>
                            Pilih Paket
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Mobile App Packages -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-purple-100 text-purple-800 mb-4">
                <i class="fas fa-mobile-alt mr-2"></i>
                Paket Mobile App
            </span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Aplikasi <span class="text-purple-600">Mobile</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                Aplikasi mobile untuk Android dan iOS dengan performa optimal dan user experience terbaik
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($mobilePackages as $package)
            <div class="group relative">
                <div class="bg-white rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-300 group-hover:-translate-y-4 border border-gray-100 relative overflow-hidden {{ $package->is_popular ? 'ring-4 ring-purple-500 scale-105' : '' }}">
                    @if($package->is_popular)
                    <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 z-10">
                        <div class="bg-gradient-to-r from-purple-400 to-purple-500 text-white text-sm font-bold px-8 py-3 rounded-full shadow-lg">
                            <i class="fas fa-crown mr-2"></i>
                            Terlaris
                        </div>
                    </div>
                    @endif
                    
                    <!-- Background Pattern -->
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-purple-50 to-violet-50 rounded-full -translate-y-16 translate-x-16 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    
                    <div class="relative z-10">
                        <div class="text-center mb-8">
                            <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ $package->name }}</h3>
                            <p class="text-gray-600 mb-6 leading-relaxed">{{ $package->description }}</p>
                            
                            <div class="mb-6">
                                <span class="text-5xl font-bold text-purple-600">{{ $package->formatted_price }}</span>
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
                        
                        <a href="{{ route('contact') }}" class="w-full py-4 rounded-xl font-bold text-center block transition-all duration-300 {{ $package->is_popular ? 'bg-gradient-to-r from-purple-600 to-purple-700 text-white hover:from-purple-700 hover:to-purple-800 shadow-lg' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                            <i class="fas fa-arrow-right mr-2"></i>
                            Pilih Paket
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Custom Package Section -->
<section class="py-24 bg-gradient-to-br from-slate-50 to-blue-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="bg-white rounded-3xl p-12 shadow-xl border border-gray-100 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-full -translate-y-16 translate-x-16"></div>
            <div class="relative z-10">
                <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-cogs text-white text-3xl"></i>
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    Butuh Paket <span class="text-blue-600">Kustom?</span>
                </h2>
                <p class="text-xl text-gray-600 mb-8 leading-relaxed">
                    Jika tidak ada paket yang sesuai dengan kebutuhan Anda, kami siap membuatkan paket khusus sesuai dengan budget dan kebutuhan bisnis Anda.
                </p>
                <div class="flex flex-col sm:flex-row gap-6 justify-center">
                    <a href="{{ route('contact') }}" class="group bg-gradient-to-r from-blue-600 to-blue-700 text-white px-10 py-4 rounded-xl text-lg font-bold hover:from-blue-700 hover:to-blue-800 transition-all duration-300 inline-flex items-center shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        <i class="fas fa-phone mr-3"></i>
                        Konsultasi Gratis
                        <i class="fas fa-arrow-right ml-3 group-hover:translate-x-1 transition-transform duration-300"></i>
                    </a>
                    <a href="{{ route('services') }}" class="group bg-transparent text-blue-600 border-2 border-blue-600 px-10 py-4 rounded-xl text-lg font-semibold hover:bg-blue-600 hover:text-white transition-all duration-300 inline-flex items-center">
                        <i class="fas fa-list mr-3"></i>
                        Lihat Layanan
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-24 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-blue-100 text-blue-800 mb-4">
                <i class="fas fa-question-circle mr-2"></i>
                FAQ
            </span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Pertanyaan <span class="text-blue-600">Umum</span>
            </h2>
            <p class="text-xl text-gray-600 leading-relaxed">
                Jawaban untuk pertanyaan yang sering diajukan
            </p>
        </div>

        <div class="space-y-6">
            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Berapa lama waktu pengerjaan proyek?</h3>
                <p class="text-gray-600 leading-relaxed">Waktu pengerjaan bervariasi tergantung kompleksitas proyek. Website sederhana biasanya selesai dalam 2-4 minggu, sedangkan aplikasi mobile bisa memakan waktu 2-6 bulan.</p>
            </div>

            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Apakah ada garansi untuk proyek yang dikerjakan?</h3>
                <p class="text-gray-600 leading-relaxed">Ya, kami memberikan garansi 3-12 bulan tergantung jenis proyek. Selama masa garansi, kami akan memperbaiki bug dan memberikan support gratis.</p>
            </div>

            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Bagaimana sistem pembayaran?</h3>
                <p class="text-gray-600 leading-relaxed">Pembayaran dapat dilakukan secara bertahap: 50% di awal, 30% saat progress 70%, dan 20% saat proyek selesai. Kami juga menerima berbagai metode pembayaran.</p>
            </div>

            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Apakah bisa request revisi?</h3>
                <p class="text-gray-600 leading-relaxed">Tentu saja! Kami memberikan kesempatan revisi sesuai dengan kebutuhan Anda. Jumlah revisi tergantung paket yang dipilih.</p>
            </div>
        </div>
    </div>
</section>
@endsection
