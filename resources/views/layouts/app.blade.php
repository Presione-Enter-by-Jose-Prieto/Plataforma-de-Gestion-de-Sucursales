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
<body class="">
    {{-- Linea de color distintiva del color del negocio --}}
    <div class="h-3.5 bg-[#df1537] mx-4 box-content rounded-b"></div>
    {{-- Header --}}
    <header class="mt-3 mb-3 ml-4 mr-4">
        <x-header/>
    </header>
    {{-- Contenido principal --}}
    <main class="mx-4">
        @yield('content')
    </main>

</body>
</html>