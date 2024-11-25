<?php

namespace App\Http\Controllers\Auth;

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{

    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {

        $request->authenticate();

        $request->session()->regenerate();

        $cargo=Auth::user()->cargo;

        if($cargo == 1){

    return redirect()->route('admin_post');

}
        elseif ($cargo == 2){

    return redirect()->route('adminindex');

    }
    elseif ($cargo == 3){

        return redirect()->route('user');

        }

else{
return redirect('/');
}

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}