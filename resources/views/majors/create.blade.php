@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="mb-8 border-b border-[#E5E3DB] pb-5">
        <a href="{{ route('majors.index') }}"
            class="text-xs uppercase tracking-[0.15em] text-slate-400 hover:text-[#A16207]">&larr; Data Jurusan</a>
        <h1 class="font-display mt-2 text-3xl font-semibold text-[#16213A]">Tambah Jurusan</h1>
        <p class="mt-1 text-sm text-slate-500">Mencatat jurusan baru ke dalam sistem.</p>
    </div>

    <form action="{{ route('majors.store') }}" method="POST" class="space-y-6 border border-[#E5E3DB] bg-white p-8">
        @csrf

        <div>
            <label for="code"
                class="mb-1.5 block text-xs font-semibold uppercase tracking-[0.1em] text-[#16213A]">Kode
                Jurusan</label>
            <input type="text" id="code" name="code" placeholder="AKL"
                class="w-full border border-[#D9D6CD] bg-[#FCFBF8] px-3.5 py-2.5 text-sm focus:border-[#A16207] focus:bg-white focus:outline-none">
        </div>

        <div>
            <label for="name"
                class="mb-1.5 block text-xs font-semibold uppercase tracking-[0.1em] text-[#16213A]">Nama
                Jurusan</label>
            <input type="text" id="name" name="name" placeholder="Akuntansi dan Keuangan Lembaga"
                class="w-full border border-[#D9D6CD] bg-[#FCFBF8] px-3.5 py-2.5 text-sm focus:border-[#A16207] focus:bg-white focus:outline-none">
        </div>

        <div>
            <label for="description"
                class="mb-1.5 block text-xs font-semibold uppercase tracking-[0.1em] text-[#16213A]">Deskripsi</label>
            <textarea id="description" name="description" rows="4" placeholder="Penjelasan singkat mengenai jurusan"
                class="w-full border border-[#D9D6CD] bg-[#FCFBF8] px-3.5 py-2.5 text-sm focus:border-[#A16207] focus:bg-white focus:outline-none"></textarea>
        </div>

        <div class="flex justify-end gap-4 border-t border-[#EFEDE6] pt-6">
            <a href="{{ route('majors.index') }}"
                class="px-4 py-2.5 text-sm font-medium text-slate-500 hover:text-[#16213A]">Batal</a>
            <button type="submit"
                class="bg-[#16213A] px-6 py-2.5 text-sm font-medium text-white transition hover:bg-[#26324f]">Simpan
                Jurusan</button>
        </div>
    </form>
@endsection
