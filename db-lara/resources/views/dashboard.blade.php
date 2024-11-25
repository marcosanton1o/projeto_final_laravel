@auth

<?php
$cargo = Auth::user()->cargo;

?><x-app-layout>
    <x-slot name="header">
        <div class="justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Bem Vindo ') . Auth::user()->name }}
                </h2>
            </div>
            </x-slot>

            <div class="py-8">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            {{ __("You're logged in!") }}
                        </div>
                    </div>
                </div>
            </div>
</x-app-layout>
@endauth

