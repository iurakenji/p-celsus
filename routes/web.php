<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\MpController;
use App\Http\Controllers\TipoAcessoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Route::resource('usuario', UsuarioController::class);

Route::get('/home', [PagesController::class, 'home'])->name('home');

Route::get('/', [PagesController::class, 'index'])->name('index');
Route::post('/login/authenticate', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/login/logout', [LoginController::class, 'logout'])->name('login.logout');

Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
Route::get('/usuarios/{usuario}', [UsuarioController::class, 'show'])->name('usuarios.show');
Route::get('/usuarios/{usuario}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{usuario}', [UsuarioController::class, 'update'])->name('usuarios.update');
Route::delete('/usuarios/{usuario}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');

Route::get('/tipo_acessos', [TipoAcessoController::class, 'index'])->name('tipo_acessos.index');
Route::get('/tipo_acessos/create', [TipoAcessoController::class, 'create'])->name('tipo_acessos.create');
Route::post('/tipo_acessos', [TipoAcessoController::class, 'store'])->name('tipo_acessos.store');
Route::get('/tipo_acessos/{tipo_acesso}', [TipoAcessoController::class, 'show'])->name('tipo_acessos.show');
Route::get('/tipo_acessos/{tipo_acesso}/edit', [TipoAcessoController::class, 'edit'])->name('tipo_acessos.edit');
Route::put('/tipo_acessos/{tipo_acesso}', [TipoAcessoController::class, 'update'])->name('tipo_acessos.update');
Route::delete('/tipo_acessos/{tipo_acesso}', [TipoAcessoController::class, 'destroy'])->name('tipo_acessos.destroy');

Route::get('/mps', [MpController::class, 'index'])->name('mps.index');

