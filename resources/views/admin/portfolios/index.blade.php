@extends('layouts.admin')

@section('page-title', 'Portfolio')

@section('content')
<div class="card p-6">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-lg font-semibold text-gray-900">Daftar Portfolio</h3>
        <a href="{{ route('admin.portfolios.create') }}" class="btn-primary px-4 py-2 rounded-lg text-sm font-medium shadow">
            <i class="fas fa-plus mr-2"></i>Tambah Portfolio
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold">No</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold">Gambar</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold">Judul</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold">Kategori</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold">Klien</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold">Tanggal</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold">Status</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold">Urutan</th>
                    <th class="px-4 py-3 text-center text-sm font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($portfolios as $index => $portfolio)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 text-sm text-gray-700">{{ $index + 1 }}</td>
                    <td class="px-4 py-3">
                        @if($portfolio->image_path)
                            <img src="{{ asset('storage/' . $portfolio->image_path) }}" 
                                 alt="{{ $portfolio->title }}" 
                                 class="w-14 h-14 object-cover rounded-md shadow-sm border border-gray-200">
                        @else
                            <div class="w-14 h-14 bg-gray-100 flex items-center justify-center rounded-md">
                                <i class="fas fa-image text-gray-400"></i>
                            </div>
                        @endif
                    </td>
                    <td class="px-4 py-3">
                        <span class="font-medium text-gray-900">{{ $portfolio->title }}</span>
                        @if($portfolio->is_featured)
                            <span class="ml-2 px-2 py-0.5 text-xs bg-yellow-100 text-yellow-700 rounded">Featured</span>
                        @endif
                    </td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 text-xs font-medium rounded bg-blue-100 text-blue-700">
                            {{ ucfirst(str_replace('_', ' ', $portfolio->category)) }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-sm text-gray-700">{{ $portfolio->client_name ?? '-' }}</td>
                    <td class="px-4 py-3 text-sm text-gray-700">
                        {{ $portfolio->project_date ? $portfolio->project_date->format('d M Y') : '-' }}
                    </td>
                    <td class="px-4 py-3">
                        @if($portfolio->is_active)
                            <span class="px-2 py-1 text-xs font-medium rounded bg-green-100 text-green-700">Aktif</span>
                        @else
                            <span class="px-2 py-1 text-xs font-medium rounded bg-gray-200 text-gray-700">Tidak Aktif</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-sm text-gray-700">{{ $portfolio->sort_order }}</td>
                    <td class="px-4 py-3 text-center">
                        <div class="inline-flex rounded-md shadow-sm space-x-1">
                            <a href="{{ route('admin.portfolios.show', $portfolio) }}" 
                               class="px-2 py-1 bg-blue-100 text-blue-700 rounded hover:bg-blue-200 transition" title="Lihat">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.portfolios.edit', $portfolio) }}" 
                               class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded hover:bg-yellow-200 transition" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.portfolios.destroy', $portfolio) }}" 
                                method="POST" class="portfolio-btn delete-btn flex-none"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus portfolio ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger px-2 py-1 rounded hover:bg-red-200 transition">
                                    <i class="fas fa-trash"></i> 
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="px-6 py-8 text-center text-gray-500">
                        <i class="fas fa-folder-open text-3xl mb-2"></i>
                        <p>Belum ada portfolio.</p>
                        <a href="{{ route('admin.portfolios.create') }}" class="text-blue-600 hover:underline">
                            Tambah portfolio pertama
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
