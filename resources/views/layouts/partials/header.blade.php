 <header class="bg-[#16213A] text-white">
        <div class="mx-auto flex max-w-5xl items-center justify-between px-6 py-5">
            <a href="{{ route('students.index') }}" class="flex items-center gap-3">
                <span>
                    <span class="font-display block text-lg font-semibold leading-none">Sistem Sekolah</span>
                    <span class="text-[11px] uppercase tracking-[0.2em] text-white/50">Buku Induk Siswa</span>
                </span>
            </a>
            <nav class="hidden gap-8 text-sm md:flex">
                <a href="{{ route('students.index') }}" class="text-white/55 hover:text-white">Siswa</a>
                <a href="{{ route('teachers.index')}}" class="text-white/55 hover:text-white">Guru</a>
                <a href="{{ route('classes.index')}}" class="text-white/55 hover:text-white">Kelas</a>
                <a href="{{ route('majors.index') }}" class="text-white/55 hover:text-white">Jurusan</a>
            </nav>
        </div>
        <div class="h-0.5 bg-[#A16207]"></div>
    </header>