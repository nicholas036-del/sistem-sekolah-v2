@extends('layouts.app')

@section('title', $title)

@section('content')
    <a href="{{ route('students.index') }}"
        class="text-xs uppercase tracking-[0.15em] text-slate-400 hover:text-[#A16207]">&larr; Buku Induk</a>

    <div class="mt-3 border border-[#E5E3DB] bg-white">
        <div class="flex items-start justify-between border-b border-[#E5E3DB] bg-[#FCFBF8] px-8 py-6">
            <div>
                <p class="mb-1 text-[11px] uppercase tracking-[0.2em] text-[#A16207]">Lembar Siswa</p>
                <h1 class="font-display text-3xl font-semibold text-[#16213A]">{{ $student['name'] }}</h1>
                <p class="mt-1 font-mono text-xs text-slate-500">NIS {{ $student['nis'] }}</p>
            </div>
            <a href="{{ route('students.edit', ['id' => $student['id']]) }}"
                class="bg-[#16213A] px-5 py-2.5 text-sm font-medium text-white transition hover:bg-[#26324f]">Ubah</a>
        </div>

        <dl class="divide-y divide-[#EFEDE6] text-sm">
            <div class="flex justify-between px-8 py-4">
                <dt class="text-xs uppercase tracking-[0.1em] text-slate-400">NIS</dt>
                <dd class="font-medium text-[#16213A]">{{ $student['nis'] }}</dd>
            </div>
            <div class="flex justify-between px-8 py-4">
                <dt class="text-xs uppercase tracking-[0.1em] text-slate-400">Nama Lengkap Siswa</dt>
                <dd class="font-medium text-[#16213A]">{{ $student['name'] }}</dd>
            </div>
            <div class="flex justify-between px-8 py-4">
                <dt class="text-xs uppercase tracking-[0.1em] text-slate-400">Jenis Kelamin</dt>
                <dd class="font-medium text-[#16213A]">{{ $student['gender'] === 'L' ? 'Laki-laki' : 'Perempuan' }}</dd>
            </div>
            <div class="flex justify-between px-8 py-4">
                <dt class="text-xs uppercase tracking-[0.1em] text-slate-400">Jurusan</dt>
                <dd class="font-medium text-[#16213A]">{{ $student['major'] }}</dd>
            </div>
            <div class="flex justify-between px-8 py-4">
                <dt class="text-xs uppercase tracking-[0.1em] text-slate-400">Kelas</dt>
                <dd class="font-medium text-[#16213A]">{{ $student['class'] }}</dd>
            </div>
        </dl>

        <div class="flex justify-end gap-4 border-t border-[#E5E3DB] px-8 py-5">
            <a href="{{ route('students.index') }}"
                class="px-4 py-2.5 text-sm font-medium text-slate-500 hover:text-[#16213A]">Kembali</a>
            <form action="{{ route('students.destroy', ['id' => $student['id']]) }}" method="POST"
                onsubmit="return confirm('Hapus data siswa ini dari buku induk?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="border border-red-200 px-5 py-2.5 text-sm font-medium text-red-700 transition hover:bg-red-50">Hapus</button>
            </form>
        </div>
    </div>
@endsection