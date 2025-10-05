@extends('layouts.admin')

@section('page-title', 'Team Members')

@section('content')
<div class="card p-6">
    <div class="flex items-center justify-between mb-6">
        <h3 class="text-lg font-semibold text-gray-900">Daftar Team Member</h3>
        <a href="{{ route('admin.team-members.create') }}" 
           class="btn-primary px-4 py-2 rounded-lg text-sm font-medium shadow">
            <i class="fas fa-plus mr-2"></i>Tambah Member
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold">No</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold">Foto</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold">Nama</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold">Posisi</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold">Skills</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold">Aktif</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold">Urutan</th>
                    <th class="px-4 py-3 text-center text-sm font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($teamMembers as $index => $member)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 text-sm text-gray-700">{{ $index + 1 }}</td>
                    <td class="px-4 py-3">
                        @if($member->photo_path)
                            <img src="{{ asset('storage/'.$member->photo_path) }}" 
                                 alt="{{ $member->name }}" class="w-14 h-14 object-cover rounded-md border border-gray-200">
                        @else
                            <div class="w-14 h-14 bg-gray-100 flex items-center justify-center rounded-md">
                                <i class="fas fa-user text-gray-400"></i>
                            </div>
                        @endif
                    </td>
                    <td class="px-4 py-3 font-medium text-gray-900">{{ $member->name }}</td>
                    <td class="px-4 py-3 text-sm text-gray-700">{{ $member->position ?? '-' }}</td>
                    <td class="px-4 py-3 text-sm text-gray-700">
                        @if($member->skills)
                            {{ implode(', ', $member->skills) }}
                        @endif
                    </td>
                    <td class="px-4 py-3 text-center">
                        @if($member->is_active)
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-200 text-green-900">Aktif</span>
                        @else
                            <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-200 text-red-900">Tidak</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-sm text-gray-700 text-center">{{ $member->sort_order }}</td>
                    <td class="px-4 py-3 text-center">
                        <div class="inline-flex space-x-1">
                            <a href="{{ route('admin.team-members.edit', $member) }}" 
                               class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded hover:bg-yellow-200 transition">
                               <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.team-members.destroy', $member) }}" method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus member ini?')">
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
                    <td colspan="8" class="px-6 py-8 text-center text-gray-500">
                        <i class="fas fa-users text-3xl mb-2"></i>
                        <p>Belum ada team member.</p>
                        <a href="{{ route('admin.team-members.create') }}" class="text-blue-600 hover:underline">
                            Tambah team member pertama
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
