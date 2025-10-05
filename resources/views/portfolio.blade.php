@extends('layouts.app')

@section('title', 'Portfolio')

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
                    <i class="fas fa-briefcase mr-2 text-yellow-400"></i>
                    Portfolio Kami
                </span>
            </div>
            <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                Proyek <span class="bg-gradient-to-r from-blue-400 to-cyan-400 bg-clip-text text-transparent">Terpilih</span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-300 max-w-3xl mx-auto leading-relaxed">
                Beberapa proyek terbaik yang telah kami selesaikan untuk klien kami
            </p>
        </div>
    </div>
</section>

<!-- Portfolio Section -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($portfolios->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($portfolios as $portfolio)
            <div class="group relative">
                <div class="bg-white rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 group-hover:-translate-y-3 border border-gray-100 relative">
                    @if($portfolio->image_path)
                    <div class="aspect-w-16 aspect-h-9 relative overflow-hidden">
                        <img src="{{ Storage::url($portfolio->image_path) }}" alt="{{ $portfolio->title }}" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500">
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
                        @if($portfolio->client_name)
                        <p class="text-sm text-gray-500 mb-3">
                            <i class="fas fa-user mr-1"></i>Client: {{ $portfolio->client_name }}
                        </p>
                        @endif
                        @if($portfolio->technologies && count($portfolio->technologies) > 0)
                        <div class="flex flex-wrap gap-2 mb-4">
                            @foreach(array_slice($portfolio->technologies, 0, 3) as $tech)
                            <span class="bg-gray-100 text-gray-700 text-xs px-3 py-1 rounded-full">
                                {{ $tech }}
                            </span>
                            @endforeach
                        </div>
                        @endif
                        @if($portfolio->project_date)
                        <p class="text-xs text-gray-400">
                            <i class="fas fa-calendar mr-1"></i>{{ $portfolio->project_date->format('M Y') }}
                        </p>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-16">
            <div class="w-32 h-32 bg-gradient-to-br from-blue-100 to-indigo-100 rounded-full flex items-center justify-center mx-auto mb-8">
                <i class="fas fa-folder-open text-6xl text-blue-600"></i>
            </div>
            <h3 class="text-3xl font-bold text-gray-900 mb-4">Portfolio Belum Tersedia</h3>
            <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">Kami sedang mempersiapkan portfolio terbaik untuk ditampilkan di sini.</p>
            <a href="{{ route('contact') }}" class="group bg-gradient-to-r from-blue-600 to-blue-700 text-white px-10 py-4 rounded-xl text-lg font-bold hover:from-blue-700 hover:to-blue-800 transition-all duration-300 inline-flex items-center shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                <i class="fas fa-phone mr-3"></i>
                Hubungi Kami
                <i class="fas fa-arrow-right ml-3 group-hover:translate-x-1 transition-transform duration-300"></i>
            </a>
        </div>
        @endif
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
        <h2 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
            Ingin Proyek Anda Menjadi Bagian dari 
            <span class="block bg-gradient-to-r from-blue-400 to-cyan-400 bg-clip-text text-transparent">
                Portfolio Kami?
            </span>
        </h2>
        <p class="text-xl md:text-2xl text-gray-300 mb-12 max-w-3xl mx-auto leading-relaxed">
            Mari diskusikan proyek Anda dan wujudkan ide bisnis menjadi kenyataan
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
