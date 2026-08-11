@props(['status'])

@php
    $isActive = $status === 'Aktif';
@endphp

<span
    class="inline-flex items-center gap-1.5 rounded-full px-3 py-1 text-xs font-medium {{ $isActive ? 'bg-green-50 text-green-700' : 'bg-red-50 text-red-700' }}">
    <span class="h-1.5 w-1.5 rounded-full {{ $isActive ? 'bg-green-600' : 'bg-red-600' }}"></span>
    {{ $status }}
</span>
