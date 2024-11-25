@auth

<x-guest-layout>
        <form action="{{ route('avisoupdate', $aviso->id_aviso) }}" method="post">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <div class="mb-6">
                <x-input-label for="name" :value="__('Titulo')" />
                <x-text-input id="titulo" name="titulo" class="block mt-1 w-full" type="text"  required />
                <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
            </div>
            <div class="mb-6">
                <x-input-label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" :value="__('Seu aviso')" />
                <x-text-input type="text" id="conteudo" name="conteudo" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-white text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                <x-input-error :messages="$errors->get('conteudo')" class="mt-2" />
            </div>
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('avisoindex') }}">
                    {{ __('Gostaria de voltar?') }}
                </a>

                <x-primary-button class="ms-4">
                    {{ __('Criar') }}
                </x-primary-button>
            </div>
        </form>
</x-guest-layout>
@endauth

