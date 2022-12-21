<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\PersonalCreateRequest;
use App\Http\Requests\PersonalUpdateRequest;
use App\Repositories\PersonalRepository;
use App\Validators\PersonalValidator;
use App\Models\User;
use App\Models\personals;
use App\Models\alunos;
use App\Models\Cardio;
use App\Models\Exercicio;
use App\Models\hipertrofia;
use App\Models\registencia;
use App\Models\emagrecer;
/**
 * Class PersonalsController.
 *
 * @package namespace App\Http\Controllers;
 */
class PersonalsController extends Controller
{
   //index
        public function index()
        {
            $adm=auth()->user();
            $personal=personals::where('id_usuario',$adm->id)->first();
            $busca=request('search'); 
            if($busca){
                if(!empty(User::where('name', 'like', '%'.$busca.'%')->first())){
                    $entidade=User::where([
                        ['name', 'like', '%'.$busca.'%']
                        ])->get();
                        foreach ($entidade as $alunoBusca){
                            $aluno=alunos::where([['id_usuario','like',$alunoBusca->id]])->get();
                        }
                 }else{
                    $aluno=null;
                    $entidade=null;
                } 
            }else{
                $aluno=alunos::all();
                $entidade=user::all();
            }
            $aluno=alunos::all();
            return view('Personal.ListagemAlunosPersonal',['usuario'=>$adm,'personal'=>$personal,'aluno'=>$aluno,'entidade'=>$entidade,'busca'=>$busca]);
        }
        public function indexAluno_detalhes($id)
        {
            $personal=auth()->user();
            $aluno=alunos::findOrFail($id);
            $entidade=user::findOrFail($aluno->id_usuario);
            return view('Personal.DetalhesAlunoPersonal',['usuario'=>$personal,'alunos'=>$aluno,'entidade'=>$entidade]);
        }
        public function indexTreino()
        {
            $adm=auth()->user();
            $personal=personals::where('id_usuario',$adm->id)->first();
            $busca=request('search'); 
            if($busca){
                if(!empty(Exercicio::where('exercicio', 'like', '%'.$busca.'%')->first())){
                    $exercicios=Exercicio::where([
                        ['exercicio', 'like', '%'.$busca.'%']
                        ])->get();
                }elseif(!empty(Exercicio::where('musculo', 'like', '%'.$busca.'%')->first())){
                    $exercicios=Exercicio::where([
                        ['musculo', 'like', '%'.$busca.'%']
                        ])->get();
                }else{
                    $exercicios=null;
                } 
            }else{
                $exercicios=Exercicio::all();
            }
            return view('Personal.ListagemExerciciosPersonal',['usuario'=>$adm,'personal'=>$personal,'exercicios'=>$exercicios,'busca'=>$busca]);
        }
        public function indexCardio()
        {
            $adm=auth()->user();
            $personal=personals::where('id_usuario',$adm->id)->first();
            $busca=request('search'); 
            if($busca){
                if(!empty(Cardio::where('exercicio', 'like', '%'.$busca.'%')->first())){
                    $cardios=Cardio::where([
                        ['exercicio', 'like', '%'.$busca.'%']
                        ])->get();
                }else{
                    $cardios=null;
                } 
            }else{
                $cardios=Cardio::all();
            }
            return view('Personal.ListagemCardiosPersonal',['usuario'=>$adm,'personal'=>$personal,'cardios'=>$cardios,'busca'=>$busca]);
        }
        public function treinosAluno($id)
        {
            $adm=auth()->user();
            $personal=personals::where('id_usuario',$adm->id)->first();
            $aluno=alunos::findOrFail($id);
            $alunoEntidade=User::findOrFail($aluno->id_usuario);
            if($aluno->objetivo=="Resistência"){
                $treinoAlnuno=registencia::where('id_aluno',$aluno->id)->get();
            }elseif($aluno->objetivo=="Emagrecimento"){
                $treinoAlnuno=emagrecer::where('id_aluno',$aluno->id)->get();
            }else{
                $treinoAlnuno=hipertrofia::where('id_aluno',$aluno->id)->get();
            }
            return view('Personal.TreinosDeAlunoPersonal',['usuario'=>$adm,'personal'=>$personal,'entidade'=>$alunoEntidade,'aluno'=>$aluno,'treino'=>$treinoAlnuno]);
        }        
        public function detalhesDeTreinoDeAluno($id)
        {
            $adm=auth()->user();
            $exercicios=Exercicio::all();
            $cardios=Cardio::all();
            $personal=personals::where('id_usuario',$adm->id)->first();
            $aluno=alunos::findOrFail($id);
            $alunoEntidade=User::findOrFail($aluno->id_usuario);
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
            return view('Personal.detalhesDeTreinoDeAlunoPersonal',['cardios'=>$cardios,'exercicios'=>$exercicios,'treino'=>$exercicio,'cardio'=>$cardio,'usuario'=>$adm,'personal'=>$personal,'entidade'=>$alunoEntidade,'aluno'=>$aluno,]);
        }
   //Cadastro
         public function cadastroCardio()
         {
            $personal=auth()->user();
            if($personal->nivelAcesso==2){
             return view('Personal.CadastroCardioPersonal');
            }
         }
         public function cadastroFormsCardio (Request $request)
         {
             $novoCardio = new Cardio;
             $this->validate($request,[
                 'meta'=>'required',
                 'intensidade'=>'required',
                 'exercicio'=>'required',
                ],[
                 'meta.required'=>'Os campos marcados com * são obrigatorios',
                 'intensidade.required'=>'Os campos marcados com * são obrigatorios',
                 'exercicio.required'=>'Os campos marcados com * são obrigatorios',
            ]);
             $novoCardio->exercicio = $request->exercicio;
             $novoCardio->intensidade = $request->intensidade;
             //Dados altomaticos
             if($novoCardio->intensidade=="Leve"){
                $novoCardio->duracao = 10;
                $novoCardio->tipoTempoDuracao = "Min";
              }elseif($novoCardio->intensidade=="Moderada"){
                $novoCardio->duracao = 15;
                $novoCardio->tipoTempoDuracao = "Min";
             }elseif($novoCardio->intensidade=="Alta"){
                $novoCardio->duracao = 20;
                $novoCardio->tipoTempoDuracao = "Min";
             }
             //Dados altomaticos
             $novoCardio->meta = $request->meta;
             $novoCardio->save();    
             return redirect('homePersonal-cardio')->with('msg','Cardio cadastrado com sucesso!');
         }
         public function cadastroExercicio()
         {
            $personal=auth()->user();
            if($personal->nivelAcesso==2){
             return view('Personal.CadastroExercicioPersonal');
            }
         }
         public function cadastroFormsExercicio (Request $request)
         {
             $novoExercicio = new Exercicio;
             $this->validate($request,[
                 'exercicio'=>'required',
                 'musculo'=>'required',
                 'intensidade'=>'required',
                 'meta'=>'required',
              ],[
                 'exercicio.required'=>'Os campos marcados com * são obrigatorios',
                 'intensidade.required'=>'Os campos marcados com * são obrigatorios',
                 'musculo.required'=>'Os campos marcados com * são obrigatorios',
                 'meta.required'=>'Os campos marcados com * são obrigatorios',
            ]);
             $novoExercicio->exercicio = $request->exercicio;
             $novoExercicio->musculo = $request->musculo;
             $novoExercicio->intensidade = $request->intensidade;
            //Dados altomaticos
            if($novoExercicio->intensidade=="Leve"){
                $novoExercicio->serie = 2;
                $novoExercicio->repeticoes = 8;
                $novoExercicio->descanso = 1;
                $novoExercicio->tipoTempoDuracao = "Min";
              }elseif($novoExercicio->intensidade=="Moderada"){
                $novoExercicio->serie = 3;
                $novoExercicio->repeticoes = 12;
                $novoExercicio->descanso = 1;
                $novoExercicio->tipoTempoDuracao = "Min";
             }elseif($novoExercicio->intensidade=="Alta"){
                $novoExercicio->serie = 4;
                $novoExercicio->repeticoes = 12;
                $novoExercicio->descanso = 1;
                $novoExercicio->tipoTempoDuracao = "Min";
            }
             //Dados altomaticos
             $novoExercicio->meta = $request->meta;
             $novoExercicio->save();    
             return redirect('homePersonal-treino')->with('msg','Exercicio cadastrado com sucesso!');
         }
         public function cadastroAluno()
         {
             $personal=auth()->user();
             if($personal->nivelAcesso==2){
                 return view('Personal.CadastroAlunoPersonal');
             }
         }
         public function cadastroFormsAluno(Request $request)
         {        
            $novoUsuario = new User;
            $this->validate($request,[
                'filial'=>'required',
                'email'=>'required',
                'password'=>'required',
                'name'=>'required',
                'cep'=>'required',
                'rua'=>'required',
                'numeroCasa'=>'required',
                'bairro'=>'required',
                'cidade'=>'required',
                'uf'=>'required',
                'telefone'=>'required',
                'dataNascimento'=>'required',
                'genero'=>'required',
                'peso'=>'required',
                'altura'=>'required',
                'frequencia'=>'required',
                'objetivo'=>'required',
                'alteracaoCardiaca'=>'required',
                'diabes'=>'required',
                'hipertenso'=>'required',
                'fumante'=>'required',
                'taxasAltas'=>'required',
                'bebidaAlcolica'=>'required',
                'lesao'=>'required',
                ],[
                /*'filial.required'=>'Os campos marcados com * são obrigatorios',
                'name.required'=>'Os campos marcados com * são obrigatorios',
                'email.required'=>'Os campos marcados com * são obrigatorios',
                'password.required'=>'Os campos marcados com * são obrigatorios',
                'rua.required'=>'Os campos marcados com * são obrigatorios',
                'numeroCasa.required'=>'Os campos marcados com * são obrigatorios',
                'bairro.required'=>'Os campos marcados com * são obrigatorios',
                'cidade.required'=>'Os campos marcados com * são obrigatorios',
                'uf.required'=>'Os campos marcados com * são obrigatorios',
                'telefone.required'=>'Os campos marcados com * são obrigatorios',
                'dataNascimento.required'=>'Os campos marcados com * são obrigatorios',
                'genero.required'=>'Os campos marcados com * são obrigatorios',
                'peso.required'=>'Os campos marcados com * são obrigatorios',
                'altura.required'=>'Os campos marcados com * são obrigatorios',
                'frequencia.required'=>'Os campos marcados com * são obrigatorios',
                'objetivo.required'=>'Os campos marcados com * são obrigatorios',
                'alteracaoCardiaca.required'=>'Os campos marcados com * são obrigatorios',
                'fumante.required'=>'Os campos marcados com * são obrigatorios',
                'diabes.required'=>'Os campos marcados com * são obrigatorios',
                'hipertenso.required'=>'Os campos marcados com * são obrigatorios',
                'lesao.required'=>'Os campos marcados com * são obrigatorios',
                'taxasAltas.required'=>'Os campos marcados com * são obrigatorios',
                'bebidaAlcolica.required'=>'Os campos marcados com * são obrigatorios',
                */
                'required' => 'A :attribute é um campo obrigartorio!',
             ]);
            $novoUsuario->name = $request->name;
            if(!empty(user::where('email',$request->email)->first())){
                return redirect()->back()->with('danger','E-mail já cadastrado!');
            }
            $novoUsuario->email = $request->email;
            $novoUsuario->password = Hash::make($request->password);
            $novoUsuario->nivelAcesso=3;
            //Upload de imagem
                if($request->hasfile('foto') && $request->file('foto')->isValid()){
                    //Pega a imagem
                    $requestImagem=$request->foto;
                    //pega a extensão
                    $extension=$requestImagem->extension();
                    //cria o nome da imagem
                    $imagemName=md5($requestImagem->getClientOriginalName().strtotime("now")).".".$extension;
                    //move para a pasta das imagens
                    $requestImagem->move(public_path('img'),$imagemName);
                    //salva no bd
                    $novoUsuario->foto=$imagemName;
                }
            //Upload de imagem
            $novoAluno = new alunos;
            $novoUsuario->save(); 
            $novoAluno->filial = $request->filial;
            $novoAluno->cep = $request->cep;
            $novoAluno->rua = $request->rua;
            $novoAluno->numeroCasa = $request->numeroCasa;
            $novoAluno->bairro = $request->bairro;
            $novoAluno->cidade = $request->cidade;
            $novoAluno->uf = $request->uf;
            $novoAluno->complemento = $request->complemento;
            $novoAluno->telefone = $request->telefone;
            $novoAluno->dataNascimento = $request->dataNascimento;
            $novoAluno->genero = $request->genero;
            if($request->peso>=1){
             $novoAluno->peso = $request->peso;
            }else{
             return redirect()->back()->with('danger','Valor inferior a 1, tente um número maior!');
            }
            if($request->altura>=1 ){
                $novoAluno->altura = $request->altura;
            }else{
                return redirect()->back()->with('danger','Valor inferior a 1, tente um número maior!');
            }
            $novoAluno->frequencia = $request->frequencia;
            $novoAluno->objetivo = $request->objetivo;
            $novoAluno->bebidaAlcolica = $request->bebidaAlcolica;
            $novoAluno->taxasAltas = $request->taxasAltas;
            $novoAluno->fumante = $request->fumante;
            $novoAluno->hipertenso = $request->hipertenso;
            $novoAluno->lesao = $request->lesao;
            $novoAluno->alteracaoCardiaca = $request->alteracaoCardiaca;
            if($novoAluno->alteracaoCardiaca=="nao"){
                $novoAluno->metaTreino = 500;
            }elseif($novoAluno->alteracaoCardiaca=="leve"){
                $novoAluno->metaTreino = 350;
            }else{
                $novoAluno->metaTreino = 200;
            }
            $novoAluno->diabes = $request->diabes;
            $novoAluno->id_usuario=$novoUsuario->id;
            $novoAluno->imc=($request->peso/($request->altura*$request->altura));
            if($novoAluno->imc<20  || $novoAluno->imc>=31){
                $novoAluno->intensidade = "leve";
            }elseif($novoAluno->imc>=20 || $novoAluno->imc<=25){
                $novoAluno->intensidade = "moderada";
            }else{
                $novoAluno->intensidade = "alta";
            }
            $novoAluno->diabes = $request->diabes;
            $novoAluno->save();
             return redirect('homePersonal')->with('msg','Aluno cadastrado com sucesso!');
         }
   //Editar
        public function atualizarCardio($id)
        {
            $cardio=Cardio::findOrFail($id);
            return view('Personal.AtualizarCardioPersonal',['cardio'=>$cardio]);
        }
        public function atualizarFormsCardio(Request $request)
        {
            $this->validate($request,[
                'tipoTempoDuracao'=>'required',
                'meta'=>'required',
                'duracao'=>'required',
                'exercicio'=>'required',
               ],[
                'tipoTempoDuracao.required'=>'Os campos marcados com * são obrigatorios',
                'meta.required'=>'Os campos marcados com * são obrigatorios',
                'duracao.required'=>'Os campos marcados com * são obrigatorios',
                'exercicio.required'=>'Os campos marcados com * são obrigatorios',
           ]);
           Cardio::findOrFail($request->id)->update([
             'exercicio' => $request->exercicio,
             'duracao' => $request->duracao,
             'tipoTempoDuracao' => $request->tipoTempoDuracao,
             'meta' => $request->meta,
            ]);
            return redirect('homePersonal-cardio')->with('msg','Cardio atualizado com sucesso!');
        
        }
        public function atualizarExercicio($id)
        {
            $exercicio=Exercicio::findOrFail($id);
            return view('Personal.AtualizarExercicioPersonal',['exercicio'=>$exercicio]);
        }
        public function atualizarFormsExercicio(Request $request)
        {
            $this->validate($request,[
                'exercicio'=>'required',
                'musculo'=>'required',
                'serie'=>'required',
                'repeticoes'=>'required',
                'descanso'=>'required',
                'tipoTempoDuracao'=>'required',
                'meta'=>'required',
             ],[
                'exercicio.required'=>'Os campos marcados com * são obrigatorios',
                'musculo.required'=>'Os campos marcados com * são obrigatorios',
                'serie.required'=>'Os campos marcados com * são obrigatorios',
                'repeticoes.required'=>'Os campos marcados com * são obrigatorios',
                'descanso.required'=>'Os campos marcados com * são obrigatorios',
                'tipoTempoDuracao.required'=>'Os campos marcados com * são obrigatorios',
                'meta.required'=>'Os campos marcados com * são obrigatorios',
           ]);
           Exercicio::findOrFail($request->id)->update([
             'exercicio' => $request->exercicio,
             'musculo'=>$request->musculo,
             'serie'=>$request->serie,
             'repeticoes'=>$request->repeticoes,
             'descanso' => $request->descanso,
             'tipoTempoDuracao' => $request->tipoTempoDuracao,
             'meta' => $request->meta,
            ]);
            return redirect('homePersonal-treino')->with('msg','Exercicio atualizado com sucesso!');
        
        }
        public function atualizarAluno($id)
        {
            $aluno=alunos::findOrFail($id);
            $entidade=User::findOrFail($aluno->id_usuario);
            return view('Personal.AtualizarAlunoPersonal',['aluno'=>$aluno,'entidade'=>$entidade]);
        }
        public function atualizarFormsAluno(Request $request)
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
                'dataNascimento'=>'required',
                'genero'=>'required',
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
                'dataNascimento.required'=>'Os campos marcados com * são obrigatorios',
                'genero.required'=>'Os campos marcados com * são obrigatorios',
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
            $aluno=alunos::findOrFail($request->id);
            $entidade=User::findOrFail($aluno->id_usuario);
            $atualizadoUsuario=$entidade->foto;
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
            alunos::findOrFail($request->id)->update([
                'filial' => $request->filial,
                'cep' => $request->cep,
                'rua' => $request->rua,
                'numeroCasa' => $request->numeroCasa,
                'bairro' => $request->bairro,
                'cidade' => $request->cidade,
                'uf' => $request->uf,
                'complemento' => $request->complemento,
                'telefone' => $request->telefone,
                'dataNascimento' => $request->dataNascimento,
                'genero' => $request->genero,
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
            return redirect('homePersonal')->with('msg','Aluno atualizado com sucesso!');
        }
   //Excluir
        public function destruirCardio($id)
        {
            $cardio=Cardio::findOrFail($id);
            $cardio->delete();
            return redirect('/homePersonal-cardio')->with('msg','excluido com sucesso!');
        }
        public function destruirExercicio($id)
        {
            $exercicio=Exercicio::findOrFail($id);
            $exercicio->delete();
            return redirect('/homePersonal-treino')->with('msg','excluido com sucesso!');
        }
   
   
   
   //Treino
        public function recomendaTreino($id) 
        {
            $entidade=User::findOrFail($id);
            $aluno=alunos::where('id_usuario',$id)->first();
            $cardio=Cardio::where('intensidade',$aluno->intensidade)->get();
            $exercicioA=Exercicio::whereNotIn('musculo',$aluno->lesao)->whereIn('musculo',['Peito','Tríceps','Ombro','Abdómen'])->where('intensidade',$aluno->intensidade)->get();
            $exercicioB=Exercicio::whereNotIn('musculo',$aluno->lesao)->whereIn('musculo',['Costas','Bíceps','Trapézio'])->where('intensidade',$aluno->intensidade)->get();
            $exercicioC=Exercicio::whereNotIn('musculo',$aluno->lesao)->whereIn('musculo',['Coxa','Panturrilha'])->where('intensidade',$aluno->intensidade)->get();
            //Definindo tipo do treino
            if($aluno->objetivo=='Hipertrofia'){
                //Hipertrofia |Exercicios 8 | Cardios 1
                //Treino A
                    if(count($exercicioA)>7){
                        $treinoA=new hipertrofia;
                        $treinoA->id_aluno=$aluno->id;
                        $treinoA->nome="A";
                        $treinoA->area="Peito ,Tríceps ,Ombros e Abdómen";
                        //TREINO
                            $posicao=rand(0,(count($exercicioA)-1));
                            $posicaoUm=rand(0,(count($exercicioA)-1));
                            $posicaoDois=rand(0,(count($exercicioA)-1));
                            $posicaoTres=rand(0,(count($exercicioA)-1));
                            $posicaoQuatro=rand(0,(count($exercicioA)-1));
                            $posicaoCinco=rand(0,(count($exercicioA)-1));
                            $posicaoSeis=rand(0,(count($exercicioA)-1));
                            $posicaoSete=rand(0,(count($exercicioA)-1));
                            while($posicaoSete==$posicaoSeis or $posicaoSete==$posicaoCinco or $posicaoSete==$posicaoQuatro or $posicaoSete==$posicaoTres or $posicaoSete==$posicaoDois or $posicaoSete==$posicao or $posicaoSeis==$posicaoCinco or $posicaoSeis==$posicaoQuatro or $posicaoSeis==$posicaoTres or $posicaoSeis==$posicaoDois or $posicaoSeis==$posicao or $posicaoCinco==$posicaoQuatro or $posicaoCinco==$posicaoTres or $posicaoCinco==$posicaoDois or $posicaoCinco==$posicaoUm or $posicaoCinco==$posicao or $posicaoQuatro==$posicaoTres or $posicaoQuatro==$posicaoDois or $posicaoQuatro==$posicaoUm or $posicaoQuatro==$posicao or $posicaoTres==$posicaoDois or $posicaoTres==$posicaoUm or $posicaoTres==$posicao or $posicaoUm==$posicao){
                                $posicao=rand(0,(count($exercicioA)-1));
                                $posicaoUm=rand(0,(count($exercicioA)-1));
                                $posicaoDois=rand(0,(count($exercicioA)-1));
                                $posicaoTres=rand(0,(count($exercicioA)-1));
                                $posicaoQuatro=rand(0,(count($exercicioA)-1));
                                $posicaoCinco=rand(0,(count($exercicioA)-1));
                                $posicaoSeis=rand(0,(count($exercicioA)-1));
                                $posicaoSete=rand(0,(count($exercicioA)-1));
                            }
                            $treinoA->exercicio=[$exercicioA[$posicao]->id,$exercicioA[$posicaoUm]->id,$exercicioA[$posicaoDois]->id,$exercicioA[$posicaoTres]->id,$exercicioA[$posicaoQuatro]->id,$exercicioA[$posicaoCinco]->id,$exercicioA[$posicaoSeis]->id,$exercicioA[$posicaoSete]->id];
                        //TREINO
                        $posicaoCardio=rand(0,(count($cardio)-1));
                        $treinoA->cardio=[$cardio[$posicaoCardio]->id];
                        $treinoA->save();
                    }
                //Treino A
                //Treino B
                    if(count($exercicioB)>7){  
                    $treinoB=new hipertrofia;
                    $treinoB->id_aluno=$aluno->id;
                    $treinoB->nome="B";
                    $treinoB->area="Costas, Bíceps e Trapézio";
                    //TREINO
                        $posicao=rand(0,(count($exercicioB)-1));
                        $posicaoUm=rand(0,(count($exercicioB)-1));
                        $posicaoDois=rand(0,(count($exercicioB)-1));
                        $posicaoTres=rand(0,(count($exercicioB)-1));
                        $posicaoQuatro=rand(0,(count($exercicioB)-1));
                        $posicaoCinco=rand(0,(count($exercicioB)-1));
                        $posicaoSeis=rand(0,(count($exercicioB)-1));
                        $posicaoSete=rand(0,(count($exercicioB)-1));
                        while($posicaoSete==$posicaoSeis or $posicaoSete==$posicaoCinco or $posicaoSete==$posicaoQuatro or $posicaoSete==$posicaoTres or $posicaoSete==$posicaoDois or $posicaoSete==$posicao or $posicaoSeis==$posicaoCinco or $posicaoSeis==$posicaoQuatro or $posicaoSeis==$posicaoTres or $posicaoSeis==$posicaoDois or $posicaoSeis==$posicao or $posicaoCinco==$posicaoQuatro or $posicaoCinco==$posicaoTres or $posicaoCinco==$posicaoDois or $posicaoCinco==$posicaoUm or $posicaoCinco==$posicao or $posicaoQuatro==$posicaoTres or $posicaoQuatro==$posicaoDois or $posicaoQuatro==$posicaoUm or $posicaoQuatro==$posicao or $posicaoTres==$posicaoDois or $posicaoTres==$posicaoUm or $posicaoTres==$posicao or $posicaoUm==$posicao){
                            $posicao=rand(0,(count($exercicioB)-1));
                            $posicaoUm=rand(0,(count($exercicioB)-1));
                            $posicaoDois=rand(0,(count($exercicioB)-1));
                            $posicaoTres=rand(0,(count($exercicioB)-1));
                            $posicaoQuatro=rand(0,(count($exercicioB)-1));
                            $posicaoCinco=rand(0,(count($exercicioB)-1));
                            $posicaoSeis=rand(0,(count($exercicioB)-1));
                            $posicaoSete=rand(0,(count($exercicioB)-1));
                        }
                        $treinoB->exercicio=[$exercicioB[$posicao]->id,$exercicioB[$posicaoUm]->id,$exercicioB[$posicaoDois]->id,$exercicioB[$posicaoTres]->id,$exercicioB[$posicaoQuatro]->id,$exercicioB[$posicaoCinco]->id,$exercicioB[$posicaoSeis]->id,$exercicioB[$posicaoSete]->id];
                    //TREINO
                    $posicaoCardio=rand(0,(count($cardio)-1));
                    $treinoB->cardio=[$cardio[$posicaoCardio]->id];
                    $treinoB->save();
                    }
                //Treino B
                //Treino C
                     if(count($exercicioC)>7){
                        $treinoC=new hipertrofia;            
                        $treinoC->id_aluno=$aluno->id;
                        $treinoC->nome="C";
                        $treinoC->area="Coxa e Panturrilha";
                        //TREINO
                        $posicao=rand(0,(count($exercicioC)-1));
                        $posicaoUm=rand(0,(count($exercicioC)-1));
                        $posicaoDois=rand(0,(count($exercicioC)-1));
                        $posicaoTres=rand(0,(count($exercicioC)-1));
                        $posicaoQuatro=rand(0,(count($exercicioC)-1));
                        $posicaoCinco=rand(0,(count($exercicioC)-1));
                        $posicaoSeis=rand(0,(count($exercicioC)-1));
                        $posicaoSete=rand(0,(count($exercicioC)-1));
                        while($posicaoSete==$posicaoSeis or $posicaoSete==$posicaoCinco or $posicaoSete==$posicaoQuatro or $posicaoSete==$posicaoTres or $posicaoSete==$posicaoDois or $posicaoSete==$posicao or $posicaoSeis==$posicaoCinco or $posicaoSeis==$posicaoQuatro or $posicaoSeis==$posicaoTres or $posicaoSeis==$posicaoDois or $posicaoSeis==$posicao or $posicaoCinco==$posicaoQuatro or $posicaoCinco==$posicaoTres or $posicaoCinco==$posicaoDois or $posicaoCinco==$posicaoUm or $posicaoCinco==$posicao or $posicaoQuatro==$posicaoTres or $posicaoQuatro==$posicaoDois or $posicaoQuatro==$posicaoUm or $posicaoQuatro==$posicao or $posicaoTres==$posicaoDois or $posicaoTres==$posicaoUm or $posicaoTres==$posicao or $posicaoUm==$posicao){
                            $posicao=rand(0,(count($exercicioC)-1));
                            $posicaoUm=rand(0,(count($exercicioC)-1));
                            $posicaoDois=rand(0,(count($exercicioC)-1));
                            $posicaoTres=rand(0,(count($exercicioC)-1));
                            $posicaoQuatro=rand(0,(count($exercicioC)-1));
                            $posicaoCinco=rand(0,(count($exercicioC)-1));
                            $posicaoSeis=rand(0,(count($exercicioC)-1));
                            $posicaoSete=rand(0,(count($exercicioC)-1));
                        }
                        $treinoC->exercicio=[$exercicioC[$posicao]->id,$exercicioC[$posicaoUm]->id,$exercicioC[$posicaoDois]->id,$exercicioC[$posicaoTres]->id,$exercicioC[$posicaoQuatro]->id,$exercicioC[$posicaoCinco]->id,$exercicioC[$posicaoSeis]->id,$exercicioC[$posicaoSete]->id];
                        //TREINO
                        $posicaoCardio=rand(0,(count($cardio)-1));
                        $treinoC->cardio=[$cardio[$posicaoCardio]->id];
                        $treinoC->save();
                     }
                //Treino C
            }elseif($aluno->objetivo=='Resistência'){
                //Resistência |Exercicios 6 | Cardios 2
                //Treino A
                    if(count($exercicioA)>5){
                        $treinoA=new registencia;
                        $treinoA->id_aluno=$aluno->id;
                        $treinoA->nome="A";
                        $treinoA->area="Peito, Tríceps, Ombros e Abdómen";
                        //TREINO
                            $posicao=rand(0,(count($exercicioA)-1));
                            $posicaoUm=rand(0,(count($exercicioA)-1));
                            $posicaoDois=rand(0,(count($exercicioA)-1));
                            $posicaoTres=rand(0,(count($exercicioA)-1));
                            $posicaoQuatro=rand(0,(count($exercicioA)-1));
                            $posicaoCinco=rand(0,(count($exercicioA)-1));
                            while($posicaoCinco==$posicaoQuatro or $posicaoCinco==$posicaoTres or $posicaoCinco==$posicaoDois or $posicaoCinco==$posicaoUm or $posicaoCinco==$posicao or $posicaoQuatro==$posicaoTres or $posicaoQuatro==$posicaoDois or $posicaoQuatro==$posicaoUm or $posicaoQuatro==$posicao or $posicaoTres==$posicaoDois or $posicaoTres==$posicaoUm or $posicaoTres==$posicao or $posicaoUm==$posicao){
                                $posicao=rand(0,(count($exercicioA)-1));
                                $posicaoUm=rand(0,(count($exercicioA)-1));
                                $posicaoDois=rand(0,(count($exercicioA)-1));
                                $posicaoTres=rand(0,(count($exercicioA)-1));
                                $posicaoQuatro=rand(0,(count($exercicioA)-1));
                                $posicaoCinco=rand(0,(count($exercicioA)-1));
                            }
                            $treinoA->exercicio=[$exercicioA[$posicao]->id,$exercicioA[$posicaoUm]->id,$exercicioA[$posicaoDois]->id,$exercicioA[$posicaoTres]->id,$exercicioA[$posicaoQuatro]->id,$exercicioA[$posicaoCinco]->id];
                        //TREINO
                        //Cardio
                            $posicao=rand(0,(count($cardio)-1));
                            $posicao2=rand(0,(count($cardio)-1));
                            while($posicao2==$posicao){
                                $posicao=rand(0,(count($cardio)-1));
                                $posicao2=rand(0,(count($cardio)-1));
                            }
                            $treinoA->cardio=[$cardio[$posicao]->id,$cardio[$posicao2]->id];
                        //Fim do cardio
                        $treinoA->save();
                    }
                //Treino A
                //Treino B
                    if(count($exercicioB)>5){
                        $treinoB=new registencia;
                        $treinoB->id_aluno=$aluno->id;
                        $treinoB->nome="B";
                        $treinoB->area="Costas, Bíceps e Trapézio";
                        //TREINO
                            $posicao=rand(0,(count($exercicioB)-1));
                            $posicaoUm=rand(0,(count($exercicioB)-1));
                            $posicaoDois=rand(0,(count($exercicioB)-1));
                            $posicaoTres=rand(0,(count($exercicioB)-1));
                            $posicaoQuatro=rand(0,(count($exercicioB)-1));
                            $posicaoCinco=rand(0,(count($exercicioB)-1));
                            while($posicaoCinco==$posicaoQuatro or $posicaoCinco==$posicaoTres or $posicaoCinco==$posicaoDois or $posicaoCinco==$posicaoUm or $posicaoCinco==$posicao or $posicaoQuatro==$posicaoTres or $posicaoQuatro==$posicaoDois or $posicaoQuatro==$posicaoUm or $posicaoQuatro==$posicao or $posicaoTres==$posicaoDois or $posicaoTres==$posicaoUm or $posicaoTres==$posicao or $posicaoUm==$posicao){
                                $posicao=rand(0,(count($exercicioB)-1));
                                $posicaoUm=rand(0,(count($exercicioB)-1));
                                $posicaoDois=rand(0,(count($exercicioB)-1));
                                $posicaoTres=rand(0,(count($exercicioB)-1));
                                $posicaoQuatro=rand(0,(count($exercicioB)-1));
                                $posicaoCinco=rand(0,(count($exercicioB)-1));
                            }
                            $treinoB->exercicio=[$exercicioB[$posicao]->id,$exercicioB[$posicaoUm]->id,$exercicioB[$posicaoDois]->id,$exercicioB[$posicaoTres]->id,$exercicioB[$posicaoQuatro]->id,$exercicioB[$posicaoCinco]->id];
                        //TREINO
                        //Cardio
                            $posicao=rand(0,(count($cardio)-1));
                            $posicao2=rand(0,(count($cardio)-1));
                            while($posicao2==$posicao){
                                $posicao=rand(0,(count($cardio)-1));
                                $posicao2=rand(0,(count($cardio)-1));
                            }
                            $treinoB->cardio=[$cardio[$posicao]->id,$cardio[$posicao2]->id];
                        //Fim do cardio
                        $treinoB->save();
                    }
                //Treino B
                //Treino C
                    if(count($exercicioC)>5){
                        $treinoC=new registencia;            
                        $treinoC->id_aluno=$aluno->id;
                        $treinoC->nome="C";
                        $treinoC->area="Coxa e Panturrilha";
                        //TREINO
                            $posicao=rand(0,(count($exercicioC)-1));
                            $posicaoUm=rand(0,(count($exercicioC)-1));
                            $posicaoDois=rand(0,(count($exercicioC)-1));
                            $posicaoTres=rand(0,(count($exercicioC)-1));
                            $posicaoQuatro=rand(0,(count($exercicioC)-1));
                            $posicaoCinco=rand(0,(count($exercicioC)-1));
                            while($posicaoCinco==$posicaoQuatro or $posicaoCinco==$posicaoTres or $posicaoCinco==$posicaoDois or $posicaoCinco==$posicaoUm or $posicaoCinco==$posicao or $posicaoQuatro==$posicaoTres or $posicaoQuatro==$posicaoDois or $posicaoQuatro==$posicaoUm or $posicaoQuatro==$posicao or $posicaoTres==$posicaoDois or $posicaoTres==$posicaoUm or $posicaoTres==$posicao or $posicaoUm==$posicao){
                                $posicao=rand(0,(count($exercicioC)-1));
                                $posicaoUm=rand(0,(count($exercicioC)-1));
                                $posicaoDois=rand(0,(count($exercicioC)-1));
                                $posicaoTres=rand(0,(count($exercicioC)-1));
                                $posicaoQuatro=rand(0,(count($exercicioC)-1));
                                $posicaoCinco=rand(0,(count($exercicioC)-1));
                            }
                            $treinoC->exercicio=[$exercicioC[$posicao]->id,$exercicioC[$posicaoUm]->id,$exercicioC[$posicaoDois]->id,$exercicioC[$posicaoTres]->id,$exercicioC[$posicaoQuatro]->id,$exercicioC[$posicaoCinco]->id];
                        //TREINO
                        //Cardio
                            $posicao=rand(0,(count($cardio)-1));
                            $posicao2=rand(0,(count($cardio)-1));
                            while($posicao2==$posicao){
                                $posicao=rand(0,(count($cardio)-1));
                                $posicao2=rand(0,(count($cardio)-1));
                            }
                            $treinoC->cardio=[$cardio[$posicao]->id,$cardio[$posicao2]->id];
                        //Fim do cardio
                        $treinoC->save();
                    }
                //Treino C
            }else{
                //Emagrecimento |Exercicios 4 | Cardios 3
                //Treino A
                    if(count($exercicioA)>3){
                        $treinoA=new emagrecer;            
                        $treinoA->id_aluno=$aluno->id;
                        $treinoA->nome="A";
                        $treinoA->area="Peito, Tríceps, Ombros e Abdómen";
                        //TREINO
                            $posicao=rand(0,(count($exercicioA)-1));
                            $posicaoUm=rand(0,(count($exercicioA)-1));
                            $posicaoDois=rand(0,(count($exercicioA)-1));
                            $posicaoTres=rand(0,(count($exercicioA)-1));
                            while($posicaoTres==$posicaoDois or $posicaoTres==$posicaoUm or $posicaoTres==$posicao or $posicaoDois==$posicaoUm or $posicaoDois==$posicao or $posicaoUm==$posicao){
                                $posicao=rand(0,(count($exercicioA)-1));
                                $posicaoUm=rand(0,(count($exercicioA)-1));
                                $posicaoDois=rand(0,(count($exercicioA)-1));
                                $posicaoTres=rand(0,(count($exercicioA)-1));
                            }
                            $treinoA->exercicio=[$exercicioA[$posicao]->id,$exercicioA[$posicaoUm]->id,$exercicioA[$posicaoDois]->id,$exercicioA[$posicaoTres]->id];
                        //TREINO
                        //Cardio
                            $posicao=rand(0,(count($cardio)-1));
                            $posicao2=rand(0,(count($cardio)-1));
                            $posicao3=rand(0,(count($cardio)-1));
                            while($posicao3==$posicao or $posicao3==$posicao2 or $posicao2==$posicao){
                                $posicao=rand(0,(count($cardio)-1));
                                $posicao2=rand(0,(count($cardio)-1));
                                $posicao3=rand(0,(count($cardio)-1));
                            }
                            $treinoA->cardio=[$cardio[$posicao3]->id,$cardio[$posicao]->id,$cardio[$posicao2]->id];
                        //Fim do cardio
                        $treinoA->save();
                    }
                //Treino A
                //Treino B
                    if(count($exercicioB)>3){
                        $treinoB=new emagrecer;            
                        $treinoB->id_aluno=$aluno->id;
                        $treinoB->nome="B";
                        $treinoB->area="Costas, Bíceps e Trapézio";
                        //TREINO
                            $posicao=rand(0,(count($exercicioB)-1));
                            $posicaoUm=rand(0,(count($exercicioB)-1));
                            $posicaoDois=rand(0,(count($exercicioB)-1));
                            $posicaoTres=rand(0,(count($exercicioB)-1));
                            while($posicaoTres==$posicaoDois or $posicaoTres==$posicaoUm or $posicaoTres==$posicao or $posicaoDois==$posicaoUm or $posicaoDois==$posicao or $posicaoUm==$posicao){
                                $posicao=rand(0,(count($exercicioB)-1));
                                $posicaoUm=rand(0,(count($exercicioB)-1));
                                $posicaoDois=rand(0,(count($exercicioB)-1));
                                $posicaoTres=rand(0,(count($exercicioB)-1));
                            }
                            $treinoB->exercicio=[$exercicioB[$posicao]->id,$exercicioB[$posicaoUm]->id,$exercicioB[$posicaoDois]->id,$exercicioB[$posicaoTres]->id];
                        //TREINO
                        //Cardio
                            $posicao=rand(0,(count($cardio)-1));
                            $posicao2=rand(0,(count($cardio)-1));
                            $posicao3=rand(0,(count($cardio)-1));
                            while($posicao3==$posicao or $posicao3==$posicao2 or $posicao2==$posicao){
                                $posicao=rand(0,(count($cardio)-1));
                                $posicao2=rand(0,(count($cardio)-1));
                                $posicao3=rand(0,(count($cardio)-1));
                            }
                            $treinoB->cardio=[$cardio[$posicao3]->id,$cardio[$posicao]->id,$cardio[$posicao2]->id];
                        //Fim do cardio
                        $treinoB->save();  
                    }
                //Treino B
                //Treino C
                    if(count($exercicioC)>3){     
                        $treinoC=new emagrecer;            
                        $treinoC->id_aluno=$aluno->id;
                        $treinoC->nome="C";
                        $treinoC->area="Coxa e Panturrilha";
                        //TREINO
                            $posicao=rand(0,(count($exercicioC)-1));
                            $posicaoUm=rand(0,(count($exercicioC)-1));
                            $posicaoDois=rand(0,(count($exercicioC)-1));
                            $posicaoTres=rand(0,(count($exercicioC)-1));
                            while($posicaoTres==$posicaoDois or $posicaoTres==$posicaoUm or $posicaoTres==$posicao or $posicaoDois==$posicaoUm or $posicaoDois==$posicao or $posicaoUm==$posicao){
                                $posicao=rand(0,(count($exercicioC)-1));
                                $posicaoUm=rand(0,(count($exercicioC)-1));
                                $posicaoDois=rand(0,(count($exercicioC)-1));
                                $posicaoTres=rand(0,(count($exercicioC)-1));
                            }
                            $treinoC->exercicio=[$exercicioC[$posicao]->id,$exercicioC[$posicaoUm]->id,$exercicioC[$posicaoDois]->id,$exercicioC[$posicaoTres]->id];
                        //TREINO
                        //Cardio
                            $posicao=rand(0,(count($cardio)-1));
                            $posicao2=rand(0,(count($cardio)-1));
                            $posicao3=rand(0,(count($cardio)-1));
                            while($posicao3==$posicao or $posicao3==$posicao2 or $posicao2==$posicao){
                                $posicao=rand(0,(count($cardio)-1));
                                $posicao2=rand(0,(count($cardio)-1));
                                $posicao3=rand(0,(count($cardio)-1));
                            }
                            $treinoC->cardio=[$cardio[$posicao3]->id,$cardio[$posicao]->id,$cardio[$posicao2]->id];
                        //Fim do cardio
                        $treinoC->save();  
                    }
                //Treino C     
            }   
            return redirect('treinosAluno/'.$aluno->id.'')->with('msg','Treino gerado com sucesso!');
        }
   //Fim Treino
}
