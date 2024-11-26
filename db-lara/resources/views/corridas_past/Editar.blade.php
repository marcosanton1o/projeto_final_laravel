@auth

<x-app-layout>
        <form action="{{ route('corridaupdate', $corrida->id_registro_corrida) }}" method="post">
            @csrf
            <input type="hidden" name="_method" value="PUT">
        <div>
            <x-input-label for="name" :value="__('Nome do cliente')" />
            <x-text-input id="nome_cliente" class="block mt-1 w-full" type="text" name="nome_cliente"  required />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="email" :value="__('Preço')" />
            <x-text-input id="preco" class="block mt-1 w-full" type="number" name="preco" required  />
            <x-input-error :messages="$errors->get('preco')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('corridaindex') }}">
                {{ __('Gostaria de voltar?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Editar') }}
            </x-primary-button>
        </div>
    </form>
</x-app-layout>
@endauth
