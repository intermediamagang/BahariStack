@extends('layouts.app')

@section('title', 'Layanan Kami')

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
                    <i class="fas fa-cogs mr-2 text-yellow-400"></i>
                    Layanan Kami
                </span>
            </div>
            <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                Solusi Teknologi <span class="bg-gradient-to-r from-blue-400 to-cyan-400 bg-clip-text text-transparent">Lengkap</span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-300 max-w-3xl mx-auto leading-relaxed">
                Kami menyediakan berbagai layanan teknologi terdepan untuk membantu bisnis Anda berkembang di era digital
            </p>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-blue-100 text-blue-800 mb-4">
                <i class="fas fa-star mr-2"></i>
                Layanan Unggulan
            </span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Solusi <span class="text-blue-600">Terbaik</span> untuk Bisnis Anda
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                Kami menyediakan layanan teknologi terdepan dengan kualitas terjamin dan support 24/7
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $service)
            <div class="group relative">
                <div class="bg-white rounded-3xl p-8 shadow-xl hover:shadow-2xl transition-all duration-300 group-hover:-translate-y-3 border border-gray-100 relative overflow-hidden">
                    <!-- Background Gradient -->
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-full -translate-y-16 translate-x-16 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    
                    <div class="relative z-10">
                        <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <i class="{{ $service->icon }} text-white text-3xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-blue-600 transition-colors duration-300">{{ $service->title }}</h3>
                        <p class="text-gray-600 leading-relaxed mb-6">{{ $service->description }}</p>
                        <div class="flex items-center text-blue-600 font-semibold group-hover:text-blue-700 transition-colors duration-300">
                            <span class="text-sm">Pelajari Lebih Lanjut</span>
                            <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform duration-300"></i>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="py-24 bg-gradient-to-br from-slate-50 to-blue-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-blue-100 text-blue-800 mb-4">
                <i class="fas fa-heart mr-2"></i>
                Mengapa Memilih Kami
            </span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Keunggulan <span class="text-blue-600">BahariStack</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                Kami berkomitmen memberikan layanan terbaik dengan standar kualitas tinggi dan pengalaman yang terpercaya
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="group text-center">
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 group-hover:-translate-y-2 border border-gray-100">
                    <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-award text-white text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Kualitas Terjamin</h3>
                    <p class="text-gray-600 leading-relaxed">Kami menggunakan teknologi terdepan dan standar kualitas tinggi dalam setiap proyek</p>
                </div>
            </div>

            <div class="group text-center">
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 group-hover:-translate-y-2 border border-gray-100">
                    <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-clock text-white text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Tepat Waktu</h3>
                    <p class="text-gray-600 leading-relaxed">Kami berkomitmen menyelesaikan proyek sesuai dengan timeline yang telah disepakati</p>
                </div>
            </div>

            <div class="group text-center">
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 group-hover:-translate-y-2 border border-gray-100">
                    <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-headset text-white text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Support 24/7</h3>
                    <p class="text-gray-600 leading-relaxed">Tim support kami siap membantu Anda kapan saja untuk memastikan kelancaran operasional</p>
                </div>
            </div>

            <div class="group text-center">
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 group-hover:-translate-y-2 border border-gray-100">
                    <div class="w-20 h-20 bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-dollar-sign text-white text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Harga Kompetitif</h3>
                    <p class="text-gray-600 leading-relaxed">Kami menawarkan harga yang kompetitif dengan kualitas layanan yang tidak diragukan</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Process Section -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-blue-100 text-blue-800 mb-4">
                <i class="fas fa-cogs mr-2"></i>
                Proses Kerja
            </span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Alur Kerja <span class="text-blue-600">Profesional</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                Kami mengikuti proses yang terstruktur dan teruji untuk memastikan hasil yang optimal
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="group text-center relative">
                <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 group-hover:-translate-y-2 border border-gray-100 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-full -translate-y-16 translate-x-16 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative z-10">
                        <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <span class="text-white text-2xl font-bold">1</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Konsultasi</h3>
                        <p class="text-gray-600 leading-relaxed">Diskusi kebutuhan dan tujuan proyek Anda dengan tim ahli kami</p>
                    </div>
                </div>
            </div>

            <div class="group text-center relative">
                <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 group-hover:-translate-y-2 border border-gray-100 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-green-50 to-emerald-50 rounded-full -translate-y-16 translate-x-16 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative z-10">
                        <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <span class="text-white text-2xl font-bold">2</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Perencanaan</h3>
                        <p class="text-gray-600 leading-relaxed">Membuat rencana detail dan timeline proyek yang jelas</p>
                    </div>
                </div>
            </div>

            <div class="group text-center relative">
                <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 group-hover:-translate-y-2 border border-gray-100 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-purple-50 to-violet-50 rounded-full -translate-y-16 translate-x-16 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative z-10">
                        <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <span class="text-white text-2xl font-bold">3</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Pengembangan</h3>
                        <p class="text-gray-600 leading-relaxed">Proses pengembangan dengan update berkala dan komunikasi yang transparan</p>
                    </div>
                </div>
            </div>

            <div class="group text-center relative">
                <div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 group-hover:-translate-y-2 border border-gray-100 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-orange-50 to-amber-50 rounded-full -translate-y-16 translate-x-16 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative z-10">
                        <div class="w-20 h-20 bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <span class="text-white text-2xl font-bold">4</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Launch & Support</h3>
                        <p class="text-gray-600 leading-relaxed">Peluncuran dan dukungan berkelanjutan untuk kesuksesan jangka panjang</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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
    
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <div class="mb-6">
            <span class="inline-flex items-center px-6 py-3 rounded-full text-sm font-semibold bg-white bg-opacity-10 backdrop-blur-sm border border-white border-opacity-20 text-white">
                <i class="fas fa-rocket mr-2 text-yellow-400"></i>
                Siap Memulai Proyek?
            </span>
        </div>
        <h2 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">
            Mari Wujudkan Ide Bisnis Anda
            <span class="block bg-gradient-to-r from-blue-400 to-cyan-400 bg-clip-text text-transparent">
                Bersama Kami
            </span>
        </h2>
        <p class="text-xl md:text-2xl text-gray-300 mb-12 max-w-3xl mx-auto leading-relaxed">
            Hubungi kami untuk konsultasi gratis dan dapatkan solusi terbaik untuk kebutuhan bisnis Anda
        </p>
        <div class="flex flex-col sm:flex-row gap-6 justify-center">
            <a href="{{ route('contact') }}" class="group bg-gradient-to-r from-blue-600 to-blue-700 text-white px-12 py-5 rounded-xl text-xl font-bold hover:from-blue-700 hover:to-blue-800 transition-all duration-300 inline-flex items-center justify-center shadow-xl hover:shadow-2xl transform hover:-translate-y-1">
                <i class="fas fa-phone mr-3"></i>
                Hubungi Kami
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
