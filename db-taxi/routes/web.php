<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MembroController;
use App\Http\Controllers\AdministradorController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/membro', [MembroController::class, 'index' ])->name('membro.index');
Route::get('/membro/create', [MembroController::class, 'create' ])->name('membro.create');
Route::post('/membro', [MembroController::class, 'store' ])->name('membro.store');
Route::get('/membro/{membr}', [MembroController::class, 'show' ])->name('membro.show');
Route::get('/membro/{membr}/edit', [MembroController::class, 'edit' ])->name('membro.edit');
Route::put('/membro/{membr}', [MembroController::class, 'update' ])->name('membro.update');
Route::delete('/membro/{membr}', [MembroController::class, 'destroy' ])->name('membro.destroy');

Route::get('/administrador', [MembroController::class, 'index' ])->name('administrador.index');
Route::get('/administrador/create', [MembroController::class, 'create' ])->name('administrador.create');
Route::post('/administrador', [MembroController::class, 'store' ])->name('administrador.store');
Route::get('/administrador/{admini}', [MembroController::class, 'show' ])->name('administrador.show');
Route::get('/administrador/{admini}/edit', [MembroController::class, 'edit' ])->name('administrador.edit');
Route::put('/administrador/{admini}', [MembroController::class, 'update' ])->name('administrador.update');
Route::delete('/administrador/{admini}', [MembroController::class, 'destroy' ])->name('administrador.destroy');

// Route::get('/posto', [MembroController::class, 'index' ])->name('membro.index');
// Route::get('/posto/create', [MembroController::class, 'create' ])->name('membro.create');
// Route::post('/posto', [MembroController::class, 'store' ])->name('membro.store');
// Route::get('/posto/{pos}', [MembroController::class, 'show' ])->name('membro.show');
// Route::get('/posto/{pos}/edit', [MembroController::class, 'edit' ])->name('membro.edit');
// Route::put('/posto/{pos}', [MembroController::class, 'update' ])->name('membro.update');
// Route::delete('/posto/{pos}', [MembroController::class, 'destroy' ])->name('membro.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
