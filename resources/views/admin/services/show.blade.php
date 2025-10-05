@extends('layouts.admin')

@section('page-title', 'Detail Layanan')

@section('content')
    <div class="card p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-semibold text-gray-900">Detail Layanan</h3>
            <div class="flex space-x-2">
                <a href="{{ route('admin.services.edit', $service) }}"
                    class="btn-primary px-4 py-2 rounded-lg font-semibold">
                    <i class="fas fa-edit mr-2"></i>Edit
                </a>
                <a href="{{ route('admin.services.index') }}" class="text-gray-600 hover:text-gray-900">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div>
                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Judul Layanan</label>
                        <p class="text-lg font-semibold text-gray-900">{{ $service->title }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                        <p class="text-gray-900 leading-relaxed">{{ $service->description }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Icon</label>
                        @if($service->icon)
                            <div class="flex items-center space-x-3">
                                <i class="{{ $service->icon }} text-blue-600 text-2xl"></i>
                                <span class="text-gray-900">{{ $service->icon }}</span>
                            </div>
                        @else
                            <p class="text-gray-500">Tidak ada icon</p>
                        @endif
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Urutan</label>
                        <p class="text-gray-900">{{ $service->sort_order }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        @if($service->is_active)
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-200 text-green-900">
                                Aktif
                            </span>
                        @else
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-200 text-red-900">
                                Tidak Aktif
                            </span>
                        @endif
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Dibuat</label>
                        <p class="text-gray-900">{{ $service->created_at->format('d M Y H:i') }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Terakhir Diupdate</label>
                        <p class="text-gray-900">{{ $service->updated_at->format('d M Y H:i') }}</p>
                    </div>
                </div>
            </div>

            <div>
                @if($service->image_path)
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Gambar Layanan</label>
                        <img src="{{ asset('storage/' . $service->image_path) }}" alt="{{ $service->title }}"
                            class="w-full h-64 object-cover border border-gray-200 rounded-lg">
                    </div>
                @else
                    <div class="text-center py-12">
                        <div class="text-6xl text-gray-400 mb-4">
                            <i class="fas fa-image"></i>
                        </div>
                        <p class="text-gray-500">Tidak ada gambar</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection