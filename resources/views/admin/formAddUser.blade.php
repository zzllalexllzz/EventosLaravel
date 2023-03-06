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
                        <h3 class="dark:text-gray-300">INSCRIBIR USUARIO</h3>
                    </div>

                    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                        <form method='POST' action='/evento/user/store'>
                            @csrf
                            <!-- user_id -->
                            <input type="hidden" name="user_id" value={{Auth::user()->id}}>

                            <!-- evento -->
                            <input type="hidden" name="evento_id" value={{$evento->id}}>

                            <!-- user_id -->
                            <input type="hidden" name="estado" value="recibida">

                            <!-- numEntradas -->
                            <div>
                                <x-input-label for="numEntradas" :value="__('Numero Entradas')" />
                                <x-text-input id="numEntradas" class="block mt-1 w-full" type="number" name="numEntradas" :value="old('numEntradas')"
                                required autofocus autocomplete="numEntradas" />
                                <x-input-error :messages="$errors->get('numEntradas')" class="mt-2" />
                            </div>
                            <div class="mt-4">
                                <x-secondary-button type="submit">Inscribirme</x-secondary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
