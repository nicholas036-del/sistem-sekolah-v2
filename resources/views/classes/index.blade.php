@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="mb-8 flex items-end justify-between border-b border-[#E5E3DB] pb-5">
        <div>
            <p class="mb-1 text-[11px] uppercase tracking-[0.2em] text-[#A16207]">Tahun Ajaran 2025/2026</p>
            <h1 class="font-display text-3xl font-semibold text-[#16213A]">Daftar Kelas</h1>
        </div>
        <a href="{{ route('classes.create') }}"
            class="bg-[#16213A] px-5 py-2.5 text-sm font-medium text-white transition hover:bg-[#26324f]">
            Catat Kelas Baru
        </a>
    </div>

    <div class="overflow-x-auto border border-[#E5E3DB] bg-white">
        <table class="w-full text-left text-sm">
            <thead>
                <tr class="border-b border-[#16213A] text-[11px] uppercase tracking-[0.15em] text-[#16213A]">
                    <th class="w-14 px-5 py-3.5 font-semibold">No.</th>
                    <th class="px-5 py-3.5 font-semibold">Nama Kelas</th>
                    <th class="px-5 py-3.5 font-semibold">Tingkat</th>
                    <th class="px-5 py-3.5 font-semibold">Jurusan</th>
                    <th class="px-5 py-3.5 font-semibold">Wali Kelas</th>
                    <th class="px-5 py-3.5 text-right font-semibold">Tindakan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($classes as $schoolClass)
                    <tr class="border-b border-[#EFEDE6] hover:bg-[#FAF9F5]">
                        <td class="font-display px-5 py-4 text-lg text-[#A16207]">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-5 py-4 font-medium text-[#16213A]">
                            {{ $schoolClass['name'] ?? '-' }}
                        </td>
                        <td class="px-5 py-4">
                            {{ $schoolClass['grade'] ?? '-' }}
                        </td>
                        <td class="px-5 py-4">
                            {{ $schoolClass['major'] ?? '-' }}
                        </td>
                        <td class="px-5 py-4 text-slate-500">
                            {{ $schoolClass['homeroom_teacher'] ?? '-' }}
                        </td>
                        <td class="px-5 py-4">
                            <div class="flex items-center justify-end gap-4 text-xs font-medium">
                                <a href="{{ route('classes.show', $schoolClass['id']) }}"
                                    class="text-[#16213A] hover:text-[#A16207]">Lihat</a>
                                <a href="{{ route('classes.edit', $schoolClass['id']) }}"
                                    class="text-[#16213A] hover:text-[#A16207]">Ubah</a>
                                <form action="{{ route('classes.destroy', $schoolClass['id']) }}" method="POST"
                                    onsubmit="return confirm('Hapus data kelas ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-700 hover:text-red-900">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-5 py-10 text-center text-sm text-slate-400">
                            Belum ada data kelas.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection