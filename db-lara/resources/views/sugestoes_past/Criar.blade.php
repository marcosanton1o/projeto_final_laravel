@auth

<x-app-layout>
        <form action="{{ route('sugestaostore')}}" method="post">
            @csrf

        <div>
            <x-input-label for="name" :value="__('Título')" />
            <x-text-input id="titulo" class="block mt-1 w-full" type="text" name="titulo"  required />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="email" :value="__('Descrição')" />
            <x-text-input id="descricao" class="block mt-1 w-full" type="text" name="descricao" required  />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('sugestaoindex') }}">
                {{ __('Gostaria de voltar?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Criar') }}
            </x-primary-button>
        </div>
    </form>
</x-app-layout>
@endauth
