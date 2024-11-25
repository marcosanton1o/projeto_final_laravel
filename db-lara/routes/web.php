<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostoController;
use App\Http\Middleware\Admin_postmiddleware;
use App\Http\Middleware\Adminmiddleware;
use App\Http\Middleware\Usermiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SugestaoController;
use App\Http\Controllers\CorridaController;
use App\Http\Controllers\AvisoController;

Route::get('/', function () {
    return view('auth.login');
});



Route::get('/user', function () {
    return view('dashboard');})
    ->middleware(['auth', 'verified','Usermiddleware'])
    ->name('usermid');

Route::get('/admin', function () {
    return view('admin');})
    ->middleware(['auth', 'verified','Adminmiddleware'])
    ->name('adminmid');

Route::get('/admin_post', function () {
    return view('admin_post');})
    ->middleware(['auth', 'verified','Admin_postmiddleware'])
    ->name('admin_postmid');

    Route::middleware(['auth', 'verified', 'Admin_postmiddleware'])->group(function () {

        Route::get('/admin_post', [Admin_postController::class, 'index'])->name('admin_post');

        Route::get('/admin_post/users', [Admin_postController::class, 'users'])->name('admin.post');

        Route::get('/admin_post/users/{id}', [Admin_postController::class, 'show'])->name('admin.post.show');

        Route::post('/admin_post/users/{id}/edit', [Admin_postController::class, 'edit'])->name('admin.post.edit');

        Route::delete('/admin_post/users/{id}', [Admin_postController::class, 'delete'])->name('admin.users.delete');

    });

    Route::middleware(['auth', 'verified', 'Adminmiddleware'])->group(function () {

        Route::get('/admin', [AdminController::class, 'index'])->name('adminindex');

        Route::get('/admin/{user}', [UserController::class, 'show'])->name('admin.users.show');

        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

        Route::post('/admin', [UserController::class, 'store'])->name('adminstore');

        Route::get('/admin/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');

        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');

        Route::delete('/admin/{user}', [UserController::class, 'destroy'])->name('admin.users.delete');

    });


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [UserController::class, 'index'])->name('userindex');
    Route::get('/admin', [AdminController::class, 'index'])->name('adminindex');

});


Route::middleware('auth')->group(function () {
    Route::get('/sugestao', [SugestaoController::class, 'index'])->name('sugestaoindex');

    Route::get('/sugestoes/{sugestao}', [SugestaoController::class, 'show'])->name('sugestaousers.show');

    Route::get('/sugestao/create', [SugestaoController::class, 'create'])->name('sugestaocreate');

    Route::post('/sugestoes', [SugestaoController::class, 'store'])->name('sugestaostore');

    Route::get('/sugestoe/{sugestao}/edit', [SugestaoController::class, 'edit'])->name('sugestaoedit');

    Route::put('/sugestao/{sugest}', [SugestaoController::class, 'update'])->name('sugestaoupdate');

    Route::delete('/sugestoes/{sugestao}', [SugestaoController::class, 'destroy'])->name('sugestaodelete');
});

Route::middleware('auth')->group(function () {
    Route::get('/corrida', [CorridaController::class, 'index'])->name('corridaindex');

    Route::get('/corridas/{corrida}', [CorridaController::class, 'show'])->name('corridausers.show');

    Route::get('/corrida/create', [CorridaController::class, 'create'])->name('corridacreate');

    Route::post('/corridas', [CorridaController::class, 'store'])->name('corridastore');

    Route::get('/corrida/{corrida}/edit', [CorridaController::class, 'edit'])->name('corridaedit');

    Route::put('/corrida/{corrid}', [CorridaController::class, 'update'])->name('corridaupdate');

    Route::delete('/corridas/{corrida}', [CorridaController::class, 'destroy'])->name('corridadelete');
});

Route::middleware('auth')->group(function () {
    Route::get('/avisos', [AvisoController::class, 'index'])->name('avisoindex');

    Route::get('/avisos/{aviso}', [AvisoController::class, 'show'])->name('avisoshow');

    Route::get('/aviso/create', [AvisoController::class, 'create'])->name('avisocreate');

    Route::post('/avisos', [AvisoController::class, 'store'])->name('avisostore');

    Route::get('/avisos/{aviso}/edit', [AvisoController::class, 'edit'])->name('avisoedit');

    Route::put('/aviso/{avis}', [AvisoController::class, 'update'])->name('avisoupdate');

    Route::delete('/avisos/{aviso}', [AvisoController::class, 'destroy'])->name('avisodelete');
});

Route::middleware('auth')->group(function () {
    Route::get('/postos', [PostoController::class, 'index'])->name('postoindex');

});
require __DIR__.'/auth.php';
