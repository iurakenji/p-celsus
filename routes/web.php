<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\MpController;
use App\Http\Controllers\TipoAcessoController;
use App\Http\Controllers\SetorController;
use App\Http\Controllers\RiscoController;
use App\Http\Controllers\AcaoController;
use App\Http\Controllers\ArmazenamentoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\GrupoDescarteController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\ObservacaoController;
use App\Http\Controllers\ReferenciaController;
use App\Http\Controllers\FracionamentoController;
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

route::resource('usuarios',UsuarioController::class);
/*Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
Route::get('/usuarios/{usuario}', [UsuarioController::class, 'show'])->name('usuarios.show');
Route::get('/usuarios/{usuario}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{usuario}', [UsuarioController::class, 'update'])->name('usuarios.update');
Route::delete('/usuarios/{usuario}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');*/

route::resource('tipo_acessos',TipoAcessoController::class);

route::resource('mps',MpController::class);

route::resource('setors',SetorController::class);

route::resource('riscos',RiscoController::class);

route::resource('acaos',AcaoController::class);

route::resource('armazenamentos',ArmazenamentoController::class);

route::resource('fornecedors',FornecedorController::class);

route::resource('grupodescartes',GrupoDescarteController::class);

route::resource('locals',LocalController::class);

route::resource('observacaos',ObservacaoController::class);

route::resource('referencias',ReferenciaController::class);

route::resource('fracionamentos',FracionamentoController::class);

