@extends('layouts.admin')

@section('page-title', 'Edit Brand Settings')

@section('content')
<div class="card p-6">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-lg font-semibold text-gray-900">Edit Brand Settings</h3>
        <a href="{{ route('admin.brand-settings.index') }}" class="text-gray-600 hover:text-gray-900">
            <i class="fas fa-arrow-left mr-2"></i>Kembali
        </a>
    </div>

    <form action="{{ route('admin.brand-settings.update', $brandSetting) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Company Info -->
            <div>
                <h4 class="text-md font-semibold text-gray-900 mb-4">Informasi Perusahaan</h4>
                <div class="space-y-4">
                    <div>
                        <label for="company_name" class="block text-sm font-medium text-gray-700 mb-1">Nama Perusahaan *</label>
                        <input type="text" id="company_name" name="company_name" value="{{ old('company_name', $brandSetting->company_name) }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                        @error('company_name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi *</label>
                        <textarea id="description" name="description" rows="4" 
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>{{ old('description', $brandSetting->description) }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $brandSetting->email) }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Telepon</label>
                        <input type="text" id="phone" name="phone" value="{{ old('phone', $brandSetting->phone) }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('phone')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                        <input type="text" id="address" name="address" value="{{ old('address', $brandSetting->address) }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('address')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="website" class="block text-sm font-medium text-gray-700 mb-1">Website</label>
                        <input type="url" id="website" name="website" value="{{ old('website', $brandSetting->website) }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('website')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Media & Social -->
            <div>
                <h4 class="text-md font-semibold text-gray-900 mb-4">Media & Social</h4>
                <div class="space-y-4">
                    <div>
                        <label for="logo" class="block text-sm font-medium text-gray-700 mb-1">Logo</label>
                        @if($brandSetting->logo_path)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $brandSetting->logo_path) }}" alt="Current Logo" class="w-32 h-32 object-contain border border-gray-200 rounded">
                            </div>
                        @endif
                        <input type="file" id="logo" name="logo" accept="image/*" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('logo')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Favicon --}}
                    <div>
                        <label for="favicon" class="block text-sm font-medium text-gray-700 mb-1">Favicon</label>
                        <div class="mb-2">
                            <img id="favicon-preview" 
                                 src="{{ $brandSetting->favicon_path ? asset('storage/' . $brandSetting->favicon_path) : 'https://via.placeholder.com/64?text=Favicon' }}" 
                                 alt="Preview Favicon" 
                                 class="w-16 h-16 object-contain border border-gray-200 rounded">
                        </div>
                        <input type="file" id="favicon" name="favicon" accept="image/*"
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('favicon')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Social Media --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Social Media</label>
                        <div class="space-y-3">
                            @php
                                $social = $brandSetting->social_media ?? [];
                            @endphp

                            <div>
                                <label for="social_facebook" class="block text-sm text-gray-600 mb-1">Facebook</label>
                                <input type="url" id="social_facebook" name="social_facebook" 
                                       value="{{ old('social_facebook', $social['facebook'] ?? '') }}" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                            <div>
                                <label for="social_instagram" class="block text-sm text-gray-600 mb-1">Instagram</label>
                                <input type="url" id="social_instagram" name="social_instagram" 
                                       value="{{ old('social_instagram', $social['instagram'] ?? '') }}" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                            <div>
                                <label for="social_linkedin" class="block text-sm text-gray-600 mb-1">LinkedIn</label>
                                <input type="url" id="social_linkedin" name="social_linkedin" 
                                       value="{{ old('social_linkedin', $social['linkedin'] ?? '') }}" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                            <div>
                                <label for="social_twitter" class="block text-sm text-gray-600 mb-1">Twitter</label>
                                <input type="url" id="social_twitter" name="social_twitter" 
                                       value="{{ old('social_twitter', $social['twitter'] ?? '') }}" 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8 flex justify-end space-x-4">
            <a href="{{ route('admin.brand-settings.index') }}" class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                Batal
            </a>
            <button type="submit" class="btn-primary px-6 py-3 rounded-lg font-semibold">
                <i class="fas fa-save mr-2"></i>Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection

{{-- Pindahkan script ke section js agar layout memuatnya dengan benar --}}
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('favicon');
    const preview = document.getElementById('favicon-preview');

    input.addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = e => preview.src = e.target.result;
            reader.readAsDataURL(file);
        } else {
            preview.src = "{{ $brandSetting->favicon_path ? asset('storage/' . $brandSetting->favicon_path) : 'https://via.placeholder.com/64?text=Favicon' }}";
        }
    });
});
</script>
@endpush
