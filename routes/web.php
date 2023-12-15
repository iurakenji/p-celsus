<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PagesController;
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

route::get("/request", function (\Illuminate\Http\Request $request) {
    $r = $request;
    dd($r);
    return 'Sim';
});

Route::get('/', [PagesController::class, 'index'])->name('index');

Route::get('/home', [PagesController::class, 'home'])->name('home');

Route::post('/login/authenticate', [LoginController::class, 'authenticate'])->name('login.authenticate');

Route::get('/login/logout', [LoginController::class, 'logout'])->name('login.logout');

Route::get('/usuario/{slug}', [PagesController::class, 'usuario'])->name('usuario');

Route::get('/usuarios/usuarios', [PagesController::class, 'usuarios'])->name('usuarios');

Route::get('/mps', [PagesController::class, 'mps'])->name('mps');

