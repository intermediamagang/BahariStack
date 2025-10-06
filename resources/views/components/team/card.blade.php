@props(['member'])

@php
    // Foto
    $photo = $member->photo_path ? Storage::url($member->photo_path) : null;

    // Normalisasi social_links: bisa array assoc (['ig'=>'...']) atau array URL
    $raw = is_array($member->social_links ?? null) ? $member->social_links : [];
    $social = [];
    foreach ($raw as $k => $v) {
        $url = is_string($k) ? $v : $v;       // support keduanya
        $platform = is_string($k) ? strtolower($k) : '';

        $url = is_string($url) ? trim($url) : '';
        if ($url && !str_starts_with($url, 'http')) $url = 'https://' . $url;

        // Deteksi platform dari URL kalau key tidak jelas
        if (!$platform) {
            if (str_contains($url,'instagram.com')) $platform='instagram';
            elseif (str_contains($url,'linkedin.com')) $platform='linkedin';
            elseif (str_contains($url,'twitter.com') || str_contains($url,'x.com')) $platform='twitter';
            elseif (str_contains($url,'facebook.com')) $platform='facebook';
            elseif (str_contains($url,'github.com')) $platform='github';
            elseif (str_contains($url,'youtube.com')) $platform='youtube';
            else $platform='link';
        }
        if ($url) $social[] = ['platform'=>$platform, 'url'=>$url];
    }

    // Skills (maks 3)
    $skills = array_slice((array)($member->skills ?? []), 0, 3);
@endphp

<div class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 border border-gray-100 hover:-translate-y-2
            flex flex-col h-full text-center">
    {{-- Avatar --}}
    @if($photo)
        <img src="{{ $photo }}" alt="{{ $member->name }}"
             class="w-28 h-28 md:w-32 md:h-32 rounded-full mx-auto mb-6 object-cover border-4 border-blue-100">
    @else
        <div class="w-28 h-28 md:w-32 md:h-32 rounded-full mx-auto mb-6 bg-gray-200 flex items-center justify-center text-gray-500">
            <i class="fas fa-user text-4xl"></i>
        </div>
    @endif

    {{-- Nama & Posisi --}}
    <h3 class="text-xl font-bold text-gray-900 mb-1">{{ $member->name }}</h3>
    <p class="text-blue-600 font-semibold mb-3">{{ $member->position }}</p>

    {{-- Bio / Skills sebagai filler agar tinggi seragam --}}
    <div class="flex-1 min-h-0">
        @if(count($skills))
            <div class="flex flex-wrap gap-2 justify-center mb-2">
                @foreach($skills as $skill)
                    <span class="bg-gray-100 text-gray-700 text-xs px-3 py-1 rounded-full">{{ $skill }}</span>
                @endforeach
            </div>
        @endif
    </div>

    {{-- Sosial: selalu di bawah --}}
    @if(count($social))
        <div class="mt-6 flex justify-center gap-4">
            @foreach($social as $s)
                <a href="{{ $s['url'] }}" target="_blank" class="text-gray-400 hover:text-blue-600 transition-colors duration-200">
                    @if($s['platform']==='link')
                        <i class="fas fa-link text-lg"></i>
                    @else
                        <i class="fab fa-{{ $s['platform'] }} text-lg"></i>
                    @endif
                </a>
            @endforeach
        </div>
    @endif
</div>
