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

    <div class="border border-[#E5E3DB] bg-white">
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
                @foreach ($classes as $class)
                    <tr class="border-b border-[#EFEDE6] hover:bg-[#FAF9F5]">
                        <td class="px-5 py-4 font-display text-lg text-[#A16207]">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-5 py-4 font-medium text-[#16213A]">
                            {{ $class['name'] }}
                        </td>
                        <td class="px-5 py-4">
                            {{ $class['grade'] }}
                        </td>
                        <td class="px-5 py-4 font-mono text-xs text-slate-500">
                            {{ $class['major'] }}
                        </td>
                        <td class="px-5 py-4">
                            {{ $class['homeroom_teacher'] }}
                        </td>
                        <td class="px-5 py-4">
                            <div class="flex justify-end gap-4 text-xs font-medium">
                                <a href="{{ route('classes.show', ['id' => $class['id']]) }}"
                                    class="text-[#16213A] hover:text-[#A16207]">Lihat</a>
                                <a href="{{ route('classes.edit', ['id' => $class['id']]) }}"
                                    class="text-[#16213A] hover:text-[#A16207]">Ubah</a>
                                <form action="{{ route('classes.destroy', ['id' => $class['id']]) }}" method="POST"
                                    onsubmit="return confirm('Hapus data kelas ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-700 hover:text-red-900">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
