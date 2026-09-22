@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="mb-8 border-b border-[#E5E3DB] pb-5">
        <a href="{{ route('students.index') }}"
            class="text-xs uppercase tracking-[0.15em] text-slate-400 hover:text-[#A16207]">&larr; Buku Induk</a>
        <h1 class="font-display mt-2 text-3xl font-semibold text-[#16213A]">Tambah Siswa</h1>
        <p class="mt-1 text-sm text-slate-500">Mencatat siswa baru ke dalam buku induk.</p>
    </div>

    <form action="{{ route('students.store') }}" method="POST" class="space-y-6 border border-[#E5E3DB] bg-white p-8">
        @csrf

        <div>
            <label for="nis"
                class="mb-1.5 block text-xs font-semibold uppercase tracking-[0.1em] text-[#16213A]">NIS</label>
            <input value="{{ old('nis') }}" type="text" id="nis" name="nis" placeholder="1001"
                class="w-full border border-[#D9D6CD] bg-[#FCFBF8] px-3.5 py-2.5 text-sm focus:border-[#A16207] focus:bg-white focus:outline-none">
                @error('nis')
                    <span class="text-red-500 py-2">{{ $message }}</span>
                @enderror
        </div>

        <div>
            <label for="name"
                class="mb-1.5 block text-xs font-semibold uppercase tracking-[0.1em] text-[#16213A]">Nama
                Lengkap</label>
            <input value="{{ old('name') }}" type="text" id="name" name="name" placeholder="Nama Lengkap siswa"
                class="w-full border border-[#D9D6CD] bg-[#FCFBF8] px-3.5 py-2.5 text-sm focus:border-[#A16207] focus:bg-white focus:outline-none">
                @error('name')
                    <span class="text-red-500 py-2">{{ $message }}</span>
                @enderror
        </div>
                
        <div>
            <label for="class"
                class="mb-1.5 block text-xs font-semibold uppercase tracking-[0.1em] text-[#16213A]">Kelas</label>
            <input value ="{{ old('class') }}" type="text" id="class" name="class" placeholder="XII TKJ 1"
                class="w-full border border-[#D9D6CD] bg-[#FCFBF8] px-3.5 py-2.5 text-sm focus:border-[#A16207] focus:bg-white focus:outline-none">
                @error('class')
                    <span class="text-red-500 py-2">{{ $message }}</span>
                @enderror
        </div>
<div>
    <label class="mb-1.5 block text-xs font-semibold uppercase tracking-[0.1em] text-[#16213A]">
        Jenis Kelamin
    </label>
    <div class="flex gap-6 border border-[#D9D6CD] bg-[#FCFBF8] px-3.5 py-2.5">
        <label class="flex items-center gap-2 text-sm text-[#16213A]">
            <input type="radio" name="gender" value="L" class="accent-[#A16207]"
                @checked(old('gender') === 'L')>
            Laki-laki
        </label>
        <label class="flex items-center gap-2 text-sm text-[#16213A]">
            <input type="radio" name="gender" value="P" class="accent-[#A16207]"
                @checked(old('gender') === 'P')>
            Perempuan
        </label>
    </div>
    @error('gender')
        <span class="mt-1.5 block text-xs text-red-500">{{ $message }}</span>
    @enderror
</div>

   <div>
            <label for="major"
                class="mb-1.5 block text-xs font-semibold uppercase tracking-[0.1em] text-[#16213A]">Jurusan</label>
          <select id="major" name="major"
                class="w-full border border-[#D9D6CD] bg-[#FCFBF8] px-3.5 py-2.5 text-sm focus:border-[#A16207] focus:bg-white focus:outline-none">
                <option value="" disabled {{ old('major') ? '' : 'selected' }}>-- Pilih Jurusan --</option>
                <option value="AKL" @selected(old('major') === 'AKL')>AKL</option>
                <option value="TKJ" @selected(old('major') === 'TKJ')>TKJ</option>
                <option value="BID" @selected(old('major') === 'BID')>BID</option>
            </select>
            @error('major')
                <span class="mt-1.5 block text-xs text-red-500">{{ $message }}</span>
            @enderror
        </div>

<div class="flex justify-end gap-4 border-t border-[#EFEDE6] pt-6">
    <a href="{{ route('students.index') }}"
        class="px-4 py-2.5 text-sm font-medium text-slate-500 hover:text-[#16213A]">Batal</a>
    <button type="submit"
        class="bg-[#16213A] px-6 py-2.5 text-sm font-medium text-white transition hover:bg-[#26324f]">Simpan
        Siswa</button>
</div>
</form>
@endsection
