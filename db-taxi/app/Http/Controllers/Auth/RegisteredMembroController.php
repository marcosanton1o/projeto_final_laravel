<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'], // Corrigido: 'unique:users,email'
            'senha' => ['required', 'confirmed', Rules\Password::defaults()],
            'cpf' => ['required', 'string', 'size:11'], // Exemplo de validação para CPF
            'placa_carro' => ['nullable', 'string', 'max:7'], // Validação opcional para placa de carro
            'idade' => ['required', 'integer', 'min:18'], // Exemplo de validação para idade mínima
        ]);

        $postoId = Auth::membro()->posto_id;

        $membro = membro::create([
            'nome' => $request->name,
            'email' => $request->email,
            'senha' => Hash::make($request->password),
            'cpf' => $request->cpf,
            'placa_carro' => $request->placa_carro,
            'idade' => $request->idade,
            'email' => $request->email,
            'posto_id' => $request->email,
        ]);

        event(new Registered($membro));

        return redirect(route('dashboard', absolute: false));
    }
}
