@extends('layouts.admin')

@section('page-title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Stats Cards -->
    <div class="card p-6">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-briefcase text-blue-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600">Total Layanan</p>
                <p class="text-2xl font-semibold text-gray-900">{{ \App\Models\Service::count() }}</p>
            </div>
        </div>
    </div>

    <div class="card p-6">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-box text-green-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600">Total Paket</p>
                <p class="text-2xl font-semibold text-gray-900">{{ \App\Models\Package::count() }}</p>
            </div>
        </div>
    </div>

    <div class="card p-6">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-folder-open text-purple-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600">Total Portfolio</p>
                <p class="text-2xl font-semibold text-gray-900">{{ \App\Models\Portfolio::count() }}</p>
            </div>
        </div>
    </div>

    <div class="card p-6">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-users text-orange-600 text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600">Total Tim</p>
                <p class="text-2xl font-semibold text-gray-900">{{ \App\Models\TeamMember::count() }}</p>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <!-- Recent Activities -->
    <div class="card p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Aktivitas Terbaru</h3>
        <div class="space-y-4">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-plus text-blue-600 text-sm"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-900">Data berhasil diisi</p>
                    <p class="text-xs text-gray-500">Seeder berhasil dijalankan</p>
                </div>
            </div>
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-check text-green-600 text-sm"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-900">Website siap digunakan</p>
                    <p class="text-xs text-gray-500">Semua halaman telah dibuat</p>
                </div>
            </div>
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-cog text-purple-600 text-sm"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-900">Admin panel aktif</p>
                    <p class="text-xs text-gray-500">Sistem admin siap digunakan</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="card p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Aksi Cepat</h3>
        <div class="space-y-3">
            <a href="{{ route('admin.brand-settings.index') }}" class="flex items-center space-x-3 p-3 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors">
                <i class="fas fa-cog text-blue-600"></i>
                <span class="text-blue-900 font-medium">Kelola Brand Settings</span>
            </a>
            <a href="{{ route('admin.services.create') }}" class="flex items-center space-x-3 p-3 bg-green-50 rounded-lg hover:bg-green-100 transition-colors">
                <i class="fas fa-plus text-green-600"></i>
                <span class="text-green-900 font-medium">Tambah Layanan Baru</span>
            </a>
            <a href="{{ route('admin.packages.create') }}" class="flex items-center space-x-3 p-3 bg-purple-50 rounded-lg hover:bg-purple-100 transition-colors">
                <i class="fas fa-plus text-purple-600"></i>
                <span class="text-purple-900 font-medium">Tambah Paket Baru</span>
            </a>
            <a href="{{ route('admin.portfolios.create') }}" class="flex items-center space-x-3 p-3 bg-orange-50 rounded-lg hover:bg-orange-100 transition-colors">
                <i class="fas fa-plus text-orange-600"></i>
                <span class="text-orange-900 font-medium">Tambah Portfolio Baru</span>
            </a>
        </div>
    </div>
</div>

<!-- Data Overview -->
<div class="mt-8">
    <div class="card p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-6">Ringkasan Data</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="text-center">
                <div class="text-3xl font-bold text-blue-600 mb-2">{{ \App\Models\Service::active()->count() }}</div>
                <div class="text-sm text-gray-600">Layanan Aktif</div>
            </div>
            <div class="text-center">
                <div class="text-3xl font-bold text-green-600 mb-2">{{ \App\Models\Package::active()->count() }}</div>
                <div class="text-sm text-gray-600">Paket Aktif</div>
            </div>
            <div class="text-center">
                <div class="text-3xl font-bold text-purple-600 mb-2">{{ \App\Models\Portfolio::active()->count() }}</div>
                <div class="text-sm text-gray-600">Portfolio Aktif</div>
            </div>
            <div class="text-center">
                <div class="text-3xl font-bold text-orange-600 mb-2">{{ \App\Models\TeamMember::active()->count() }}</div>
                <div class="text-sm text-gray-600">Tim Aktif</div>
            </div>
        </div>
    </div>
</div>

<!-- Website Preview -->
<div class="mt-8">
    <div class="card p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-4">Preview Website</h3>
        <p class="text-gray-600 mb-4">Lihat bagaimana website Anda terlihat di mata pengunjung</p>
        <a href="{{ route('home') }}" target="_blank" class="btn-primary px-6 py-3 rounded-lg font-semibold inline-flex items-center">
            <i class="fas fa-external-link-alt mr-2"></i>
            Lihat Website
        </a>
    </div>
</div>
@endsection
