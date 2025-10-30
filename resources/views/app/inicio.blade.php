@extends('layouts.app')

@section('title', 'Menú Principal')

@section('content')
    <div class="flex flex-row gap-4">
        <x-contenedor-info class="w-[50%]">
            <h2 class="text-[1.3em] my-2 font-bold leading-4">
            Bienvenido, {{ Auth::user()->name }}
            </h2>
            <p class="mb-2 text-[13px] leading-4">
                Hola {{ Auth::user()->name }}, este es tu panel principal. Desde aquí puedes gestionar tus actividades, pedidos y supervisar las operaciones asignadas a tu rol.
            </p>
        </x-contenedor-info>
        <x-contenedor-info class="w-[50%]">
            <h2 class="text-[1.3em] my-2 font-bold leading-4">
            Resumen de Actividades
            </h2>
            <ul class="list-disc list-inside text-[13px] leading-4">
                <li>Revisa y administra los pedidos pendientes.</li>
                <li>Actualiza el estado de los pedidos en tiempo real.</li>
                <li>Accede a reportes y estadísticas de ventas.</li>
                <li>Gestiona la información de clientes y productos.</li>
            </ul>
        </x-contenedor-info>
    </div>
@endsection