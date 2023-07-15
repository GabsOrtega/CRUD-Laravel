<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\TestDevelopController;
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

Route::get('/', [UsuariosController::class, 'index']);

Route::get('/usuarios/create', [UsuariosController::class, 'create'])->name('cadastrar_dados');

Route::post('/usuarios/create', [UsuariosController::class, 'store'])->name('cadastrar_usuario');

Route::get('/usuarios/usuario/{id}', [UsuariosController::class, 'show'])->name('visualizar_usuario');

Route::post('/usuarios/usuario/{id}', [UsuariosController::class, 'update'])->name('atualizar_usuario');

Route::get('/usuarios/delete/{id}', [UsuariosController::class, 'delete'])->name('excluir_usuario');

Route::post('/usuarios/delete/{id}', [UsuariosController::class, 'destroy'])->name('deletar_usuario');

Route::get('/test', [TestDevelopController::class, 'index']);
