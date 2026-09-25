<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Sekolah - Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex min-h-screen items-center justify-center bg-[#F7F6F2] px-6 py-12 text-slate-700">

    <div class="w-full max-w-md">

        <div class="mb-8 text-center">
            <a href="{{ url('/') }}"
                class="text-xs uppercase tracking-[0.15em] text-slate-400 hover:text-[#A16207]">Sistem
                Sekolah</a>
            <h1 class="font-display mt-2 text-3xl font-semibold text-[#16213A]">Masuk</h1>
            <p class="mt-1 text-sm text-slate-500">Gunakan akun Anda untuk mengakses buku induk.</p>
        </div>

        <form action="{{ route('login-post') }}" method="POST" class="space-y-6 border border-[#E5E3DB] bg-white p-8">
            @csrf

            <div>
                <label for="email"
                    class="mb-1.5 block text-xs font-semibold uppercase tracking-widest text-[#16213A]">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    placeholder="nama@sekolah.sch.id"
                    class="w-full border border-[#D9D6CD] bg-[#FCFBF8] px-3.5 py-2.5 text-sm placeholder:text-slate-400 focus:border-[#A16207] focus:bg-white focus:outline-none">
                @error('email')
                    <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password"
                    class="mb-1.5 block text-xs font-semibold uppercase tracking-widest text-[#16213A]">Kata
                    Sandi</label>
                <input type="password" id="password" name="password" placeholder="Masukkan kata sandi"
                    class="w-full border border-[#D9D6CD] bg-[#FCFBF8] px-3.5 py-2.5 text-sm placeholder:text-slate-400 focus:border-[#A16207] focus:bg-white focus:outline-none">
                @error('password')
                    <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-[#16213A] px-6 py-2.5 text-sm font-medium text-white transition hover:bg-[#26324f]">Masuk</button>
        </form>

        <p class="mt-6 text-center text-sm text-slate-500">
            Belum punya akun?
            <a href="{{ route('register-view') }}" class="font-medium text-[#16213A] hover:text-[#A16207]">Daftar di
                sini</a>
        </p>

    </div>

</body>

</html>