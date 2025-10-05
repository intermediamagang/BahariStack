@extends('layouts.admin')

@section('page-title', 'Contact Info')

@section('content')
    <div class="card p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-semibold text-gray-900">Daftar Contact Info</h3>
            <a href="{{ route('admin.contact-infos.create') }}" class="btn-primary px-4 py-2 rounded-lg shadow">
                <i class="fas fa-plus mr-2"></i>Tambah Contact Info
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-semibold">No</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Tipe</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Label</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Value</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Icon</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Urutan</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Aktif</th>
                        <th class="px-4 py-3 text-center text-sm font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($contactInfos as $index => $info)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-sm">{{ $index + 1 }}</td>
                            <td class="px-4 py-3 text-sm">{{ ucfirst($info->type) }}</td>
                            <td class="px-4 py-3 text-sm">{{ $info->label }}</td>
                            <td class="px-4 py-3 text-sm">{{ $info->value }}</td>
                            <td class="px-4 py-3 text-sm text-center">
                                @if($info->icon)
                                    <i class="{{ $info->icon }} text-lg text-blue-600"></i>
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm text-center">{{ $info->sort_order }}</td>
                            <td class="px-4 py-3 text-center">
                                @if($info->is_active)
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
                            <td class="px-4 py-3 text-center">
                                <div class="inline-flex rounded-md shadow-sm space-x-1">
                                    <a href="{{ route('admin.contact-infos.edit', $info) }}"
                                        class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded hover:bg-yellow-200">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.contact-infos.destroy', $info) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus contact info ini?')">
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
                            <td colspan="8" class="px-6 py-8 text-center text-gray-500">
                                <i class="fas fa-address-book text-3xl mb-2"></i>
                                <p>Belum ada contact info.</p>
                                <a href="{{ route('admin.contact-infos.create') }}" class="text-blue-600 hover:underline">
                                    Tambah contact info pertama
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>
@endsection