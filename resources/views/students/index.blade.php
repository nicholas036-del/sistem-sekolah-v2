@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="mb-8 flex items-end justify-between border-b border-[#E5E3DB] pb-5">
        <div>
            <p class="mb-1 text-[11px] uppercase tracking-[0.2em] text-[#A16207]">Tahun Ajaran 2025/2026</p>
            <h1 class="font-display text-3xl font-semibold text-[#16213A]">Daftar Siswa</h1>
        </div>
        <a href="{{ route('students.create') }}"
            class="bg-[#16213A] px-5 py-2.5 text-sm font-medium text-white transition hover:bg-[#26324f]">
            Catat Siswa Baru
        </a>
    </div>

    <form method="GET" action="{{ route('students.index') }}" class="mb-6 flex flex-wrap items-end gap-3 border border-[#E5E3DB] bg-white p-5">
        <div class="min-w-55 flex-1">
            <label for="search" class="mb-1 block text-[11px] uppercase tracking-[0.15em] text-[#16213A]">Cari</label>
            <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="Nama atau NIS siswa"
                class="w-full border border-[#E5E3DB] px-3 py-2 text-sm focus:border-[#16213A] focus:outline-none">
        </div>

        <div>
            <label for="class" class="mb-1 block text-[11px] uppercase tracking-[0.15em] text-[#16213A]">Kelas</label>
            <select name="class" id="class"
                class="border border-[#E5E3DB] px-3 py-2 text-sm focus:border-[#16213A] focus:outline-none">
                <option value="">Semua Kelas</option>
                @foreach ($schoolClasses as $class)
                    <option @selected(request('class') === $class) value="{{ $class }}" {{ request('class') === $class ? 'selected' : '' }}>{{ $class }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="major" class="mb-1 block text-[11px] uppercase tracking-[0.15em] text-[#16213A]">Jurusan</label>
            <select name="major" id="major"
                class="border border-[#E5E3DB] px-3 py-2 text-sm focus:border-[#16213A] focus:outline-none">
                <option value="">Semua Jurusan</option>
                @foreach ($majors as $major)
                    <option @selected(request('major') === $major) value="{{ $major }}" {{ request('major') === $major ? 'selected' : '' }}>{{ $major }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-[#16213A] px-5 py-2 text-sm font-medium text-white transition hover:bg-[#26324f]">
            Terapkan
        </button>
    </form>

    <div class="border border-[#E5E3DB] bg-white">
        <table class="w-full text-left text-sm">
            <thead>
                <tr class="border-b border-[#16213A] text-[11px] uppercase tracking-[0.15em] text-[#16213A]">
                    <th class="w-14 px-5 py-3.5 font-semibold">No.</th>
                    <th class="px-5 py-3.5 font-semibold">NIS</th>
                    <th class="px-5 py-3.5 font-semibold">Nama Lengkap Siswa</th>
                    <th class="px-5 py-3.5 font-semibold">Kelas</th>
                    <th class="px-5 py-3.5 font-semibold">Jenis Kelamin</th>
                    <th class="px-5 py-3.5 font-semibold">Jurusan</th>
                    <th class="px-5 py-3.5 text-right font-semibold">Tindakan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr class="border-b border-[#EFEDE6] hover:bg-[#FAF9F5]">
                        <td class="px-5 py-4 font-display text-lg text-[#A16207]">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-5 py-4 font-mono text-xs text-slate-500">
                            {{ $student->nis }}
                        </td>
                        <td class="px-5 py-4 font-medium text-[#16213A]">
                            {{ $student->name }}
                        </td>
                        <td class="px-5 py-4">
                            {{ $student->class }}
                        </td>
                        <td class="px-5 py-4">
                            {{ $student->gender === 'L' ? 'Laki-laki' : 'Perempuan' }}
                        </td>
                        <td class="px-5 py-4">
                            {{ $student->major }}
                        </td>
                        <td class="px-5 py-4">
                            <div class="flex justify-end gap-4 text-xs font-medium">
                                <a href="{{ route('students.show', ['id' => $student->id]) }}"
                                    class="text-[#16213A] hover:text-[#A16207]">Lihat</a>
                                <a href="{{ route('students.edit', ['id' => $student->id]) }}"
                                    class="text-[#16213A] hover:text-[#A16207]">Ubah</a>
                                <form action="{{ route('students.destroy', ['id' => $student->id]) }}" method="POST"
                                    onsubmit="return confirm('Hapus data siswa ini dari buku induk?')">
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

        {{ $students->appends(request()->query())->links() }}
    </div>
@endsection