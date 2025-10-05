@extends('layouts.admin')

@section('page-title', 'Packages')

@section('content')
    <div class="card p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-semibold text-gray-900">Daftar Package</h3>
            <a href="{{ route('admin.packages.create') }}"
                class="btn-primary px-4 py-2 rounded-lg text-sm font-medium shadow">
                <i class="fas fa-plus mr-2"></i>Tambah Package
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-semibold">No</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Nama</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Harga</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Tipe</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Fitur</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Popular</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Aktif</th>
                        <th class="px-4 py-3 text-left text-sm font-semibold">Urutan</th>
                        <th class="px-4 py-3 text-center text-sm font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($packages as $index => $package)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-sm text-gray-700">{{ $index + 1 }}</td>
                            <td class="px-4 py-3 font-medium text-gray-900">{{ $package->name }}</td>
                            <td class="px-4 py-3 text-sm text-gray-700">{{ $package->formatted_price }} {{ $package->currency }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <span class="px-2 py-1 text-xs font-medium rounded bg-blue-100 text-blue-700">
                                    {{ ucfirst(str_replace('_', ' ', $package->type)) }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm text-gray-700">
                                @if($package->features && count($package->features))
                                    <ul class="list-disc list-inside">
                                        @foreach($package->features as $feature)
                                            <li>{{ $feature }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-center">
                                @if($package->is_popular)
                                    <span class="px-2 py-1 text-xs font-medium rounded bg-yellow-100 text-yellow-700">Popular</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-center">
                                @if($package->is_active)
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
                            <td class="px-4 py-3 text-sm text-gray-700 text-center">{{ $package->sort_order }}</td>
                            <td class="px-4 py-3 text-center">
                                <div class="inline-flex rounded-md shadow-sm space-x-1">
                                    <a href="{{ route('admin.packages.edit', $package) }}"
                                        class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded hover:bg-yellow-200 transition"
                                        title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.packages.destroy', $package) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus package ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn-danger px-2 py-1 rounded hover:bg-red-200 transition">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="px-6 py-8 text-center text-gray-500">
                                <i class="fas fa-box-open text-3xl mb-2"></i>
                                <p>Belum ada package.</p>
                                <a href="{{ route('admin.packages.create') }}" class="text-blue-600 hover:underline">
                                    Tambah package pertama
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection