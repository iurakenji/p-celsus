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
use App\Http\Controllers\DadoController;
use App\Http\Controllers\TipoController;
use App\Http\Controllers\AnaliseController;
use App\Http\Controllers\VarCategoricaController;
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

Route::get('/home', [PagesController::class, 'home'])->name('home');

Route::get('/dados', [DadoController::class, 'dados'])->name('dados');

Route::get('/', [PagesController::class, 'index'])->name('index');

Route::post('/login/authenticate', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/login/logout', [LoginController::class, 'logout'])->name('login.logout');

Route::post('/mps/query', [MpController::class, 'query'])->name('mps.query');

Route::get('/mps/{mp}/obs_index', [MpController::class, 'obs_index'])->name('mps.obs_index');
Route::get('/mps/{mp}/obs_delete/{id}', [MpController::class, 'obs_delete'])->name('mps.obs_delete');
Route::get('/mps/{mp}/obs_create/{id}', [MpController::class, 'obs_create'])->name('mps.obs_create');
Route::get('/mps/{mp}/obs_show', [MpController::class, 'obs_show'])->name('mps.obs_show');

Route::get('/mps/{mp}/risco_index', [MpController::class, 'risco_index'])->name('mps.risco_index');
Route::get('/mps/{mp}/risco_delete/{id}', [MpController::class, 'risco_delete'])->name('mps.risco_delete');
Route::get('/mps/{mp}/risco_create/{id}', [MpController::class, 'risco_create'])->name('mps.risco_create');
Route::get('/mps/{mp}/risco_show', [MpController::class, 'risco_show'])->name('mps.risco_show');

Route::get('/mps/{mp}/setor_index', [MpController::class, 'setor_index'])->name('mps.setor_index');
Route::get('/mps/{mp}/setor_delete/{id}', [MpController::class, 'setor_delete'])->name('mps.setor_delete');
Route::get('/mps/{mp}/setor_create/{id}', [MpController::class, 'setor_create'])->name('mps.setor_create');
Route::get('/mps/{mp}/setor_show', [MpController::class, 'setor_show'])->name('mps.setor_show');

Route::post('/observacaos/obs_query', [ObservacaoController::class, 'obs_query'])->name('observacaos.obs_query');

/*
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
Route::get('/usuarios/{usuario}', [UsuarioController::class, 'show'])->name('usuarios.show');
Route::get('/usuarios/{usuario}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{usuario}', [UsuarioController::class, 'update'])->name('usuarios.update');
Route::delete('/usuarios/{usuario}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');*/


Route::get('/{analise}/varCategoricas/', [varCategoricaController::class, 'index', ])->name('varCategoricas.index');
Route::get('/varCategoricas/{analise}/create/', [VarCategoricaController::class, 'create'])->name('varCategoricas.create');
Route::put('/varCategoricas/{varCategorica}', [varCategoricaController::class, 'update'])->name('varCategoricas.update');
Route::get('/varCategoricas/{varCategorica}', [VarCategoricaController::class, 'show'])->name('varCategoricas.show');
Route::get('/varCategoricas/{varCategorica}/destroy', [varCategoricaController::class, 'destroy'])->name('varCategoricas.destroy');
Route::post('/{analise}/varCategoricas/', [varCategoricaController::class, 'store'])->name('varCategoricas.store');

Route::resources([

    'analises' => AnaliseController::class,

    'usuarios' => UsuarioController::class,

    'mps' => MpController::class,

    'tipo_acessos' => TipoAcessoController::class,

    'setors' => SetorController::class,

    'riscos' => RiscoController::class,

    'acaos' => AcaoController::class,

    'armazenamentos' => ArmazenamentoController::class,

    'fornecedors' => FornecedorController::class,

    'grupodescartes' => GrupoDescarteController::class,

    'locals' => LocalController::class,

    'observacaos' => ObservacaoController::class,

    'referencias' => ReferenciaController::class,

    'fracionamentos' => FracionamentoController::class,

    'tipos' => TipoController::class,

]);


