<?php
$cargo = Auth::user()->cargo;
?>

<x-app-layout>
    <x-slot name="header">
        <x-slot name="header">
            <div class="justify-between">
                    <h2 class="font-semibold text-xl text-black leading-tight">
                        {{ __('Seu Posto')}}
                    </h2>
                </div>
                </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

@if($cargo == 3)

<div class="relative overflow-x-auto">
    <table class="w-full min-w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID:
                </th>
                <th scope="col" class="px-6 py-3">
                    Nome:
                </th>
                <th scope="col" class="px-6 py-3">
                    Email:
                </th>
                <th scope="col" class="px-6 py-3">
                    Numero de Telefone:
                </th>
                <th scope="col" class="px-6 py-3">
                    Data de Nascimento:
                </th>
            </tr>
        </thead>
        <tbody>
@foreach ($users as $user)
            <tr class="bg-gray-100 border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $user->id }}
                </th>
                <td class="px-6 py-4">
                    {{ $user->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $user->email }}
                </td>
                <td class="px-6 py-4">
                    {{ $user->numero_tel }}
                </td>
                <td class="px-6 py-4">
                    {{ $user->data_nascimento }}
                </td>
            </tr>

@endforeach
        </tbody>
    </table>
</div>

@elseif($cargo == 2)
@if (session()->has('message'))
{{session()->get('message')}}
@endif
<div class="relative overflow-x-auto">

    <table class="w-full min-w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <a href="{{ route('users.create') }}" class="inline-block px-6 py-2 mb-2 text-white bg-sky-800 hover:bg-blue-700 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
            Criar Membro
        </a>
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID:
                </th>
                <th scope="col" class="px-6 py-3">
                    Nome:
                </th>
                <th scope="col" class="px-6 py-3">
                    Email:
                </th>
                <th scope="col" class="px-6 py-3">
                    Numero de Telefone:
                </th>
                <th scope="col" class="px-6 py-3">
                    Data de Nascimento:
                </th>
                <th scope="col" class="px-6 py-3">
                    Editar
                </th>
                <th scope="col" class="px-6 py-3">
                    Apagar
                </th>
            </tr>
        </thead>
        <tbody>
@foreach ($users as $user)
            <tr class="bg-gray-100 border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $user->id }}
                </th>
                <td class="px-6 py-4">
                    {{ $user->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $user->email }}
                </td>
                <td class="px-6 py-4">
                    {{ $user->numero_tel }}
                </td>
                <td class="px-6 py-4">
                    {{ $user->data_nascimento }}
                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('admin.users.edit',['user' => $user->id])}}">
                    <svg class="h-8 w-8 text-gray-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                    </a>
                </td>
                <td class="px-6 py-4">
                    <button id="openModalButton" class="px-4 py-2 text-white bg-transparent rounded">
                        <svg class="h-8 w-8 text-red-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                          </svg>

                      </button>

                      <dialog id="modal" class="relative p-6 bg-white rounded-lg shadow-lg">
                        <button id="closeModalButtonTop" class="close-button">
                          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-700 hover:text-gray-900" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                          </svg>
                        </button>
                        <h2 class="mb-4 text-lg font-semibold">Apagar {{ $user->name }}</h2>
                        <p class="mb-4 text-gray-700">
                          Você tem certeza de que quer apagar?
                        </p>
                        <div class="flex justify-end space-x-2">
                          <button id="closeModalButtonBottom" class="px-4 py-2 text-white bg-gray-500 rounded">
                            Sair
                          </button>
<form action="{{ route('admin.users.delete',['user' => $user->id])}}" method="post">
@csrf
<input type="hidden" name="_method" value="DELETE">
<button type="submit" class="px-4 py-2 text-white bg-red-600 rounded ">Apagar</button>
                        </form>
                        </div>
                      </dialog>
                </td>
            </tr>

@endforeach
        </tbody>
    </table>
</div>
@elseif($cargo == 1)

<div class="relative overflow-x-auto">
    <table class="w-full min-w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID:
                </th>
                <th scope="col" class="px-6 py-3">
                    Estado:
                </th>
                <th scope="col" class="px-6 py-3">
                    Cidade:
                </th>
                <th scope="col" class="px-6 py-3">
                    Numero de Telefone:
                </th>
                <th scope="col" class="px-6 py-3">
                    cep:
                </th>
            </tr>
        </thead>
        <tbody>
@foreach ($users as $user)
            <tr class="bg-gray-100 justify-center border-b dark:bg-gray-800 dark:border-gray-700">

                <td colspan="5" class="px-6 text-center py-4">
                    Não tem nada
                </td>
            </tr>

@endforeach
        </tbody>
    </table>
</div>
@endif

        </div>
    </div>
</x-app-layout>
