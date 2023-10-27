<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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

Route::get('/', [PagesController::class,'index'])->name('index');

Route::get('/home', [PagesController::class,'home'])->name('home');
Route::get('/usuarios', [PagesController::class,'usuarios'])->name('usuarios');
Route::get('/usuarios/{slug}', [PagesController::class,'usuarios_detalhes'])->name('usuarios_detalhes');

Route::view('login', 'login.form')->name('login.form');
route::post('/auth', [LoginController::class,'auth'])->name('login.auth');

