<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title')
    </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex min-h-screen flex-col bg-[#F7F6F2] text-slate-700">

    {{-- Header Start--}}
   @include('layouts.partials.header')
    {{-- Header End --}}

    {{-- Content Start --}}
    <main class="mx-auto w-full max-w-5xl flex-1 px-6 py-10">
        @yield('content')
    </main>
    {{-- Content End --}}

    {{-- Footer Start --}}
    @include('layouts.partials.footer')
    {{-- Footer End --}}

</body>

</html>
