@extends('layouts.admin')

@section('page-title', 'Brand Settings')

@section('content')
<div class="card p-6">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-lg font-semibold text-gray-900">Brand Settings</h3>
        <a href="{{ route('admin.brand-settings.edit', $brandSetting) }}" class="btn-primary px-4 py-2 rounded-lg font-semibold">
            <i class="fas fa-edit mr-2"></i>Edit Settings
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Company Info -->
        <div>
            <h4 class="text-md font-semibold text-gray-900 mb-4">Informasi Perusahaan</h4>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Perusahaan</label>
                    <p class="text-gray-900">{{ $brandSetting->company_name }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                    <p class="text-gray-900">{{ $brandSetting->description }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <p class="text-gray-900">{{ $brandSetting->email ?? '-' }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Telepon</label>
                    <p class="text-gray-900">{{ $brandSetting->phone ?? '-' }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                    <p class="text-gray-900">{{ $brandSetting->address ?? '-' }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Website</label>
                    <p class="text-gray-900">{{ $brandSetting->website ?? '-' }}</p>
                </div>
            </div>
        </div>

        <!-- Media & Social -->
        <div>
            <h4 class="text-md font-semibold text-gray-900 mb-4">Media & Social</h4>
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Logo</label>
                    @if($brandSetting->logo_path)
                        <img src="{{ asset('storage/' . $brandSetting->logo_path) }}" alt="Logo" class="w-32 h-32 object-contain border border-gray-200 rounded">
                    @else
                        <p class="text-gray-500">Belum ada logo</p>
                    @endif
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Favicon</label>
                    @if($brandSetting->favicon_path)
                        <img src="{{ asset('storage/' . $brandSetting->favicon_path) }}" alt="Favicon" class="w-16 h-16 object-contain border border-gray-200 rounded">
                    @else
                        <p class="text-gray-500">Belum ada favicon</p>
                    @endif
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Social Media</label>
                    @if($brandSetting->social_media)
                        <div class="space-y-2">
                            @foreach($brandSetting->social_media as $platform => $url)
                            <div class="flex items-center space-x-2">
                                <i class="fab fa-{{ $platform }} text-blue-600"></i>
                                <a href="{{ $url }}" target="_blank" class="text-blue-600 hover:text-blue-800">{{ $url }}</a>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-500">Belum ada social media</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
