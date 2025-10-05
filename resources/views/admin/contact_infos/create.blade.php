@extends('layouts.admin')

@section('page-title', isset($contactInfo) ? 'Edit Contact Info' : 'Tambah Contact Info')

@section('content')
<div class="card p-6">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-lg font-semibold text-gray-900">
            {{ isset($contactInfo) ? 'Edit Contact Info' : 'Tambah Contact Info Baru' }}
        </h3>
        <a href="{{ route('admin.contact-infos.index') }}" class="text-gray-600 hover:text-gray-900">
            <i class="fas fa-arrow-left mr-2"></i>Kembali
        </a>
    </div>

    <form action="{{ isset($contactInfo) ? route('admin.contact-infos.update', $contactInfo->id) : route('admin.contact-infos.store') }}" 
          method="POST">
        @csrf
        @if(isset($contactInfo)) @method('PUT') @endif

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="space-y-6">
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Tipe *</label>
                    <input type="text" id="type" name="type" 
                           value="{{ old('type', $contactInfo->type ?? '') }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                           required>
                    @error('type')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="label" class="block text-sm font-medium text-gray-700 mb-1">Label *</label>
                    <input type="text" id="label" name="label" 
                           value="{{ old('label', $contactInfo->label ?? '') }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                           required>
                    @error('label')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="value" class="block text-sm font-medium text-gray-700 mb-1">Value *</label>
                    <input type="text" id="value" name="value" 
                           value="{{ old('value', $contactInfo->value ?? '') }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                           required>
                    @error('value')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="icon" class="block text-sm font-medium text-gray-700 mb-1">Icon (optional)</label>
                    <div class="flex items-center space-x-3">
                        <select id="icon" name="icon" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="">-- Pilih Icon --</option>
                            <option value="fab fa-facebook-f" {{ old('icon', $contactInfo->icon ?? '') == 'fab fa-facebook-f' ? 'selected' : '' }}>📘 Facebook</option>
                            <option value="fab fa-twitter" {{ old('icon', $contactInfo->icon ?? '') == 'fab fa-twitter' ? 'selected' : '' }}>🐦 Twitter</option>
                            <option value="fab fa-instagram" {{ old('icon', $contactInfo->icon ?? '') == 'fab fa-instagram' ? 'selected' : '' }}>📸 Instagram</option>
                            <option value="fab fa-linkedin-in" {{ old('icon', $contactInfo->icon ?? '') == 'fab fa-linkedin-in' ? 'selected' : '' }}>💼 LinkedIn</option>
                            <option value="fas fa-envelope" {{ old('icon', $contactInfo->icon ?? '') == 'fas fa-envelope' ? 'selected' : '' }}>📧 Email</option>
                            <option value="fas fa-phone" {{ old('icon', $contactInfo->icon ?? '') == 'fas fa-phone' ? 'selected' : '' }}>📞 Phone</option>
                            <option value="fas fa-map-marker-alt" {{ old('icon', $contactInfo->icon ?? '') == 'fas fa-map-marker-alt' ? 'selected' : '' }}>📍 Map</option>
                        </select>

                        <!-- Preview icon -->
                        <i id="icon-preview" class="{{ old('icon', $contactInfo->icon ?? '') }} text-blue-600 text-2xl"></i>
                    </div>
                    <p class="text-sm text-gray-500 mt-1">Preview icon akan muncul di samping dropdown.</p>
                    @error('icon')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-1">Urutan</label>
                    <input type="number" id="sort_order" name="sort_order" 
                           value="{{ old('sort_order', $contactInfo->sort_order ?? 0) }}" min="0" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @error('sort_order')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center">
                    <input type="checkbox" id="is_active" name="is_active" value="1" 
                           {{ old('is_active', $contactInfo->is_active ?? true) ? 'checked' : '' }} 
                           class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="is_active" class="ml-2 block text-sm text-gray-900">
                        Aktif
                    </label>
                </div>
            </div>
        </div>

        <div class="mt-8 flex justify-end space-x-4">
            <a href="{{ route('admin.contact-infos.index') }}" class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                Batal
            </a>
            <button type="submit" class="btn-primary px-6 py-3 rounded-lg font-semibold">
                <i class="fas fa-save mr-2"></i>{{ isset($contactInfo) ? 'Simpan Perubahan' : 'Simpan Contact Info' }}
            </button>
        </div>
    </form>
</div>

<script>
    // Icon preview
    const iconSelect = document.getElementById('icon');
    const iconPreview = document.getElementById('icon-preview');

    iconSelect.addEventListener('change', function() {
        const selectedIcon = this.value;
        iconPreview.className = selectedIcon + ' text-blue-600 text-2xl';
    });
</script>
@endsection
