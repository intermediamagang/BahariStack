@extends('layouts.admin')

@section('page-title', 'Layanan')

@section('content')
    <div class="card p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-semibold text-gray-900">Daftar Layanan</h3>
            <a href="{{ route('admin.services.create') }}" class="btn-primary px-4 py-2 rounded-lg font-semibold">
                <i class="fas fa-plus mr-2"></i>Tambah Layanan
            </a>
        </div>

        @if($services->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Layanan
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Icon</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Urutan
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($services as $service)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">{{ $service->title }}</div>
                                        <div class="text-sm text-gray-500">{{ Str::limit($service->description, 50) }}</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($service->icon)
                                        <i class="{{ $service->icon }} text-blue-600 text-xl"></i>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $service->sort_order }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($service->is_active)
                                        <span
                                            class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-200 text-green-900">
                                            Aktif
                                        </span>
                                    @else
                                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-200 text-red-900">
                                            Tidak Aktif
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                    <a href="{{ route('admin.services.show', $service) }}"
                                        class="text-blue-600 hover:text-blue-900">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.services.edit', $service) }}"
                                        class="text-indigo-600 hover:text-indigo-900">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="inline"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus layanan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-12">
                <div class="text-6xl text-gray-400 mb-4">
                    <i class="fas fa-briefcase"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada layanan</h3>
                <p class="text-gray-500 mb-6">Mulai dengan menambahkan layanan pertama Anda</p>
                <a href="{{ route('admin.services.create') }}" class="btn-primary px-6 py-3 rounded-lg font-semibold">
                    <i class="fas fa-plus mr-2"></i>Tambah Layanan Pertama
                </a>
            </div>
        @endif
    </div>
@endsection