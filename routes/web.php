<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginsController;
use App\Http\Controllers\AdmsController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PersonalsController;

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
    //Insert teste
        Route::get('/insert', [Controller::class, 'cadastrarTestes']);
    //Login
        Route::get('/', [LoginsController::class, 'login']);
        Route::post('/Forms-login', [LoginsController::class, 'loginForms'])->name('login.login');
    //Logout
        Route::get('/logout', [LoginsController::class, 'logout']);
    //Esqueceu senha
        Route::get('/esqueceuSenha', [LoginsController::class, 'indexSenha']);
        Route::post('/esqueceuSenha-Forms-email', [LoginsController::class, 'esqueceuSenhaFormsEmail'])->name('recSenhaToEmail');
        Route::post('/esqueceuSenha-Forms', [LoginsController::class, 'esqueceuSenhaForms'])->name('recSenhaEntidade');
//Fim do geral

//ADM
    //index
        Route::get('/homeAdm', [AdmsController::class, 'index'])->middleware('auth');
        Route::get('/homeAdm-aluno', [AdmsController::class, 'indexAluno'])->middleware('auth');
    //Cadastro
        Route::get('/cadastroAluno', [AdmsController::class, 'cadastroAluno'])->middleware('auth');
        Route::post('/Forms-cadastro-aluno', [AdmsController::class, 'cadastroFormsAluno'])->middleware('auth')->name('adm.formsAluno');
        Route::get('/cadastroPersonal', [AdmsController::class, 'cadastroPersonal'])->middleware('auth');
        Route::post('/Forms-cadastro-personal', [AdmsController::class, 'cadastroFormsPersonal'])->middleware('auth')->name('adm.formsPersonal');
    //Editar
         Route::get('/editarPersonal/{id}', [AdmsController::class, 'atualizarPersonal'])->middleware('auth');
         Route::post('/Forms-atualizar-personal/{id}', [AdmsController::class, 'atualizarFormsPersonal'])->middleware('auth')->name('adm.Updata.formsPersonal');
    //Deletar
        Route::delete('/destruirPersonal/{id}', [AdmsController::class, 'destruirPersonal'])->middleware('auth');
        Route::delete('/destruirAluno/{id}', [AdmsController::class, 'destruirAluno'])->middleware('auth');
//Personal
    //index
        Route::get('/homePersonal', [PersonalsController::class, 'index'])->middleware('auth');
        Route::get('/homePersonal-treino', [AdmsController::class, 'indexTreino'])->middleware('auth');
