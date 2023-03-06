<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Administrador') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class=" flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
                    <div>
                        <h3 class="dark:text-gray-300">AÑADIR EVENTO</h3>
                    </div>
        
                    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                        <form method='POST' action='/evento/store' enctype="multipart/form-data">
                            @csrf
                            <!-- Nombre -->
                            <div>
                                <x-input-label for="nombre" :value="__('Nombre')" />
                                <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus autocomplete="nombre" />
                                <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                            </div>
                            <!-- Fecha -->
                            <div>
                                <x-input-label for="fecha" :value="__('Fecha')" />
                                <x-text-input id="fecha" class="block mt-1 w-full" type="date" name="fecha" :value="old('fecha')" required autofocus autocomplete="fecha" />
                                <x-input-error :messages="$errors->get('fecha')" class="mt-2" />
                            </div>
                            <!-- Descripcion -->
                            <div>
                                <x-input-label for="descripcion" :value="__('Descripcion')" />
                                <textarea class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="descripcion" name="descripcion"  required autofocus autocomplete="descripcion"></textarea>
                                <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
                            </div>
                            <!-- Ciudad -->
                            <div>
                                <x-input-label for="ciudad" :value="__('Ciudad')" />
                                <x-text-input id="ciudad" class="block mt-1 w-full" type="text" name="ciudad" :value="old('ciudad')" required autofocus autocomplete="ciudad" />
                                <x-input-error :messages="$errors->get('ciudad')" class="mt-2" />
                            </div>
                            <!-- Direccion -->
                            <div>
                                <x-input-label for="direccion" :value="__('Direccion')" />
                                <x-text-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" :value="old('direccion')" required autofocus autocomplete="direccion" />
                                <x-input-error :messages="$errors->get('direccion')" class="mt-2" />
                            </div>
                            <!-- Aforomax -->
                            <div>
                                <x-input-label for="aforomax" :value="__('Aforomax')" />
                                <x-text-input id="aforomax" class="block mt-1 w-full" type="number" name="aforomax" :value="old('aforomax')" required autofocus autocomplete="aforomax" />
                                <x-input-error :messages="$errors->get('aforomax')" class="mt-2" />
                            </div>
                            <!-- Tipo -->
                            <div>
                                <x-input-label for="tipo" :value="__('Tipo')" />
                                <select class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="tipo"  name="tipo" type="text" placeholder="" required>
                                    <option>Elige...</option>
                                    <option value="online">Online</option>
                                    <option value="presencial">Presencial</option>
                                </select>
                                <x-input-error :messages="$errors->get('tipo')" class="mt-2" />
                            </div>
                            <!-- NumMaxEntrada -->
                            <div>
                                <x-input-label for="numMaxEntradas" :value="__('Nº Maximo Entradas')" />
                                <x-text-input id="numMaxEntradas" class="block mt-1 w-full" type="number" name="numMaxEntradas" :value="old('numMaxEntradas')" required autofocus autocomplete="numMaxEntradas" />
                                <x-input-error :messages="$errors->get('numMaxEntradas')" class="mt-2" />
                            </div>
                            <!-- Categoria -->
                            <div>
                                <x-input-label for="categoria_id" :value="__('Categoria')" />
                                <select class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" id="categoria_id"  name="categoria_id" type="text" placeholder="" required>
                                    <option>Elige...</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('tipo')" class="mt-2" />
                            </div>
                            <!-- imagen -->
                            <div>
                                <x-input-label for="imagen" :value="__('Imagen')" />
                                <x-text-input id="imagen" class="block mt-1 w-full" type="file" name="imagen" :value="old('imagen')" required autofocus autocomplete="imagen" />
                                <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
                            </div>
                            <!-- User_id -->
                            <x-inputweb type='hidden' name='user_id' value='{{ Auth::user()->id }}' texto=''/>
                            <x-secondary-button type="submit">Crear</x-secondary-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
