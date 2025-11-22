{{-- filepath: /Applications/XAMPP/xamppfiles/htdocs/pollos/resources/views/app/empleados.blade.php --}}
@extends('layouts.app')

@section('title', 'Empleados de ' . $sucursal->nombre)

@section('content')
    <x-contenedor-info>
        <x-titulo-h2>Empleados de la {{ $sucursal->nombre }}</x-titulo-h2>
        <x-parrafo class="!mb-0">Dirección: {{ $sucursal->direccion }}</x-parrafo>
        <x-parrafo class="!mb-3">Teléfono: {{ $sucursal->telefono }}</x-parrafo>
        <div class="w-full h-px bg-gray-300"></div>
        <div class="flex gap-3 mt-3">
            <x-boton-azul href="">
                Añadir un empleado nuevo
            </x-boton-azul>
            <x-boton-naranja href="">
                Transferir un empleado
            </x-boton-naranja>
        </div>
    </x-contenedor-info>

    <div class="mt-3">
        @if($empleados->count())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach ($empleados as $empleado)
                    <x-contenedor-info>
                        <div class="border-b border-[#ddd] pb-2 mb-2 flex items-center gap-3">
                            <div class="rounded-full w-10 h-10 overflow-hidden flex items-center justify-center bg-gray-200">
                                <img src="{{ $empleado->foto ? asset('storage/' . $empleado->foto) : asset('images/default-user.jpeg') }}"
                                     alt="Foto de {{ $empleado->name }}" class="object-cover w-10 h-10" />
                            </div>
                            <h3 class="text-base font-semibold">{{ $empleado->name }}</h3>
                        </div>
                        <div class="text-sm grid grid-cols-2 gap-x-4 gap-y-1">
                            <div>
                                <span class="font-medium text-gray-700">Documento:</span>
                                <span class="text-gray-600">{{ $empleado->document }}</span>
                            </div>
                            <div>
                                <span class="font-medium text-gray-700">Email:</span>
                                <span class="text-gray-600">{{ $empleado->email }}</span>
                            </div>
                            <div>
                                <span class="font-medium text-gray-700">Dirección:</span>
                                <span class="text-gray-600">{{ $empleado->direction }}</span>
                            </div>
                            <div>
                                <span class="font-medium text-gray-700">Edad:</span>
                                <span class="text-gray-600">{{ \Carbon\Carbon::parse($empleado->birth_date)->age }} años</span>
                            </div>
                        </div>
                        <div class="pt-5 mt-2 border-t border-[#ddd] flex flex-row justify-between">
                            <div>
                                <span class="text-sm text-gray-600">{{ $empleado->role ? $empleado->role->nombre : 'Sin rol' }}</span>
                            </div>
                            <div class="flex items-center">
                                <x-boton-gris>Ver perfil</x-boton-gris>
                            </div>
                        </div>
                    </x-contenedor-info>
                @endforeach
            </div>
        @else
            <x-parrafo class="flex items-center justify-center">No hay empleados registrados en esta sucursal.</x-parrafo>
        @endif
    </div>
@endsection