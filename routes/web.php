<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\UserManagementController;

// Redireciona a raiz para o login
Route::get('/', function () {
    return redirect()->route('login');
});

// Login manual
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Áreas protegidas
Route::middleware('auth')->group(function () {
    Route::view('/menu', 'menu')->name('menu');

    // Acesso apenas para ADMIN
    Route::middleware('auth')->group(function () {
        Route::get('/permissoes', [UserManagementController::class, 'permissoes'])->name('permissoes');
        Route::post('/permissoes', [UserManagementController::class, 'atualizarPermissao'])->name('permissoes.atualizar');


        Route::get('/usuarios', [UserManagementController::class, 'index'])->name('usuarios');
        Route::post('/usuarios', [UserManagementController::class, 'store'])->name('usuarios.store');
        Route::delete('/usuarios/{user}', [UserManagementController::class, 'destroy'])->name('usuarios.destroy');
    });

    
    // Acesso para COMUM com permissão de acesso

    Route::middleware('auth')->group(function () {
        // Rota de Produtos
        Route::get('/produtos', [UserManagementController::class, 'produtos'])->name('produtos');

        // Rota de Categorias
        Route::get('/categorias', [UserManagementController::class, 'categorias'])->name('categorias');

        // Rota de Marcas
        Route::get('/marcas', [UserManagementController::class, 'marcas'])->name('marcas');
    });

});

/* 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\UserManagementController;

// Redireciona a raiz para o login
Route::get('/', function () {
    return redirect()->route('login');
});

// Login manual
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Áreas protegidas
Route::middleware('auth')->group(function () {
    Route::view('/menu', 'menu')->name('menu');

    // Acesso apenas para ADMIN
    Route::middleware('auth')->group(function () {
      
        Route::get('/permissoes', [UserManagementController::class, 'permissoes'])->name('permissoes');
        Route::post('/permissoes/{user}', [UserManagementController::class, 'atualizarPermissao'])->name('permissoes.atualizar');

        Route::get('/usuarios', [UserManagementController::class, 'index'])->name('usuarios');
        Route::post('/usuarios', [UserManagementController::class, 'store'])->name('usuarios.store');
        Route::delete('/usuarios/{user}', [UserManagementController::class, 'destroy'])->name('usuarios.destroy');
    });


    /* Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/permissoes', [UserManagementController::class, 'permissoes'])->name('permissoes');
        Route::post('/permissoes/{user}', [UserManagementController::class, 'atualizarPermissao'])->name('permissoes.atualizar');

        Route::get('/usuarios', [UserManagementController::class, 'index'])->name('usuarios');
        Route::post('/usuarios', [UserManagementController::class, 'store'])->name('usuarios.store');
        Route::delete('/usuarios/{user}', [UserManagementController::class, 'destroy'])->name('usuarios.destroy');
    }); *

    // Acesso para ADMIN e COMUM
    Route::middleware('role:admin,comum')->group(function () {
        Route::view('/produtos', 'produtos')->name('produtos');
        Route::view('/categorias', 'categorias')->name('categorias');
        Route::view('/marcas', 'marcas')->name('marcas');
    });
});
 */

