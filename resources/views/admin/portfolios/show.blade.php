@extends('layouts.admin')

@section('page-title', 'Detail Portfolio')

@section('content')
<div class="max-w-7xl mx-auto py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-900">Detail Portfolio</h1>
        <div class="flex space-x-2">
            <a href="{{ route('admin.portfolios.edit', $portfolio) }}" 
               class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 flex items-center">
                <i class="fas fa-edit mr-2"></i>Edit
            </a>
            <a href="{{ route('admin.portfolios.index') }}" 
               class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Kiri: Info Portfolio -->
        <div class="lg:col-span-2 space-y-4">
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-lg font-semibold mb-4">Informasi Portfolio</h2>

                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <p class="font-medium text-gray-700">Judul</p>
                        <p class="text-gray-900">{{ $portfolio->title }}</p>
                    </div>
                    <div>
                        <p class="font-medium text-gray-700">Kategori</p>
                        <span class="inline-block bg-blue-200 text-blue-800 px-2 py-1 rounded">
                            {{ ucfirst(str_replace('_', ' ', $portfolio->category)) }}
                        </span>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <p class="font-medium text-gray-700">Nama Klien</p>
                        <p class="text-gray-900">{{ $portfolio->client_name ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="font-medium text-gray-700">Tanggal Proyek</p>
                        <p class="text-gray-900">{{ $portfolio->project_date ? $portfolio->project_date->format('d M Y') : '-' }}</p>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <p class="font-medium text-gray-700">URL Proyek</p>
                        @if($portfolio->project_url)
                            <a href="{{ $portfolio->project_url }}" target="_blank" class="text-blue-600 hover:underline flex items-center">
                                {{ $portfolio->project_url }} <i class="fas fa-external-link-alt ml-1"></i>
                            </a>
                        @else
                            <p class="text-gray-900">-</p>
                        @endif
                    </div>
                    <div>
                        <p class="font-medium text-gray-700">Urutan Tampil</p>
                        <p class="text-gray-900">{{ $portfolio->sort_order }}</p>
                    </div>
                </div>

                <div class="mb-4">
                    <p class="font-medium text-gray-700">Deskripsi</p>
                    <p class="text-gray-900">{{ $portfolio->description }}</p>
                </div>

                @if($portfolio->technologies && count($portfolio->technologies) > 0)
                <div class="mb-4">
                    <p class="font-medium text-gray-700 mb-2">Teknologi yang Digunakan</p>
                    <div class="flex flex-wrap gap-2">
                        @foreach($portfolio->technologies as $tech)
                            <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded">{{ $tech }}</span>
                        @endforeach
                    </div>
                </div>
                @endif

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="font-medium text-gray-700">Status</p>
                        <span class="px-2 py-1 rounded {{ $portfolio->is_active ? 'bg-green-200 text-green-800' : 'bg-gray-200 text-gray-800' }}">
                            {{ $portfolio->is_active ? 'Aktif' : 'Tidak Aktif' }}
                        </span>
                    </div>
                    <div>
                        <p class="font-medium text-gray-700">Featured</p>
                        <span class="px-2 py-1 rounded {{ $portfolio->is_featured ? 'bg-yellow-200 text-yellow-800' : 'bg-gray-100 text-gray-800' }}">
                            {{ $portfolio->is_featured ? 'Ya' : 'Tidak' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kanan: Gambar & Aksi -->
        <div class="space-y-4">
            <!-- Gambar Portfolio -->
            <div class="bg-white shadow rounded-lg p-4 text-center">
                <h2 class="text-lg font-semibold mb-4">Gambar Portfolio</h2>
                @if($portfolio->image_path)
                    <img src="{{ asset('storage/' . $portfolio->image_path) }}" alt="{{ $portfolio->title }}" class="w-full h-64 object-cover rounded-lg shadow">
                @else
                    <div class="bg-gray-100 p-16 rounded text-gray-400 flex flex-col items-center justify-center">
                        <i class="fas fa-image fa-3x"></i>
                        <p class="mt-2">Tidak ada gambar</p>
                    </div>
                @endif
            </div>

            <!-- Aksi -->
            <div class="bg-white shadow rounded-lg p-4">
                <h2 class="text-lg font-semibold mb-4">Aksi</h2>
                <div class="flex flex-col gap-2">
                    <a href="{{ route('admin.portfolios.edit', $portfolio) }}" 
                       class="w-full px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 flex items-center justify-center">
                        <i class="fas fa-edit mr-2"></i>Edit Portfolio
                    </a>
                    <form action="{{ route('admin.portfolios.destroy', $portfolio) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus portfolio ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 flex items-center justify-center">
                            <i class="fas fa-trash mr-2"></i>Hapus Portfolio
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
