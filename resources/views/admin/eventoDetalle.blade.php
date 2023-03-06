<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Administrador') }}
        </h2>
    </x-slot>
    <h2 class="text-gray-700 uppercase  dark:text-gray-400 text-center mt-8">Participantes del Evento: <span class="uppercase">{{ $eventos->nombre }}</span></h2>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="p-5 m-5">
                <a href="/evento/{{ $eventos->id }}/user/{{ Auth::user()->id }}/incribir" class="font-medium w-auto text-green-600 dark:text-blue-500 hover:underline m-6 p-10"><x-secondary-button>Inscribirme</x-secondary-button> 
                </a>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-6">
                <div class="relative overflow-x-auto sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Nº
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Dni
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nombre
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Apellido
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Edad
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Direccion
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Ciudad
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Telefono
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Accion
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($usuarios as $key => $usua)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600">
                                <td class="px-6 py-4">
                                    {{ $key+1 }}
                                </td>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $usua->dni }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $usua->nombre }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $usua->apellido }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $usua->edad }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $usua->email }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $usua->direccion }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $usua->ciudad }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $usua->telefono }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    @if (Auth::user()->rol == 'admin' || Auth::user()->id == $eventos->user_id || Auth::user()->id == $usua->id)
                                    <a href="/evento/{{ $eventos->id }}/user/{{ $usua->id }}/borrar" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
