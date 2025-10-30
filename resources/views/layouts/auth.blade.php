<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name', 'Laravel'))</title>

    {{-- Tailwind con Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    {{-- Estilos adicionales --}}
    @stack('styles')

    <style>
        body {
            color: #333333;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        }
    </style>
</head>
<body class="min-h-screen bg-[#df1537] flex flex-row justify-center items-center">

    {{-- Contenido principal --}}
    <main>
        @yield('content')
    </main>

</body>
</html>
