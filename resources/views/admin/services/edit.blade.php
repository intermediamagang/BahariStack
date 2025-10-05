@extends('layouts.admin')

@section('page-title', 'Edit Layanan')

@section('content')
<div class="card p-6">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-lg font-semibold text-gray-900">Edit Layanan</h3>
        <a href="{{ route('admin.services.index') }}" class="text-gray-600 hover:text-gray-900">
            <i class="fas fa-arrow-left mr-2"></i>Kembali
        </a>
    </div>

    <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div>
                <div class="space-y-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul Layanan *</label>
                        <input type="text" id="title" name="title" value="{{ old('title', $service->title) }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi *</label>
                        <textarea id="description" name="description" rows="4" 
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>{{ old('description', $service->description) }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="icon" class="block text-sm font-medium text-gray-700 mb-1">Pilih Icon</label>
                        <div class="flex items-center space-x-3">
                            <select id="icon" name="icon"
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="">-- Pilih Icon --</option>
                                <option value="fas fa-globe" {{ old('icon') == 'fas fa-globe' ? 'selected' : '' }}>🌐 Globe</option>
                                <option value="fas fa-laptop-code" {{ old('icon') == 'fas fa-laptop-code' ? 'selected' : '' }}>💻 Laptop Code</option>
                                <option value="fas fa-mobile-alt" {{ old('icon') == 'fas fa-mobile-alt' ? 'selected' : '' }}>📱 Mobile</option>
                                <option value="fas fa-user-friends" {{ old('icon') == 'fas fa-user-friends' ? 'selected' : '' }}>👥 User Group</option>
                                <option value="fas fa-briefcase" {{ old('icon') == 'fas fa-briefcase' ? 'selected' : '' }}>💼 Briefcase</option>
                                <option value="fas fa-chart-line" {{ old('icon') == 'fas fa-chart-line' ? 'selected' : '' }}>📈 Chart</option>
                                <option value="fas fa-cogs" {{ old('icon') == 'fas fa-cogs' ? 'selected' : '' }}>⚙️ Settings</option>
                            </select>

                            <!-- Preview icon -->
                            <i id="icon-preview" class="{{ old('icon') }} text-blue-600 text-2xl"></i>
                        </div>
                        <p class="text-sm text-gray-500 mt-1">Preview icon akan muncul di samping dropdown.</p>

                        @error('icon')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-1">Urutan</label>
                        <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', $service->sort_order) }}" min="0" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('sort_order')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $service->is_active) ? 'checked' : '' }} 
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="is_active" class="ml-2 block text-sm text-gray-900">
                            Aktif
                        </label>
                    </div>
                </div>
            </div>

            <div>
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Gambar Layanan</label>
                    @if($service->image_path)
                        <div class="mb-2">
                            <label class="block text-sm text-gray-600 mb-1">Gambar Saat Ini:</label>
                            <img src="{{ asset('storage/' . $service->image_path) }}" alt="Current Image" class="w-full h-48 object-cover border border-gray-200 rounded-lg">
                        </div>
                    @endif
                    <input type="file" id="image" name="image" accept="image/*" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <p class="text-sm text-gray-500 mt-1">Format: JPG, PNG, GIF, SVG. Maksimal 2MB</p>
                    @error('image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Preview -->
                <div id="image-preview" class="mt-4 hidden">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Preview Gambar Baru:</label>
                    <img id="preview-img" class="w-full h-48 object-cover border border-gray-200 rounded-lg">
                </div>
            </div>
        </div>

        <div class="mt-8 flex justify-end space-x-4">
            <a href="{{ route('admin.services.index') }}" class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                Batal
            </a>
            <button type="submit" class="btn-primary px-6 py-3 rounded-lg font-semibold">
                <i class="fas fa-save mr-2"></i>Simpan Perubahan
            </button>
        </div>
    </form>
</div>

<script>
    // Image preview
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview-img').src = e.target.result;
                document.getElementById('image-preview').classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        } else {
            document.getElementById('image-preview').classList.add('hidden');
        }
    });

    // Icon preview
    const iconSelect = document.getElementById('icon');
    const iconPreview = document.getElementById('icon-preview');

    iconSelect.addEventListener('change', function() {
        const selectedIcon = this.value;
        iconPreview.className = selectedIcon + ' text-blue-600 text-2xl';
    });
</script>
@endsection
