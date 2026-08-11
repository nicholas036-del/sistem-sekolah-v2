@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="mb-8 border-b border-[#E5E3DB] pb-5">
        <a href="{{ route('teachers.index') }}"
            class="text-xs uppercase tracking-[0.15em] text-slate-400 hover:text-[#A16207]">&larr; Data Guru</a>
        <h1 class="font-display mt-2 text-3xl font-semibold text-[#16213A]">Ubah Data Guru</h1>
        <p class="mt-1 text-sm text-slate-500">Memperbarui catatan atas nama <span
                class="font-medium text-[#16213A]">{{ $teacher['name'] }}</span>.</p>
    </div>

    <form action="{{ route('teachers.update', ['id' => $teacher['id']]) }}" method="POST"
        class="space-y-6 border border-[#E5E3DB] bg-white p-8">
        @csrf
        @method('PUT')

        <div>
            <label for="nip"
                class="mb-1.5 block text-xs font-semibold uppercase tracking-[0.1em] text-[#16213A]">NIP</label>
            <input type="text" id="nip" name="nip" value="{{ $teacher['nip'] }}"
                class="w-full border border-[#D9D6CD] bg-[#FCFBF8] px-3.5 py-2.5 text-sm focus:border-[#A16207] focus:bg-white focus:outline-none">
        </div>

        <div>
            <label for="name"
                class="mb-1.5 block text-xs font-semibold uppercase tracking-[0.1em] text-[#16213A]">Nama
                Lengkap</label>
            <input type="text" id="name" name="name" value="{{ $teacher['name'] }}"
                class="w-full border border-[#D9D6CD] bg-[#FCFBF8] px-3.5 py-2.5 text-sm focus:border-[#A16207] focus:bg-white focus:outline-none">
        </div>

        <div>
            <label for="gender"
                class="mb-1.5 block text-xs font-semibold uppercase tracking-[0.1em] text-[#16213A]">Jenis
                Kelamin</label>
            <select id="gender" name="gender"
                class="w-full border border-[#D9D6CD] bg-[#FCFBF8] px-3.5 py-2.5 text-sm focus:border-[#A16207] focus:bg-white focus:outline-none">
                <option value="Laki-Laki" @selected($teacher['gender'] === 'Laki-Laki')>Laki-Laki</option>
                <option value="Perempuan" @selected($teacher['gender'] === 'Perempuan')>Perempuan</option>
            </select>
        </div>

        <div>
            <label for="subject"
                class="mb-1.5 block text-xs font-semibold uppercase tracking-[0.1em] text-[#16213A]">Mata
                Pelajaran</label>
            <input type="text" id="subject" name="subject" value="{{ $teacher['subject'] }}"
                class="w-full border border-[#D9D6CD] bg-[#FCFBF8] px-3.5 py-2.5 text-sm focus:border-[#A16207] focus:bg-white focus:outline-none">
        </div>

        <div>
            <label for="phone_number"
                class="mb-1.5 block text-xs font-semibold uppercase tracking-[0.1em] text-[#16213A]">No.
                Telepon</label>
            <input type="text" id="phone_number" name="phone_number" value="{{ $teacher['phone_number'] }}"
                class="w-full border border-[#D9D6CD] bg-[#FCFBF8] px-3.5 py-2.5 text-sm focus:border-[#A16207] focus:bg-white focus:outline-none">
        </div>

        <div>
            <label for="status"
                class="mb-1.5 block text-xs font-semibold uppercase tracking-[0.1em] text-[#16213A]">Status</label>
            <select id="status" name="status"
                class="w-full border border-[#D9D6CD] bg-[#FCFBF8] px-3.5 py-2.5 text-sm focus:border-[#A16207] focus:bg-white focus:outline-none">
                <option value="Aktif" @selected($teacher['status'] === 'Aktif')>Aktif</option>
                <option value="Tidak Aktif" @selected($teacher['status'] === 'Tidak Aktif')>Tidak Aktif</option>
            </select>
        </div>

        <div class="flex justify-end gap-4 border-t border-[#EFEDE6] pt-6">
            <a href="{{ route('teachers.index') }}"
                class="px-4 py-2.5 text-sm font-medium text-slate-500 hover:text-[#16213A]">Batal</a>
            <button type="submit"
                class="bg-[#16213A] px-6 py-2.5 text-sm font-medium text-white transition hover:bg-[#26324f]">Perbarui
                Catatan</button>
        </div>
    </form>
@endsection
