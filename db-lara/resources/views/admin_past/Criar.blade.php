
    @auth

<x-app-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-900">

        <div class="w-full flex-col sm:max-w-md mt-6 px-6 py-4 bg-yellow-400 shadow-md overflow-hidden sm:rounded-lg">
            <div class="flex justify-center">
                    <x-application-logo class="rounded-full w-20 h-20 fill-current text-gray-500" />

            </div>
            <div class="max-w-md mx-auto p-4">
        <form action="{{ route('adminstore') }}" method="post">
            @csrf

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="email" :value="__('Cargo')" />

            <select id="cargo" name="cargo" class="block mt-1 w-full" required autocomplete="username" >

                <option value="" disabled selected>Selecione um Cargo</option>

                    <option value="2">Administrador </option>
                    <option value="3">Usuário comum </option>


            </select>
            <x-input-error :messages="$errors->get('cargo')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="number" :value="__('Número de telefone')" />
            <x-text-input id="numero_tel" class="block mt-1 w-full" minlength="11" maxlength="15" type="number" name="numero_tel" :value="old('numero_tel')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('numero_tel')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="number" :value="__('CPF')" />
            <x-text-input id="cpf" class="block mt-1 w-full" type="number" name="cpf" minlength="12" maxlength="12" min:value="old('cpf')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('cpf')" class="mt-2" />

        </div>
<div class="mt-4">
    <x-input-label for="number" :value="__('Placa carro')" />
    <x-text-input id="placa_carro" class="block mt-1 w-full" type="number" minlength="7" maxlength="7" name="placa_carro" :value="old('placa_carro')" required autocomplete="username" />
    <x-input-error :messages="$errors->get('cpf')" class="mt-2" />
</div>
<div class="mt-4">
    <x-input-label for="number" :value="__('Data de nascimento')" />
    <input type="date" id="data_nascimento" placeholder="John Doe" name="data_nascimento" :value="old('data_nascimento')" required autocomplete="username"  class="block  mt-2 w-full placeholder-gray-400/70 dark:placeholder-gray-500 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-gray-700 focus:border-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:focus:border-blue-300" />
    <x-input-error :messages="$errors->get('data_nascimento')" class="mt-2" />
</div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Senha')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Registrar') }}
            </x-primary-button>
        </div>
    </form>
</x-app-layout>
@endauth
