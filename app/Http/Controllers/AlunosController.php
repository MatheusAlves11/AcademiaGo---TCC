<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\AlunoCreateRequest;
use App\Http\Requests\AlunoUpdateRequest;
use App\Repositories\AlunoRepository;
use App\Validators\AlunoValidator;
use App\Models\User;
use App\Models\personals;
use App\Models\alunos;
use App\Models\Cardio;
use App\Models\Exercicio;
use App\Models\hipertrofia;
use App\Models\registencia;
use App\Models\emagrecer;
/**
 * Class AlunosController.
 *
 * @package namespace App\Http\Controllers;
 */
class AlunosController extends Controller
{
    //index
        public function index()
        {
            $entidade=auth()->user();
            $aluno=alunos::where('id_usuario',$entidade->id)->first();
            $exercicios=Exercicio::all();
            $cardios=Cardio::all();
            if($aluno->objetivo=='Hipertrofia'){
                //Hipertrofia |Exercicios 8 | Cardios 1
                $hipertrofia=hipertrofia::where('id_aluno',$aluno->id)->where('nome',$aluno->treinoVez)->get();
                if(count($hipertrofia)>0){
                    for ($i=0; $i<count($hipertrofia);$i++){
                        $exercicio=$hipertrofia;
                        $cardio=hipertrofia::where('id_aluno',$aluno->id)->where('nome',$aluno->treinoVez)->get('cardio');
                    }
                }else{
                    $exercicio=null;
                    $cardio=null;
                }
                }elseif($aluno->objetivo=='Resistência'){
                //Resistência |Exercicios 6 | Cardios 2
                $registencia=registencia::where('id_aluno',$aluno->id)->where('nome',$aluno->treinoVez)->get();
                if(count($registencia)>0){
                    for ($i=0; $i<count($registencia);$i++){
                        $exercicio=$registencia;
                        $cardio=registencia::where('id_aluno',$aluno->id)->where('nome',$aluno->treinoVez)->get('cardio');
                    }
                }else{
                    $exercicio=null;
                    $cardio=null;
                }
                }elseif($aluno->objetivo=='Emagrecimento'){
                $emagrecer=emagrecer::where('id_aluno',$aluno->id)->where('nome',$aluno->treinoVez)->get();
                if(count($emagrecer)>0){
                    $exercicio=$emagrecer;
                    $cardio=emagrecer::where('id_aluno',$aluno->id)->where('nome',$aluno->treinoVez)->get('cardio');
                }
                }else{
                    $exercicio=null;
                    $cardio=null;
                }
                return view('Aluno.home',['cardios'=>$cardios,'exercicios'=>$exercicios,'treino'=>$exercicio,'cardio'=>$cardio,'usuario'=>$entidade,'aluno'=>$aluno]);
        }
        public function seusTreinos()
        {
            $entidade=auth()->user();
            $aluno=alunos::where('id_usuario',$entidade->id)->first();
            if($aluno->objetivo=="Resistência"){
                $treinoAlnuno=registencia::where('id_aluno',$aluno->id)->get();
            }elseif($aluno->objetivo=="Emagrecimento"){
                $treinoAlnuno=emagrecer::where('id_aluno',$aluno->id)->get();
            }else{
                $treinoAlnuno=hipertrofia::where('id_aluno',$aluno->id)->get();
            }
            return view('Aluno.seusTreinos',['usuario'=>$entidade,'treino'=>$treinoAlnuno,'aluno'=>$aluno]);
        }
        public function detalhesDeTreinoDeAluno($id)
        {
            $alunoEntidade=auth()->user();
            $aluno=alunos::where('id_usuario',$alunoEntidade->id)->first();
            $exercicios=Exercicio::all();
            $cardios=Cardio::all();
            if($aluno->objetivo=='Hipertrofia'){
                //Hipertrofia |Exercicios 8 | Cardios 1
                $hipertrofia=hipertrofia::where('id_aluno',$aluno->id)->where('id',$_GET['treino'])->get();
                if(count($hipertrofia)>0){
                    for ($i=0; $i<count($hipertrofia);$i++){
                        $exercicio=$hipertrofia;
                        $cardio=hipertrofia::where('id_aluno',$aluno->id)->where('id',$_GET['treino'])->get('cardio');
                    }
                }else{
                    $exercicio=null;
                    $cardio=null;
                }
             }elseif($aluno->objetivo=='Resistência'){
                //Resistência |Exercicios 6 | Cardios 2
                $registencia=registencia::where('id_aluno',$aluno->id)->where('id',$_GET['treino'])->get();
                if(count($registencia)>0){
                    for ($i=0; $i<count($registencia);$i++){
                        $exercicio=$registencia;
                        $cardio=registencia::where('id_aluno',$aluno->id)->where('id',$_GET['treino'])->get('cardio');
                    }
            }else{
                    $exercicio=null;
                    $cardio=null;
                }
             }elseif($aluno->objetivo=='Emagrecimento'){
                $emagrecer=emagrecer::where('id_aluno',$aluno->id)->where('id',$_GET['treino'])->get();
                if(count($emagrecer)>0){
                    $exercicio=$emagrecer;
                    $cardio=emagrecer::where('id_aluno',$aluno->id)->where('id',$_GET['treino'])->get('cardio');
            }else{
                $exercicio=null;
                $cardio=null;
            }
            }else{
                    $exercicio=null;
                    $cardio=null;
            }
            return view('Aluno.detalhesDeTreino',['cardios'=>$cardios,'exercicios'=>$exercicios,'treino'=>$exercicio,'cardio'=>$cardio,'usuario'=>$alunoEntidade,'aluno'=>$aluno,]);
        }
        public function historico()
        {
            $entidade=auth()->user();
            $aluno=alunos::where('id_usuario',$entidade->id)->first();
            if($aluno->objetivo=="Resistência"){
                $historicoTreino=$aluno->registencia;
            }elseif($aluno->objetivo=="Hipertrofia"){
                $historicoTreino=$aluno->hipertrofia;
            }else{
                $historicoTreino=$aluno->emagrecer;
            }
            $busca=request('search'); 
            if($busca){
                foreach($historicoTreino as $historico){
                   if($historico->created_at->format('m')==$busca){
                        $historicoTreino->where('created_at',$busca);
                    }else{
                        $historicoTreino=null;
                    } 
                }
            }
            return view('Aluno.historico',['usuario'=>$entidade,'aluno'=>$aluno,'historicoTreino'=>$historicoTreino]);
        }
        public function indexAluno_detalhes()
        {
            $entidade=auth()->user();
            $aluno=alunos::where('id_usuario',$entidade->id)->first();
            if($aluno->objetivo=="Resistência"){
                $historicoTreino=$aluno->registencia->count();
            }elseif($aluno->objetivo=="Hipertrofia"){
                $historicoTreino=$aluno->hipertrofia->count();
            }else{
                $historicoTreino=$aluno->emagrecer->count();
            }
            return view('Aluno.DetalhesAluno',['alunos'=>$aluno,'entidade'=>$entidade,'quantTreino'=>$historicoTreino]);
        }
    //index
    //Editar
        public function editar()
        {
            $entidade=auth()->user();
            $aluno=alunos::where('id_usuario',$entidade->id)->first();
            return view('Aluno.atualizar',['aluno'=>$aluno, 'entidade'=>$entidade]);
        }
        public function atualizarForms(Request $request)
        {          
            $this->validate($request,[
                'filial'=>'required',
                'name'=>'required',
                'cep'=>'required',
                'rua'=>'required',
                'numeroCasa'=>'required',
                'bairro'=>'required',
                'cidade'=>'required',
                'uf'=>'required',
                'telefone'=>'required',
                'peso'=>'required',
                'altura'=>'required',
                'frequencia'=>'required',
                'objetivo'=>'required',
                'alteracaoCardiaca'=>'required',
                'diabes'=>'required',
                'hipertenso'=>'required',
                'fumante'=>'required',
                'lesao'=>'required',
                ],[
                'filial.required'=>'Os campos marcados com * são obrigatorios',
                'name.required'=>'Os campos marcados com * são obrigatorios',
                'cep.required'=>'Os campos marcados com * são obrigatorios',
                'rua.required'=>'Os campos marcados com * são obrigatorios',
                'numeroCasa.required'=>'Os campos marcados com * são obrigatorios',
                'bairro.required'=>'Os campos marcados com * são obrigatorios',
                'cidade.required'=>'Os campos marcados com * são obrigatorios',
                'uf.required'=>'Os campos marcados com * são obrigatorios',
                'telefone.required'=>'Os campos marcados com * são obrigatorios',
                'peso.required'=>'Os campos marcados com * são obrigatorios',
                'altura.required'=>'Os campos marcados com * são obrigatorios',
                'frequencia.required'=>'Os campos marcados com * são obrigatorios',
                'objetivo.required'=>'Os campos marcados com * são obrigatorios',
                'alteracaoCardiaca.required'=>'Os campos marcados com * são obrigatorios',
                'fumante.required'=>'Os campos marcados com * são obrigatorios',
                'diabes.required'=>'Os campos marcados com * são obrigatorios',
                'hipertenso.required'=>'Os campos marcados com * são obrigatorios',
                'lesao.required'=>'Os campos marcados com * são obrigatorios',
            ]);
            $entidade=auth()->user();
            $aluno=alunos::where('id_usuario',$entidade->id)->first();
            $atualizadoUsuario=$entidade->foto;
            //Upload de imagem
             if($request->hasfile('foto') && $request->file('foto')->isValid()){
                    $requestImagem=$request->foto;
                    //Pega a imagem
                    $extension=$requestImagem->extension();
                    //pega a extensão
                    $imagemName=md5($requestImagem->getClientOriginalName().strtotime("now").".".$extension);
                    //cria o nome da imagem
                    $request->foto->move(public_path('img'),$imagemName);
                    //salva no bd
                    $atualizadoUsuario=$imagemName;
                }
            //Upload de imagem
            User::findOrFail($entidade->id)->update([
                'name' => $request->name,
                'foto'=>$atualizadoUsuario,
            ]);
            alunos::findOrFail($aluno->id)->update([
                'filial' => $request->filial,
                'cep' => $request->cep,
                'rua' => $request->rua,
                'numeroCasa' => $request->numeroCasa,
                'bairro' => $request->bairro,
                'cidade' => $request->cidade,
                'uf' => $request->uf,
                'complemento' => $request->complemento,
                'telefone' => $request->telefone,
                'peso' => $request->peso,
                'altura' => $request->altura,
                'frequencia' => $request->frequencia,
                'objetivo' => $request->objetivo,
                'fumante' => $request->fumante,
                'hipertenso' => $request->hipertenso,
                'lesao' => $request->lesao,
                'alteracaoCardiaca' => $request->alteracaoCardiaca,
                'diabes' => $request->diabes,
            ]);
            return redirect('homeAluno')->with('msg','Atualizado com sucesso!');
        }
    //Editar
    //Concluir treino
        public function concluirTreino($id){
            $entidade=auth()->user();
            $aluno=alunos::where('id_usuario',$entidade->id)->first();
             if($aluno->objetivo=="Resistência"){
                $aluno->registencia()->attach($id);
            }elseif($aluno->objetivo=="Hipertrofia"){
                $aluno->hipertrofia()->attach($id);
            }else{
                $aluno->emagrecer()->attach($id);
            }
            if($aluno->treinoVez=="C"){
                $aluno->treinoVez="A";
            }elseif($aluno->treinoVez=="A"){
                $aluno->treinoVez="B";
            }else{
                $aluno->treinoVez="C";
            }
            $aluno->save();
            return redirect()->back();
        }  
    //Concluir treino
}
