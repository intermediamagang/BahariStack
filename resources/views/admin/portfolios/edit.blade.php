@extends('layouts.admin')

@section('page-title', 'Edit Portfolio')

@section('content')
<div class="card p-6">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-lg font-semibold text-gray-900">Edit Portfolio</h3>
        <a href="{{ route('admin.portfolios.index') }}" 
           class="text-blue-600 hover:text-blue-900 font-medium flex items-center">
            <i class="fas fa-arrow-left mr-2"></i>Kembali
        </a>
    </div>

    <form action="{{ route('admin.portfolios.update', $portfolio) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Kiri / Form Utama -->
            <div class="lg:col-span-2 space-y-4">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul Portfolio *</label>
                    <input type="text" id="title" name="title" 
                           value="{{ old('title', $portfolio->title) }}" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                           required>
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi *</label>
                    <textarea id="description" name="description" rows="4" 
                              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                              required>{{ old('description', $portfolio->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Kategori *</label>
                        <select id="category" name="category" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                                required>
                            <option value="">Pilih Kategori</option>
                            <option value="website" {{ old('category', $portfolio->category) == 'website' ? 'selected' : '' }}>Website</option>
                            <option value="software" {{ old('category', $portfolio->category) == 'software' ? 'selected' : '' }}>Software</option>
                            <option value="mobile_app" {{ old('category', $portfolio->category) == 'mobile_app' ? 'selected' : '' }}>Mobile App</option>
                        </select>
                        @error('category')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="client_name" class="block text-sm font-medium text-gray-700 mb-1">Nama Klien</label>
                        <input type="text" id="client_name" name="client_name" 
                               value="{{ old('client_name', $portfolio->client_name) }}" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        @error('client_name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="project_url" class="block text-sm font-medium text-gray-700 mb-1">URL Proyek</label>
                    <input type="url" id="project_url" name="project_url" 
                           value="{{ old('project_url', $portfolio->project_url) }}" 
                           placeholder="https://example.com" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @error('project_url')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="technologies" class="block text-sm font-medium text-gray-700 mb-1">Teknologi yang Digunakan</label>
                    <input type="text" id="technologies" name="technologies" 
                           value="{{ old('technologies', $portfolio->technologies ? implode(', ', $portfolio->technologies) : '') }}"
                           placeholder="Laravel, Vue.js, MySQL" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <p class="text-gray-500 text-sm mt-1">Pisahkan setiap teknologi dengan koma</p>
                    @error('technologies')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Kanan / Sidebar Form -->
            <div class="space-y-4">
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Gambar Portfolio</label>
                    <input type="file" id="image" name="image" accept="image/*" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <p class="text-gray-500 text-sm mt-1">Format: JPG, PNG, GIF, SVG. Maksimal 2MB. Kosongkan jika tidak ingin mengubah gambar.</p>

                    <!-- Preview Gambar -->
                    <div id="image-preview" class="mt-2 {{ $portfolio->image_path ? '' : 'hidden' }}">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Preview</label>
                        <img id="preview-img" 
                             class="w-full h-48 object-cover rounded-lg border border-gray-200"
                             src="{{ $portfolio->image_path ? asset('storage/'.$portfolio->image_path) : '' }}">
                    </div>
                    @error('image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="project_date" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Proyek</label>
                    <input type="date" id="project_date" name="project_date" 
                           value="{{ old('project_date', $portfolio->project_date ? $portfolio->project_date->format('Y-m-d') : '') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @error('project_date')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-1">Urutan Tampil</label>
                    <input type="number" id="sort_order" name="sort_order" 
                           value="{{ old('sort_order', $portfolio->sort_order) }}" min="0"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    @error('sort_order')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col space-y-2 mt-2">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="is_featured" class="form-checkbox h-4 w-4 text-blue-600" 
                               {{ old('is_featured', $portfolio->is_featured) ? 'checked' : '' }}>
                        <span class="ml-2 text-sm text-gray-700">Tampilkan sebagai Featured</span>
                    </label>

                    <label class="inline-flex items-center">
                        <input type="checkbox" name="is_active" class="form-checkbox h-4 w-4 text-blue-600" 
                               {{ old('is_active', $portfolio->is_active ?? true) ? 'checked' : '' }}>
                        <span class="ml-2 text-sm text-gray-700">Aktif</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="mt-6 flex justify-end space-x-3">
            <a href="{{ route('admin.portfolios.index') }}" 
               class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
                Batal
            </a>
            <button type="submit" class="btn-primary px-6 py-2 rounded-lg font-semibold flex items-center">
                <i class="fas fa-save mr-2"></i>Update Portfolio
            </button>
        </div>
    </form>
</div>

<script>
    // Preview gambar
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if(file){
            const reader = new FileReader();
            reader.onload = function(e){
                document.getElementById('preview-img').src = e.target.result;
                document.getElementById('image-preview').classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
