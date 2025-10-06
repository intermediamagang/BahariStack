@extends('layouts.app')

@section('title', 'Tim Kami')

@section('content')
<!-- Hero Section -->
<section class="relative py-24 bg-gradient-to-br from-slate-900 via-blue-900 to-slate-800 text-white overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" class="bg-gradient-to-r from-blue-500/10 to-cyan-500/10"></div>
    </div>

    <!-- Floating Elements -->
    <div class="absolute top-20 left-10 w-20 h-20 bg-blue-500 bg-opacity-20 rounded-full blur-xl"></div>
    <div class="absolute top-40 right-20 w-16 h-16 bg-cyan-400 bg-opacity-20 rounded-full blur-xl"></div>
    <div class="absolute bottom-20 left-1/4 w-24 h-24 bg-indigo-500 bg-opacity-20 rounded-full blur-xl"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <div class="max-w-4xl mx-auto">
            <div class="mb-6">
                <span class="inline-flex items-center px-6 py-3 rounded-full text-sm font-semibold bg-white bg-opacity-10 backdrop-blur-sm border border-white border-opacity-20 text-white">
                    <i class="fas fa-users mr-2 text-yellow-400"></i>
                    Tim Kami
                </span>
            </div>
            <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                Tim <span class="bg-gradient-to-r from-blue-400 to-cyan-400 bg-clip-text text-transparent">Profesional</span> Kami
            </h1>
            <p class="text-xl md:text-2xl text-gray-300 max-w-3xl mx-auto leading-relaxed">
                Tim profesional yang siap membantu mewujudkan visi digital bisnis Anda
            </p>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($teamMembers->count() > 0)

        @php
        $count = $teamMembers->count();
        $gridCols = 'grid-cols-1'; // base (mobile)

        if ($count === 2) {
        $gridCols .= ' sm:grid-cols-2 lg:grid-cols-2';
        } elseif ($count === 3) {
        $gridCols .= ' md:grid-cols-3 lg:grid-cols-3';
        } elseif ($count === 4) {
        $gridCols .= ' sm:grid-cols-2 lg:grid-cols-2'; // 2 kolom × 2 baris
        } else {
        $gridCols .= ' sm:grid-cols-2 lg:grid-cols-4'; // default
        }
        @endphp

        <div class="grid {{ $gridCols }} gap-8 items-stretch">
            @foreach($teamMembers as $member)
            <x-team.card :member="$member" />
            @endforeach
        </div>
        @else
        <div class="text-center py-16">
            <div class="w-32 h-32 bg-gradient-to-br from-blue-100 to-indigo-100 rounded-full flex items-center justify-center mx-auto mb-8">
                <i class="fas fa-users text-6xl text-blue-600"></i>
            </div>
            <h3 class="text-3xl font-bold text-gray-900 mb-4">Tim Belum Tersedia</h3>
            <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">Kami sedang mempersiapkan informasi tim terbaik untuk ditampilkan di sini.</p>
            <a href="{{ route('contact') }}" class="group bg-gradient-to-r from-blue-600 to-blue-700 text-white px-10 py-4 rounded-xl text-lg font-bold hover:from-blue-700 hover:to-blue-800 transition-all duration-300 inline-flex items-center shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                <i class="fas fa-phone mr-3"></i>
                Hubungi Kami
                <i class="fas fa-arrow-right ml-3 group-hover:translate-x-1 transition-transform duration-300"></i>
            </a>
        </div>
        @endif
    </div>
</section>

<!-- Why Our Team Section -->
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-blue-100 text-blue-800 mb-4">
                <i class="fas fa-star mr-2"></i>
                Mengapa Memilih Tim Kami
            </span>
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                Keunggulan <span class="text-blue-600">Tim Profesional</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                Tim kami terdiri dari profesional berpengalaman dengan keahlian di berbagai bidang teknologi
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="group text-center">
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 group-hover:-translate-y-2 border border-gray-100">
                    <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-graduation-cap text-white text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Berpengalaman</h3>
                    <p class="text-gray-600 leading-relaxed">Tim kami memiliki pengalaman bertahun-tahun dalam mengembangkan berbagai jenis aplikasi dan website</p>
                </div>
            </div>

            <div class="group text-center">
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 group-hover:-translate-y-2 border border-gray-100">
                    <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-lightbulb text-white text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Kreatif & Inovatif</h3>
                    <p class="text-gray-600 leading-relaxed">Kami selalu mengikuti perkembangan teknologi terbaru dan menerapkan solusi inovatif</p>
                </div>
            </div>

            <div class="group text-center">
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 group-hover:-translate-y-2 border border-gray-100">
                    <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-handshake text-white text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Kolaboratif</h3>
                    <p class="text-gray-600 leading-relaxed">Kami bekerja sebagai tim yang solid dan selalu berkomunikasi dengan klien secara transparan</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="relative py-24 bg-gradient-to-br from-slate-900 via-blue-900 to-slate-800 text-white overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" class="bg-gradient-to-r from-blue-500/10 to-cyan-500/10"></div>
    </div>

    <!-- Floating Elements -->
    <div class="absolute top-20 left-10 w-20 h-20 bg-blue-500 bg-opacity-20 rounded-full blur-xl"></div>
    <div class="absolute top-40 right-20 w-16 h-16 bg-cyan-400 bg-opacity-20 rounded-full blur-xl"></div>
    <div class="absolute bottom-20 left-1/4 w-24 h-24 bg-indigo-500 bg-opacity-20 rounded-full blur-xl"></div>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <div class="mb-6">
            <span class="inline-flex items-center px-6 py-3 rounded-full text-sm font-semibold bg-white bg-opacity-10 backdrop-blur-sm border border-white border-opacity-20 text-white">
                <i class="fas fa-handshake mr-2 text-yellow-400"></i>
                Siap Bekerja Sama?
            </span>
        </div>
        <h2 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
            Siap Bekerja Sama dengan
            <span class="block bg-gradient-to-r from-blue-400 to-cyan-400 bg-clip-text text-transparent">
                Tim Kami?
            </span>
        </h2>
        <p class="text-xl md:text-2xl text-gray-300 mb-12 max-w-3xl mx-auto leading-relaxed">
            Mari diskusikan proyek Anda dan dapatkan solusi terbaik dari tim profesional kami
        </p>
        <div class="flex flex-col sm:flex-row gap-6 justify-center">
            <a href="{{ route('contact') }}" class="group bg-gradient-to-r from-blue-600 to-blue-700 text-white px-12 py-5 rounded-xl text-xl font-bold hover:from-blue-700 hover:to-blue-800 transition-all duration-300 inline-flex items-center justify-center shadow-xl hover:shadow-2xl transform hover:-translate-y-1">
                <i class="fas fa-phone mr-3"></i>
                Hubungi Kami
                <i class="fas fa-arrow-right ml-3 group-hover:translate-x-1 transition-transform duration-300"></i>
            </a>
            <a href="{{ route('services') }}" class="group bg-transparent text-white border-2 border-white px-12 py-5 rounded-xl text-xl font-semibold hover:bg-white hover:text-slate-900 transition-all duration-300 inline-flex items-center justify-center">
                <i class="fas fa-list mr-3"></i>
                Lihat Layanan
            </a>
        </div>
    </div>
</section>
@endsection