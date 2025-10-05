@extends('layouts.app')

@section('title', 'Kontak')

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
                    <i class="fas fa-phone mr-2 text-yellow-400"></i>
                    Hubungi Kami
                </span>
            </div>
            <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                Mari <span class="bg-gradient-to-r from-blue-400 to-cyan-400 bg-clip-text text-transparent">Diskusikan</span> Proyek Anda
            </h1>
            <p class="text-xl md:text-2xl text-gray-300 max-w-3xl mx-auto leading-relaxed">
                Siap membantu mewujudkan ide bisnis digital Anda. Mari diskusikan proyek Anda bersama kami
            </p>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            <!-- Contact Info -->
            <div>
                <div class="mb-8">
                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-blue-100 text-blue-800 mb-4">
                        <i class="fas fa-info-circle mr-2"></i>
                        Informasi Kontak
                    </span>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                        Hubungi <span class="text-blue-600">Tim Kami</span>
                    </h2>
                    <p class="text-xl text-gray-600 leading-relaxed">
                        Kami siap membantu mewujudkan ide bisnis digital Anda. Hubungi kami untuk konsultasi gratis.
                    </p>
                </div>
                
                <div class="space-y-8">
                    @foreach($contactInfos as $contact)
                    <div class="group flex items-start space-x-6">
                        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                            <i class="{{ $contact->icon }} text-white text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $contact->label }}</h3>
                            <p class="text-gray-600 text-lg">{{ $contact->value }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Social Media -->
                @if($brandSetting->social_media ?? false)
                <div class="mt-12">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Ikuti Kami</h3>
                    <div class="flex space-x-4">
                        @foreach($brandSetting->social_media as $platform => $url)
                        <a href="{{ $url }}" target="_blank" class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center hover:scale-110 transition-all duration-300 shadow-lg hover:shadow-xl">
                            <i class="fab fa-{{ $platform }} text-white text-xl"></i>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            <!-- Contact Form -->
            <div>
                <div class="bg-white rounded-3xl p-10 shadow-xl border border-gray-100 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-full -translate-y-16 translate-x-16"></div>
                    <div class="relative z-10">
                        <h2 class="text-3xl font-bold text-gray-900 mb-8">Kirim Pesan</h2>
                        
                        <form action="#" method="POST" class="space-y-6">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="name" class="block text-sm font-bold text-gray-700 mb-3">Nama Lengkap</label>
                                    <input type="text" id="name" name="name" required class="w-full px-4 py-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent text-lg">
                                </div>
                                <div>
                                    <label for="email" class="block text-sm font-bold text-gray-700 mb-3">Email</label>
                                    <input type="email" id="email" name="email" required class="w-full px-4 py-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent text-lg">
                                </div>
                            </div>
                            
                            <div>
                                <label for="phone" class="block text-sm font-bold text-gray-700 mb-3">Nomor Telepon</label>
                                <input type="tel" id="phone" name="phone" class="w-full px-4 py-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent text-lg">
                            </div>
                            
                            <div>
                                <label for="service" class="block text-sm font-bold text-gray-700 mb-3">Jenis Layanan</label>
                                <select id="service" name="service" class="w-full px-4 py-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent text-lg">
                                    <option value="">Pilih Layanan</option>
                                    <option value="website">Website Development</option>
                                    <option value="software">Software Development</option>
                                    <option value="mobile">Mobile App Development</option>
                                    <option value="uiux">UI/UX Design</option>
                                    <option value="marketing">Digital Marketing</option>
                                    <option value="other">Lainnya</option>
                                </select>
                            </div>
                            
                            <div>
                                <label for="budget" class="block text-sm font-bold text-gray-700 mb-3">Budget (Opsional)</label>
                                <select id="budget" name="budget" class="w-full px-4 py-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent text-lg">
                                    <option value="">Pilih Range Budget</option>
                                    <option value="<5jt">< Rp 5 Juta</option>
                                    <option value="5-10jt">Rp 5 - 10 Juta</option>
                                    <option value="10-25jt">Rp 10 - 25 Juta</option>
                                    <option value="25-50jt">Rp 25 - 50 Juta</option>
                                    <option value=">50jt">> Rp 50 Juta</option>
                                </select>
                            </div>
                            
                            <div>
                                <label for="message" class="block text-sm font-bold text-gray-700 mb-3">Pesan</label>
                                <textarea id="message" name="message" rows="5" required class="w-full px-4 py-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent text-lg" placeholder="Ceritakan tentang proyek Anda..."></textarea>
                            </div>
                            
                            <button type="submit" class="group bg-gradient-to-r from-blue-600 to-blue-700 text-white w-full py-4 rounded-xl font-bold text-lg hover:from-blue-700 hover:to-blue-800 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                <i class="fas fa-paper-plane mr-3"></i>
                                Kirim Pesan
                                <i class="fas fa-arrow-right ml-3 group-hover:translate-x-1 transition-transform duration-300"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-24 bg-gray-50">
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
                <p class="text-gray-600 leading-relaxed">Waktu pengerjaan bervariasi tergantung kompleksitas proyek. Website sederhana biasanya selesai dalam 2-4 minggu, sedangkan aplikasi mobile bisa memakan waktu 2-6 bulan. Kami akan memberikan estimasi waktu yang akurat setelah diskusi detail kebutuhan proyek.</p>
            </div>

            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Bagaimana sistem pembayaran?</h3>
                <p class="text-gray-600 leading-relaxed">Pembayaran dapat dilakukan secara bertahap: 50% di awal, 30% saat progress 70%, dan 20% saat proyek selesai. Kami juga menerima berbagai metode pembayaran seperti transfer bank, e-wallet, dan kartu kredit.</p>
            </div>

            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Apakah ada garansi untuk proyek yang dikerjakan?</h3>
                <p class="text-gray-600 leading-relaxed">Ya, kami memberikan garansi 3-12 bulan tergantung jenis proyek. Selama masa garansi, kami akan memperbaiki bug dan memberikan support gratis. Kami juga menyediakan maintenance berkelanjutan dengan paket khusus.</p>
            </div>

            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Apakah bisa request revisi?</h3>
                <p class="text-gray-600 leading-relaxed">Tentu saja! Kami memberikan kesempatan revisi sesuai dengan kebutuhan Anda. Jumlah revisi tergantung paket yang dipilih. Kami akan memastikan hasil akhir sesuai dengan ekspektasi Anda.</p>
            </div>

            <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Bagaimana proses konsultasi awal?</h3>
                <p class="text-gray-600 leading-relaxed">Konsultasi awal dilakukan secara gratis melalui meeting online atau offline. Kami akan mendiskusikan kebutuhan, tujuan, dan budget proyek Anda. Setelah itu, kami akan memberikan proposal detail dengan timeline dan estimasi biaya.</p>
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
        <h2 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
            Siap Memulai Proyek 
            <span class="block bg-gradient-to-r from-blue-400 to-cyan-400 bg-clip-text text-transparent">
                Digital Anda?
            </span>
        </h2>
        <p class="text-xl md:text-2xl text-gray-300 mb-12 max-w-3xl mx-auto leading-relaxed">
            Jangan ragu untuk menghubungi kami. Tim kami siap membantu mewujudkan visi digital bisnis Anda.
        </p>
        <div class="flex flex-col sm:flex-row gap-6 justify-center">
            <a href="tel:{{ $contactInfos->where('type', 'phone')->first()->value ?? '' }}" class="group bg-gradient-to-r from-blue-600 to-blue-700 text-white px-12 py-5 rounded-xl text-xl font-bold hover:from-blue-700 hover:to-blue-800 transition-all duration-300 inline-flex items-center justify-center shadow-xl hover:shadow-2xl transform hover:-translate-y-1">
                <i class="fas fa-phone mr-3"></i>
                Telepon Sekarang
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
