<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Posto;
use App\Models\Corrida;
use App\Models\Sugestao;
use App\Models\User;
use Routes\web;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Http\Controllers\Controller\Admin_postController;

class RegisteredUserController extends Controller
{


    public function create()

    {

        if (Auth::check()) {
            $cargo = Auth::user()->cargo;
        }

        $postos = Posto::all();



        return view('auth.register', [

            'postos' => $postos,
        ]);


    }
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
{
    $posto_id_posto = $request->input('posto_id_posto', false);

    $cargo = $request->input('cargo');

    if ($cargo == 1 && !empty($posto_id_posto)) {
        return redirect()
            ->route('register')
            ->with('adminerro', 'Erro: Não é permitido criar o administrador de postos ter um posto');
    }
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'cpf' => ['required', 'string', 'max:14'],
        'cargo' => ['required', 'integer', 'in:1,2,3'],
        'sugestao_id_user' => ['nullable', 'exists:sugestao,id_sugestao'],
        'corrida_user' => ['nullable', 'exists:registro_corrida,id_registro_corrida'],
        'numero_tel' => ['required', 'string', 'max:15'],
        'placa_carro' => ['nullable', 'string', 'max:10'],
        'data_nascimento' => ['required', 'date'],
    ]);
    if ($cargo == 1 && $posto_id_posto == null) {
        $rules['posto_id_posto'] = ['nullable', 'exists:postos,id_posto'];
    } else {
        $rules['posto_id_posto'] = ['required', 'exists:postos,id_posto'];
    }

    $request->validate($rules);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'cpf' => $request->cpf,
        'posto_id_posto' => $request->posto_id_posto,
        'numero_tel' => $request->numero_tel,
        'placa_carro' => $request->placa_carro,
        'cargo' => $request->cargo,
        'data_nascimento' => $request->data_nascimento,
    ]);
    event(new Registered($user));

    Auth::login($user);
    $request->session()->regenerate();

    if ($cargo == 1) {
        return redirect()->route('admin_postindex')->with('success', 'Seja bem vindo!');
    } elseif ($cargo == 2) {
        return redirect()->route('adminindex')->with('success', 'Seja bem vindo!');
    } elseif ($cargo == 3) {
        return redirect()->route('user')->with('success', 'Seja bem vindo!');
    } else {
        return redirect('/');
    }

}

}




