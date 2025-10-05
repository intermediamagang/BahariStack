@extends('layouts.admin')

@section('page-title', 'Edit Package')

@section('content')
<div class="card p-6">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-6">Edit Package</h3>
    </div>
    <form action="{{ route('admin.packages.update', $package) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Nama --}}
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Nama Package</label>
            <input type="text" name="name" value="{{ old('name', $package->name) }}" 
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                   placeholder="Contoh: Website Basic">
            @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Deskripsi --}}
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea name="description" rows="3" 
                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                      placeholder="Deskripsi package">{{ old('description', $package->description) }}</textarea>
            @error('description') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Harga --}}
        <div class="mb-4 grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Harga</label>
                <input type="number" name="price" value="{{ old('price', $package->price) }}" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="2500000">
                @error('price') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Currency</label>
                <input type="text" name="currency" value="{{ old('currency', $package->currency) }}" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="IDR">
                @error('currency') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        {{-- Tipe --}}
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Tipe</label>
            <select name="type" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                <option value="">-- Pilih Tipe --</option>
                <option value="website" {{ old('type', $package->type)=='website' ? 'selected' : '' }}>Website</option>
                <option value="software" {{ old('type', $package->type)=='software' ? 'selected' : '' }}>Software</option>
                <option value="mobile_app" {{ old('type', $package->type)=='mobile_app' ? 'selected' : '' }}>Mobile App</option>
            </select>
            @error('type') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Features --}}
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Fitur (pisahkan dengan koma)</label>
            <input type="text" name="features" 
                   value="{{ old('features', implode(', ', $package->features ?? [])) }}" 
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                   placeholder="5 Halaman Website, Design Responsif, SEO Basic">
            @error('features') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Sort Order --}}
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Urutan Tampil</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $package->sort_order) }}" 
                   class="mt-1 block w-32 rounded-md border-gray-300 shadow-sm" placeholder="1">
            @error('sort_order') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Popular & Active --}}
        <div class="mb-4 flex space-x-6">
            <div class="flex items-center">
                <input type="checkbox" name="is_popular" id="is_popular" 
                       class="h-4 w-4 text-yellow-600 border-gray-300 rounded" 
                       {{ old('is_popular', $package->is_popular) ? 'checked' : '' }}>
                <label for="is_popular" class="ml-2 block text-sm text-gray-700">Popular</label>
            </div>
            <div class="flex items-center">
                <input type="checkbox" name="is_active" id="is_active" 
                       class="h-4 w-4 text-green-600 border-gray-300 rounded" 
                       {{ old('is_active', $package->is_active) ? 'checked' : '' }}>
                <label for="is_active" class="ml-2 block text-sm text-gray-700">Aktif</label>
            </div>
        </div>

        {{-- Submit --}}
        <div class="flex justify-end">
            <a href="{{ route('admin.packages.index') }}" 
               class="mr-2 px-4 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100">Batal</a>
            <button type="submit" 
                    class="px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700">Simpan Package</button>
        </div>
    </form>
</div>
@endsection
