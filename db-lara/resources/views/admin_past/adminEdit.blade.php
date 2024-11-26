@auth

<x-app-layout>
        <form action="{{ route('users.update', ['user' => $user->id]) }}" method="post">
            @csrf
            <input type="hidden" name="_method" value="PUT">

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $user->name }}" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $user->email }}" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="number" :value="__('Número de telefone')" />
            <x-text-input id="numero_tel" class="block mt-1 w-full" type="number" name="numero_tel" value="{{ $user->numero_tel }}" required autocomplete="username" />
            <x-input-error :messages="$errors->get('numero_tel')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="number" :value="__('CPF')" />
            <x-text-input id="cpf" class="block mt-1 w-full" type="number" name="cpf" value="{{ $user->cpf }}" required autocomplete="username" />
            <x-input-error :messages="$errors->get('cpf')" class="mt-2" />
        </div>
<div class="mt-4">
    <x-input-label for="number" :value="__('Placa carro')" />
    <x-text-input id="placa_carro" class="block mt-1 w-full" type="number" name="placa_carro" value="{{ $user->placa_carro }}" required autocomplete="username" />
    <x-input-error :messages="$errors->get('cpf')" class="mt-2" />
</div>
<div class="mt-4">
    <x-input-label for="number" :value="__('Data de nascimento')" />
    <input type="date" id="data_nascimento" placeholder="John Doe" name="data_nascimento" value="{{ $user->data_nascimento }}" required autocomplete="username"  class="block  mt-2 w-full placeholder-gray-400/70 dark:placeholder-gray-500 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300" />
    <x-input-error :messages="$errors->get('data_nascimento')" class="mt-2" />
</div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Gostaria de voltar?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Editar') }}
            </x-primary-button>
        </div>
    </form>
</x-app-layout>
@endauth
