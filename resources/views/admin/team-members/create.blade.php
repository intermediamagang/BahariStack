@extends('layouts.admin')

@section('page-title', 'Tambah Team Member')

@section('content')
<div class="card p-6">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-6">Tambah Team Member</h3>
    </div>
    <form action="{{ route('admin.team-members.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Name --}}
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" name="name" value="{{ old('name') }}" 
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Nama lengkap">
            @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Position --}}
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Posisi</label>
            <input type="text" name="position" value="{{ old('position') }}" 
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Contoh: Developer">
            @error('position') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Bio --}}
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Bio</label>
            <textarea name="bio" rows="3" 
                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                      placeholder="Biografi singkat">{{ old('bio') }}</textarea>
            @error('bio') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Skills --}}
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Skills (pisahkan dengan koma)</label>
            <input type="text" name="skills" value="{{ old('skills') }}" 
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="PHP, Laravel, JS">
            @error('skills') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Social Links --}}
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Social Links (pisahkan dengan koma)</label>
            <input type="text" name="social_links" value="{{ old('social_links') }}" 
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="https://twitter.com,...">
            @error('social_links') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Photo --}}
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Foto</label>
            <input type="file" name="photo" class="mt-1 block w-full text-sm text-gray-700">
            @error('photo') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Sort Order --}}
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Urutan Tampil</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', 1) }}" 
                   class="mt-1 block w-32 rounded-md border-gray-300 shadow-sm" placeholder="1">
            @error('sort_order') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Active --}}
        <div class="mb-4 flex items-center">
            <input type="checkbox" name="is_active" id="is_active" 
                   class="h-4 w-4 text-green-600 border-gray-300 rounded" checked>
            <label for="is_active" class="ml-2 block text-sm text-gray-700">Aktif</label>
        </div>

        {{-- Submit --}}
        <div class="flex justify-end">
            <a href="{{ route('admin.team-members.index') }}" 
               class="mr-2 px-4 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100">Batal</a>
            <button type="submit" 
                    class="px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700">Simpan</button>
        </div>
    </form>
</div>
@endsection
