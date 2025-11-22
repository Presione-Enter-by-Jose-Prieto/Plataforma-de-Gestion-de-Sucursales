@extends('layouts.app')

@section('title', 'Sucursales')

@section('content')
    <div x-data="{ showForm: false }" x-cloak>
        <x-contenedor-info>
            <x-titulo-h2> Nueva Sucursal </x-titulo-h2>
            <div class="mb-4">
                <x-parrafo class="">Agrega una nueva sucursal a la empresa.</x-parrafo>
            </div>
            <x-boton-azul @click="showForm = true">Agregar Sucursal</x-boton-azul>
        </x-contenedor-info>

        <!-- Modal central con el formulario -->
        <div
            x-show="showForm"
            x-transition.opacity
            class="fixed inset-0 z-50 flex items-center justify-center"
            style="display: none;"
        >
            <!-- Overlay -->
            <div class="absolute inset-0 bg-black/50" @click="showForm = false"></div>

            <!-- Contenido modal -->
            <x-contenedor-info
                x-show="showForm"
                x-transition
                @click.away="showForm = false"
                @keydown.escape.window="showForm = false"
                x-trap.noscroll="showForm"
                class="relative z-10 w-full max-w-2xl p-6 mx-4"
            >
                <x-titulo-h2 class="mb-3"> Nueva Sucursal </x-titulo-h2>
                <form action="" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nombre</label>
                        <input name="nombre" type="text" required value="{{ old('nombre') }}"
                            class="w-full bg-white border border-[#ccc] px-2 py-1 rounded text-[#555] [box-shadow:inset_0_1px_1px_rgba(0,0,0,0.075)] focus:border-[#52a8ec] focus:[box-shadow:inset_0_1px_1px_rgba(0,0,0,0.075),_0_0_8px_rgba(82,168,236,.6)] outline-none"
                            style="font-size:13px;">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Dirección</label>
                        <input name="direccion" type="text" required value="{{ old('direccion') }}"
                            class="w-full bg-white border border-[#ccc] px-2 py-1 rounded text-[#555] [box-shadow:inset_0_1px_1px_rgba(0,0,0,0.075)] focus:border-[#52a8ec] focus:[box-shadow:inset_0_1px_1px_rgba(0,0,0,0.075),_0_0_8px_rgba(82,168,236,.6)] outline-none"
                            style="font-size:13px;">
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Teléfono</label>
                            <input name="telefono" type="text" value="{{ old('telefono') }}"
                                class="w-full bg-white border border-[#ccc] px-2 py-1 rounded text-[#555] [box-shadow:inset_0_1px_1px_rgba(0,0,0,0.075)] focus:border-[#52a8ec] focus:[box-shadow:inset_0_1px_1px_rgba(0,0,0,0.075),_0_0_8px_rgba(82,168,236,.6)] outline-none"
                                style="font-size:13px;">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Encargado</label>
                            <select name="encargado_id" class="mt-1 block w-full rounded-md border border-[#ccc] px-2 py-1 shadow-sm text-[#555] [box-shadow:inset_0_1px_1px_rgba(0,0,0,0.075)] focus:border-[#52a8ec] focus:[box-shadow:inset_0_1px_1px_rgba(0,0,0,0.075),_0_0_8px_rgba(82,168,236,.6)] outline-none" style="font-size:13px;">
                                <option value="">Seleccione</option>
                                @foreach($usuarios ?? [] as $usuario)
                                    <option value="{{ $usuario->id }}" {{ old('encargado_id') == $usuario->id ? 'selected' : '' }}>
                                        {{ $usuario->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Horario</label>
                            <input name="horario" type="text" value="{{ old('horario') }}"
                                class="w-full bg-white border border-[#ccc] px-2 py-1 rounded text-[#555] [box-shadow:inset_0_1px_1px_rgba(0,0,0,0.075)] focus:border-[#52a8ec] focus:[box-shadow:inset_0_1px_1px_rgba(0,0,0,0.075),_0_0_8px_rgba(82,168,236,.6)] outline-none"
                                style="font-size:13px;">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Código (opcional)</label>
                            <input name="codigo" type="text" value="{{ old('codigo') }}"
                                class="w-full bg-white border border-[#ccc] px-2 py-1 rounded text-[#555] [box-shadow:inset_0_1px_1px_rgba(0,0,0,0.075)] focus:border-[#52a8ec] focus:[box-shadow:inset_0_1px_1px_rgba(0,0,0,0.075),_0_0_8px_rgba(82,168,236,.6)] outline-none"
                                style="font-size:13px;">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Departamento</label>
                            <input name="departamento" type="text" value="{{ old('departamento') }}"
                                class="w-full bg-white border border-[#ccc] px-2 py-1 rounded text-[#555] [box-shadow:inset_0_1px_1px_rgba(0,0,0,0.075)] focus:border-[#52a8ec] focus:[box-shadow:inset_0_1px_1px_rgba(0,0,0,0.075),_0_0_8px_rgba(82,168,236,.6)] outline-none"
                                style="font-size:13px;">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Ciudad</label>
                            <input name="ciudad" type="text" value="{{ old('ciudad') }}"
                                class="w-full bg-white border border-[#ccc] px-2 py-1 rounded text-[#555] [box-shadow:inset_0_1px_1px_rgba(0,0,0,0.075)] focus:border-[#52a8ec] focus:[box-shadow:inset_0_1px_1px_rgba(0,0,0,0.075),_0_0_8px_rgba(82,168,236,.6)] outline-none"
                                style="font-size:13px;">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Email de contacto</label>
                            <input name="email" type="email" value="{{ old('email') }}"
                                class="w-full bg-white border border-[#ccc] px-2 py-1 rounded text-[#555] [box-shadow:inset_0_1px_1px_rgba(0,0,0,0.075)] focus:border-[#52a8ec] focus:[box-shadow:inset_0_1px_1px_rgba(0,0,0,0.075),_0_0_8px_rgba(82,168,236,.6)] outline-none"
                                style="font-size:13px;">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Teléfono alternativo</label>
                            <input name="telefono_alt" type="text" value="{{ old('telefono_alt') }}"
                                class="w-full bg-white border border-[#ccc] px-2 py-1 rounded text-[#555] [box-shadow:inset_0_1px_1px_rgba(0,0,0,0.075)] focus:border-[#52a8ec] focus:[box-shadow:inset_0_1px_1px_rgba(0,0,0,0.075),_0_0_8px_rgba(82,168,236,.6)] outline-none"
                                style="font-size:13px;">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Latitud</label>
                            <input name="latitud" type="number" step="0.0000001" value="{{ old('latitud') }}"
                                class="w-full bg-white border border-[#ccc] px-2 py-1 rounded text-[#555] [box-shadow:inset_0_1px_1px_rgba(0,0,0,0.075)] focus:border-[#52a8ec] focus:[box-shadow:inset_0_1px_1px_rgba(0,0,0,0.075),_0_0_8px_rgba(82,168,236,.6)] outline-none"
                                style="font-size:13px;">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Longitud</label>
                            <input name="longitud" type="number" step="0.0000001" value="{{ old('longitud') }}"
                                class="w-full bg-white border border-[#ccc] px-2 py-1 rounded text-[#555] [box-shadow:inset_0_1px_1px_rgba(0,0,0,0.075)] focus:border-[#52a8ec] focus:[box-shadow:inset_0_1px_1px_rgba(0,0,0,0.075),_0_0_8px_rgba(82,168,236,.6)] outline-none"
                                style="font-size:13px;">
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="activo" value="1" {{ old('activo') ? 'checked' : '' }} class="rounded">
                            <span class="ml-2 text-sm text-gray-700">Activo</span>
                        </label>
                    </div>

                    <div class="flex justify-end gap-2 mt-2">
                        <x-boton-gris type="button" @click.prevent="showForm = false">Cancelar</x-boton-gris>
                        <x-boton-azul type="submit">Guardar Sucursal</x-boton-azul>
                    </div>
                </form>
            </x-contenedor-info>
        </div>

        <!-- Lista de sucursales (siempre visible) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mb-10">
            @foreach ($sucursales as $sucursal)
                <x-contenedor-info class="!mb-0">
                    <x-titulo-h2> {{ $sucursal->nombre }} </x-titulo-h2>
                    <div class="mb-2">
                        <x-parrafo class="!mb-0">Dirección: {{ $sucursal->direccion }}</x-parrafo>
                        <x-parrafo class="!mb-0">Teléfono: {{ $sucursal->telefono }}</x-parrafo>
                        {{-- <x-parrafo class="!mb-0">Horario: {{ $sucursal->horario }}</x-parrafo> --}}
                        {{-- <x-parrafo class="!mb-0">Ubicación: {{ $sucursal->departamento }}, {{ $sucursal->ciudad }}</x-parrafo> --}}
                        <x-parrafo class="!mb-0">Encargado: {{ $sucursal->encargado->name }}</x-parrafo>
                    </div>

                    <div class="w-full h-px bg-gray-300"></div>
                    <div class="mt-3 flex justify-between gap-2">
                        <div>
                            <x-boton-gris href="{{ route('sucursales.empleados', ['id' => $sucursal->id]) }}">Ver empleados</x-boton-gris>
                        </div>

                        <div>
                            <x-boton-naranja>Editar</x-boton-naranja>
                            <x-boton-rojo>Gestionar</x-boton-rojo>
                        </div>
                    </div>
                </x-contenedor-info>
            @endforeach
        </div>
    </div>
@endsection