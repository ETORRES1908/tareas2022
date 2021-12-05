<x-app-layout>
    <x-slot name="header">
        <div class="pt-16">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Mis tareas en: {{ $carpeta->titulo }} // Sesion : {{ $carpeta->sesion }}
            </h2>
        </div>
    </x-slot>

    <div class="flex flex-col py-4 max-w-7xl mx-auto sm:px-6">
        <div class="-my-2 overflow-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                    <table class="table-auto min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Titulo
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Descripcion
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Estado
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Acción
                                </th>
                                {{-- <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Role
                                </th> --}}
                                {{-- <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th> --}}
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($datos as $dato)
                                @switch($dato->carpeta->id)
                                    @case($carpeta->id)
                                        @if ($dato->pivot->estado != 1)
                                            @php
                                                $i = 0;
                                            @endphp
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="ml-0">
                                                            <div class="text-sm font-medium text-gray-900">
                                                                {{ $dato->titulo }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">
                                                        {{ $dato->descripcion }}</div>
                                                </td>

                                                @switch($dato->estado)
                                                    @case(0)
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <span
                                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                                Activo
                                                            </span>
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                                            @livewire('show-tarea', ['dato' => $dato])

                                                        </td>
                                                    @break

                                                    @case(1)
                                                        <td class="px-6 py-4 whitespace-nowrap">
                                                            <span
                                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-300 text-gray-800">
                                                                Inactivo
                                                            </span>
                                                        </td>
                                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">

                                                        </td>
                                                    @break

                                                @endswitch

                                            </tr>
                                        @endif
                                    @break
                                @endswitch

                            @endforeach
                        </tbody>

                    </table>
                    @if (!isset($i))
                        <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3 text-center"
                            role="alert">
                            <p class="font-bold">¡Ohh Vaya!</p>
                            <p class="text-sm">No tienes tareas pendientes en esta carpeta</p>
                            <i class="far fa-surprise fa-7x"></i>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>