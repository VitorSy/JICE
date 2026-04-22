<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'Sistema de Jogos' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-dvh bg-slate-950 text-slate-100 antialiased">

    <!-- Container principal -->
    <main class="mx-auto min-h-dvh w-full max-w-md px-4 py-6">
        @yield('content')
    </main>

</body>
</html>