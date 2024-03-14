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
use App\Http\Controllers\LoteController;
use App\Http\Controllers\LoteFisicoController;
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

Route::get('/home', [PagesController::class, 'home'])->name('home')->middleware('auth.basic');

Route::get('/dados', [DadoController::class, 'dados'])->name('dados')->middleware('auth.basic');

Route::get('/', [PagesController::class, 'index'])->name('index')->middleware('auth.basic');

Route::post('/login/authenticate', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/login/logout', [LoginController::class, 'logout'])->name('login.logout');

Route::post('/mps/query', [MpController::class, 'query'])->name('mps.query')->middleware('auth.basic');

Route::get('/mps/{mp}/{analise}/analiseobs_index', [MpController::class, 'analiseobs_index'])->name('mps.analiseobs_index')->middleware('auth.basic');
Route::get('/mps/{mp}/{analise}/analiseobs_destroy/{observacao}', [MpController::class, 'analiseobs_destroy'])->name('mps.analiseobs_destroy')->middleware('auth.basic');
Route::get('/mps/{mp}/{analise}/analiseobs_add/{observacao}', [MpController::class, 'analiseobs_add'])->name('mps.analiseobs_add')->middleware('auth.basic');

Route::get('/mps/{mp}/obs_index', [MpController::class, 'obs_index'])->name('mps.obs_index')->middleware('auth.basic');
Route::get('/mps/{mp}/obs_delete/{id}', [MpController::class, 'obs_delete'])->name('mps.obs_delete')->middleware('auth.basic');
Route::get('/mps/{mp}/obs_create/{id}', [MpController::class, 'obs_create'])->name('mps.obs_create')->middleware('auth.basic');
Route::get('/mps/{mp}/obs_show', [MpController::class, 'obs_show'])->name('mps.obs_show')->middleware('auth.basic');

Route::get('/mps/{mp}/risco_index', [MpController::class, 'risco_index'])->name('mps.risco_index')->middleware('auth.basic');
Route::get('/mps/{mp}/risco_delete/{id}', [MpController::class, 'risco_delete'])->name('mps.risco_delete')->middleware('auth.basic');
Route::get('/mps/{mp}/risco_create/{id}', [MpController::class, 'risco_create'])->name('mps.risco_create')->middleware('auth.basic');
Route::get('/mps/{mp}/risco_show', [MpController::class, 'risco_show'])->name('mps.risco_show')->middleware('auth.basic');

Route::get('/mps/{mp}/setor_index', [MpController::class, 'setor_index'])->name('mps.setor_index')->middleware('auth.basic');
Route::get('/mps/{mp}/setor_delete/{id}', [MpController::class, 'setor_delete'])->name('mps.setor_delete')->middleware('auth.basic');
Route::get('/mps/{mp}/setor_create/{id}', [MpController::class, 'setor_create'])->name('mps.setor_create')->middleware('auth.basic');
Route::get('/mps/{mp}/setor_show', [MpController::class, 'setor_show'])->name('mps.setor_show')->middleware('auth.basic');

Route::get('/mps/{mp}/analise_index', [MpController::class, 'analise_index'])->name('mps.analise_index')->middleware('auth.basic');
Route::get('/mps/{mp}/analise_delete/{id}', [MpController::class, 'analise_delete'])->name('mps.analise_delete')->middleware('auth.basic');
Route::get('/mps/{mp}/analise_save/{id}/{analise}', [MpController::class, 'analise_save'])->name('mps.analise_save')->middleware('auth.basic');
Route::get('/mps/{mp}/analise_show', [MpController::class, 'analise_show'])->name('mps.analise_show')->middleware('auth.basic');
Route::get('/mps/{mp}/analise_edit/{id}/{analise}', [MpController::class, 'analise_edit'])->name('mps.analise_edit')->middleware('auth.basic');

Route::post('/observacaos/obs_query', [ObservacaoController::class, 'obs_query'])->name('observacaos.obs_query')->middleware('auth.basic');

/*
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
Route::get('/usuarios/{usuario}', [UsuarioController::class, 'show'])->name('usuarios.show');
Route::get('/usuarios/{usuario}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{usuario}', [UsuarioController::class, 'update'])->name('usuarios.update');
Route::delete('/usuarios/{usuario}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');*/

Route::get('/LoteFisicos', [loteFisicoController::class, 'index', ])->name('loteFisicos.index')->middleware('auth.basic');

Route::get('/{analise}/varCategoricas/', [varCategoricaController::class, 'index', ])->name('varCategoricas.index')->middleware('auth.basic');
Route::get('/varCategoricas/{analise}/create/', [VarCategoricaController::class, 'create'])->name('varCategoricas.create')->middleware('auth.basic');
Route::put('/varCategoricas/{varCategorica}', [varCategoricaController::class, 'update'])->name('varCategoricas.update')->middleware('auth.basic');
Route::get('/varCategoricas/{varCategorica}', [VarCategoricaController::class, 'show'])->name('varCategoricas.show')->middleware('auth.basic');
Route::get('/varCategoricas/{varCategorica}/destroy', [varCategoricaController::class, 'destroy'])->name('varCategoricas.destroy')->middleware('auth.basic');
Route::post('/{analise}/varCategoricas/', [varCategoricaController::class, 'store'])->name('varCategoricas.store');

Route::resource('analises', AnaliseController::class)->except(['update'])->middleware('auth.basic');
Route::put('/analises/{analise}', [AnaliseController::class, 'update'])->name('analises.update')->middleware('auth.basic');
Route::get('/analises/addObs/{analise}/{observacao}', [AnaliseController::class, 'addObs'])->name('analises.addObs')->middleware('auth.basic');
Route::get('/analises/delObs/{analise}/{observacao}', [AnaliseController::class, 'delObs'])->name('analises.delObs')->middleware('auth.basic');


Route::match(['get','post'],'/lotes/mp_index/{query?}', [LoteController::class, 'mp_index'])->name('lotes.mp_index')->middleware('auth.basic');
Route::get('/lotes/conferencia_index', [LoteController::class, 'conferencia_index'])->name('lotes.conferencia_index')->middleware('auth.basic');
Route::get('/lotes/conferencia/show_1/{lote}', [LoteController::class, 'conferencia_show_1'])->name('lotes.conferencia_show_1')->middleware('auth.basic');
Route::match(['put','get'],'/lotes/conferencia/show_2/{mp}/{lote}', [LoteController::class, 'conferencia_show_2'])->name('lotes.conferencia_show_2')->middleware('auth.basic');
Route::match(['put','get'], '/lotes/conferencia/show_3/{mp}/{lote}', [LoteController::class, 'conferencia_show_3'])->name('lotes.conferencia_show_3')->middleware('auth.basic');
Route::match(['put','get'], '/lotes/conferencia/show_3/{mp}/{lote}/addset/{set}', [LoteController::class, 'conferencia_show_3_addset'])->name('lotes.conferencia_show_3_addset')->middleware('auth.basic');
Route::match(['put','get'], '/lotes/conferencia/show_3/{mp}/{lote}/addultimo', [LoteController::class, 'conferencia_show_3_addultimo'])->name('lotes.conferencia_show_3_addultimo')->middleware('auth.basic');
Route::match(['put','get'], '/lotes/conferencia/show_3/{mp}/{lote}/addum/{analise}', [LoteController::class, 'conferencia_show_3_addum'])->name('lotes.conferencia_show_3_addum')->middleware('auth.basic');
Route::match(['put','get'], '/lotes/conferencia/show_3/{mp}/{lote}/save', [LoteController::class, 'conferencia_show_3_save'])->name('lotes.conferencia_show_3_save')->middleware('auth.basic');
Route::get('/lotes/conferencia/show_3/{mp}/{lote}/save/{id}', [LoteController::class, 'conferencia_show_3_delete'])->name('lotes.conferencia_show_3_delete')->middleware('auth.basic');
Route::match(['put','get'], '/lotes/conferencia/show_4/{mp}/{lote}', [LoteController::class, 'conferencia_show_4'])->name('lotes.conferencia_show_4')->middleware('auth.basic');
Route::get('/lotes/conferencia/addObs/{mp}/{lote}/{obs}', [LoteController::class, 'conferencia_addObs'])->name('lotes.conferencia_addObs')->middleware('auth.basic');
Route::get('/lotes/conferencia/addObsAnalise/{mp}/{lote}/{obs}/{analise}/{tipo}', [LoteController::class, 'conferencia_addObsAnalise'])->name('lotes.conferencia_addObsAnalise')->middleware('auth.basic');
Route::get('/lotes/conferencia/delObsAnalise/{mp}/{lote}/{obs}/{analise}/{tipo}', [LoteController::class, 'conferencia_delObsAnalise'])->name('lotes.conferencia_delObsAnalise')->middleware('auth.basic');
Route::get('/lotes/conferencia/delObs/{mp}/{lote}/{obs}', [LoteController::class, 'conferencia_delObs'])->name('lotes.conferencia_delObs')->middleware('auth.basic');
Route::match(['put','get'], '/lotes/conferencia/show_5/{mp}/{lote}', [LoteController::class, 'conferencia_show_5'])->name('lotes.conferencia_show_5')->middleware('auth.basic');

Route::resource('lotes', LoteController::class)->except(['index', 'show', 'create', 'store'])->middleware('auth.basic');
Route::get('/{mp}/lotes', [LoteController::class, 'index'])->name('lotes.index')->middleware('auth.basic');
Route::get('/{mp}/lotes/{lote}', [LoteController::class, 'show'])->name('lotes.show')->middleware('auth.basic');
Route::get('/lotes/{mp}/create', [LoteController::class, 'create'])->name('lotes.create')->middleware('auth.basic');
Route::post('/lotes/{mp}/store', [LoteController::class, 'store'])->name('lotes.store')->middleware('auth.basic');



Route::resources([

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


