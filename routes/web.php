<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginsController;
use App\Http\Controllers\AdmsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Rotas gerais
Route::get('/', [LoginsController::class, 'login']);
Route::get('/logout', [LoginsController::class, 'logout']);
Route::post('/Forms-login', [LoginsController::class, 'loginForms'])->name('login.login');
Route::get('/esqueceuSenha', [LoginsController::class, 'indexSenha']);
Route::post('/esqueceuSenha-Forms-email', [LoginsController::class, 'esqueceuSenhaFormsEmail'])->name('recSenhaToEmail');
Route::post('/esqueceuSenha-Forms', [LoginsController::class, 'esqueceuSenhaForms'])->name('recSenhaEntidade');
//Fim do geral

//ADM
Route::get('/homeAdm', [AdmsController::class, 'index'])->middleware('auth');
