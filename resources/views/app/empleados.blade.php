{{-- filepath: /Applications/XAMPP/xamppfiles/htdocs/pollos/resources/views/app/empleados.blade.php --}}
@extends('layouts.app')

@section('title', 'Empleados de ' . $sucursal->nombre)

@section('content')
    <x-contenedor-info>
        <x-titulo-h2>Empleados de {{ $sucursal->nombre }}</x-titulo-h2>
        <x-parrafo class="!mb-0">Dirección: {{ $sucursal->direccion }}</x-parrafo>
        <x-parrafo class="!mb-0">Teléfono: {{ $sucursal->telefono }}</x-parrafo>
    </x-contenedor-info>

    <div class="mt-2">
        @if($empleados->count())
            <div class="w-full mb-4 max-w-full border border-[#dddddd] rounded-sm overflow-hidden">
                <div class="m-4 border border-[#dddddd] rounded-sm">
                    <table class="w-full">
                        <thead>
                            <tr class="px-1 py-1 border-b border-[#dddddd] bg-[#F5F5F5]">
                                <th class="px-2 py-1 text-start">Nombre</th>
                                <th class="px-2 py-1 text-start border-l border-[#dddddd]">Documento</th>
                                <th class="px-2 py-1 text-start border-l border-[#dddddd]">Email</th>
                                <th class="px-2 py-1 text-start border-l border-[#dddddd]">Dirección</th>
                                <th class="px-2 py-1 text-start border-l border-[#dddddd]">Fecha de nacimiento</th>
                                <th class="px-2 py-1 text-start border-l border-[#dddddd]">Edad</th>
                                <th class="px-2 py-1 text-start border-l border-[#dddddd]">Rol</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($empleados as $empleado)
                                <tr class="{{ $loop->odd ? 'bg-white' : 'bg-[#f9f9f9]' }} text-start">
                                    <td class="px-2">{{ $empleado->name }}</td>
                                    <td class="px-2 border-l py-1 border-[#dddddd]">{{ $empleado->document }}</td>
                                    <td class="px-2 border-l py-1 border-[#dddddd]">{{ $empleado->email}}</td>
                                    <td class="px-2 border-l py-1 border-[#dddddd]">{{ $empleado->direction}}</td>
                                    <td class="px-2 border-l py-1 border-[#dddddd]">{{ $empleado->birth_date }}</td>
                                    <td class="px-2 border-l py-1 border-[#dddddd]">
                                        {{ \Carbon\Carbon::parse($empleado->birth_date)->age }} años
                                    </td>
                                    <td class="px-2 border-l border-[#dddddd]">{{ $empleado->role ? $empleado->role->nombre : 'Sin rol' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <x-parrafo class="flex items-center justify-center">No hay empleados registrados en esta sucursal.</x-parrafo>
        @endif
    </div>
@endsection