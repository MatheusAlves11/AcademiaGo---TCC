<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginsController;
use App\Http\Controllers\AdmsController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PersonalsController;
use App\Http\Controllers\AlunosController;

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
        Route::get('/', [LoginsController::class, 'login'])->name('login');
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
        Route::get('//treinosadmAluno/{id}', [AdmsController::class, 'treinosAluno'])->middleware('auth');
        Route::get('/detalhesDeTreinoDeAlunoADM/{id}', [AdmsController::class, 'detalhesDeTreinoDeAluno'])->middleware('auth');
        Route::get('/detalhesAluno/{id}', [AdmsController::class, 'indexAluno_detalhes'])->middleware('auth');
    //Cadastro
        Route::get('/cadastroAluno', [AdmsController::class, 'cadastroAluno'])->middleware('auth');
        Route::post('/Forms-cadastro-aluno', [AdmsController::class, 'cadastroFormsAluno'])->middleware('auth')->name('adm.formsAluno');
        Route::get('/cadastroPersonal', [AdmsController::class, 'cadastroPersonal'])->middleware('auth');
        Route::post('/Forms-cadastro-personal', [AdmsController::class, 'cadastroFormsPersonal'])->middleware('auth')->name('adm.formsPersonal');
    //Editar
         Route::get('/editaradmAluno/{id}', [AdmsController::class, 'atualizarAluno'])->middleware('auth');
         Route::put('/Forms-atualizaradm-aluno/{id}', [AdmsController::class, 'atualizarFormsAluno'])->middleware('auth');
         Route::get('/editarPersonal/{id}', [AdmsController::class, 'atualizarPersonal'])->middleware('auth');
         Route::put('/Forms-atualizar-personal/{id}', [AdmsController::class, 'atualizarFormsPersonal'])->middleware('auth');
    //Deletar
        Route::delete('/destruirPersonal/{id}', [AdmsController::class, 'destruirPersonal'])->middleware('auth');
        Route::delete('/destruiradmAluno/{id}', [AdmsController::class, 'destruirAluno'])->middleware('auth');
//Fim ADM

//Personal
    //index
        Route::get('/homePersonal', [PersonalsController::class, 'index'])->middleware('auth');
        Route::get('/detalhesAlunoPersonal/{id}', [PersonalsController::class, 'indexAluno_detalhes'])->middleware('auth');
        Route::get('/homePersonal-treino', [PersonalsController::class, 'indexTreino'])->middleware('auth');
        Route::get('/homePersonal-cardio', [PersonalsController::class, 'indexCardio'])->middleware('auth');
        Route::get('/treinosAluno/{id}', [PersonalsController::class, 'treinosAluno'])->middleware('auth');
        Route::get('/detalhesDeTreinoDeAluno/{id}', [PersonalsController::class, 'detalhesDeTreinoDeAluno'])->middleware('auth');
    //Cadastro
        Route::get('/cadastroAlunoPersonal', [PersonalsController::class, 'cadastroAluno'])->middleware('auth');
        Route::post('/FormsPersonal-cadastro-aluno', [PersonalsController::class, 'cadastroFormsAluno'])->middleware('auth')->name('personal.forms.aluno');
        Route::get('/cadastroCardio', [PersonalsController::class, 'cadastroCardio'])->middleware('auth');
        Route::post('/Forms-cadastro-cardio', [PersonalsController::class, 'cadastroFormsCardio'])->middleware('auth')->name('personal.forms.cardio');
        Route::get('/cadastroExercicio', [PersonalsController::class, 'cadastroExercicio'])->middleware('auth');
        Route::post('/Forms-cadastro-exercicio', [PersonalsController::class, 'cadastroFormsExercicio'])->middleware('auth')->name('personal.forms.exercicio');
    //Editar
         Route::get('/editarCardio/{id}', [PersonalsController::class, 'atualizarCardio'])->middleware('auth');
         Route::put('/Forms-atualizar-cardio/{id}', [PersonalsController::class, 'atualizarFormsCardio'])->middleware('auth')->name('personal.Updata.formsCardio');
         Route::get('/editarExercicio/{id}', [PersonalsController::class, 'atualizarExercicio'])->middleware('auth');
         Route::put('/Forms-atualizar-exercicio/{id}', [PersonalsController::class, 'atualizarFormsExercicio'])->middleware('auth')->name('personal.Updata.formsExercicio');
         Route::get('/editarAluno/{id}', [PersonalsController::class, 'atualizarAluno'])->middleware('auth');
         Route::put('/Forms-atualizar-aluno/{id}', [PersonalsController::class, 'atualizarFormsAluno'])->middleware('auth');
    //Deletar
        Route::delete('/destruirCardio/{id}', [PersonalsController::class, 'destruirCardio'])->middleware('auth');
        Route::delete('/destruirExercicio/{id}', [PersonalsController::class, 'destruirExercicio'])->middleware('auth');
        Route::delete('/destruirTreino/{id}', [PersonalsController::class, 'destruirTreino'])->middleware('auth');
    //Recomendar Treino
        Route::get('/criarTreino/{id}', [PersonalsController::class, 'recomendaTreino'])->middleware('auth');
//Fim Personal

//Aluno
    //index
        Route::get('/homeAluno', [AlunosController::class, 'index'])->middleware('auth');
        Route::get('/treinos', [AlunosController::class, 'seusTreinos'])->middleware('auth');
        Route::get('/treinosDetalhes/{id}', [AlunosController::class, 'detalhesDeTreinoDeAluno'])->middleware('auth');
        Route::get('/historico', [AlunosController::class, 'historico'])->middleware('auth');
        Route::get('/detalhes', [AlunosController::class, 'indexAluno_detalhes'])->middleware('auth');
    //Editar
        Route::get('/editar', [AlunosController::class, 'editar'])->middleware('auth');
        Route::put('/Forms-atualizar', [AlunosController::class, 'atualizarForms'])->middleware('auth');
    //Historico
        Route::post('/concluirTreino/{id}',[AlunosController::class, 'concluirTreino'])->middleware('auth');
//Fim Aluno